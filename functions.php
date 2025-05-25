<?php
/**
 * K3E Apple Theme Functions
 * Motyw WordPress dla strony o jabłkach
 */

// =============================================================================
// KONFIGURACJA MOTYWU
// =============================================================================

add_action( 'after_setup_theme', 'k3e_setup' );
function k3e_setup() {
    // Wsparcie dla tłumaczeń
    load_theme_textdomain( 'k3e', get_template_directory() . '/languages' );
    
    // Wsparcie dla funkcji WordPress
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'responsive-embeds' );
    add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'html5', array( 'search-form', 'navigation-widgets' ) );
    add_theme_support( 'appearance-tools' );
    add_theme_support( 'woocommerce' );
    
    // Niestandardowe rozmiary obrazów dla jabłek
    add_image_size( 'apple-thumbnail', 300, 300, true );
    add_image_size( 'apple-medium', 400, 400, true );
    add_image_size( 'apple-large', 600, 600, true );
    
    // Szerokość treści
    global $content_width;
    if ( !isset( $content_width ) ) { 
        $content_width = 1200; 
    }
    
    // Menu nawigacyjne
    register_nav_menus( array( 
        'main-menu' => esc_html__( 'Menu główne', 'k3e' ),
        'footer-menu' => esc_html__( 'Menu stopki', 'k3e' )
    ) );
}

// =============================================================================
// ŁADOWANIE STYLÓW I SKRYPTÓW
// =============================================================================

add_action( 'wp_enqueue_scripts', 'k3e_enqueue_scripts' );
function k3e_enqueue_scripts() {
    // Style motywu
    wp_enqueue_style( 'k3e-style', get_stylesheet_uri(), array(), '1.0.0' );
    
    // jQuery (jeśli potrzebny)
    wp_enqueue_script( 'jquery' );
    
    // Skrypt motywu
    //wp_enqueue_script( 'k3e-script', get_template_directory_uri() . '/js/theme.js', array( 'jquery' ), '1.0.0', true );
}

// Dodaj prawidłowe ścieżki do grafik w CSS
add_action( 'wp_head', 'k3e_custom_css_paths' );
function k3e_custom_css_paths() {
    ?>
    <style>
    body {
        background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/bg.png') !important;
    }
    .apple-loader {
        background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/loader.png') !important;
    }
    </style>
    <?php
}

// =============================================================================
// SKRYPTY W STOPCE
// =============================================================================

add_action( 'wp_footer', 'k3e_footer_scripts' );
function k3e_footer_scripts() {
?>
<script>
jQuery(document).ready(function($) {
    // Detekcja urządzeń
    var deviceAgent = navigator.userAgent.toLowerCase();
    
    if (deviceAgent.match(/(iphone|ipod|ipad)/)) {
        $("html").addClass("ios mobile");
    }
    if (deviceAgent.match(/(Android)/)) {
        $("html").addClass("android mobile");
    }
    
    // Detekcja przeglądarek
    if (navigator.userAgent.search("MSIE") >= 0) {
        $("html").addClass("ie");
    } else if (navigator.userAgent.search("Chrome") >= 0) {
        $("html").addClass("chrome");
    } else if (navigator.userAgent.search("Firefox") >= 0) {
        $("html").addClass("firefox");
    } else if (navigator.userAgent.search("Safari") >= 0 && navigator.userAgent.search("Chrome") < 0) {
        $("html").addClass("safari");
    } else if (navigator.userAgent.search("Opera") >= 0) {
        $("html").addClass("opera");
    }
    
    // Backup preloader hide - na wszelki wypadek
    setTimeout(function() {
        $('.preloader').fadeOut(500);
    }, 3000);
});
</script>
<?php
}

// =============================================================================
// FILTRY TYTUŁÓW I TREŚCI
// =============================================================================

add_filter( 'document_title_separator', 'k3e_document_title_separator' );
function k3e_document_title_separator( $sep ) {
    return esc_html( '|' );
}

add_filter( 'the_title', 'k3e_title_fallback' );
function k3e_title_fallback( $title ) {
    if ( empty( $title ) ) {
        return esc_html__( 'Bez tytułu', 'k3e' );
    }
    return wp_kses_post( $title );
}

add_filter( 'the_content_more_link', 'k3e_read_more_link' );
function k3e_read_more_link() {
    if ( !is_admin() ) {
        return ' <a href="' . esc_url( get_permalink() ) . '" class="more-link">' . 
               sprintf( __( 'Czytaj więcej%s', 'k3e' ), 
               '<span class="screen-reader-text"> - ' . esc_html( get_the_title() ) . '</span>' ) . '</a>';
    }
}

add_filter( 'excerpt_more', 'k3e_excerpt_read_more_link' );
function k3e_excerpt_read_more_link( $more ) {
    if ( !is_admin() ) {
        global $post;
        return ' <a href="' . esc_url( get_permalink( $post->ID ) ) . '" class="more-link">' . 
               sprintf( __( 'Czytaj więcej%s', 'k3e' ), 
               '<span class="screen-reader-text"> - ' . esc_html( get_the_title() ) . '</span>' ) . '</a>';
    }
}

// =============================================================================
// SCHEMA MARKUP
// =============================================================================

function k3e_schema_type() {
    $schema = 'https://schema.org/';
    
    if ( is_single() ) {
        $type = "Article";
    } elseif ( is_author() ) {
        $type = 'ProfilePage';
    } elseif ( is_search() ) {
        $type = 'SearchResultsPage';
    } else {
        $type = 'WebPage';
    }
    
    echo 'itemscope itemtype="' . esc_url( $schema ) . esc_attr( $type ) . '"';
}

add_filter( 'nav_menu_link_attributes', 'k3e_schema_url', 10 );
function k3e_schema_url( $atts ) {
    $atts['itemprop'] = 'url';
    return $atts;
}

// =============================================================================
// BODY OPEN HOOK
// =============================================================================

if ( !function_exists( 'k3e_wp_body_open' ) ) {
    function k3e_wp_body_open() {
        do_action( 'wp_body_open' );
    }
}

add_action( 'wp_body_open', 'k3e_skip_link', 5 );
function k3e_skip_link() {
    echo '<a href="#content" class="skip-link screen-reader-text">' . 
         esc_html__( 'Przejdź do treści', 'k3e' ) . '</a>';
}

// =============================================================================
// OPTYMALIZACJE OBRAZÓW
// =============================================================================

add_filter( 'big_image_size_threshold', '__return_false' );

add_filter( 'intermediate_image_sizes_advanced', 'k3e_image_insert_override' );
function k3e_image_insert_override( $sizes ) {
    unset( $sizes['medium_large'] );
    unset( $sizes['1536x1536'] );
    unset( $sizes['2048x2048'] );
    return $sizes;
}

// =============================================================================
// WIDGETY
// =============================================================================

add_action( 'widgets_init', 'k3e_widgets_init' );
function k3e_widgets_init() {
    register_sidebar( array(
        'name' => esc_html__( 'Sidebar główny', 'k3e' ),
        'id' => 'primary-widget-area',
        'description' => esc_html__( 'Główny obszar widgetów w sidebarze', 'k3e' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ) );
    
    register_sidebar( array(
        'name' => esc_html__( 'Stopka', 'k3e' ),
        'id' => 'footer-widget-area',
        'description' => esc_html__( 'Obszar widgetów w stopce', 'k3e' ),
        'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="footer-widget-title">',
        'after_title' => '</h4>',
    ) );
}

// =============================================================================
// WYŁĄCZENIE KOMENTARZY I WYSZUKIWANIA
// =============================================================================

// Wyłącz komentarze dla wszystkich typów postów
add_action( 'admin_init', 'k3e_disable_comments_admin' );
function k3e_disable_comments_admin() {
    // Usuń wsparcie dla komentarzy z wszystkich typów postów
    $post_types = get_post_types();
    foreach ( $post_types as $post_type ) {
        if ( post_type_supports( $post_type, 'comments' ) ) {
            remove_post_type_support( $post_type, 'comments' );
            remove_post_type_support( $post_type, 'trackbacks' );
        }
    }
}

// Zamknij komentarze na froncie
add_filter( 'comments_open', '__return_false', 20, 2 );
add_filter( 'pings_open', '__return_false', 20, 2 );

// Ukryj istniejące komentarze
add_filter( 'comments_array', '__return_empty_array', 10, 2 );

// Usuń menu komentarzy z panelu administracyjnego
add_action( 'admin_menu', 'k3e_remove_comments_menu' );
function k3e_remove_comments_menu() {
    remove_menu_page( 'edit-comments.php' );
}

// Usuń komentarze z paska administracyjnego
add_action( 'init', 'k3e_remove_comment_support', 100 );
function k3e_remove_comment_support() {
    remove_action( 'admin_bar_menu', 'wp_admin_bar_comments_menu', 60 );
}

// Wyłącz RSS komentarzy
add_filter( 'feed_links_show_comments_feed', '__return_false' );

// Wyłącz wyszukiwarkę
add_filter( 'get_search_form', '__return_empty_string' );

// Przekieruj wyszukiwanie na stronę główną
add_action( 'parse_query', 'k3e_redirect_search' );
function k3e_redirect_search( $query ) {
    if ( is_search() && !is_admin() ) {
        wp_redirect( home_url( '/' ) );
        exit();
    }
}

// Usuń widget wyszukiwania
add_action( 'widgets_init', 'k3e_remove_search_widget' );
function k3e_remove_search_widget() {
    unregister_widget( 'WP_Widget_Search' );
}

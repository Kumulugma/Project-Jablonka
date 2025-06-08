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
    add_image_size( 'mini-photo', 500, 200, true );
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
// PANEL ADMINISTRACYJNY - OPCJE MOTYWU
// =============================================================================

add_action( 'admin_menu', 'k3e_add_admin_menu' );
function k3e_add_admin_menu() {
    add_theme_page(
        'Ustawienia Jabłonki',
        'Jabłonka - Ustawienia',
        'manage_options',
        'k3e-apple-settings',
        'k3e_options_page'
    );
}

// Strona opcji w panelu administracyjnym
function k3e_options_page() {
    ?>
    <div class="wrap">
        <h1>🍎 Ustawienia Strony Jabłonka</h1>
        
        <?php
        if (isset($_POST['submit'])) {
            k3e_save_options();
            echo '<div class="notice notice-success"><p>Ustawienia zostały zapisane!</p></div>';
        }
        ?>
        
        <form method="post" action="">
            <?php wp_nonce_field('k3e_save_options', 'k3e_nonce'); ?>
            
            <div id="k3e-admin-tabs">
                <nav class="nav-tab-wrapper">
                    <a href="#hero-section" class="nav-tab nav-tab-active">Hero Section</a>
                    <a href="#curiosities" class="nav-tab">Ciekawostki</a>
                    <a href="#culinary-tips" class="nav-tab">Porady Kulinarne</a>
                    <a href="#photo-ideas" class="nav-tab">Pomysły na Zdjęcia</a>
                </nav>

                <!-- Hero Section Tab -->
                <div id="hero-section" class="tab-content">
                    <h2>Hero Section - Górny Blok</h2>
                    <table class="form-table">
                        <tr>
                            <th scope="row">Opis</th>
                            <td>
                                <textarea name="hero_description" rows="5" cols="80"><?php echo esc_textarea(get_option('k3e_hero_description', '')); ?></textarea>
                            </td>
                        </tr>
                        
                        <tr>
                            <th scope="row">Tekst</th>
                            <td>
                                <textarea name="hero_text" rows="5" cols="80"><?php echo esc_textarea(get_option('k3e_hero_text', '')); ?></textarea>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">Statystyka 1 - Ikona</th>
                            <td><input type="text" name="hero_stat1_icon" value="<?php echo esc_attr(get_option('k3e_hero_stat1_icon', '🌍')); ?>" class="small-text" /></td>
                        </tr>
                        <tr>
                            <th scope="row">Statystyka 1 - Tekst</th>
                            <td><input type="text" name="hero_stat1_text" value="<?php echo esc_attr(get_option('k3e_hero_stat1_text', 'Kilka tysięcy odmian na świecie')); ?>" class="regular-text" /></td>
                        </tr>
                        <tr>
                            <th scope="row">Statystyka 2 - Ikona</th>
                            <td><input type="text" name="hero_stat2_icon" value="<?php echo esc_attr(get_option('k3e_hero_stat2_icon', '🏔️')); ?>" class="small-text" /></td>
                        </tr>
                        <tr>
                            <th scope="row">Statystyka 2 - Tekst</th>
                            <td><input type="text" name="hero_stat2_text" value="<?php echo esc_attr(get_option('k3e_hero_stat2_text', 'Azja Środkowa - pochodzenie jabłoni')); ?>" class="regular-text" /></td>
                        </tr>
                        <tr>
                            <th scope="row">Statystyka 3 - Ikona</th>
                            <td><input type="text" name="hero_stat3_icon" value="<?php echo esc_attr(get_option('k3e_hero_stat3_icon', '🍯')); ?>" class="small-text" /></td>
                        </tr>
                        <tr>
                            <th scope="row">Statystyka 3 - Tekst</th>
                            <td><input type="text" name="hero_stat3_text" value="<?php echo esc_attr(get_option('k3e_hero_stat3_text', '10g cukrów w średnim jabłku')); ?>" class="regular-text" /></td>
                        </tr>
                    </table>
                </div>

                <!-- Curiosities Tab -->
                <div id="curiosities" class="tab-content" style="display:none;">
                    <h2>Ciekawostki o Jabłkach</h2>
                    <div id="curiosities-container">
                        <?php
                        $curiosities = get_option('k3e_curiosities', array());
                        if (empty($curiosities)) {
                            $curiosities = array(
                                array(
                                    'icon' => '🍎',
                                    'title' => 'Newton i Grawitacja',
                                    'content' => 'Według legendy młody Newton zauważył spadające jabłko, co zainspirowało go do sformułowania zasad grawitacji.'
                                )
                            );
                        }
                        
                        foreach ($curiosities as $index => $curiosity) {
                            k3e_render_curiosity_field($index, $curiosity);
                        }
                        ?>
                    </div>
                    <button type="button" id="add-curiosity" class="button">Dodaj Ciekawostkę</button>
                </div>

                <!-- Culinary Tips Tab -->
                <div id="culinary-tips" class="tab-content" style="display:none;">
                    <h2>Porady Kulinarne</h2>
                    <div id="tips-container">
                        <?php
                        $tips = get_option('k3e_culinary_tips', array());
                        if (empty($tips)) {
                            $tips = array(
                                array(
                                    'title' => '🥧 Idealna Szarlotka',
                                    'content' => 'Tradycyjne polskie jabłka Antonówka są cenione za kwaśność i jędrność.'
                                )
                            );
                        }
                        
                        foreach ($tips as $index => $tip) {
                            k3e_render_tip_field($index, $tip);
                        }
                        ?>
                    </div>
                    <button type="button" id="add-tip" class="button">Dodaj Poradę</button>
                </div>

                <!-- Photo Ideas Tab -->
                <div id="photo-ideas" class="tab-content" style="display:none;">
                    <h2>Pomysły na Zdjęcia</h2>
                    <div id="photos-container">
                        <?php
                        $photos = get_option('k3e_photo_ideas', array());
                        if (empty($photos)) {
                            $photos = array(
                                array(
                                    'title' => '🌅 Jabłko na gałęzi',
                                    'description' => 'Pojedyncze jabłko wiszące na gałęzi, oblane popołudniowym światłem.',
                                    'image_id' => ''
                                )
                            );
                        }
                        
                        foreach ($photos as $index => $photo) {
                            k3e_render_photo_field($index, $photo);
                        }
                        ?>
                    </div>
                    <button type="button" id="add-photo" class="button">Dodaj Pomysł na Zdjęcie</button>
                </div>
            </div>

            <?php submit_button('Zapisz Ustawienia'); ?>
        </form>
    </div>

    <style>
    .nav-tab-wrapper { margin-bottom: 20px; }
    .tab-content { background: #fff; padding: 20px; border: 1px solid #ccd0d4; }
    .curiosity-item, .tip-item, .photo-item { 
        background: #f9f9f9; 
        padding: 15px; 
        margin-bottom: 15px; 
        border-left: 4px solid #d81e1e; 
        position: relative;
    }
    .remove-item { 
        position: absolute; 
        top: 10px; 
        right: 10px; 
        background: #dc3545; 
        color: white; 
        border: none; 
        padding: 5px 10px; 
        cursor: pointer; 
        border-radius: 3px;
    }
    .image-preview { 
        max-width: 150px; 
        height: auto; 
        border: 1px solid #ddd; 
        padding: 5px; 
        margin-top: 10px;
    }
    </style>

    <script>
    jQuery(document).ready(function($) {
        // Tabs functionality
        $('.nav-tab').on('click', function(e) {
            e.preventDefault();
            $('.nav-tab').removeClass('nav-tab-active');
            $(this).addClass('nav-tab-active');
            $('.tab-content').hide();
            $($(this).attr('href')).show();
        });

        // Add curiosity
        $('#add-curiosity').on('click', function() {
            var index = $('#curiosities-container .curiosity-item').length;
            var html = `
                <div class="curiosity-item">
                    <button type="button" class="remove-item" onclick="$(this).parent().remove()">Usuń</button>
                    <table class="form-table">
                        <tr>
                            <th>Ikona:</th>
                            <td><input type="text" name="curiosities[${index}][icon]" class="small-text" placeholder="🍎" /></td>
                        </tr>
                        <tr>
                            <th>Tytuł:</th>
                            <td><input type="text" name="curiosities[${index}][title]" class="regular-text" /></td>
                        </tr>
                        <tr>
                            <th>Treść:</th>
                            <td><textarea name="curiosities[${index}][content]" rows="3" cols="50"></textarea></td>
                        </tr>
                    </table>
                </div>
            `;
            $('#curiosities-container').append(html);
        });

        // Add tip
        $('#add-tip').on('click', function() {
            var index = $('#tips-container .tip-item').length;
            var html = `
                <div class="tip-item">
                    <button type="button" class="remove-item" onclick="$(this).parent().remove()">Usuń</button>
                    <table class="form-table">
                        <tr>
                            <th>Tytuł:</th>
                            <td><input type="text" name="tips[${index}][title]" class="regular-text" /></td>
                        </tr>
                        <tr>
                            <th>Treść:</th>
                            <td><textarea name="tips[${index}][content]" rows="3" cols="50"></textarea></td>
                        </tr>
                    </table>
                </div>
            `;
            $('#tips-container').append(html);
        });

        // Add photo idea
        $('#add-photo').on('click', function() {
            var index = $('#photos-container .photo-item').length;
            var html = `
                <div class="photo-item">
                    <button type="button" class="remove-item" onclick="$(this).parent().remove()">Usuń</button>
                    <table class="form-table">
                        <tr>
                            <th>Tytuł:</th>
                            <td><input type="text" name="photos[${index}][title]" class="regular-text" /></td>
                        </tr>
                        <tr>
                            <th>Opis:</th>
                            <td><textarea name="photos[${index}][description]" rows="3" cols="50"></textarea></td>
                        </tr>
                        <tr>
                            <th>Zdjęcie:</th>
                            <td>
                                <input type="hidden" name="photos[${index}][image_id]" class="image-id" />
                                <button type="button" class="button select-image">Wybierz zdjęcie</button>
                                <button type="button" class="button remove-image" style="display:none;">Usuń zdjęcie</button>
                                <div class="image-preview-container"></div>
                            </td>
                        </tr>
                    </table>
                </div>
            `;
            $('#photos-container').append(html);
        });

        // Media library integration
        $(document).on('click', '.select-image', function(e) {
            e.preventDefault();
            var button = $(this);
            var container = button.closest('.photo-item');
            
            var mediaUploader = wp.media({
                title: 'Wybierz zdjęcie',
                button: { text: 'Wybierz' },
                multiple: false
            });

            mediaUploader.on('select', function() {
                var attachment = mediaUploader.state().get('selection').first().toJSON();
                container.find('.image-id').val(attachment.id);
                container.find('.image-preview-container').html('<img src="' + attachment.sizes.thumbnail.url + '" class="image-preview" />');
                button.hide();
                container.find('.remove-image').show();
            });

            mediaUploader.open();
        });

        $(document).on('click', '.remove-image', function(e) {
            e.preventDefault();
            var container = $(this).closest('.photo-item');
            container.find('.image-id').val('');
            container.find('.image-preview-container').empty();
            $(this).hide();
            container.find('.select-image').show();
        });
    });
    </script>
    <?php
}

// Helper functions for rendering fields
function k3e_render_curiosity_field($index, $curiosity) {
    ?>
    <div class="curiosity-item">
        <button type="button" class="remove-item" onclick="jQuery(this).parent().remove()">Usuń</button>
        <table class="form-table">
            <tr>
                <th>Ikona:</th>
                <td><input type="text" name="curiosities[<?php echo $index; ?>][icon]" value="<?php echo esc_attr($curiosity['icon']); ?>" class="small-text" /></td>
            </tr>
            <tr>
                <th>Tytuł:</th>
                <td><input type="text" name="curiosities[<?php echo $index; ?>][title]" value="<?php echo esc_attr($curiosity['title']); ?>" class="regular-text" /></td>
            </tr>
            <tr>
                <th>Treść:</th>
                <td><textarea name="curiosities[<?php echo $index; ?>][content]" rows="3" cols="50"><?php echo esc_textarea($curiosity['content']); ?></textarea></td>
            </tr>
        </table>
    </div>
    <?php
}

function k3e_render_tip_field($index, $tip) {
    ?>
    <div class="tip-item">
        <button type="button" class="remove-item" onclick="jQuery(this).parent().remove()">Usuń</button>
        <table class="form-table">
            <tr>
                <th>Tytuł:</th>
                <td><input type="text" name="tips[<?php echo $index; ?>][title]" value="<?php echo esc_attr($tip['title']); ?>" class="regular-text" /></td>
            </tr>
            <tr>
                <th>Treść:</th>
                <td><textarea name="tips[<?php echo $index; ?>][content]" rows="3" cols="50"><?php echo esc_textarea($tip['content']); ?></textarea></td>
            </tr>
        </table>
    </div>
    <?php
}

function k3e_render_photo_field($index, $photo) {
    $image_url = '';
    if (!empty($photo['image_id'])) {
        $image_url = wp_get_attachment_image_url($photo['image_id'], 'thumbnail');
    }
    ?>
    <div class="photo-item">
        <button type="button" class="remove-item" onclick="jQuery(this).parent().remove()">Usuń</button>
        <table class="form-table">
            <tr>
                <th>Tytuł:</th>
                <td><input type="text" name="photos[<?php echo $index; ?>][title]" value="<?php echo esc_attr($photo['title']); ?>" class="regular-text" /></td>
            </tr>
            <tr>
                <th>Opis:</th>
                <td><textarea name="photos[<?php echo $index; ?>][description]" rows="3" cols="50"><?php echo esc_textarea($photo['description']); ?></textarea></td>
            </tr>
            <tr>
                <th>Zdjęcie:</th>
                <td>
                    <input type="hidden" name="photos[<?php echo $index; ?>][image_id]" value="<?php echo esc_attr($photo['image_id']); ?>" class="image-id" />
                    <button type="button" class="button select-image" <?php echo $image_url ? 'style="display:none;"' : ''; ?>>Wybierz zdjęcie</button>
                    <button type="button" class="button remove-image" <?php echo !$image_url ? 'style="display:none;"' : ''; ?>>Usuń zdjęcie</button>
                    <div class="image-preview-container">
                        <?php if ($image_url): ?>
                            <img src="<?php echo esc_url($image_url); ?>" class="image-preview" />
                        <?php endif; ?>
                    </div>
                </td>
            </tr>
        </table>
    </div>
    <?php
}

// Save options
function k3e_save_options() {
    if (!isset($_POST['k3e_nonce']) || !wp_verify_nonce($_POST['k3e_nonce'], 'k3e_save_options')) {
        return;
    }

    // Hero section
    update_option('k3e_hero_description', sanitize_textarea_field($_POST['hero_description']));
    update_option('k3e_hero_text', sanitize_textarea_field($_POST['hero_text']));
    update_option('k3e_hero_stat1_icon', sanitize_text_field($_POST['hero_stat1_icon']));
    update_option('k3e_hero_stat1_text', sanitize_text_field($_POST['hero_stat1_text']));
    update_option('k3e_hero_stat2_icon', sanitize_text_field($_POST['hero_stat2_icon']));
    update_option('k3e_hero_stat2_text', sanitize_text_field($_POST['hero_stat2_text']));
    update_option('k3e_hero_stat3_icon', sanitize_text_field($_POST['hero_stat3_icon']));
    update_option('k3e_hero_stat3_text', sanitize_text_field($_POST['hero_stat3_text']));

    // Curiosities
    if (isset($_POST['curiosities'])) {
        $curiosities = array();
        foreach ($_POST['curiosities'] as $curiosity) {
            $curiosities[] = array(
                'icon' => sanitize_text_field($curiosity['icon']),
                'title' => sanitize_text_field($curiosity['title']),
                'content' => sanitize_textarea_field($curiosity['content'])
            );
        }
        update_option('k3e_curiosities', $curiosities);
    }

    // Tips
    if (isset($_POST['tips'])) {
        $tips = array();
        foreach ($_POST['tips'] as $tip) {
            $tips[] = array(
                'title' => sanitize_text_field($tip['title']),
                'content' => sanitize_textarea_field($tip['content'])
            );
        }
        update_option('k3e_culinary_tips', $tips);
    }

    // Photos
    if (isset($_POST['photos'])) {
        $photos = array();
        foreach ($_POST['photos'] as $photo) {
            $photos[] = array(
                'title' => sanitize_text_field($photo['title']),
                'description' => sanitize_textarea_field($photo['description']),
                'image_id' => intval($photo['image_id'])
            );
        }
        update_option('k3e_photo_ideas', $photos);
    }
}

// Enqueue media scripts in admin
add_action('admin_enqueue_scripts', 'k3e_admin_scripts');
function k3e_admin_scripts($hook) {
    if ($hook == 'appearance_page_k3e-apple-settings') {
        wp_enqueue_media();
        wp_enqueue_script('jquery');
    }
}

// =============================================================================
// RESZTA DOTYCHCZASOWEGO KODU functions.php
// =============================================================================

// ... (reszta dotychczasowego kodu pozostaje bez zmian)

add_action( 'wp_enqueue_scripts', 'k3e_enqueue_scripts' );
function k3e_enqueue_scripts() {
    wp_enqueue_style( 'k3e-style', get_stylesheet_uri(), array(), '1.0.0' );
    wp_enqueue_script( 'jquery' );
}

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

add_action( 'wp_footer', 'k3e_footer_scripts' );
function k3e_footer_scripts() {
?>
<script>
jQuery(document).ready(function($) {
    var deviceAgent = navigator.userAgent.toLowerCase();
    
    if (deviceAgent.match(/(iphone|ipod|ipad)/)) {
        $("html").addClass("ios mobile");
    }
    if (deviceAgent.match(/(Android)/)) {
        $("html").addClass("android mobile");
    }
    
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
    
    setTimeout(function() {
        $('.preloader').fadeOut(500);
    }, 3000);
});
</script>
<?php
}

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

add_filter( 'big_image_size_threshold', '__return_false' );

add_filter( 'intermediate_image_sizes_advanced', 'k3e_image_insert_override' );
function k3e_image_insert_override( $sizes ) {
    unset( $sizes['medium_large'] );
    unset( $sizes['1536x1536'] );
    unset( $sizes['2048x2048'] );
    return $sizes;
}

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

add_action( 'admin_init', 'k3e_disable_comments_admin' );
function k3e_disable_comments_admin() {
    $post_types = get_post_types();
    foreach ( $post_types as $post_type ) {
        if ( post_type_supports( $post_type, 'comments' ) ) {
            remove_post_type_support( $post_type, 'comments' );
            remove_post_type_support( $post_type, 'trackbacks' );
        }
    }
}

add_filter( 'comments_open', '__return_false', 20, 2 );
add_filter( 'pings_open', '__return_false', 20, 2 );
add_filter( 'comments_array', '__return_empty_array', 10, 2 );

add_action( 'admin_menu', 'k3e_remove_comments_menu' );
function k3e_remove_comments_menu() {
    remove_menu_page( 'edit-comments.php' );
}

add_action( 'init', 'k3e_remove_comment_support', 100 );
function k3e_remove_comment_support() {
    remove_action( 'admin_bar_menu', 'wp_admin_bar_comments_menu', 60 );
}

add_filter( 'feed_links_show_comments_feed', '__return_false' );
add_filter( 'get_search_form', '__return_empty_string' );

add_action( 'parse_query', 'k3e_redirect_search' );
function k3e_redirect_search( $query ) {
    if ( is_search() && !is_admin() ) {
        wp_redirect( home_url( '/' ) );
        exit();
    }
}

add_action( 'widgets_init', 'k3e_remove_search_widget' );
function k3e_remove_search_widget() {
    unregister_widget( 'WP_Widget_Search' );
}
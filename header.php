<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title><?php wp_title('|', true, 'right'); ?><?php bloginfo('name'); ?></title>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Bootstrap CSS (CDN) - Zaktualizowana wersja -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">

    <!-- WordPress head -->
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    
    <!-- Preloader -->
    <div class="preloader">
        <div class="apple-loader"></div>
    </div>

    <!-- Background Overlay -->
    <div class="bg-overlay"></div>

    <!-- Header -->
    <header class="apple-header">
        <div class="container">
            <div class="header-content">
                <h1>
                    <a href="<?php echo home_url(); ?>" class="home-link">
                        <?php bloginfo('name'); ?>
                    </a>
                </h1>
                <p class="site-description">
                    <?php 
                    $description = get_bloginfo('description');
                    echo $description ? esc_html($description) : 'Odkryj bogactwo smaków i odmian jabłek z całego świata';
                    ?>
                </p>
            </div>
        </div>
    </header>
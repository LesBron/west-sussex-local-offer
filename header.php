<!DOCTYPE html>
<html lang='en'>
    <head>
        <meta charset='utf-8'>
        <meta content='width=device-width, initial-scale=1.0' name='viewport'>
        <title><?php wp_title("|", true, "right"); ?><?php echo get_bloginfo('name'); ?></title>
        <?php wp_head(); ?>
    </head>
    <body <?php body_class(colour_scheme()); ?>>

    <header class="site-header">
        <div class="site-header__inner container">
            <a class="site-header__masthead" href="<?php echo get_home_url(); ?>">
                <img src="<?php echo wp_get_attachment_image_url(get_theme_mod('custom_logo'), 'full'); ?>" alt="Local offer"/>
                Tools for Schools
            </a>

            <div class="site-header__actions">
                
                <button class="site-header__menu-toggle" aria-expanded="false">Menu</button>

                <nav class="site-header__menu">
                    <?php 
                        wp_nav_menu( array( 
                            'container' => false,
                            'theme_location' => 'header-menu'
                        ));
                    ?>
                </nav>
                <?php get_search_form(); ?>
            </div>
        </div>
    </header>

    <?php get_template_part("announcement"); ?>
<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ecommerce
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">

    <?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

    <?php wp_body_open(); ?>
    <div id="page" class="site sticky-top nav-shadow">
        <a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e('Skip to content', 'ecommerce-para-chile'); ?></a>

        <header id="masthead" class="site-header">
        <div class="d-none d-md-block d-lg-block d-xl-block">
        <?php include get_template_directory() . '/assets/templates/navs/nav-desk.php'; ?>    
        </div>
        <div class="d-block d-md-none d-lg-none d-xl-none">
        <?php include get_template_directory() . '/assets/templates/navs/nav-mobile.php'; ?>
        </div>    
    </header><!-- #masthead -->
        <?php /* include get_template_directory() . '/preloader.php'; */ ?>
    </div>

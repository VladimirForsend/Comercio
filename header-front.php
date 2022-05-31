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
            <nav id="site-navigation" class="navbar navbar-expand-md navbar-light d-none d-md-flex justify-content-center py-0">
                <div class="navbar-brand">
                    <?php
                    the_custom_logo();
                    if (is_front_page() && is_home()) :
                    ?>
                        <h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>
                    <?php
                    else :
                    ?>
                        <p class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></p>
                    <?php
                    endif;
                    $fundaciones_description = get_bloginfo('description', 'display');
                    if ($fundaciones_description || is_customize_preview()) :
                    ?>
                        <p class="site-description"><?php echo $fundaciones_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped 
                                                    ?></p>
                    <?php endif; ?>
                </div><!-- .navbar-brand -->
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="contenedor-categorias-boton">
                    <a class="d-flex align-items-center" data-bs-container="body" data-bs-toggle="popover" data-bs-placement="bottom" data-bs-content='<?php wp_nav_menu(array( 'theme_location' => 'menu-superior', 'menu_id' => 'navbar','menu_class' => 'navbar-nav pop-menu', ));?>'>
                        <button class="boton-menu-desk" type="button">
                            <span class="linea-hamburguesa"></span>
                            <span class="linea-hamburguesa"></span>
                            <span class="linea-hamburguesa"></span>
                        </button>
                        <span class="boton-texto">Categorías</span>
                    </a>
                </div>

                <div class="collapse navbar-collapse contenedor-carsesbus" id="navbarSupportedContent">
                    <ul id="navbar" class="barra-busqueda">
                        <div class="busqueda nav-item col-md-12">
                            <?php if (function_exists('aws_get_search_form')) { aws_get_search_form(); } ?>
                        </div>
                    </ul>

                    <div class="d-flex justify-content-center align-items-center menu-cuenta-compras">
                        <?php
                        wp_nav_menu(array(
                            'theme_location' => 'menu-rrss',
                            'menu_id'        => 'navbar',
                            'menu_class' => 'componentes-menu-cuenta',
                        )); ?>
                    </div>

                    <div class="mini-carrito"></div>
                </div>
            </nav><!-- #site-navigation -->

            <?php include get_template_directory() . '/assets/templates/navs/nav-mobile.php'; ?>
        </header><!-- #masthead -->
        <?php /* include get_template_directory() . '/preloader.php'; */ ?>
	</div>
	
	<div class="container-fluid">
		<div class="row">
			<?php require get_template_directory() . '/assets/modulos/modulo-slider/slider.php'; ?>
		</div>
		<div class="row my-3">
			<?php include get_template_directory() . '/assets/modulos/modulo-infobox/loop-infobox.php'; ?>
		</div>
	</div>
    
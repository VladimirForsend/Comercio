<nav id="site-navigation" class="navbar navbar-expand-lg navbar-light py-0 d-flex d-md-none nav-mobile">
    <div class="container">
        <div class="row justify-content-between align-items-center">
            <div class="navbar-brand col-6 mr-0">
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
                <button class="navbar-toggler boton-mobile" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div><!-- .navbar-brand -->
                
            <div class="col-5 d-flex align-items-center justify-content-end">
                <div class="login-mobile"><a href="<?php echo get_home_url(); ?>/my-account"><i class="fas fa-user"></i></a></div>
                <div class="d-flex justify-content-center align-items-center mini-carrito"></div>
            </div>
        
            <div class="col-12">
                <div class="busqueda nav-item">
                    <?php if (function_exists('aws_get_search_form')) { aws_get_search_form(); } ?>
                </div>
            </div>
        </div>
    </div>
    
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <div id="navbarmobile" class="remove-children">
            <?php
            wp_nav_menu(array(
                'theme_location' => 'menu-mobile',
                'menu_id'        => 'navbar',
                'menu_class'     => 'navbar-nav m-0',
            )); ?>
        </div>
    </div>
</nav><!-- #site-navigation -->
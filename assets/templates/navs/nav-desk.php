<nav id="site-navigation" class="navbar navbar-expand-lg navbar-light bg-light nav-mobile">
    <!---conatiner-->
    <div class="container-fluid">
        <!---row-->
        <div class="row">
            <!---navbrand--><a class="navbar-brand" href="#">
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
            </a>
            <div class="col-12 d-flex align-items-center justify-content-end">
                <div class="login-mobile"><a href="<?php echo get_home_url(); ?>/my-account"><i class="fas fa-user"></i></a></div>
                <div class="d-flex justify-content-center align-items-center mini-carrito"></div>
            </div>
            <div class="col-12">
                <div class="busqueda nav-item">
                    <?php if (function_exists('aws_get_search_form')) {
                        aws_get_search_form();
                    } ?>
                </div>
            </div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <?php //OPCIÓN MENU 1 SIMPLE CON BOOTSTRAP
                wp_nav_menu(
                    array(
                        'theme_location' => 'menu-superior',
                        'menu_id'        => 'primary-menu',
                        'menu_class'     => 'navbar-nav me-auto mb-2 mb-lg-0',
                        'container_class' => 'col-12 col-lg-7',
                    )
                );
                ?>


                <div class="d-flex">

                    <?php if (function_exists('aws_get_search_form')) {
                        aws_get_search_form();
                    } ?>
                </div>
            </div>
        </div>
    </div>
</nav>
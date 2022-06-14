<nav id="site-navigation" class="navbar navbar-expand-lg navbar-light bg-light nav-mobile">
    <!---conatiner-->
    <div class="container-fluid">
        <!---row-->
        <div class="row w-100 hola-estudiantes">
            <!---navbrand--><div class="navbar-brand col-12 col-md-2">
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
                </div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse col-12 col-md-9" id="navbarSupportedContent">

                <?php //OPCIÓN MENU 1 SIMPLE CON BOOTSTRAP
                wp_nav_menu(
                    array(
                        'theme_location' => 'menu-superior',
                        'menu_id'        => 'navbar',
                        'menu_class'     => 'navbar-nav m-auto nav-menu d-flex justify-content-between w-100 px-3',
                        'container_class' => 'nav col-12 col-md-7',
                    )
                );
                ?>

                <?php if (function_exists('aws_get_search_form')) {
                    aws_get_search_form(true, array('id' => '62968e5c35f00'));
                } ?>
            </div>
        </div>
    </div>
</nav>
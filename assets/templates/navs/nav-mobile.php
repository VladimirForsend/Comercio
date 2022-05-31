<nav id="site-navigation" class="navbar navbar-expand-lg navbar-light py-0 d-flex d-md-none nav-mobile">
    <div class="container">
        <div class="row justify-content-between align-items-center">
            <div class="navbar-brand col-12 mr-0">

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div><!-- .navbar-brand -->

            <div class="col-5 d-flex align-items-center justify-content-end">
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




<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <!---conatiner-->
    <div class="container-fluid">
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
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Dropdown
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled">Disabled</a>
                </li>
            </ul>
            <div class="d-flex">

                <?php if (function_exists('aws_get_search_form')) {
                    aws_get_search_form();
                } ?>
            </div>
        </div>
    </div>
</nav>
<?php
add_action('customize_register', 'color_icono');
function color_icono($wp_customize)
{


    //seccion customizer
    $wp_customize->add_section('color_icono', array(
        'title'      => 'Color del sitio',
        'priority'   => 30,
    ));
    //seccion customizer

    $wp_customize->add_setting('color_iconos', array(
        'default'     => '#43C6E4',
        'transport'   => 'refresh',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'color_iconos', array(
        'label'        => 'Color, íconos, botones, cajas',
        'section'    => 'color_icono',
        'settings'   => 'color_iconos',
    )));
}

add_action('wp_head', 'color_icono_titan');
function color_icono_titan()
{
?>
    <style type="text/css">
        .color_iconos {
            color: <?php echo get_theme_mod('color_iconos', '#161616'); ?>;
        }
        .color_texto_iconos h3 {
            color: <?php echo get_theme_mod('color_iconos', '#161616'); ?>;
        }

        .color_texto_iconos p {
            color: <?php echo get_theme_mod('color_iconos', '#000000'); ?>;
        }
        .titulo-carrusel-productos{
            background-color: <?php echo get_theme_mod('color_iconos', '#000000'); ?>;
        }
        .lista-productos a.button{
            background-color: <?php echo get_theme_mod('color_iconos', '#000000'); ?>;
        }
        .background-marca{
            background-color: <?php echo get_theme_mod('color_iconos', '#000000'); ?>;
            
        }
        footer.site-footer{
           
            border-top: 5px solid <?php echo get_theme_mod('color_iconos', '#000000'); ?>;
        }
   
    </style>
<?php
}


//titulos h1 sitio

add_action('customize_register', 'color_titulo_h1_comercio');
function color_titulo_h1_comercio($wp_customize)
{


    //seccion customizer
    $wp_customize->add_section(
        'color_titulo_h1_comercio',
        array(
            'title'      => 'Color titulos h1',
            'priority'   => 30,
        )
    );
    //seccion customizer



    $wp_customize->add_setting(
        'color_titulo_h1_comercios',
        array(
            'default'     => '#43C6E4',
            'transport'   => 'refresh',
        )
    );

    $wp_customize->add_control(new WP_Customize_Color_Control(
        $wp_customize,
        'color_titulo_h1_comercios',
        array(
            'label'        => 'Color Encabezado principal',
            'section'    => 'color_titulo_h1_comercio',
            'settings'   => 'color_titulo_h1_comercios',
        )
    ));
}

add_action('wp_head', 'color_titulo_h1_comercio_titan');
function color_titulo_h1_comercio_titan()
{
?>
    <style type="text/css">
        body h1 {
            color: <?php echo get_theme_mod('color_titulo_h1_comercios', '#656563', '!important'); ?>;
        }
    </style>
<?php
}


//titulos h2 sitio


//titulos h2 sitio

add_action('customize_register', 'color_titulo_h2_comercio');
function color_titulo_h2_comercio($wp_customize)
{


    //seccion customizer
    $wp_customize->add_section(
        'color_titulo_h2_comercio',
        array(
            'title'      => 'Color titulos h2',
            'priority'   => 30,
        )
    );
    //seccion customizer



    $wp_customize->add_setting(
        'color_titulo_h2_comercios',
        array(
            'default'     => '#43C6E4',
            'transport'   => 'refresh',
        )
    );

    $wp_customize->add_control(new WP_Customize_Color_Control(
        $wp_customize,
        'color_titulo_h2_comercios',
        array(
            'label'        => 'Color Encabezado principal',
            'section'    => 'color_titulo_h2_comercio',
            'settings'   => 'color_titulo_h2_comercios',
        )
    ));
}

add_action('wp_head', 'color_titulo_h2_comercio_titan');
function color_titulo_h2_comercio_titan()
{
?>
    <style type="text/css">
        body h2 {
            color: <?php echo get_theme_mod('color_titulo_h2_comercios', '#656563', '!important'); ?>;
        }
    </style>
<?php
}

//titulos h3 sitio

add_action('customize_register', 'color_titulo_h3_comercio');
function color_titulo_h3_comercio($wp_customize)
{


    //seccion customizer
    $wp_customize->add_section(
        'color_titulo_h3_comercio',
        array(
            'title'      => 'Color titulos h3',
            'priority'   => 30,
        )
    );
    //seccion customizer



    $wp_customize->add_setting(
        'color_titulo_h3_comercios',
        array(
            'default'     => '#43C6E4',
            'transport'   => 'refresh',
        )
    );

    $wp_customize->add_control(new WP_Customize_Color_Control(
        $wp_customize,
        'color_titulo_h3_comercios',
        array(
            'label'        => 'Color Encabezado principal',
            'section'    => 'color_titulo_h3_comercio',
            'settings'   => 'color_titulo_h3_comercios',
        )
    ));
}

add_action('wp_head', 'color_titulo_h3_comercio_titan');
function color_titulo_h3_comercio_titan()
{
?>
    <style type="text/css">
        body h3 {
            color: <?php echo get_theme_mod('color_titulo_h3_comercios', '#656563', '!important'); ?>;
        }
    </style>
<?php
}
//titulos h4 sitio

add_action('customize_register', 'color_titulo_h4_comercio');
function color_titulo_h4_comercio($wp_customize)
{


    //seccion customizer
    $wp_customize->add_section(
        'color_titulo_h4_comercio',
        array(
            'title'      => 'Color titulos h4',
            'priority'   => 30,
        )
    );
    //seccion customizer



    $wp_customize->add_setting(
        'color_titulo_h4_comercios',
        array(
            'default'     => '#43C6E4',
            'transport'   => 'refresh',
        )
    );

    $wp_customize->add_control(new WP_Customize_Color_Control(
        $wp_customize,
        'color_titulo_h4_comercios',
        array(
            'label'        => 'Color Encabezado principal',
            'section'    => 'color_titulo_h4_comercio',
            'settings'   => 'color_titulo_h4_comercios',
        )
    ));
}

add_action('wp_head', 'color_titulo_h4_comercio_titan');
function color_titulo_h4_comercio_titan()
{
?>
    <style type="text/css">
        body h4 {
            color: <?php echo get_theme_mod('color_titulo_h4_comercios', '#656563', '!important'); ?>;
        }
    </style>
<?php
}
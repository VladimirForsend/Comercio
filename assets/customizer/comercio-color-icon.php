<?php
add_action('customize_register', 'color_icono');
function color_icono($wp_customize)
{


    //seccion customizer
    $wp_customize->add_section('color_icono', array(
        'title'      => 'Color íconos',
        'priority'   => 30,
    ));
    //seccion customizer

    $wp_customize->add_setting('color_iconos', array(
        'default'     => '#43C6E4',
        'transport'   => 'refresh',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'color_iconos', array(
        'label'        => 'Color íconos',
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
    </style>
<?php
}

add_action('customize_register', 'color_titulos_comercio');

function color_titulos_comercio($wp_customize)
{


    //seccion customizer
    $wp_customize->add_section(
        'color_titulos_comercio',
        array(
            'title'      => 'Color titulos',
            'priority'   => 30,
        )
    );
    //seccion customizer

    $wp_customize->add_setting(
        'color_titulos_comercios',
        array(
            'default'     => '#43C6E4',
            'transport'   => 'refresh',
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'color_titulos_comercios',
            array(
                'label'        => 'Color de encabezados h1',
                'section'    => 'color_titulos_comercio',
                'settings'   => 'color_titulos_comercios',
            )
        )
    );
}


add_action('wp_head', 'color_titulos_comercio');
function color_titulosh1_comercio_titan()
{
?>
    <style type="text/css">
        body h1 {
            color: <?php echo get_theme_mod('color_titulosh1_comercios', '#161616', '!important'); ?>;
        }
    </style>
<?php
}

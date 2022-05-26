<?php
add_action( 'customize_register', 'color_icono' );
function color_icono( $wp_customize ) {


    //seccion customizer
    $wp_customize->add_section( 'color_icono' , array(
        'title'      => 'Color íconos',
        'priority'   => 30,
    ) );
    //seccion customizer

    $wp_customize->add_setting( 'color_iconos' , array(
        'default'     => '#43C6E4',
        'transport'   => 'refresh',
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'color_iconos', array(
        'label'        => 'Color íconos',
        'section'    => 'color_icono',
        'settings'   => 'color_iconos',
    ) ) );

} 

add_action( 'wp_head', 'color_icono_titan');
function color_icono_titan()
{
    ?>
         <style type="text/css">
             .color_iconos{color:<?php echo get_theme_mod('color_iconos', '#161616'); ?>; }
            
         </style>
    <?php
}

add_action( 'customize_register', 'color_texto_comercio' );
function color_texto_comercio( $wp_customize ) {


    //seccion customizer
    $wp_customize->add_section( 'color_texto_comercio' , array(
        'title'      => 'Color textos sitio',
        'priority'   => 30,
    ) );
    //seccion customizer

    $wp_customize->add_setting( 'color_texto_comercios' , array(
        'default'     => '#43C6E4',
        'transport'   => 'refresh',
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'color_texto_comercios', array(
        'label'        => 'Color de textos',
        'section'    => 'color_texto_comercio',
        'settings'   => 'color_texto_comercios',
    ) ) );

} 

add_action( 'wp_head', 'color_texto_comercio_titan');
function color_texto_comercio_titan()
{
    ?>
         <style type="text/css">
             body p{color:<?php echo get_theme_mod('color_texto_comercios', '#161616'); ?>; }
            
         </style>
    <?php
}




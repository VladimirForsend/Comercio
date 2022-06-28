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
        .woocommerce nav.woocommerce-pagination ul li a:focus, .woocommerce nav.woocommerce-pagination ul li a:hover, .woocommerce nav.woocommerce-pagination ul li span.current{
            background-color: <?php echo get_theme_mod('color_iconos', '#000000'); ?>;
        }
        
    </style>
<?php
}

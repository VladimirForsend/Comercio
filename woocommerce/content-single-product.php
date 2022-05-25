<?php

/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined('ABSPATH') || exit;

global $product;

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked woocommerce_output_all_notices - 10
 */
do_action('woocommerce_before_single_product');

if (post_password_required()) {
    echo get_the_password_form(); // WPCS: XSS ok.
    return;
}
?>
<div id="product-<?php the_ID(); ?>" <?php wc_product_class('py-4', $product); ?>>
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6">
                <?php
                /**
                 * Hook: woocommerce_before_single_product_summary.
                 *
                 * @hooked woocommerce_show_product_sale_flash - 10
                 * @hooked woocommerce_show_product_images - 20
                 */
                do_action('woocommerce_before_single_product_summary');

                ?>
            </div>
            <div class="col-12 col-md-6">
                <?php
                /**
                 * Hook: woocommerce_single_product_summary.
                 *
                 * @hooked woocommerce_template_single_title - 5
                 * @hooked woocommerce_template_single_rating - 10
                 * @hooked woocommerce_template_single_price - 10
                 * @hooked woocommerce_template_single_excerpt - 20
                 * @hooked woocommerce_template_single_add_to_cart - 30
                 * @hooked woocommerce_template_single_meta - 40
                 * @hooked woocommerce_template_single_sharing - 50
                 * @hooked WC_Structured_Data::generate_product_data() - 60
                 */
                do_action('woocommerce_single_product_summary');
                ?>

                <div class="tipo--entrega">
                    <?php 
                    $caracteristica1 = get_field('caracteristicas_destacadas_uno');
                    $caracteristica2 = get_field('caracteristicas_destacadas_dos');
                    $caracteristica3 = get_field('caracteristicas_destacadas_tres');
                    $caracteristica4 = get_field('caracteristicas_destacadas_cuatro');
                    $caracteristica5 = get_field('caracteristicas_destacadas_cinco');
                    if(empty($caracteristica1) && empty($caracteristica2) && empty($caracteristica3) && empty($caracteristica4) && empty($caracteristica5)) { } else {
                    ?>
                    <h6 class="h6 mt-4 pesado">Caracteristicas destacada</h6>
                    <ul class="row flex-column caracteristicas-destacadas">
                        <?php if(!empty($caracteristica1)){ ?>
                            <li><?php the_field('caracteristicas_destacadas_uno'); ?></li>
                        <?php }; ?>
                        <?php if(!empty($caracteristica2)){ ?>
                            <li><?php the_field('caracteristicas_destacadas_dos'); ?></li>
                        <?php }; ?>
                        <?php if(!empty($caracteristica3)){ ?>
                            <li><?php the_field('caracteristicas_destacadas_tres'); ?></li>
                        <?php }; ?>
                        <?php if(!empty($caracteristica4)){ ?>
                            <li><?php the_field('caracteristicas_destacadas_cuatro'); ?></li>
                        <?php }; ?>
                        <?php if(!empty($caracteristica5)){ ?>
                            <li><?php the_field('caracteristicas_destacadas_cinco'); ?></li>
                        <?php }; ?>
                    </ul>
                    <?php }; ?>
                    <!-- tipo de entrega nueva -->
					<?php $envio = get_field('envio_a_domicilio'); $retiro = get_field('retira_tu_compra'); if(!empty($envio) && !empty($retiro)) {} else {?>
                    <div class="tipo-entrega-nueva">
						<?php if(empty($envio)) {?>
						<div class="primera-parte">
							<h5 class="">TODOS LOS ENVIOS SON POR PAGAR</h5>
							<div class="">
								<i class="fas fa-shipping-fast"></i>
								<h6 class="">Zona Metropolitana de Santiago y Envío a regiones: </h6>
								<p class="d-inline">Su pedido se despachara de 3 a 5 días hábiles después de efectuada la compra.  Enviaremos a su correo el número de seguimiento dentro de las 24 horas.</p>
							</div>
						</div>
						<?php }; ?>
						<?php if(empty($retiro)) {?>
                        <div class="segunda-parte">
                            <i class="fas fa-store-alt"></i>
                            <h6 class="">Compra directo en tienda, ¡Visítanos!</h6>
                            <ul class="">
                                <li class="">– San Alfonso 562  Metro Estación central</li>
                                <li class="">– Horario: Lunes a Viernes de 9:30 a 18:00 hrs. Sábado: 10:00 a 14:00 hrs.</li>
                            </ul>
                        </div>
						<?php }; ?>
                    </div>
					<?php }; ?>
                    <!-- fin de tipo de entrega nueva -->
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <?php do_action('woocommerce_after_single_product'); ?>
</div>
<?php
    /**
     * Hook: woocommerce_after_single_product_summary.
     *
     * @hooked woocommerce_output_product_data_tabs - 10
     * @hooked woocommerce_upsell_display - 15
     * @hooked woocommerce_output_related_products - 20
     */
    do_action('woocommerce_after_single_product_summary');
?>
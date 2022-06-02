<?php // FACTURA O BOLETA
//modulo de checkout woocommerce Forsend.
//Instrucciones:

//para llamar al módulo ir al archivo function.php del tema.

//Si tu tema es un tema hijo, debes guardar este archivo en tu carpeta theme child en la misma carpeta del archivo function.php

//llamado. ----> include( get_stylesheet_directory() . '/boleta-factura-modulo.php');

/**
 * Add the field to the checkout page
 */
add_action('woocommerce_before_checkout_billing_form', 'customise_checkout_field');
function customise_checkout_field($checkout)
{
    // echo do_shortcode("[ea_standard]"); 
    echo '<div id="mi-comprobante">';
    woocommerce_form_field('customised_field_comprobante', array(
        'type' => 'select',
        'label' => __('¿Boleta o Factura?'),
        'class' => array('custom-rut'),
        'options'   => array(
            'blank' => __('Elige tu tipo de comprobante', 'woocommerce'),
            'Boleta' => __('Boleta', 'woocommerce'),
            'Factura' => __('Factura', 'woocommerce')
        )
    ), $checkout->get_value('customised_field_comprobante'));

    echo '</div>';

    echo '<div id="rut-factura">';
    woocommerce_form_field('customised_field_rut_empresa', array(
        'type' => 'number',
		'required'    => true,
         'priority' => 100, 
        'clear' => true,
        'label' => __('Rut de Empresa o persona natural', 'woocommerce'),
		'description' => 'Ingresa tu Rut, Si tu RUT termina en K remplazala POR un 0 "CERO" ',
        'class' => array('custom-rut'),
    ), $checkout->get_value('customised_field_rut_empresa'));
    echo '</div>';


    echo '<div id="razon-social">';
    woocommerce_form_field('customised_field_razon_social', array(
        'type' => 'text',
        'label' => __('Razón social', 'woocommerce'),
        'class' => array('custom-rut'),
    ), $checkout->get_value('customised_field_razon_social'));
    echo '</div>';

    echo '<div id="giro">';
    woocommerce_form_field('customised_field_giro', array(
        'type' => 'text',
        'label' => __('Giro', 'woocommerce'),
        'class' => array('custom-rut'),
    ), $checkout->get_value('customised_field_giro'));
    echo '</div>';

    echo '<div id="direccion-comercial">';
    woocommerce_form_field('customised_field_direccion_comercial', array(
        'type' => 'text',
        'label' => __('Dirección Comercial', 'woocommerce'),
        'class' => array('custom-rut'),
    ), $checkout->get_value('customised_field_direccion_comercial'));
    echo '</div>';

?>
    <script type="text/javascript">
        jQuery(document).ready(function() {
            jQuery('#rut-factura').fadeIn();
            jQuery('#razon-social').fadeOut();
            jQuery('#giro').fadeOut();
            jQuery('#direccion-comercial').fadeOut();


            jQuery('span.optional').fadeOut();
            jQuery('form.checkout').on('change', 'select[name^="customised_field_comprobante"]', function() {
                var val = jQuery(this).val();
                var req = document.createElement('abbr');
                req.title = 'obligatorio';
                req.className = 'required';
                req.innerText = '*';

                if (val == "Boleta") {
                    jQuery('#rut-factura').fadeIn();
                    jQuery('#razon-social').fadeOut();
                    jQuery('#giro').fadeOut();
                    jQuery('#direccion-comercial').fadeOut();
                    jQuery("#customised_field_rut_empresa").prop('required', true);
                } else if (val == 'Factura') {
                    jQuery('#rut-factura').fadeIn();
                    jQuery("#customised_field_rut_empresa").prop('required', true);
                    jQuery('#razon-social').fadeIn();
                    jQuery("#customised_field_razon_social").prop('required', true);
                    jQuery('#giro').fadeIn();
                    jQuery("#customised_field_giro").prop('required', true);
                    jQuery('#direccion-comercial').fadeIn();
                    jQuery("#customised_field_direccion_comercial").prop('required', true);

                    document.querySelector('#customised_field_rut_empresa_field label[for="customised_field_rut_empresa"]').appendChild(req);
                }
            });
        });
    </script>
<?php
}
// Guardar el campo personalizado en la orden del producto/servicio:
add_action('woocommerce_checkout_update_order_meta', 'guardar_field_boleta');

function guardar_field_boleta($order_id)
{
    if ($_POST['customised_field_comprobante']) update_post_meta($order_id, 'Tipo de Comprobante', esc_attr($_POST['customised_field_comprobante']));
}

// Guardar el campo personalizado en la orden del producto/servicio:
add_action('woocommerce_checkout_update_order_meta', 'guardar_rutempresa');

function guardar_rutempresa($order_id)
{
    if ($_POST['customised_field_rut_empresa']) update_post_meta($order_id, 'Rut de Empresa o persona natural', esc_attr($_POST['customised_field_rut_empresa']));
    if ($_POST['customised_field_razon_social']) update_post_meta($order_id, 'Razón Social', esc_attr($_POST['customised_field_razon_social']));
    if ($_POST['customised_field_direccion_comercial']) update_post_meta($order_id, 'Razón Social', esc_attr($_POST['customised_field_direccion_comercial']));
    if ($_POST['customised_field_giro']) update_post_meta($order_id, 'Giro', esc_attr($_POST['customised_field_Giro']));
}

/**
 * Update value of field on Admin
 */

add_action('woocommerce_checkout_update_order_meta', 'customise_checkout_field_update_order_meta');
function customise_checkout_field_update_order_meta($order_id)
{
    if (!empty($_POST['customised_field_comprobante'])) {
        update_post_meta($order_id, 'Tipo de Comprobante', sanitize_text_field($_POST['customised_field_comprobante']));
    }
}

// Save custom checkout field value as custom order meta data and user meta data too
add_action('woocommerce_checkout_create_order', 'wps_update_order_meta', 20, 2);
function wps_update_order_meta($order, $data)
{
    if (isset($_POST['customised_field_comprobante'])) {
        // Save custom checkout field value
        $order->update_meta_data('_customised_field_comprobante', esc_attr($_POST['customised_field_comprobante']));
        $order->update_meta_data('_customised_field_rut_empresa', esc_attr($_POST['customised_field_rut_empresa']));
        $order->update_meta_data('_customised_field_razon_social', esc_attr($_POST['customised_field_razon_social']));
        $order->update_meta_data('_customised_field_direccion_comercial', esc_attr($_POST['customised_field_direccion_comercial']));
        $order->update_meta_data('_customised_field_giro', esc_attr($_POST['customised_field_giro']));
        // Save the custom checkout field value as user meta data
        if ($order->get_customer_id()) {
            update_user_meta(
                $order->get_customer_id(),
                'customised_field_comprobante',
                esc_attr($_POST['customised_field_comprobante'])
            );

            update_user_meta(
                $order->get_customer_id(),
                'customised_field_rut_empresa',
                esc_attr($_POST['customised_field_rut_empresa'])
            );

            update_user_meta(
                $order->get_customer_id(),
                'customised_field_razon_social',
                esc_attr($_POST['customised_field_razon_social'])
            );

            update_user_meta(
                $order->get_customer_id(),
                'customised_field_direccion_comercial',
                esc_attr($_POST['customised_field_direccion_comercial'])
            );

            update_user_meta(
                $order->get_customer_id(),
                'customised_field_giro',
                esc_attr($_POST['customised_field_giro'])
            );
        }
    }
}

//* Display field value on the order edition page
add_action('woocommerce_admin_order_data_after_billing_address', 'wps_select_checkout_field_display_admin_order_meta', 10, 1);
function wps_select_checkout_field_display_admin_order_meta($order)
{
    echo '<p><strong>' . __('Tipo de Comprobante') . ':</strong><br/>' . esc_attr(get_post_meta($order->id, '_customised_field_comprobante', true)) . '</p>';

    if (esc_attr(get_post_meta($order->id, '_customised_field_comprobante', true)) == "Factura") {
        echo '<p><strong>' . __('Rut de Empresa o persona natural') . ':</strong><br/>' . esc_attr(get_post_meta($order->id, '_customised_field_rut_empresa', true)) . '</p>';
        echo '<p><strong>' . __('Razón Social') . ':</strong><br/>' . esc_attr(get_post_meta($order->id, '_customised_field_razon_social', true)) . '</p>';
        echo '<p><strong>' . __('Dirección Comercial') . ':</strong><br/>' . esc_attr(get_post_meta($order->id, '_customised_field_direccion_comercial', true)) . '</p>';
        echo '<p><strong>' . __('Giro') . ':</strong><br/>' . esc_attr(get_post_meta($order->id, '_customised_field_giro', true)) . '</p>';
    }
}

//* Display field value on the order edition page
add_action('woocommerce_admin_order_data_after_billing_address', 'wps_select_checkout_field_display_admin_order_meta_boleta', 10, 1);
function wps_select_checkout_field_display_admin_order_meta_boleta($order)
{
    echo '<p><strong>' . __('Tipo de Comprobante') . ':</strong><br/>' . esc_attr(get_post_meta($order->id, '_customised_field_comprobante', true)) . '</p>';

    if (esc_attr(get_post_meta($order->id, '_customised_field_comprobante', true)) == "Boleta") {
        echo '<p><strong>' . __('Rut de Empresa o persona natural') . ':</strong><br/>' . esc_attr(get_post_meta($order->id, '_customised_field_rut_empresa', true)) . '</p>';
      
    }
}

//* Add selection field value to emails
add_filter('woocommerce_email_order_meta_keys', 'wps_select_order_meta_keys');
function wps_select_order_meta_keys($keys)
{
    $keys['Tipo de Comprobante'] = 'customised_field_comprobante';
    $keys['Rut de Empresa o persona natural'] = 'customised_field_rut_empresa';
    $keys['Razón Social'] = 'customised_field_razon_social';
    $keys['Dirección Comercial'] = 'customised_field_direccion_comercial';
    $keys['Giro'] = 'customised_field_giro';

    return $keys;
}

//* Process the checkout
add_action('woocommerce_checkout_process', 'customised_checkout_field_process');
function customised_checkout_field_process()
{
    global $woocommerce;
    // Check if set, if its not set add an error.
    //    if ($_POST['retiro_local'] == "blank") wc_add_notice( 'Olvidaste seleccionar una tienda de retiro!', 'error' );
    if ($_POST['customised_field_comprobante'] == "blank") wc_add_notice(__('Escoge un tipo de comprobante.'), 'error');
}
/*mejorar rendimiento de los js*/


/*mejorar rendimiento de los js*/
add_filter('acf/save_post', 'convert_attributes_to_standard_wp', 20);
function convert_classes_to_standard_wp($post_id)
{
    // use a different field name for your converted value
    $meta_key = 'converted_attributes';
    // clear any previously stored values
    delete_post_meta($post_id, $meta_key);
    // get new acf value
    $values = get_field('attributes', $post_id);
    if (is_array($values) && count($values)) {
        foreach ($values as $value) {
            add_post_meta($post_id, $meta_key, $value, true);
        } // end foreach
    } // end if
}

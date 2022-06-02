<?php

/**
 * remover campo codigo postal woocommerce
 */ 
 
add_filter( 'woocommerce_checkout_fields' , 'titan_remove_billing_postcode_checkout' );
 
function titan_remove_billing_postcode_checkout( $fields ) {
  unset($fields['billing']['billing_postcode']);
  //unset($fields['billing']['billing_company']);
  unset($fields['shipping']['shipping_postcode']);
  
  return $fields;
  
}



/**
 * Process the checkout
 *//*
add_action('woocommerce_checkout_process', 'my_custom_checkout_field_process');

function my_custom_checkout_field_process() {
    // Check if set, if its not set add an error.
    if ( ! $_POST['customised_field_rut_empresa'] )
        wc_add_notice( __( 'completa tu rut' ), 'error' );
}
*/

/**
 * Update the order meta with field value
 *//*
add_action( 'woocommerce_checkout_update_order_meta', 'my_custom_checkout_field_update_order_meta' );

function my_custom_checkout_field_update_order_meta( $order_id ) {
    if ( ! empty( $_POST['customised_field_rut_empresa'] ) ) {
        update_post_meta( $order_id, 'Rut', sanitize_text_field( $_POST['customised_field_rut_empresa'] ) );
    }
}*/
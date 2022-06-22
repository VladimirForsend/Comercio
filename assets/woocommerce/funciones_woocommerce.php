<?php
function customtheme_add_woocommerce_support()
{
    add_theme_support('woocommerce');
}
add_action('after_setup_theme', 'customtheme_add_woocommerce_support');

/**
 * Show cart contents / total Ajax
 */
add_filter('woocommerce_add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment');

function woocommerce_header_add_to_cart_fragment($fragments)
{
    global $woocommerce;

    ob_start();

?>
    <a class="cart-customlocation" href="<?php echo esc_url(wc_get_cart_url()); ?>" title="<?php _e('View your shopping cart', 'woothemes'); ?>"><?php echo sprintf(_n('%d item', '%d items', $woocommerce->cart->cart_contents_count, 'woothemes'), $woocommerce->cart->cart_contents_count); ?> - <?php echo $woocommerce->cart->get_cart_total(); ?></a>
    <?php
    $fragments['a.cart-customlocation'] = ob_get_clean();
    return $fragments;
}


/*cutoas para productos woocommerce


add_action('woocommerce_after_add_to_cart_button', 'titan_calculadora_precio');
$txt = "Hello world!";
function titan_calculadora_precio()
{
    global $product;
    //aquí imprimimos los div que iran bajo el precio y antes del botón agregar al carro.
    echo '<div class="cuotas-modulo ultima-linea">Métodos de pago: <span class="tc-cuotas-modulo"></span></div>';
    $price = $product->get_price();
    $currency = get_woocommerce_currency_symbol();
}*/



add_action('woocommerce_single_product_summary', 'custom_single_product_summary_actions', 1);

//SKU
function custom_single_product_summary_actions()
{

    // Put back the SKU:

    add_action('woocommerce_single_product_summary', 'woocommerce_single_custom_sku', 9);
    function woocommerce_single_custom_sku()
    {
        global $product;


        if (wc_product_sku_enabled() && ($product->get_sku())) :
    ?>
            <p><span class="title-sku_wrapper"><?php esc_html_e('SKU:', 'woocommerce'); ?> <span class="sku"><?php echo ($sku = $product->get_sku()) ? $sku : esc_html__('N/A', 'woocommerce'); ?></span></span></p>

<?php
        endif;
    }
}

/* prueba sku variable */
add_action( 'woocommerce_before_single_product', 'show_variation_sku_underneath_product_title' );
function show_variation_sku_underneath_product_title() {

    global $product;

    if ( $product->is_type('variable') ) {
        ?>
        <script>
        jQuery(document).ready(function($) {     
            $('input.variation_id').change( function(){
                if( '' != $('input.variation_id').val() ) {

                    jQuery.ajax( {

                        url: '<?php echo admin_url( 'admin-ajax.php'); ?>',
                        type: 'post',
                        data: { 
                            action: 'get_variation_sku', 
                            variation_id: $('input.variation_id').val()
                        },
                        success: function(data) {
                            $('h1.product_title').siblings('.variation-sku').remove();
                            if(data.length > 0) {
                                $('h1.product_title').after('<p class="variation-sku">SKU: ' + data + '</p>');
                            }
                        }
                    });

                }
            });
        });
        </script>
    <?php
    }
}
    
add_action('wp_ajax_get_variation_sku' , 'get_variation_sku');
add_action('wp_ajax_nopriv_get_variation_sku','get_variation_sku');
function get_variation_sku() {

    $variation_id = intval( $_POST['variation_id'] );
    $sku = '';

    if ( $product = wc_get_product( $variation_id ) ) $sku = $product->get_sku();
    echo $sku;

    wp_die(); // this is required to terminate immediately and return a proper response
}
/* prueba sku variable */


remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10 );
  
//add_action( 'woocommerce_after_single_product_summary', 'bbloomer_wc_output_long_description', 10 );
  
function woocommerce_template_product_description()
{
    echo '<div class="comercio--descripcion row">';
        echo '<div class="comercio--descripcion--informacion comercio--additional-information col-12 col-lg-6">';
        wc_get_template('single-product/tabs/additional-information.php');
        echo '</div>';

        echo '<div class="comercio--descripcion--informacion comercio--description-inner col-12 col-lg-6">';
        wc_get_template('single-product/tabs/description.php');
        echo '</div>';

    echo '</div>';
}
add_action('woocommerce_after_single_product', 'woocommerce_template_product_description', 60);





/** to change the position of excerpt **/
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20);
add_action('woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 31);


/**
 * @snippet       Remove Zoom, Gallery @ Single Product Page
 * @how-to        Get CustomizeWoo.com FREE
 * @author        Rodolfo Melogli
 * @testedwith    WooCommerce 3.8
 * @donate $9     https://businessbloomer.com/bloomer-armada/
 */

add_action('wp', 'bbloomer_remove_zoom_lightbox_theme_support', 99);

function bbloomer_remove_zoom_lightbox_theme_support()
{
    add_theme_support('wc-product-gallery-zoom');
    add_theme_support('wc-product-gallery-lightbox');
    add_theme_support('wc-product-gallery-slider');
}

/**
 * MONTO MÍNIMO CHECKOUT
 * Set a minimum order amount for checkout *
 */

add_action('woocommerce_checkout_process', 'wc_minimum_order_amount');
add_action('woocommerce_before_cart', 'wc_minimum_order_amount');

function wc_minimum_order_amount()
{
    // Set this variable to specify a minimum order value
    $minimum = 30000;

    if (WC()->cart->total < $minimum) {
        if (is_cart()) {
            wc_print_notice(
                sprintf(
                    'Tu compra actual es de %s — debes comprar un minimo de %s para procesar la orden ',
                    wc_price(WC()->cart->total),
                    wc_price($minimum)
                ),
                'error'
            );
        } else {
            wc_add_notice(
                sprintf(
                    'Tu compra actual es de %s — debes comprar un minimo de %s para procesar la orden',
                    wc_price(WC()->cart->total),
                    wc_price($minimum)
                ),
                'error'
            );
        }
    }
}



/**
 * Cambiar el texto "hay existencias"
 *//*

add_filter('woocommerce_get_availability', 'change_in_stock_text', 1, 2);

function change_in_stock_text($availability, $_product)
{

    // Change In Stock Text
    if ($_product->is_in_stock()) {
        $availability['availability'] = __('Disponible', 'woocommerce');
    }

    return $availability;
}


/*botones menos y más en cantidad*/
// -------------
// 1. Show Buttons
  
add_action( 'woocommerce_before_add_to_cart_quantity', 'bbloomer_display_quantity_plus' );
  
function bbloomer_display_quantity_plus() {
   echo '<button type="button" class="plus" >+</button>';
}
  
add_action( 'woocommerce_after_add_to_cart_quantity', 'bbloomer_display_quantity_minus' );
  
function bbloomer_display_quantity_minus() {
   echo '<button type="button" class="minus" >-</button>';
}
 
// Note: to place minus @ left and plus @ right replace above add_actions with:
// add_action( 'woocommerce_before_add_to_cart_quantity', 'bbloomer_display_quantity_minus' );
// add_action( 'woocommerce_after_add_to_cart_quantity', 'bbloomer_display_quantity_plus' );
  
// -------------
// 2. Trigger jQuery script
  
add_action( 'wp_footer', 'bbloomer_add_cart_quantity_plus_minus' );
  
function bbloomer_add_cart_quantity_plus_minus() {
   // Only run this on the single product page
   if ( ! is_product() ) return;
   ?>
      <script type="text/javascript">
           
      jQuery(document).ready(function($){   
           
         $('form.cart').on( 'click', 'button.plus, button.minus', function() {
  
            // Get current quantity values
            var qty = $( this ).closest( 'form.cart' ).find( '.qty' );
            var val   = parseFloat(qty.val());
            var max = parseFloat(qty.attr( 'max' ));
            var min = parseFloat(qty.attr( 'min' ));
            var step = parseFloat(qty.attr( 'step' ));
  
            // Change the value if plus or minus
            if ( $( this ).is( '.plus' ) ) {
               if ( max && ( max <= val ) ) {
                  qty.val( max );
               } else {
                  qty.val( val + step );
               }
            } else {
               if ( min && ( min >= val ) ) {
                  qty.val( min );
               } else if ( val > 1 ) {
                  qty.val( val - step );
               }
            }
              
         });
           
      });
           
      </script>
   <?php
}


/**
 * Remove related products output
 */
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );

add_filter( 'gettext', 'change_cart_totals_text', 20, 3 );
function change_cart_totals_text( $translated, $text, $domain ) {
    if( is_cart() && $translated == 'Total del carrito' ){
        $translated = __('Resumen de la orden', 'woocommerce');
    }
    return $translated;
}



add_filter('post_class', function($classes, $class, $product_id) {
    if(is_product()) {
        //only add these classes if we're on a product category page.
        $classes = array_merge(['col-12'], $classes);
    }
    return $classes;
},10,3);


/*
add_filter('post_class', function($classes, $class, $product_id) {
    $classes = array_merge(['col-12','col-md-3 mb-3'], $classes);
    return $classes;
},10,3);
*/


add_action ( "woocommerce_before_shop_loop_item", "after_li_started", 9 );

function after_li_started () {
    echo "<div class='comercio-product-card'><div class='tarjeta-producto-superior w-100'>";
}

add_action ( "woocommerce_after_shop_loop_item", "before_li_started", 10 );

function before_li_started () {
    echo "</div></div>";
}


remove_action( 'woocommerce_before_checkout_form', 'woocommerce_checkout_coupon_form', 10 );
add_action( 'woocommerce_review_order_before_cart_contents', 'woocommerce_checkout_coupon_form_custom' );
function woocommerce_checkout_coupon_form_custom() {
    echo '<tr class="coupon-form"><td colspan="2">';
    
    wc_get_template(
        'checkout/form-coupon.php',
        array(
            'checkout' => WC()->checkout(),
        )
    );
    echo '</tr></td>';
}

// para quitar campos que esten vacios
add_filter( 'woocommerce_product_tabs', 'yikes_woo_remove_empty_tabs', 20, 1 );

function yikes_woo_remove_empty_tabs( $tabs ) {

	if ( ! empty( $tabs ) ) {
		foreach ( $tabs as $title => $tab ) {
			if ( empty( $tab['content'] ) && strtolower( $tab['title'] ) !== 'description' ) {
				unset( $tabs[ $title ] );
			}
		}
	}
	return $tabs;
}

/* reordenar los campos del checkout */
add_filter( 'woocommerce_default_address_fields', 'bbloomer_reorder_checkout_fields' );
 
function bbloomer_reorder_checkout_fields( $fields ) {
 
   // default priorities:
   // 'first_name' - 10
   // 'last_name' - 20
   // 'company' - 30
   // 'country' - 40
   // 'address_1' - 50
   // 'address_2' - 60
   // 'city' - 70
   // 'state' - 80
   // 'postcode' - 90
 
  // e.g. move 'company' above 'first_name':
  // just assign priority less than 10
  $fields['city']['priority'] = 51;
 
  return $fields;
}
//* mostrar el campo rut de las ordenes en el administrador
add_action('woocommerce_admin_order_data_after_billing_address', 'display_order_rut', 10, 1);
function display_order_rut($order)
{
    $rut = esc_attr(get_post_meta($order->id, '_billing_rut', true));
    echo '<p><strong>' . __('Rut') . ':</strong><br/>' . $rut . '</p>';
}
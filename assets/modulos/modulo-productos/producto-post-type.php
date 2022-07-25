<div class="container mt-3 contenedor-productos-home">
    <div class="row">

        <?php

        if (!function_exists('wc_get_products')) {
            return;
        }
        $paged                   = (get_query_var('paged')) ? absint(get_query_var('paged')) : 1;
        $ordering                = WC()->query->get_catalog_ordering_args();
        $ordering['orderby']     = array_shift(explode(' ', $ordering['orderby']));
        $ordering['orderby']     = stristr($ordering['orderby'], 'price') ? 'meta_value_num' : $ordering['orderby'];
        $products_per_page       = apply_filters('loop_shop_per_page', wc_get_default_products_per_row() * wc_get_default_product_rows_per_page());
        $products_per_page = -1; // -1 shows all posts
        $products_ids            = wc_get_products(array(
            'status'               => 'publish',
            'limit'                => $products_per_page,
            'page'                 => $paged,
            'paginate'             => true,
            'return'               => 'ids',
            'tax_query' => array(
                array(
                    'taxonomy' => 'product_cat',
                    'field'    => 'slug',
                    'terms'    => 'aminoacidos',
                ),
            ),

        ));
        ?>
        <h3 class="col-12">
        <?php 
        $output = array();

        // get an array of the WP_Term objects for a defined product ID
        $terms = wp_get_post_terms( get_the_id(), 'product_cat' );
        
        // Loop through each product tag for the current product
        if( count($terms) > 0 ){
            foreach($terms as $term){
                $term_id = $term->term_id; // Product tag Id
                $term_name = $term->name; // Product tag Name
                $term_slug = $term->slug; // Product tag slug
                $term_link = get_term_link( $term, 'product_cat' ); // Product tag link
        
                // Set the product tag names in an array
                $output[] = '<a href="'.$term_link.'">'.$term_name.'</a>';
            }
            // Set the array in a coma separated string of product tags for example
            $output = implode( ', ', $output );
        
            // Display the coma separated string of the product tags
            echo $output;
        }
        
        ?>
    </h3>
        <?php
        wc_set_loop_prop('current_page', $paged);
        wc_set_loop_prop('is_paginated', wc_string_to_bool(true));
        wc_set_loop_prop('page_template', get_page_template_slug());
        wc_set_loop_prop('per_page', $products_per_page);
        wc_set_loop_prop('total', $products_ids->total);
        wc_set_loop_prop('total_pages', $products_ids->max_num_pages);

        if ($products_ids) {
            do_action('woocommerce_before_shop_loop');
            woocommerce_product_loop_start();
            foreach ($products_ids->products as $product) {
                $post_object = get_post($product);
                setup_postdata($GLOBALS['post'] = &$post_object);

                wc_get_template_part('content', 'product');
            }
            wp_reset_postdata();
            woocommerce_product_loop_end();
            do_action('woocommerce_after_shop_loop');
        } else {
            do_action('woocommerce_no_products_found');
        }; ?>

    </div>
</div>
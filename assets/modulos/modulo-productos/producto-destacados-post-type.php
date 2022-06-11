<div class="container mt-3 contenedor-productos-home carusel--productos">
    <h3 class="text-center titulo-carrusel-productos text-center">Productos destacados</h3>

    <!--productos destacados-->
    <ul class="mt-3 mb-5 carusel-productos px-0 lista-productos lista-tipo-2">

        <?php $active = true;
        $temp = $wp_query;
        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
        $post_per_page = 8; // -1 shows all posts
        $args = array(
            'post_type' => 'product',
            'orderby' => 'date',
            'order' => 'DSC',
            'paged' => $paged,
            'posts_per_page' => $post_per_page
        );
        $wp_query = new WP_Query($args);

        if (have_posts()) : while ($wp_query->have_posts()) : $wp_query->the_post(); ?>

                <li class="slidel">
                    <div class="comercio-product-card col-12">
                        <a href="<?php echo get_permalink($loop->post->ID) ?>">
                            <div class="tarjeta-producto-superior w-100">
                            <h2><?php echo get_the_title(); ?></h2>
                            <p><?php echo get_the_excerpt(); ?></p>
                                <?php if (has_post_thumbnail()) : ?>
                                    <?php woocommerce_template_loop_product_thumbnail(); ?>
                                    <h2><?php echo get_the_title(); ?></h2>
                                    <?php
                                    global $woocommerce;
                                    $wp_currency = get_woocommerce_currency_symbol();
                                    $sp_custom_price = get_post_meta(get_the_ID(), '_regular_price', true);
                                    $wp_custom_sale = get_post_meta(get_the_ID(), '_sale_price', true);
                                    ?>
                            </div>

                            
                            <div class="tarjeta-producto-inferior w-100">
                                <?php if ($wp_custom_sale) : ?>
                                    <p class="price">
                                        <del>
                                            <?php echo $wp_currency;
                                            echo $sp_custom_price; ?>
                                        </del>
                                        <?php echo $wp_currency;
                                        echo $wp_custom_sale; ?>
                                    </p>
                                <?php elseif ($sp_custom_price) : ?>
                                    <p class="price">
                                        <?php echo $wp_currency;
                                        echo $sp_custom_price; ?>
                                    </p>
                                <?php endif; ?>
                            <?php endif; ?>
                            </div>
                        </a>
                    </div>
                </li>

        <?php
            endwhile;
        endif;
        wp_reset_query();
        $wp_query = $temp ?>

    </ul>
</div>

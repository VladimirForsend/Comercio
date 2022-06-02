<div id="parallax-block" class="container-fluid p-0 m-0">
    <div class="row no-gutters">
        <?php $active = true;
        $temp = $wp_query;
        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
        $post_per_page = 1; // -1 shows all posts
        $args = array(
            'post_type' => 'tiendas',
            'orderby' => 'date',
            'order' => 'ASC',
            'paged' => $paged,
            'posts_per_page' => $post_per_page
        );
        $wp_query = new WP_Query($args);
        if (have_posts()) : while ($wp_query->have_posts()) : $wp_query->the_post(); ?>




                <div class="parallax-window" data-parallax="scroll" data-image-src="<?php echo wp_get_attachment_url(get_post_thumbnail_id($post->ID)); ?>">
                    <div class="boton-nuestras-tiendas"><a class="boton-interior" href="#"><?php echo get_the_excerpt(); ?></a> </div>
                </div>



            <?php endwhile;
        else : ?>
        <?php endif;
        wp_reset_query();
        $wp_query = $temp ?>
    </div>
</div>
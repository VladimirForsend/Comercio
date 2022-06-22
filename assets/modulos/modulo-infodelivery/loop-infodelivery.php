<style>
	<?php include get_template_directory() . '/assets/modulos/modulo-infodelivery/infodelivery.css'; ?>
</style>
<div id="comercio-infodelivery" class="container-fluid p-0">

		<div class="row">
			<?php $active = true;
			$temp = $wp_query;
			$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
			$post_per_page = 4; // -1 shows all posts
			$args = array(
				'post_type' => 'infodelivery',
				'orderby' => 'date',
				'order' => 'ASC',
				'paged' => $paged,
				'posts_per_page' => $post_per_page
			);
			$wp_query = new WP_Query($args);
			if (have_posts()) : while ($wp_query->have_posts()) : $wp_query->the_post(); ?>

					<div class="tipo--entrega">
						<div class="primera-parte">
							<h5 class=""><?php echo get_the_title();?></h5>
							<div class="contenedor-contenido">
								<?php the_field('iconos_infodelivery');?>
								<p class="d-inline"><?php echo get_the_excerpt();?></p>
							</div>
						</div>

					</div>


				<?php endwhile;
			else : ?>
			<?php endif;
			wp_reset_query();
			$wp_query = $temp ?>
		</div>

</div>
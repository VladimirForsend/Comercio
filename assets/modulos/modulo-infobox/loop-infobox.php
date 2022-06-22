<style>
	<?php include get_template_directory() . '/assets/modulos/modulo-infobox/infobox.css'; ?>
</style>
<div id="comercio-infobox" class="container-fluid">
	<div class="container">
		<div class="row">
			<?php $active = true;
			$temp = $wp_query;
			$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
			$post_per_page = 4; // -1 shows all posts
			$args = array(
				'post_type' => 'infobox',
				'orderby' => 'date',
				'order' => 'ASC',
				'paged' => $paged,
				'posts_per_page' => $post_per_page
			);
			$wp_query = new WP_Query($args);
			if (have_posts()) : while ($wp_query->have_posts()) : $wp_query->the_post(); ?>

					<div id="infobox-<?php the_ID(); ?>" class="col-12 col-sm-12 col-lg-3 infobox-<?php the_ID(); ?> infobox-iconos">
						<a class="d-inline-block w-100" href="<?php the_permalink(); ?>">
							<div class="contendor-iconos">
								<figure class="color_iconos infobox-icono infobox-<?php the_ID(); ?>">
								<?php the_field('infobox_icono');?>
									<img class="accesibility-img d-none" src="<?php echo wp_get_attachment_url(get_post_thumbnail_id($post->ID)); ?>" alt="<?php echo get_the_title(); ?>">
								</figure>
								<div class="texto_interior_campos_home">
									<div class="color_texto_iconos infobox-box infobox-<?php the_ID(); ?>"><h3><?php echo get_the_title(); ?></h3></div>
									<div class="color_texto_iconos infobox-box infobox-<?php the_ID(); ?>"><p><?php echo get_the_excerpt(); ?></p></div>
								</div>
							</div>
						</a>
					</div>



				<?php endwhile;
			else : ?>
			<?php endif;
			wp_reset_query();
			$wp_query = $temp ?>
		</div>
	</div>
</div>
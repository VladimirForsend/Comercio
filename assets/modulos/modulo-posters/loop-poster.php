<div id="comercio-poster" class="container-fluid">
	<div class="row">
		<div class="col-12 col-md-12">
			<?php $active = true;
			$temp = $wp_query;
			$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
			$post_per_page = 2; // -1 shows all posts
			$args = array(
				'post_type' => 'posters',
				'orderby' => 'date',
				'order' => 'DESC',
				'paged' => $paged,
				'posts_per_page' => $post_per_page
			);
			$wp_query = new WP_Query($args);
			if (have_posts()) : while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
					<div class="card row">
						<div class="card-img-top col-12 col-md-6" style="background-image: url('<?php echo wp_get_attachment_url(get_post_thumbnail_id($post->ID)); ?>');">
						</div>
						<?php
						$active = false;
						$custom = get_post_custom($post->ID);
						$url = $custom["url"][0];
						$url_open = $custom["url_open"][0];
						$custom_title = "#" . $post->ID;
						?>
						<?php if ($url != "") { ?>

							<div class="card-body col-12 col-md-6">


								<h5 class="card-title">
									<?php the_title(); ?>
								</h5>

								<div class="card-text">
									<?php the_excerpt(); ?>

									<div class="botones">
										<a class="link-titulo btn btn-info izquierdo" href="<?php the_permalink() ?>" target='_blank'>

											Ir al poster <i class="fas fa-arrow-right"></i></a>

									</div>
								</div>
							</div>
					</div>
				<?php } else {



				?>

					<div class="card-body col-12 col-md-6">

						<h5 class="card-title">
							<?php the_title(); ?>
						</h5>

						<div class="card-text">
							<?php the_excerpt(); ?>
							<div class="botones">
								<a class="link-titulo btn btn-info izquierdo" href="<?php the_permalink() ?>" target='_blank'>

									Ir al poster <i class="fas fa-arrow-right"></i></a>

							</div>

						</div>
					</div>


				<?php }

				?>
			<?php endwhile;
			else : ?>
		<?php endif;
			wp_reset_query();
			$wp_query = $temp ?>
		</div>
	</div>
</div>
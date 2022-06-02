<div id="formulario-inscripcion" class="jumbotron container-fluid mt-0 mb-0 pt-3 pb-3">
<div class="row flex-column justify-content-center align-items-center">
	<?php $active=true;
                  $temp = $wp_query;
                  $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                  $post_per_page = 10; // -1 shows all posts
                  $args=array(
                    'post_type' => 'formularios',
                    'orderby' => 'date',
                    'order' => 'ASC',
                    'paged' => $paged,
                    'posts_per_page' => $post_per_page);
                    $wp_query = new WP_Query($args);
					if( have_posts() ) : while ($wp_query->have_posts()) : $wp_query->the_post();?>
					
				
			

  <div class="lead col-12 col-md-12 d-flex flex-column justify-content-center align-items-center p-3">	
  <h3 class="display-5"><?php the_title(); ?></h3>
  <?php the_content(); ?></div>



		<?php endwhile; else: ?>
		<?php endif; wp_reset_query(); $wp_query = $temp ?>
	</div>
</div>     
 
  

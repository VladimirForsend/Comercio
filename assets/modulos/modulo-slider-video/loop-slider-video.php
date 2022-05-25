<div id="video-home" class="jumbotron col-12 col-md-8 mt-3 mb-0 p-3">
<div class="row flex-column justify-content-center align-items-center">
	<?php $active=true;
                  $temp = $wp_query;
                  $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                  $post_per_page = 10; // -1 shows all posts
                  $args=array(
                    'post_type' => 'videos',
                    'orderby' => 'date',
                    'order' => 'ASC',
                    'paged' => $paged,
                    'posts_per_page' => $post_per_page);
                    $wp_query = new WP_Query($args);
					if( have_posts() ) : while ($wp_query->have_posts()) : $wp_query->the_post();?>

 


  <div class="video-invitacion col-12 col-md-12">

<?php

// Load value.
$iframe = get_field('link_video');

// Use preg_match to find iframe src.
preg_match('/src="(.+?)"/', $iframe, $matches);
$src = $matches[1];

// Add extra parameters to src and replcae HTML.
$params = array(
    'controls'  => 0,
    'hd'        => 1,
    'autohide'  => 1
);
$new_src = add_query_arg($params, $src);
$iframe = str_replace($src, $new_src, $iframe);

// Add extra attributes to iframe HTML.
$attributes = 'frameborder="0"';
$iframe = str_replace('></iframe>', ' ' . $attributes . '></iframe>', $iframe);

// Display customized HTML.
echo $iframe;
?>
<div class="contenido-video p3">
<?php the_content(); ?>
</div>
</div>

		<?php endwhile; else: ?>
		<?php endif; wp_reset_query(); $wp_query = $temp ?>
	</div>
</div>     
 
  

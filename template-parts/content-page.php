<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ecommerce
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <header class="entry-header" style="background-image: url('<?php echo wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) ); ?>');">
		<?php the_title( '<h1 class="titulo h1">', '</h1>' ); ?>
	</header><!-- .entry-header --> 

	<div id="ContenidoPage" class="entry-content container remove-col">
		<?php the_content(); ?>
	</div><!-- .entry-content -->
    
    <footer class="entry-footer">
    </footer><!-- .entry-footer -->

</article><!-- #post-<?php the_ID(); ?> -->
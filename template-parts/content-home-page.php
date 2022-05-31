<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package comercio2
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
	        <!-- slider de productos destacados -->
			<?php include get_template_directory() . '/assets/modulos/modulo-productos/producto-destacados-post-type.php'; ?>
        <!-- fin de slider de productos destacados -->

</article><!-- #post-<?php the_ID(); ?> -->

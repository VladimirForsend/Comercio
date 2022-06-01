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
		
		<!-- slider de productos destacados -->
			<?php include get_template_directory() . '/assets/modulos/modulo-productos/producto-post-type.php'; ?>
        <!-- fin de slider de productos destacados -->
		<div class="col-12 text-white mb-3">
			<a class="w-100 btn background-marca" href="<?php the_field('ver_todos_los_productos');?>">Ver todos los productos</a>
		</div>
</article><!-- #post-<?php the_ID(); ?> -->

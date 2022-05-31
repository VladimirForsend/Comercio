<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ecommerce
 */

?>



<?php include get_template_directory() . '/modulo-parallax-block/loop-parallax-block.php'; ?>



<footer id="colophon" class="site-footer container-fluid pt-3">
<?php require get_template_directory() . '/titan/templates-forsend/footers/tf-2.php'; ?>
 

</footer><!-- #colophon -->

</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>
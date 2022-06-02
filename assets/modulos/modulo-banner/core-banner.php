<?php
 /*speakers*/

// Register Custom Post Type
add_action( 'init', 'banner', 0 );

function banner() {

	$labels = array(
		'name'                  => _x( 'banner', 'Post Type General Name', 'banner' ),
		'singular_name'         => _x( 'banner', 'Post Type Singular Name', 'banner' ),
		'menu_name'             => __( 'banner', 'banner' ),
		'name_admin_bar'        => __( 'banner', 'banner' ),
		'archives'              => __( 'banner', 'banner' ),
		'attributes'            => __( 'banner', 'banner' ),
		'parent_item_colon'     => __( 'Basado en:', 'banner' ),
		'all_items'             => __( 'Todos los banner', 'banner' ),
		'add_new_item'          => __( 'Agregar nuevo banner', 'banner' ),
		'add_new'               => __( 'Agregar nueva', 'banner' ),
		'new_item'              => __( 'nuevo banner', 'banner' ),
		'edit_item'             => __( 'editar banner', 'banner' ),
		'update_item'           => __( 'actualizar', 'banner' ),
		'view_item'             => __( 'Ver banner', 'banner' ),
		'view_items'            => __( 'ver el banner', 'banner' ),
		'search_items'          => __( 'buscar un banner', 'banner' ),
		'not_found'             => __( 'no se encuentra', 'banner' ),
		'not_found_in_trash'    => __( 'no se encuentra en la basura', 'banner' ),
		'featured_image'        => __( 'imagen destacada', 'banner' ),
		'set_featured_image'    => __( 'seleccionar imagen destacada', 'banner' ),
		'remove_featured_image' => __( 'remover imagen destacada', 'banner' ),
		'use_featured_image'    => __( 'usar imagen destacada', 'banner' ),
		'insert_into_item'      => __( 'insertar en el item', 'banner' ),
		'uploaded_to_this_item' => __( 'Subido a este artículo', 'banner' ),
		'items_list'            => __( 'Lista de artículos', 'banner' ),
		'items_list_navigation' => __( 'Lista de elementos de navegación', 'banner' ),
		'filter_items_list'     => __( 'Primer elemento del articulo', 'banner' ),
	);
	$args = array(
		'label'                 => __( 'banner', 'banner' ),
		'description'           => __( 'banner', 'banner' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'thumbnail', 'custom-fields', 'page-attributes', 'excerpt' ),
		'taxonomies'            => array( 'categoria-banner', 'etiqueta-banner', ), 
		'rewrite' => true,
		'hierarchical'          => true,
		'public'                => true,
		'show_ui'               => true, 
		'show_in_menu'          => true,
		'menu_position'         => 10,
		'menu_icon'             => 'dashicons-book-alt',
		'menu_position' => null,
		'query_var' => true,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'post', 
		'rewrite' => array('slug' => 'banner', 'with_front' => FALSE)
		
	);




	register_post_type( 'banner', $args );

}

 /*categorias personalizadas para banner*/
 function categoria_banner() {

	register_taxonomy(
		'categoria-banner',
		'banner',
		array(
			'label' => __( 'Categoria banner' ),
			'rewrite' => array( 'slug' => 'categoria-banner' ),
			'hierarchical' => true,
			 // Allow automatic creation of taxonomy columns on associated post-types table?
			 'show_admin_column'   => true,
			 // Show in quick edit panel?
			 'show_in_quick_edit'  => true,
		)
	);
}
add_action( 'init', 'categoria_banner' );


function etiqueta_banner() {

register_taxonomy(
			'etiqueta-banner','banner',array(
			'hierarchical' => false,
			'labels' => $labels,
			'label' => __( 'Etiqueta banner' ),
			 // Allow automatic creation of taxonomy columns on associated post-types table?
			 'show_admin_column'   => true,
			 // Show in quick edit panel?
			 'show_in_quick_edit'  => true,
			'update_count_callback' => '_update_post_term_count',
			'bannerquery_var' => true,
			'rewrite' => array( 'slug' => 'etiqueta-banner' ),
		)
	); 




}
add_action( 'init', 'etiqueta_banner' );

function display_banner( $bannerquery ) {
	if( is_category() || is_tag() && empty( $bannerquery->bannerquery_vars['bannerfilter'] ) ) {
	$bannerquery->set( 'post_type', array(
	'post', 'nav_menu_item', 'banner', 
	'post', 'nav_menu_item', 'banner', 
	));
	return $bannerquery;
	}
   }
   
   add_filter( 'pre_get_posts', 'display_banner' );
<?php
 /*speakers*/

// Register Custom Post Type
add_action( 'init', 'infobox', 0 ); 

function infobox() {

	$labels = array(
		'name'                  => _x( 'infobox', 'Post Type General Name', 'infobox' ),
		'singular_name'         => _x( 'infobox', 'Post Type Singular Name', 'infobox' ),
		'menu_name'             => __( 'infobox', 'infobox' ),
		'name_admin_bar'        => __( 'infobox', 'infobox' ),
		'archives'              => __( 'infobox', 'infobox' ),
		'attributes'            => __( 'infobox', 'infobox' ),
		'parent_item_colon'     => __( 'Basado en:', 'infobox' ),
		'all_items'             => __( 'Todos los infobox', 'infobox' ),
		'add_new_item'          => __( 'Agregar nuevo infobox', 'infobox' ),
		'add_new'               => __( 'Agregar nueva', 'infobox' ),
		'new_item'              => __( 'nuevo infobox', 'infobox' ),
		'edit_item'             => __( 'editar infobox', 'infobox' ),
		'update_item'           => __( 'actualizar', 'infobox' ),
		'view_item'             => __( 'Ver infobox', 'infobox' ),
		'view_items'            => __( 'ver el infobox', 'infobox' ),
		'search_items'          => __( 'buscar un infobox', 'infobox' ),
		'not_found'             => __( 'no se encuentra', 'infobox' ),
		'not_found_in_trash'    => __( 'no se encuentra en la basura', 'infobox' ),
		'featured_image'        => __( 'imagen destacada', 'infobox' ),
		'set_featured_image'    => __( 'seleccionar imagen destacada', 'infobox' ),
		'remove_featured_image' => __( 'remover imagen destacada', 'infobox' ),
		'use_featured_image'    => __( 'usar imagen destacada', 'infobox' ),
		'insert_into_item'      => __( 'insertar en el item', 'infobox' ),
		'uploaded_to_this_item' => __( 'Subido a este artículo', 'infobox' ),
		'items_list'            => __( 'Lista de artículos', 'infobox' ),
		'items_list_navigation' => __( 'Lista de elementos de navegación', 'infobox' ),
		'filter_items_list'     => __( 'Primer elemento del articulo', 'infobox' ),
	);
	$args = array(
		'label'                 => __( 'infobox', 'infobox' ),
		'description'           => __( 'infobox', 'infobox' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'thumbnail', 'custom-fields', 'page-attributes', 'excerpt' ),
		'taxonomies'            => array( 'categoria-infobox', 'etiqueta-infobox', ), 
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
		'rewrite' => array('slug' => 'infobox', 'with_front' => FALSE)
		
	);




	register_post_type( 'infobox', $args );

}

 /*categorias personalizadas para infobox*/
 function categoria_infobox() {

	register_taxonomy(
		'categoria-infobox',
		'infobox',
		array(
			'label' => __( 'Categoria infobox' ),
			'rewrite' => array( 'slug' => 'categoria-infobox' ),
			'hierarchical' => true,
			 // Allow automatic creation of taxonomy columns on associated post-types table?
			 'show_admin_column'   => true,
			 // Show in quick edit panel?
			 'show_in_quick_edit'  => true,
		)
	);
}
add_action( 'init', 'categoria_infobox' );


function etiqueta_infobox() {

register_taxonomy(
			'etiqueta-infobox','infobox',array(
			'hierarchical' => false,
			'labels' => $labels,
			'label' => __( 'Etiqueta infobox' ),
			 // Allow automatic creation of taxonomy columns on associated post-types table?
			 'show_admin_column'   => true,
			 // Show in quick edit panel?
			 'show_in_quick_edit'  => true,
			'update_count_callback' => '_update_post_term_count',
			'infoboxquery_var' => true,
			'rewrite' => array( 'slug' => 'etiqueta-infobox' ),
		)
	); 




}
add_action( 'init', 'etiqueta_infobox' );

function display_infobox( $infoboxquery ) {
	if( is_category() || is_tag() && empty( $infoboxquery->infoboxquery_vars['infoboxfilter'] ) ) {
	$infoboxquery->set( 'post_type', array(
	'post', 'nav_menu_item', 'infobox', 
	'post', 'nav_menu_item', 'infobox', 
	));
	return $infoboxquery;
	}
   }
   
   add_filter( 'pre_get_posts', 'display_infobox' );
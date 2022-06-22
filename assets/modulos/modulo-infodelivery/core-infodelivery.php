<?php
 /*speakers*/

// Register Custom Post Type
add_action( 'init', 'infodelivery', 0 );

function infodelivery() {

	$labels = array(
		'name'                  => _x( 'infodelivery', 'Post Type General Name', 'infodelivery' ),
		'singular_name'         => _x( 'infodelivery', 'Post Type Singular Name', 'infodelivery' ),
		'menu_name'             => __( 'infodelivery', 'infodelivery' ),
		'name_admin_bar'        => __( 'infodelivery', 'infodelivery' ),
		'archives'              => __( 'infodelivery', 'infodelivery' ),
		'attributes'            => __( 'infodelivery', 'infodelivery' ),
		'parent_item_colon'     => __( 'Basado en:', 'infodelivery' ),
		'all_items'             => __( 'Todos los infodelivery', 'infodelivery' ),
		'add_new_item'          => __( 'Agregar nuevo infodelivery', 'infodelivery' ),
		'add_new'               => __( 'Agregar nueva', 'infodelivery' ),
		'new_item'              => __( 'nuevo infodelivery', 'infodelivery' ),
		'edit_item'             => __( 'editar infodelivery', 'infodelivery' ),
		'update_item'           => __( 'actualizar', 'infodelivery' ),
		'view_item'             => __( 'Ver infodelivery', 'infodelivery' ),
		'view_items'            => __( 'ver el infodelivery', 'infodelivery' ),
		'search_items'          => __( 'buscar un infodelivery', 'infodelivery' ),
		'not_found'             => __( 'no se encuentra', 'infodelivery' ),
		'not_found_in_trash'    => __( 'no se encuentra en la basura', 'infodelivery' ),
		'featured_image'        => __( 'imagen destacada', 'infodelivery' ),
		'set_featured_image'    => __( 'seleccionar imagen destacada', 'infodelivery' ),
		'remove_featured_image' => __( 'remover imagen destacada', 'infodelivery' ),
		'use_featured_image'    => __( 'usar imagen destacada', 'infodelivery' ),
		'insert_into_item'      => __( 'insertar en el item', 'infodelivery' ),
		'uploaded_to_this_item' => __( 'Subido a este artículo', 'infodelivery' ),
		'items_list'            => __( 'Lista de artículos', 'infodelivery' ),
		'items_list_navigation' => __( 'Lista de elementos de navegación', 'infodelivery' ),
		'filter_items_list'     => __( 'Primer elemento del articulo', 'infodelivery' ),
	);
	$args = array(
		'label'                 => __( 'infodelivery', 'infodelivery' ),
		'description'           => __( 'infodelivery', 'infodelivery' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'thumbnail', 'custom-fields', 'page-attributes', 'excerpt' ),
		'taxonomies'            => array( 'categoria-infodelivery', 'etiqueta-infodelivery', ), 
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
		'rewrite' => array('slug' => 'infodelivery', 'with_front' => FALSE)
		
	);




	register_post_type( 'infodelivery', $args );

}

 /*categorias personalizadas para infodelivery*/
 function categoria_infodelivery() {

	register_taxonomy(
		'categoria-infodelivery',
		'infodelivery',
		array(
			'label' => __( 'Categoria infodelivery' ),
			'rewrite' => array( 'slug' => 'categoria-infodelivery' ),
			'hierarchical' => true,
			 // Allow automatic creation of taxonomy columns on associated post-types table?
			 'show_admin_column'   => true,
			 // Show in quick edit panel?
			 'show_in_quick_edit'  => true,
		)
	);
}
add_action( 'init', 'categoria_infodelivery' );


function etiqueta_infodelivery() {

register_taxonomy(
			'etiqueta-infodelivery','infodelivery',array(
			'hierarchical' => false,
			'labels' => $labels,
			'label' => __( 'Etiqueta infodelivery' ),
			 // Allow automatic creation of taxonomy columns on associated post-types table?
			 'show_admin_column'   => true,
			 // Show in quick edit panel?
			 'show_in_quick_edit'  => true,
			'update_count_callback' => '_update_post_term_count',
			'infodeliveryquery_var' => true,
			'rewrite' => array( 'slug' => 'etiqueta-infodelivery' ),
		)
	); 




}
add_action( 'init', 'etiqueta_infodelivery' );

function display_infodelivery( $infodeliveryquery ) {
	if( is_category() || is_tag() && empty( $infodeliveryquery->infodeliveryquery_vars['infodeliveryfilter'] ) ) {
	$infodeliveryquery->set( 'post_type', array(
	'post', 'nav_menu_item', 'infodelivery', 
	'post', 'nav_menu_item', 'infodelivery', 
	));
	return $infodeliveryquery;
	}
   }
   
   add_filter( 'pre_get_posts', 'display_infodelivery' );
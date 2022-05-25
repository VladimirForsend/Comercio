<?php
 /*speakers*/

// Register Custom Post Type
add_action( 'init', 'microbox', 0 );

function microbox() {

	$labels = array(
		'name'                  => _x( 'microbox', 'Post Type General Name', 'microbox' ),
		'singular_name'         => _x( 'Charlista', 'Post Type Singular Name', 'microbox' ),
		'menu_name'             => __( 'microbox', 'microbox' ),
		'name_admin_bar'        => __( 'microbox', 'microbox' ),
		'archives'              => __( 'microbox', 'microbox' ),
		'attributes'            => __( 'microbox', 'microbox' ),
		'parent_item_colon'     => __( 'Basado en:', 'microbox' ),
		'all_items'             => __( 'Todos los microbox', 'microbox' ),
		'add_new_item'          => __( 'Agregar nuevo microbox', 'microbox' ),
		'add_new'               => __( 'Agregar nueva', 'microbox' ),
		'new_item'              => __( 'nuevo microbox', 'microbox' ),
		'edit_item'             => __( 'editar microbox', 'microbox' ),
		'update_item'           => __( 'actualizar', 'microbox' ),
		'view_item'             => __( 'Ver microbox', 'microbox' ),
		'view_items'            => __( 'ver el microbox', 'microbox' ),
		'search_items'          => __( 'buscar un microbox', 'microbox' ),
		'not_found'             => __( 'no se encuentra', 'microbox' ),
		'not_found_in_trash'    => __( 'no se encuentra en la basura', 'microbox' ),
		'featured_image'        => __( 'imagen destacada', 'microbox' ),
		'set_featured_image'    => __( 'seleccionar imagen destacada', 'microbox' ),
		'remove_featured_image' => __( 'remover imagen destacada', 'microbox' ),
		'use_featured_image'    => __( 'usar imagen destacada', 'microbox' ),
		'insert_into_item'      => __( 'insertar en el item', 'microbox' ),
		'uploaded_to_this_item' => __( 'Subido a este artículo', 'microbox' ),
		'items_list'            => __( 'Lista de artículos', 'microbox' ),
		'items_list_navigation' => __( 'Lista de elementos de navegación', 'microbox' ),
		'filter_items_list'     => __( 'Primer elemento del articulo', 'microbox' ),
	);
	$args = array(
		'label'                 => __( 'microbox', 'microbox' ),
		'description'           => __( 'microbox', 'microbox' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'thumbnail', 'custom-fields', 'page-attributes', 'excerpt' ),
		'taxonomies'            => array( 'categoria-microbox', 'etiqueta-microbox', ), 
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
		'rewrite' => array('slug' => 'microbox', 'with_front' => FALSE)
		
	);




	register_post_type( 'microbox', $args );

}

 /*categorias personalizadas para microbox*/
 function categoria_microbox() {

	register_taxonomy(
		'categoria-microbox',
		'microbox',
		array(
			'label' => __( 'Categoria microbox' ),
			'rewrite' => array( 'slug' => 'categoria-microbox' ),
			'hierarchical' => true,
			 // Allow automatic creation of taxonomy columns on associated post-types table?
			 'show_admin_column'   => true,
			 // Show in quick edit panel?
			 'show_in_quick_edit'  => true,
		)
	);
}
add_action( 'init', 'categoria_microbox' );


function etiqueta_microbox() {

register_taxonomy(
			'etiqueta-microbox','microbox',array(
			'hierarchical' => false,
			'labels' => $labels,
			'label' => __( 'Etiqueta microbox' ),
			 // Allow automatic creation of taxonomy columns on associated post-types table?
			 'show_admin_column'   => true,
			 // Show in quick edit panel?
			 'show_in_quick_edit'  => true,
			'update_count_callback' => '_update_post_term_count',
			'microboxquery_var' => true,
			'rewrite' => array( 'slug' => 'etiqueta-microbox' ),
		)
	);




}
add_action( 'init', 'etiqueta_microbox' );

function display_microbox( $microboxquery ) {
	if( is_category() || is_tag() && empty( $microboxquery->microboxquery_vars['microboxfilter'] ) ) {
	$microboxquery->set( 'post_type', array(
	'post', 'nav_menu_item', 'microbox', 
	'post', 'nav_menu_item', 'microbox', 
	));
	return $microboxquery;
	}
   }
   
   add_filter( 'pre_get_posts', 'display_microbox' );
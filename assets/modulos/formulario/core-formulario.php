<?php
 /*speakers*/

// Register Custom Post Type
add_action( 'init', 'formularios', 0 );

function formularios() {

	$labels = array(
		'name'                  => _x( 'form', 'Post Type General Name', 'formularios' ),
		'singular_name'         => _x( 'formulario', 'Post Type Singular Name', 'formularios' ),
		'menu_name'             => __( 'formularios', 'formularios' ),
		'name_admin_bar'        => __( 'formularios', 'formularios' ),
		'archives'              => __( 'formularios', 'formularios' ),
		'attributes'            => __( 'formularios', 'formularios' ),
		'parent_item_colon'     => __( 'Basado en:', 'formularios' ),
		'all_items'             => __( 'Todos los formularios', 'formularios' ),
		'add_new_item'          => __( 'Agregar nueva form', 'formularios' ),
		'add_new'               => __( 'Agregar nueva', 'formularios' ),
		'new_item'              => __( 'nueva form', 'formularios' ),
		'edit_item'             => __( 'editar form', 'formularios' ),
		'update_item'           => __( 'actualizar', 'formularios' ),
		'view_item'             => __( 'Ver form', 'formularios' ),
		'view_items'            => __( 'ver la form', 'formularios' ),
		'search_items'          => __( 'buscar una form', 'formularios' ),
		'not_found'             => __( 'no se encuentra', 'formularios' ),
		'not_found_in_trash'    => __( 'no se encuentra en la basura', 'formularios' ),
		'featured_image'        => __( 'imagen destacada', 'formularios' ),
		'set_featured_image'    => __( 'seleccionar imagen destacada', 'formularios' ),
		'remove_featured_image' => __( 'remover imagen destacada', 'formularios' ),
		'use_featured_image'    => __( 'usar imagen destacada', 'formularios' ),
		'insert_into_item'      => __( 'insertar en el item', 'formularios' ),
		'uploaded_to_this_item' => __( 'Subido a este artículo', 'formularios' ),
		'items_list'            => __( 'Lista de artículos', 'formularios' ),
		'items_list_navigation' => __( 'Lista de elementos de navegación', 'formularios' ),
		'filter_items_list'     => __( 'Primer elemento del articulo', 'formularios' ),
	);
	$args = array(
		'label'                 => __( 'formularios', 'formularios' ),
		'description'           => __( 'formularios', 'formularios' ),
		'labels'                => $labels,
		'show_in_rest' => true,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'custom-fields', 'page-attributes', 'excerpt' ),
		'taxonomies'            => array( 'categoria-formularios', 'etiqueta-formularios', ), 
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
		'rewrite' => array('slug' => 'formularios', 'with_front' => FALSE)
		
	);




	register_post_type( 'formularios', $args );

}

 /*categorias personalizadas para formularios*/
 function categoria_formularios() {

	register_taxonomy(
		'categoria-formularios',
		'formularios',
		array(
			'label' => __( 'Categoria formularios' ),
			'rewrite' => array( 'slug' => 'categoria-formularios' ),
			'hierarchical' => true,
			 // Allow automatic creation of taxonomy columns on associated post-types table?
			 'show_admin_column'   => true,
			 // Show in quick edit panel?
			 'show_in_quick_edit'  => true,
		)
	);
}
add_action( 'init', 'categoria_formularios' );


function etiqueta_formularios() {

register_taxonomy(
			'etiqueta-formularios','formularios',array(
			'hierarchical' => false,
			'labels' => $labels,
			'label' => __( 'Etiqueta formularios' ),
			 // Allow automatic creation of taxonomy columns on associated post-types table?
			 'show_admin_column'   => true,
			 // Show in quick edit panel?
			 'show_in_quick_edit'  => true,
			'update_count_callback' => '_update_post_term_count',
			'formquery_var' => true,
			'rewrite' => array( 'slug' => 'etiqueta-formularios' ),
		)
	);




}
add_action( 'init', 'etiqueta_formularios' );

function display_formularios( $formquery ) {
	if( is_category() || is_tag() && empty( $formquery->formquery_vars['formulariosfilter'] ) ) {
	$formquery->set( 'post_type', array(
	'post', 'nav_menu_item', 'form', 
	'post', 'nav_menu_item', 'formularios', 
	));
	return $formquery;
	}
   }
   
   add_filter( 'pre_get_posts', 'display_formularios' );
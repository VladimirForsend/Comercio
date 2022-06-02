<?php
 /*tiendas*/

// Register Custom Post Type
add_action( 'init', 'tiendas', 0 );

function tiendas() { 

	$labels = array(
		'name'                  => _x( 'form', 'Post Type General Name', 'tiendas' ),
		'singular_name'         => _x( 'tienda', 'Post Type Singular Name', 'tiendas' ),
		'menu_name'             => __( 'tiendas', 'tiendas' ),
		'name_admin_bar'        => __( 'tiendas', 'tiendas' ),
		'archives'              => __( 'tiendas', 'tiendas' ),
		'attributes'            => __( 'tiendas', 'tiendas' ),
		'parent_item_colon'     => __( 'Basado en:', 'tiendas' ),
		'all_items'             => __( 'Todos los tiendas', 'tiendas' ),
		'add_new_item'          => __( 'Agregar nueva form', 'tiendas' ),
		'add_new'               => __( 'Agregar nueva', 'tiendas' ),
		'new_item'              => __( 'nueva form', 'tiendas' ),
		'edit_item'             => __( 'editar form', 'tiendas' ),
		'update_item'           => __( 'actualizar', 'tiendas' ),
		'view_item'             => __( 'Ver form', 'tiendas' ),
		'view_items'            => __( 'ver la form', 'tiendas' ),
		'search_items'          => __( 'buscar una form', 'tiendas' ),
		'not_found'             => __( 'no se encuentra', 'tiendas' ),
		'not_found_in_trash'    => __( 'no se encuentra en la basura', 'tiendas' ),
		'featured_image'        => __( 'imagen destacada', 'tiendas' ),
		'set_featured_image'    => __( 'seleccionar imagen destacada', 'tiendas' ),
		'remove_featured_image' => __( 'remover imagen destacada', 'tiendas' ),
		'use_featured_image'    => __( 'usar imagen destacada', 'tiendas' ),
		'insert_into_item'      => __( 'insertar en el item', 'tiendas' ),
		'uploaded_to_this_item' => __( 'Subido a este artículo', 'tiendas' ),
		'items_list'            => __( 'Lista de artículos', 'tiendas' ),
		'items_list_navigation' => __( 'Lista de elementos de navegación', 'tiendas' ),
		'filter_items_list'     => __( 'Primer elemento del articulo', 'tiendas' ),
	);
	$args = array(
		'label'                 => __( 'tiendas', 'tiendas' ),
		'description'           => __( 'tiendas', 'tiendas' ),
		'labels'                => $labels,
		'show_in_rest' => true,
		'supports'              => array( 'title', 'thumbnail', 'custom-fields', 'page-attributes', 'excerpt' ),
		'taxonomies'            => array( 'categoria-tiendas', 'etiqueta-tiendas', ), 
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
		'rewrite' => array('slug' => 'tiendas', 'with_front' => FALSE)
		
	);




	register_post_type( 'tiendas', $args );

}

 /*categorias personalizadas para tiendas*/
 function categoria_tiendas() {

	register_taxonomy(
		'categoria-tiendas',
		'tiendas',
		array(
			'label' => __( 'Categoria tiendas' ),
			'rewrite' => array( 'slug' => 'categoria-tiendas' ),
			'hierarchical' => true,
			 // Allow automatic creation of taxonomy columns on associated post-types table?
			 'show_admin_column'   => true,
			 // Show in quick edit panel?
			 'show_in_quick_edit'  => true,
		)
	);
}
add_action( 'init', 'categoria_tiendas' );


function etiqueta_tiendas() {

register_taxonomy(
			'etiqueta-tiendas','tiendas',array(
			'hierarchical' => false,
			'labels' => $labels,
			'label' => __( 'Etiqueta tiendas' ),
			 // Allow automatic creation of taxonomy columns on associated post-types table?
			 'show_admin_column'   => true,
			 // Show in quick edit panel?
			 'show_in_quick_edit'  => true,
			'update_count_callback' => '_update_post_term_count',
			'formquery_var' => true,
			'rewrite' => array( 'slug' => 'etiqueta-tiendas' ),
		)
	);




}
add_action( 'init', 'etiqueta_tiendas' );

function display_tiendas( $formquery ) {
	if( is_category() || is_tag() && empty( $formquery->formquery_vars['tiendasfilter'] ) ) {
	$formquery->set( 'post_type', array(
	'post', 'nav_menu_item', 'form', 
	'post', 'nav_menu_item', 'tiendas', 
	));
	return $formquery;
	}
   }
   
   add_filter( 'pre_get_posts', 'display_tiendas' );
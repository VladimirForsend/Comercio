<?php
 /*speakers*/

// Register Custom Post Type
add_action( 'init', 'carrusel_ofertas', 0 );

function carrusel_ofertas() {

	$labels = array(
		'name'                  => _x( 'carrusel_ofertas', 'Post Type General Name', 'carrusel_ofertas' ),
		'singular_name'         => _x( 'carrusel_oferta', 'Post Type Singular Name', 'carrusel_ofertas' ),
		'menu_name'             => __( 'carrusel_ofertas', 'carrusel_ofertas' ),
		'name_admin_bar'        => __( 'carrusel_ofertas', 'carrusel_ofertas' ),
		'archives'              => __( 'carrusel_ofertas', 'carrusel_ofertas' ),
		'attributes'            => __( 'carrusel_ofertas', 'carrusel_ofertas' ),
		'parent_item_colon'     => __( 'Basado en:', 'carrusel_ofertas' ),
		'all_items'             => __( 'Todas las carrusel_ofertas', 'carrusel_ofertas' ),
		'add_new_item'          => __( 'Agregar nueva carrusel_oferta', 'carrusel_ofertas' ),
		'add_new'               => __( 'Agregar nueva', 'carrusel_ofertas' ),
		'new_item'              => __( 'nueva carrusel_oferta', 'carrusel_ofertas' ),
		'edit_item'             => __( 'editar carrusel_oferta', 'carrusel_ofertas' ),
		'update_item'           => __( 'actualizar', 'carrusel_ofertas' ),
		'view_item'             => __( 'Ver carrusel_oferta', 'carrusel_ofertas' ),
		'view_items'            => __( 'ver la carrusel_oferta', 'carrusel_ofertas' ),
		'search_items'          => __( 'buscar una carrusel_oferta', 'carrusel_ofertas' ),
		'not_found'             => __( 'no se encuentra', 'carrusel_ofertas' ),
		'not_found_in_trash'    => __( 'no se encuentra en la basura', 'carrusel_ofertas' ),
		'featured_image'        => __( 'imagen destacada', 'carrusel_ofertas' ),
		'set_featured_image'    => __( 'seleccionar imagen destacada', 'carrusel_ofertas' ),
		'remove_featured_image' => __( 'remover imagen destacada', 'carrusel_ofertas' ),
		'use_featured_image'    => __( 'usar imagen destacada', 'carrusel_ofertas' ),
		'insert_into_item'      => __( 'insertar en el item', 'carrusel_ofertas' ),
		'uploaded_to_this_item' => __( 'Subido a este artículo', 'carrusel_ofertas' ),
		'items_list'            => __( 'Lista de artículos', 'carrusel_ofertas' ),
		'items_list_navigation' => __( 'Lista de elementos de navegación', 'carrusel_ofertas' ),
		'filter_items_list'     => __( 'Primer elemento del articulo', 'carrusel_ofertas' ),
	);
	$args = array(
		'label'                 => __( 'carrusel_ofertas', 'carrusel_ofertas' ),
		'description'           => __( 'carrusel_ofertas', 'carrusel_ofertas' ),
		'labels'                => $labels,
		'show_in_rest' => false,
		'supports'              => array( 'title', 'custom-fields', 'page-attributes'),
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
		'rewrite' => array('slug' => 'carrusel_ofertas', 'with_front' => FALSE)
		
	);




	register_post_type( 'carrusel_ofertas', $args );

}

 /*categorias personalizadas para carrusel_ofertas*/
 function categoria_carrusel_ofertas() {

	register_taxonomy(
		'categoria-carrusel_ofertas',
		'carrusel_ofertas',
		array(
			'label' => __( 'Categoria carrusel_ofertas' ),
			'rewrite' => array( 'slug' => 'categoria-carrusel_ofertas' ),
			'hierarchical' => true,
			 // Allow automatic creation of taxonomy columns on associated post-types table?
			 'show_admin_column'   => true,
			 // Show in quick edit panel?
			 'show_in_quick_edit'  => true,
		)
	);
}
add_action( 'init', 'categoria_carrusel_ofertas' );


function etiqueta_carrusel_ofertas() {

register_taxonomy(
			'etiqueta-carrusel_ofertas','carrusel_ofertas',array(
			'hierarchical' => false,
			'labels' => $labels,
			'label' => __( 'Etiqueta carrusel_ofertas' ),
			 // Allow automatic creation of taxonomy columns on associated post-types table?
			 'show_admin_column'   => true,
			 // Show in quick edit panel?
			 'show_in_quick_edit'  => true,
			'update_count_callback' => '_update_post_term_count',
			'carrusel_ofertaquery_var' => true,
			'rewrite' => array( 'slug' => 'etiqueta-carrusel_ofertas' ),
		)
	);




}
add_action( 'init', 'etiqueta_carrusel_ofertas' );

function display_carrusel_ofertas( $carrusel_ofertaquery ) {
	if( is_category() || is_tag() && empty( $carrusel_ofertaquery->carrusel_ofertaquery_vars['carrusel_ofertasfilter'] ) ) {
	$carrusel_ofertaquery->set( 'post_type', array(
	'post', 'nav_menu_item', 'carrusel_oferta', 
	'post', 'nav_menu_item', 'carrusel_ofertas', 
	));
	return $carrusel_ofertaquery;
	}
   }
   
   add_filter( 'pre_get_posts', 'display_carrusel_ofertas' );
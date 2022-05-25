<?php
 /*speakers*/

// Register Custom Post Type
add_action( 'init', 'videos', 0 );

function videos() {

	$labels = array(
		'name'                  => _x( 'video', 'Post Type General Name', 'videos' ),
		'singular_name'         => _x( 'video', 'Post Type Singular Name', 'videos' ),
		'menu_name'             => __( 'videos', 'videos' ),
		'name_admin_bar'        => __( 'videos', 'videos' ),
		'archives'              => __( 'videos', 'videos' ),
		'attributes'            => __( 'videos', 'videos' ),
		'parent_item_colon'     => __( 'Basado en:', 'videos' ),
		'all_items'             => __( 'Todos los videos', 'videos' ),
		'add_new_item'          => __( 'Agregar nueva video', 'videos' ),
		'add_new'               => __( 'Agregar nueva', 'videos' ),
		'new_item'              => __( 'nueva video', 'videos' ),
		'edit_item'             => __( 'editar video', 'videos' ),
		'update_item'           => __( 'actualizar', 'videos' ),
		'view_item'             => __( 'Ver video', 'videos' ),
		'view_items'            => __( 'ver la video', 'videos' ),
		'search_items'          => __( 'buscar una video', 'videos' ),
		'not_found'             => __( 'no se encuentra', 'videos' ),
		'not_found_in_trash'    => __( 'no se encuentra en la basura', 'videos' ),
		'featured_image'        => __( 'imagen destacada', 'videos' ),
		'set_featured_image'    => __( 'seleccionar imagen destacada', 'videos' ),
		'remove_featured_image' => __( 'remover imagen destacada', 'videos' ),
		'use_featured_image'    => __( 'usar imagen destacada', 'videos' ),
		'insert_into_item'      => __( 'insertar en el item', 'videos' ),
		'uploaded_to_this_item' => __( 'Subido a este artículo', 'videos' ),
		'items_list'            => __( 'Lista de artículos', 'videos' ),
		'items_list_navigation' => __( 'Lista de elementos de navegación', 'videos' ),
		'filter_items_list'     => __( 'Primer elemento del articulo', 'videos' ),
	);
	$args = array(
		'label'                 => __( 'videos', 'videos' ),
		'description'           => __( 'videos', 'videos' ),
		'labels'                => $labels,
		'show_in_rest' => true,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'custom-fields', 'page-attributes', 'excerpt' ),
		'taxonomies'            => array( 'categoria-videos', 'etiqueta-videos', ), 
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
		'rewrite' => array('slug' => 'videos', 'with_front' => FALSE)
		
	);




	register_post_type( 'videos', $args );

}

 /*categorias personalizadas para videos*/
 function categoria_videos() {

	register_taxonomy(
		'categoria-videos',
		'videos',
		array(
			'label' => __( 'Categoria videos' ),
			'rewrite' => array( 'slug' => 'categoria-videos' ),
			'hierarchical' => true,
			 // Allow automatic creation of taxonomy columns on associated post-types table?
			 'show_admin_column'   => true,
			 // Show in quick edit panel?
			 'show_in_quick_edit'  => true,
		)
	);
}
add_action( 'init', 'categoria_videos' );


function etiqueta_videos() {

register_taxonomy(
			'etiqueta-videos','videos',array(
			'hierarchical' => false,
			'labels' => $labels,
			'label' => __( 'Etiqueta videos' ),
			 // Allow automatic creation of taxonomy columns on associated post-types table?
			 'show_admin_column'   => true,
			 // Show in quick edit panel?
			 'show_in_quick_edit'  => true,
			'update_count_callback' => '_update_post_term_count',
			'videoquery_var' => true,
			'rewrite' => array( 'slug' => 'etiqueta-videos' ),
		)
	);




}
add_action( 'init', 'etiqueta_videos' );

function display_videos( $videoquery ) {
	if( is_category() || is_tag() && empty( $videoquery->videoquery_vars['videosfilter'] ) ) {
	$videoquery->set( 'post_type', array(
	'post', 'nav_menu_item', 'video', 
	'post', 'nav_menu_item', 'videos', 
	));
	return $videoquery;
	}
   }
   
   add_filter( 'pre_get_posts', 'display_videos' );
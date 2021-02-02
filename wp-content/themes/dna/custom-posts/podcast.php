<?php
function custom_podcast() {
	$labels = array(
		'name'                  => _x( 'Podcasts', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Podcast', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Podcasts', 'text_domain' ),
		'name_admin_bar'        => __( 'Podcasts', 'text_domain' ),
		'archives'              => __( 'Podcasts Arquivados', 'text_domain' ),
		'parent_item_colon'     => __( 'Item Pai:', 'text_domain' ),
		'all_items'             => __( 'Todos os podcasts', 'text_domain' ),
		'add_new_item'          => __( 'Adicionar novo item', 'text_domain' ),
		'add_new'               => __( 'Adicionar novo', 'text_domain' ),
		'new_item'              => __( 'Novo podcast', 'text_domain' ),
		'edit_item'             => __( 'Editar podcast', 'text_domain' ),
		'update_item'           => __( 'Atualizar podcast', 'text_domain' ),
		'view_item'             => __( 'Ver podcast', 'text_domain' ),
		'search_items'          => __( 'Buscar podcast', 'text_domain' ),
		'not_found'             => __( 'Nenhum cadastrado', 'text_domain' ),
		'not_found_in_trash'    => __( 'Nenhum na lixeira', 'text_domain' ),
		'featured_image'        => __( 'Imagem destaque', 'text_domain' ),
		'set_featured_image'    => __( 'Definir imagem', 'text_domain' ),
		'remove_featured_image' => __( 'Remover imagem', 'text_domain' ),
		'use_featured_image'    => __( 'Usar imagem podcast', 'text_domain' ),
		'insert_into_item'      => __( 'Inserir no podcast', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Subir para podcast', 'text_domain' ),
		'items_list'            => __( 'Lista de podcasts', 'text_domain' ),
		'items_list_navigation' => __( 'Navegar pelos podcasts', 'text_domain' ),
		'filter_items_list'     => __( 'Filtrar podcast', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'Podcast', 'text_domain' ),
		'description'           => __( 'Cadastrar podcast', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title' ),
		'taxonomies'            => array( 'categoria_podcast' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'show_in_rest'          => true,
		'menu_position'         => 5,
		'menu_icon'				=> 'dashicons-controls-play',		
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'rewrite'               => array( 
			'with_front' => false // if you have a permalink base such as /blog/ then setting this to false ensures your custom post type permalink structure will be /products/ instead of /blog/products/
		),
		'exclude_from_search'   => true,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'podcast', $args );
}
add_action( 'init', 'custom_podcast', 0 );
?>
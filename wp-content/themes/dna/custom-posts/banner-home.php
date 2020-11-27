<?php
function custom_banners() {
	$labels = array(
		'name'                  => _x( 'Banners Home', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Banners Home', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Banners Home', 'text_domain' ),
		'name_admin_bar'        => __( 'Banners Home', 'text_domain' ),
		'archives'              => __( 'Banners Home Arquivados', 'text_domain' ),
		'parent_item_colon'     => __( 'Item Pai:', 'text_domain' ),
		'all_items'             => __( 'Todos os banners', 'text_domain' ),
		'add_new_item'          => __( 'Adicionar novo banner', 'text_domain' ),
		'add_new'               => __( 'Adicionar novo', 'text_domain' ),
		'new_item'              => __( 'Novo banner', 'text_domain' ),
		'edit_item'             => __( 'Editar banner', 'text_domain' ),
		'update_item'           => __( 'Atualizar banner', 'text_domain' ),
		'view_item'             => __( 'Ver banner', 'text_domain' ),
		'search_items'          => __( 'Buscar banner', 'text_domain' ),
		'not_found'             => __( 'Nenhum cadastrado', 'text_domain' ),
		'not_found_in_trash'    => __( 'Nenhum na lixeira', 'text_domain' ),
		'featured_image'        => __( 'Imagem destaque', 'text_domain' ),
		'set_featured_image'    => __( 'Definir imagem', 'text_domain' ),
		'remove_featured_image' => __( 'Remover imagem', 'text_domain' ),
		'use_featured_image'    => __( 'Usar imagem banner', 'text_domain' ),
		'insert_into_item'      => __( 'Inserir no banner', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Subir para banner', 'text_domain' ),
		'items_list'            => __( 'Lista de banners', 'text_domain' ),
		'items_list_navigation' => __( 'Navegar pelos banners', 'text_domain' ),
		'filter_items_list'     => __( 'Filtrar banner', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'Banners da home', 'text_domain' ),
		'description'           => __( 'Cadastrar banner', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title' ),
		'taxonomies'            => array( 'categoria_banners' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'show_in_rest'          => true,
		'menu_position'         => 5,
		'menu_icon'				=> 'dashicons-format-gallery',		
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => false,		
		'exclude_from_search'   => true,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'banners-home', $args );
}
add_action( 'init', 'custom_banners', 0 );
?>
<?php
// News Custom Post Type
function news() {

	$labels = array(
		'name'                  => _x( 'Notícias', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Notícias', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Notícias', 'text_domain' ),
		'name_admin_bar'        => __( 'Notícias', 'text_domain' ),
		'archives'              => __( 'Arquivos', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Item:', 'text_domain' ),
		'all_items'             => __( 'Todas as notícias', 'text_domain' ),
		'add_new_item'          => __( 'Adicionar nova notícia', 'text_domain' ),
		'add_new'               => __( 'Nova', 'text_domain' ),
		'new_item'              => __( 'Novo', 'text_domain' ),
		'edit_item'             => __( 'Editar', 'text_domain' ),
		'update_item'           => __( 'Atualizar', 'text_domain' ),
		'view_item'             => __( 'Vizualizar', 'text_domain' ),
		'search_items'          => __( 'Pesquisar', 'text_domain' ),
		'not_found'             => __( 'Não encontrado', 'text_domain' ),
		'not_found_in_trash'    => __( 'Não encontrado', 'text_domain' ),
		'featured_image'        => __( 'Imagem em destaque', 'text_domain' ),
		'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
		'remove_featured_image' => __( 'Remover imagem em destaque', 'text_domain' ),
		'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
		'items_list'            => __( 'Items list', 'text_domain' ),
		'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
	);
	$rewrite = array(
		'slug'                  => 'noticias',
		'with_front'            => true,
		'pages'                 => false,
		'feeds'                 => false,
	);
	$args = array(
		'label'                 => __( 'Notícias', 'text_domain' ),
		'description'           => __( 'Notícias', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor'),
		'taxonomies'            => array( 'news_categories' ),
		'menu_icon'							=> "dashicons-rss",
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'rewrite'               => $rewrite,
		'capability_type'       => 'page',
		'supports'							=> array('title', 'editor', 'thumbnail')
	);
	register_post_type( 'news', $args );
}
add_action( 'init', 'news', 0 );
function create_news_taxonomies() {
		$labels = array(
				'name'              => _x( 'Notícias', 'taxonomy general name' ),
				'singular_name'     => _x( 'Categorias', 'taxonomy singular name' ),
				'search_items'      => __( 'Buscar Categorias' ),
				'all_items'         => __( 'Todas as categorias' ),
				'edit_item'         => __( 'Editar Categoria' ),
				'update_item'       => __( 'Atualizar Categoria' ),
				'add_new_item'      => __( 'Adicionar Categoria' ),
				'new_item_name'     => __( 'Novo Nome de Categoria' ),
				'menu_name'         => __( 'Categorias' ),
		);

		$args = array(
				'hierarchical'      => false, // Set this to 'false' for non-hierarchical taxonomy (like tags)
				'labels'            => $labels,
				'show_ui'           => true,
				'rewrite'           => array( 'slug' => 'noticias' )
		);

		register_taxonomy( 'news_categories', array( 'news' ), $args );
}
add_action( 'init', 'create_news_taxonomies', 0 );
?>

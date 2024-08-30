<?php
add_action('admin_init', function () {
    global $pagenow;
    if ($pagenow === 'edit-comments.php') {
        wp_safe_redirect(admin_url());
        exit;
    }
    remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal');
    foreach (get_post_types() as $post_type) {
        if (post_type_supports($post_type, 'comments')) {
            remove_post_type_support($post_type, 'comments');
            remove_post_type_support($post_type, 'trackbacks');
        }
    }
});

add_action('init', function () {
    if (is_admin_bar_showing()) {
        remove_action('admin_bar_menu', 'wp_admin_bar_comments_menu', 60);
    }
});

add_action( 'template_redirect', function(){
    ob_start( function( $buffer ){
        $buffer = str_replace( array( 'type="text/javascript"', "" ), '', $buffer );
        $buffer = str_replace( array( 'type="text/css"', "" ), '', $buffer );
		$buffer = str_replace( array( 'itemprop="url"', "" ), '', $buffer );
		$buffer = str_replace( array( 'itemprop="logo"', "" ), '', $buffer );
        return $buffer;
		});
});

add_action('admin_menu', function () {
    remove_menu_page('edit-comments.php');
});

add_filter('comments_open', '__return_false', 20, 2);
add_filter('pings_open', '__return_false', 20, 2);
add_filter('comments_array', '__return_empty_array', 10, 2);
add_filter('style_loader_tag', 'sj_remove_type_attr', 10, 2);
add_filter('script_loader_tag', 'sj_remove_type_attr', 10, 2);

function sj_remove_type_attr($tag) {
    return preg_replace( "/type=['\"]text\/(javascript|css)['\"]/", '', $tag );
}

add_action( 'after_setup_theme', 'after_setup_theme' );

function after_setup_theme() {
	add_theme_support( 'post-thumbnails' );	
	add_image_size( 'mytheme-mini', 540, 304, true );
	register_nav_menus(array('primary' => 'Главное меню',));
	add_filter( 'excerpt_length', function(){return 25;});
	add_filter('excerpt_more', function($more) {return '...';});
	add_theme_support( 'custom-logo', array('height' => 108, 'width' => 248));
	wp_register_style( 'reset', get_template_directory_uri() . '/style/reset.css', array(), '', 'all' );
	wp_enqueue_style( 'reset' );
	wp_register_style( 'frontend', get_template_directory_uri() . '/style/style.css', array(), '', 'all' );
	wp_enqueue_style( 'frontend' );
	wp_register_style( 'grid', get_template_directory_uri() . '/style/grid.css', array(), '', 'all' );
	wp_enqueue_style( 'grid' );
	wp_register_script( 'custom', get_template_directory_uri() . '/script/custom.js', array(), '', 'all' );
	wp_enqueue_script( 'custom' );
	$args = array(
		'labels'             => array(
			'name'               => 'Mods',
			'singular_name'      => 'Mod',
			'add_new'            => 'Add mod',
			'add_new_item'       => 'Add new mod',
			'edit_item'          => 'Edit mod',
			'new_item'           => 'New mod',
			'all_items'          => 'All mods',
			'view_item'          => 'View mod',
			'search_items'       => 'Search mod',
			'not_found'          => 'Mod not found',
			'not_found_in_trash' => 'Mod not found',
			'parent_item_colon'  => '',
			'menu_name'          => 'Mods'
		),
	'menu_icon'          => 'dashicons-games',
	'description'        => 'All mods',
	'public'             => true,
	'publicly_queryable' => true,
	'menu_position'      => 35,
	'show_ui'            => true,
	'hierarchical'       => false,
	'supports'           => array( 'title', 'editor', 'thumbnail' ),
	'has_archive'        => true,
);

register_post_type('mods', $args);
add_action('init', 'create_taxonomy');

function create_taxonomy(){
	register_taxonomy('platform', ['mods'], [
		'label'                 => '', 
		'labels'                => [
			'name'              => 'Platforms',
			'singular_name'     => 'Platform',
			'search_items'      => 'Search platforms',
			'all_items'         => 'All platforms',
			'view_item '        => 'View platform',
			'parent_item'       => 'Parent platform',
			'parent_item_colon' => 'Parent platform',
			'edit_item'         => 'Edit platform',
			'update_item'       => 'Update platform',
			'add_new_item'      => 'Add new platform',
			'new_item_name'     => 'New platform name',
			'menu_name'         => 'Platform',
			'back_to_items'     => 'Back to platforms',
		],
		'description'           => '', 
		'public'                => true,
		'hierarchical'          => false,
		'rewrite'               => true,
		'capabilities'          => array(),
		'meta_box_cb'           => null,
		'show_admin_column'     => false, 
		'show_in_rest'          => null, 
		'rest_base'             => null, 
	]);
	register_taxonomy('game', ['mods'], [
		'label'                 => '', 
		'labels'                => [
			'name'              => 'Game',
			'singular_name'     => 'New game',
			'search_items'      => 'Search games',
			'all_items'         => 'All games',
			'view_item '        => 'View gam',
			'parent_item'       => 'Parent game',
			'parent_item_colon' => 'Parent game',
			'edit_item'         => 'Edit game',
			'update_item'       => 'Update game',
			'add_new_item'      => 'Add new game',
			'new_item_name'     => 'New game name',
			'menu_name'         => 'Game',
			'back_to_items'     => 'Back to games',
		],
		'description'           => '', 
		'public'                => true,
		'hierarchical'          => true,
		'rewrite'               => true,
		'capabilities'          => array(),
		'meta_box_cb'           => null,
		'show_admin_column'     => false, 
		'show_in_rest'          => null, 
		'rest_base'             => null, 
	]);
	register_taxonomy('type', ['mods'], [
		'label'                 => '', 
		'labels'                => [
			'name'              => 'Type',
			'singular_name'     => 'New type',
			'search_items'      => 'Search type',
			'all_items'         => 'All types',
			'view_item '        => 'Find type',
			'parent_item'       => 'Parent type',
			'parent_item_colon' => 'Parent type',
			'edit_item'         => 'Edit type',
			'update_item'       => 'Update type',
			'add_new_item'      => 'Add new type',
			'new_item_name'     => 'New type name',
			'menu_name'         => 'Type',
			'back_to_items'     => 'Back to types',
		],
		'description'           => '', 
		'public'                => true,
		'hierarchical'          => true,
		'rewrite'               => true,
		'capabilities'          => array(),
		'meta_box_cb'           => null,
		'show_admin_column'     => false, 
		'show_in_rest'          => null, 
		'rest_base'             => null, 
	]);
}
$args2 = array(
		'labels'             => array(
			'name'               => 'Collaborations',
			'singular_name'      => 'Collaboration',
			'add_new'            => 'Add collaboration',
			'add_new_item'       => 'Add new collaborations',
			'edit_item'          => 'Edit collaboration',
			'new_item'           => 'New collaboration',
			'all_items'          => 'All collaborations',
			'view_item'          => 'View collaboration',
			'search_items'       => 'Search collaborations',
			'not_found'          => 'Collaboration not found',
			'not_found_in_trash' => 'Collaboration not found',
			'parent_item_colon'  => '',
			'menu_name'          => 'Collaborations'
		),
	'menu_icon'          => 'dashicons-admin-site',
	'description'        => 'Список коллабораций',
	'public'             => true,
	'publicly_queryable' => true,
	'menu_position'      => 35,
	'show_ui'            => true,
	'hierarchical'       => false,
	'supports'           => array( 'title', 'editor', 'thumbnail' ),
	'has_archive'        => true,
);

register_post_type('collaborations', $args2);

function create_taxonomy_collaborations(){
	register_taxonomy('platform_collab', ['collaborations'], [
		'label'                 => '', 
		'labels'                => [
			'name'              => 'Platforms',
			'singular_name'     => 'Platform',
			'search_items'      => 'Search platforms',
			'all_items'         => 'All platforms',
			'view_item '        => 'View platform',
			'parent_item'       => 'Parent platform',
			'parent_item_colon' => 'Parent platform',
			'edit_item'         => 'Edit platform',
			'update_item'       => 'Update platform',
			'add_new_item'      => 'Add new platform',
			'new_item_name'     => 'New platform name',
			'menu_name'         => 'Platform',
			'back_to_items'     => 'Back to platforms',
		],
		'description'           => '', 
		'public'                => true,
		'hierarchical'          => false,
		'rewrite'               => true,
		'capabilities'          => array(),
		'meta_box_cb'           => null,
		'show_admin_column'     => false, 
		'show_in_rest'          => null, 
		'rest_base'             => null, 
	]);
	register_taxonomy('game_collab', ['collaborations'], [
		'label'                 => '', 
		'labels'                => [
			'name'              => 'Game',
			'singular_name'     => 'New game',
			'search_items'      => 'Search games',
			'all_items'         => 'All games',
			'view_item '        => 'View gam',
			'parent_item'       => 'Parent game',
			'parent_item_colon' => 'Parent game',
			'edit_item'         => 'Edit game',
			'update_item'       => 'Update game',
			'add_new_item'      => 'Add new game',
			'new_item_name'     => 'New game name',
			'menu_name'         => 'Game',
			'back_to_items'     => 'Back to games',
		],
		'description'           => '', 
		'public'                => true,
		'hierarchical'          => true,
		'rewrite'               => true,
		'capabilities'          => array(),
		'meta_box_cb'           => null,
		'show_admin_column'     => false, 
		'show_in_rest'          => null, 
		'rest_base'             => null, 
	]);
	register_taxonomy('type_collab', ['collaborations'], [
		'label'                 => '', 
		'labels'                => [
			'name'              => 'Type',
			'singular_name'     => 'New type',
			'search_items'      => 'Search type',
			'all_items'         => 'All types',
			'view_item '        => 'Find type',
			'parent_item'       => 'Parent type',
			'parent_item_colon' => 'Parent type',
			'edit_item'         => 'Edit type',
			'update_item'       => 'Update type',
			'add_new_item'      => 'Add new type',
			'new_item_name'     => 'New type name',
			'menu_name'         => 'Type',
			'back_to_items'     => 'Back to types',
		],
		'description'           => '', 
		'public'                => true,
		'hierarchical'          => true,
		'rewrite'               => true,
		'capabilities'          => array(),
		'meta_box_cb'           => null,
		'show_admin_column'     => false, 
		'show_in_rest'          => null, 
		'rest_base'             => null, 
	]);
}
add_action('init', 'create_taxonomy_collaborations');
}
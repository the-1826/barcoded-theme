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
add_filter('comments_open', '__return_false', 20, 2);
add_filter('pings_open', '__return_false', 20, 2);
add_filter('comments_array', '__return_empty_array', 10, 2);
add_action('admin_menu', function () {
    remove_menu_page('edit-comments.php');
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
function devise_copyright() {
	global $wpdb;
	$copyright_dates = $wpdb->get_results("
		SELECT
		2021 AS firstdate,
		YEAR(max(post_date_gmt)) AS lastdate
		FROM
			$wpdb->posts
		WHERE
		post_status = 'publish'
	");
	$output = '';
	if($copyright_dates) {
		$copyright = "&copy; Barcode Studia, " . $copyright_dates[0]->firstdate;
		if($copyright_dates[0]->firstdate != $copyright_dates[0]->lastdate) {
			$copyright .= '-' . $copyright_dates[0]->lastdate;
		}
		$output = $copyright;
	}
return $output;
}
add_action( 'after_setup_theme', 'after_setup_theme' );
add_filter('style_loader_tag', 'sj_remove_type_attr', 10, 2);
add_filter('script_loader_tag', 'sj_remove_type_attr', 10, 2);
function sj_remove_type_attr($tag) {
    return preg_replace( "/type=['\"]text\/(javascript|css)['\"]/", '', $tag );
}
function after_setup_theme() {
	add_theme_support( 'post-thumbnails' );	
	add_image_size( 'mytheme-mini', 540, 372, true );
	register_nav_menus(array('primary' => 'Главное меню',));
	add_filter( 'excerpt_length', function(){return 30;});
	add_filter('excerpt_more', function($more) {return '...';});
	add_theme_support( 'custom-logo', array('height' => 69, 'width' => 255));
	wp_register_style( 'reset', get_template_directory_uri() . '/reset.css', array(), '', 'all' );
	wp_enqueue_style( 'reset' );
	wp_register_style( 'frontend', get_template_directory_uri() . '/style.css', array(), '', 'all' );
	wp_enqueue_style( 'frontend' );
	wp_register_style( 'grid', get_template_directory_uri() . '/grid.css', array(), '', 'all' );
	wp_enqueue_style( 'grid' );
	wp_register_script( 'jquery', get_template_directory_uri() . '/jquery.js', array(), '', 'all' );
	wp_enqueue_script( 'jquery' );
	wp_register_script( 'custom', get_template_directory_uri() . '/custom.js', array(), '', 'all' );
	wp_enqueue_script( 'custom' );
	$args = array(
		'labels'             => array(
			'name'               => 'Моды',
			'singular_name'      => 'Мод',
			'add_new'            => 'Добавить мод',
			'add_new_item'       => 'Добавить новый мод',
			'edit_item'          => 'Редактировать мод',
			'new_item'           => 'Новый мод',
			'all_items'          => 'Все моды',
			'view_item'          => 'Посмотреть мод',
			'search_items'       => 'Найти мод',
			'not_found'          => 'Мод не найден',
			'not_found_in_trash' => 'Мод не найден',
			'parent_item_colon'  => '',
			'menu_name'          => 'Моды'
		),
	'menu_icon'          => 'dashicons-games',
	'description'        => 'Список модов',
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
			'name'              => 'Платформы',
			'singular_name'     => 'Платформа',
			'search_items'      => 'Искать платформы',
			'all_items'         => 'Все платформы',
			'view_item '        => 'Увидеть платформу',
			'parent_item'       => 'Родительская платформа',
			'parent_item_colon' => 'Родительская платформа',
			'edit_item'         => 'Редактировать платформу',
			'update_item'       => 'Обновить платформу',
			'add_new_item'      => 'Добавить новую платформу',
			'new_item_name'     => 'Имя новой платформы',
			'menu_name'         => 'Платформа',
			'back_to_items'     => 'Назад к платформам',
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
			'name'              => 'Игра',
			'singular_name'     => 'Новая игра',
			'search_items'      => 'Искать игры',
			'all_items'         => 'Все игры',
			'view_item '        => 'Увидеть игру',
			'parent_item'       => 'Родительская игра',
			'parent_item_colon' => 'Родительская игра',
			'edit_item'         => 'Редактировать игру',
			'update_item'       => 'Обновить игру',
			'add_new_item'      => 'Добавить новую игру',
			'new_item_name'     => 'Имя новой игры',
			'menu_name'         => 'Игра',
			'back_to_items'     => 'Назад к играм',
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
			'name'              => 'Тип',
			'singular_name'     => 'Новый тип',
			'search_items'      => 'Искать тип',
			'all_items'         => 'Все типы',
			'view_item '        => 'Увидеть тип',
			'parent_item'       => 'Родительский тип',
			'parent_item_colon' => 'Родительский тип',
			'edit_item'         => 'Редактировать тип',
			'update_item'       => 'Обновить тип',
			'add_new_item'      => 'Добавить новый тип',
			'new_item_name'     => 'Имя нового типа',
			'menu_name'         => 'Тип',
			'back_to_items'     => 'Назад к типам',
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
}
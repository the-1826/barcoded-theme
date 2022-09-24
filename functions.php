<?php

add_action( 'template_redirect', function(){
    ob_start( function( $buffer ){
        $buffer = str_replace( array( 'type="text/javascript"', "" ), '', $buffer );
        $buffer = str_replace( array( 'type="text/css"', "" ), '', $buffer );
		$buffer = str_replace( array( 'itemprop="url"', "" ), '', $buffer );
		$buffer = str_replace( array( 'itemprop="logo"', "" ), '', $buffer );
        return $buffer;
		});
});
add_action( 'after_setup_theme', 'after_setup_theme' );
add_filter('style_loader_tag', 'sj_remove_type_attr', 10, 2);
add_filter('script_loader_tag', 'sj_remove_type_attr', 10, 2);
function sj_remove_type_attr($tag) {
    return preg_replace( "/type=['\"]text\/(javascript|css)['\"]/", '', $tag );
}

function after_setup_theme() {
	add_theme_support( 'post-thumbnails' );	
	register_nav_menus(array('primary' => 'Главное',));
	add_filter( 'excerpt_length', function(){return 25;});
	add_filter('excerpt_more', function($more) {return '...';});
	add_theme_support( 'custom-logo', array('height' => 65, 'width'  => 230));
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
			'name'               => 'Games',
			'singular_name'      => 'Game',
			'add_new'            => 'Add game',
			'add_new_item'       => 'Add new game',
			'edit_item'          => 'Edit game',
			'new_item'           => 'New game',
			'all_items'          => 'All games',
			'view_item'          => 'View game',
			'search_items'       => 'Find game',
			'not_found'          => 'Game not found',
			'not_found_in_trash' => 'Game not found',
			'parent_item_colon'  => '',
			'menu_name'          => 'Games'
		),
	'description'        => 'Games list',
	'public'             => true,
	'publicly_queryable' => true,
	'menu_position'      => 35,
	'show_ui'            => true,
	'hierarchical'       => false,
	'supports'           => array( 'title', 'editor', 'thumbnail' ),
	'has_archive'        => true,
);
register_post_type( 'recipe', $args );
}
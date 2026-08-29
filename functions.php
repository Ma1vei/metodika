<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function migrapro_static_setup() {
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);
}
add_action( 'after_setup_theme', 'migrapro_static_setup' );

function migrapro_static_assets() {
	$css_path = get_theme_file_path( '/css/style.css' );

	wp_enqueue_style(
		'migrapro-static-fonts',
		'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap',
		array(),
		null
	);

	wp_enqueue_style(
		'migrapro-static-main',
		get_theme_file_uri( '/css/style.css' ),
		array( 'migrapro-static-fonts' ),
		file_exists( $css_path ) ? (string) filemtime( $css_path ) : '1.0.0'
	);
}
add_action( 'wp_enqueue_scripts', 'migrapro_static_assets' );

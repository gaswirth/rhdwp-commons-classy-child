<?php
/**
 * Bloggy Child
 *
 * ROUNDHOUSE DESIGNS
 *
 * @package WordPress
 * @subpackage rhd
 **/

/* ==========================================================================
   Initialization
   ========================================================================== */

define( 'RHD_CHILD_DIR', get_stylesheet_directory_uri() );


// Enqueue Parent Theme
add_action( 'wp_enqueue_scripts', 'rhd_theme_enqueue_styles' );
function rhd_theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', RHD_THEME_DIR . '/style.css' );
    wp_enqueue_style( 'child-main', RHD_CHILD_DIR . '/css/main.css', array( 'rhd-main' ) );

    wp_register_style( 'google-fonts', '//fonts.googleapis.com/css?family=Oswald:400,700' );
}

add_action( 'wp_enqueue_scripts', 'rhd_theme_enqueue_scripts' );
function rhd_theme_enqueue_scripts() {
	wp_enqueue_script( 'child-main', RHD_CHILD_DIR . '/js/child-main.js', array( 'jquery', 'rhd-main' ), null, true );

    // Localize data for client-side use
	global $wp_query;
	$data = array(
		'home_url' => home_url(),
		'parent_dir' => RHD_THEME_DIR,
		'child_dir' => get_stylesheet_directory_uri(),
		'img_dir' => get_stylesheet_directory_uri() . '/img',
		'ajax_url' => admin_url( 'admin-ajax.php' ),
		'query_vars' => json_encode( $wp_query->query ),
		'inc_slidebars' => ( $theme_opts['rhd_include_slidebars'] == '1' ) ? true : false,
		'inc_packery' => ( $theme_opts['rhd_include_packery'] == '1' ) ? true : false
	);
	wp_localize_script( 'child-main', 'wp_child_data', $data);
}

/*
add_action( 'wp_enqueue_scripts', 'rhd_override_scripts' );
function rhd_override_scripts() {
	wp_dequeue_script( 'ajax-loop' );
	wp_enqueue_script( 'ajax-loop', RHD_CHILD_DIR . '/js/ajax-loop.js', array( 'jquery' ), null, true );

	// Localize template dirs
	global $wp_query;
	$data = array(
		'template_url' => get_stylesheet_directory_uri(),
		'parent_url' => get_template_directory_uri()
	);
	wp_localize_script( 'ajax-loop', 'wp_child_data', $data);
}
*/


/* ==========================================================================
	Functions
   ========================================================================== */
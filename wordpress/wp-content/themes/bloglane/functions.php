<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

// BEGIN ENQUEUE PARENT ACTION
// AUTO GENERATED - Do not modify or remove comment markers above or below:

//Load text domain for translation-ready
load_theme_textdomain('bloglane', get_stylesheet_directory() . '/languages');

if ( !function_exists( 'bloglane_child_theme_parent_css' ) ):
    function bloglane_child_theme_parent_css() {
		wp_enqueue_style( 'bloglane-parent-style', get_template_directory_uri() . '/style.css' );
		wp_enqueue_style('bloglane-child-style',get_stylesheet_directory_uri() . '/style.css',array('parent-style'));
		wp_enqueue_style('default-style-css', get_stylesheet_directory_uri()."/css/bloglane-default.css" );
	}
endif; 
add_action( 'wp_enqueue_scripts', 'bloglane_child_theme_parent_css', 999 );

// END ENQUEUE PARENT ACTION 

function bloglane_customize_register() {     
	global $wp_customize;
	$wp_customize->remove_section( 'daron_service_option' );  //Modify this line as needed 
	$wp_customize->remove_section( 'daron_portfolio_option' );  //Modify this line as needed 
	$wp_customize->remove_section( 'daron_testimonial_option' );  //Modify this line as needed 
	$wp_customize->remove_section( 'upgrade_daron_premium' );  //Modify this line as needed 
	$wp_customize->remove_control( 'daron_skin_theme_color' ); //Modify this line as needed                                                                                                           );  //Modify this line as needed 
} 
add_action( 'customize_register', 'bloglane_customize_register', 11 );
?>

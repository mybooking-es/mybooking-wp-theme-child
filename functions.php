<?php
/**
*		GLOBAL FUNCTIONS
*  	----------------
*		Overrides parent document on Understrap Theme
*
* 	Versión: 0.0.1
*   @package WordPress
*   @subpackage Mybooking WordPress Child Theme
*   @since Mybooking WordPress Theme 0.0.1
*/

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/**
 * Internacionalization
 *
 */
function mybooking_setup(){
    $domain = 'mybooking';
    load_child_theme_textdomain( $domain, get_stylesheet_directory() . '/languages' );
    // wp-content/themes/mybooking/languages/
    load_child_theme_textdomain( $domain, get_template_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'mybooking_setup' );

/**
 * Mybooking remove scripts (remove theme styles)
 */
function mybooking_remove_scripts() {
    wp_dequeue_style( 'mybooking-styles' );
    wp_deregister_style( 'mybooking-styles' );

    wp_dequeue_script( 'mybooking-scripts' );
    wp_deregister_script( 'mybooking-scripts' );

    // Removes the parent themes stylesheet and scripts from inc/enqueue.php
}
add_action( 'wp_enqueue_scripts', 'mybooking_remove_scripts', 20 );

/**
 * Enqueue new CSS & scripts
 *
 */
function theme_enqueue_styles() {

	// Get the theme data
	$the_theme = wp_get_theme();

  // == Load CSS
  wp_enqueue_style( 'mybooking-child-styles', get_stylesheet_directory_uri() .  '/css/child-theme.min.css', array(), $the_theme->get( 'Version' ) );

  // == Load JS
  wp_enqueue_script( 'mybooking-child-scripts', get_stylesheet_directory_uri() . '/js/child-theme.min.js', array(), $the_theme->get( 'Version' ), true );

}
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );

<?php
/**
 * Plugin Name:       Corona Update
 * Plugin URI:        https://www.themelooks.com/blog/
 * Description:       Corona Update WordPress Plugin to show corona current cases and more information about COVID-19. You will be able to show the relevant information: cases, today's cases, deaths, today's deaths, recovered, and critical on you website. 
 * Version:           1.6.0
 * Author:            ThemeLooks
 * Author URI:        https://themelooks.com/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       corona-update
 * Domain Path:       /languages
 */

/**
 * Define all constant
 *
 */


// Version constant
if( !defined( 'CORONAUPDATE_VERSION' ) ) {
	define( 'CORONAUPDATE_VERSION', '1.6.0' );
}

// Plugin dir path constant
if( !defined( 'CORONAUPDATE_DIR_PATH' ) ) {
	define( 'CORONAUPDATE_DIR_PATH', trailingslashit( plugin_dir_path( __FILE__ ) ) );
}
// Plugin dir url constant
if( !defined( 'CORONAUPDATE_DIR_URL' ) ) {
	define( 'CORONAUPDATE_DIR_URL', trailingslashit( plugin_dir_url( __FILE__ ) ) );
}
// Plugin dir admin assets url constant
if( !defined( 'CORONAUPDATE_DIR_ADMIN_ASSETS_URL' ) ) {
	define( 'CORONAUPDATE_DIR_ADMIN_ASSETS_URL', trailingslashit( CORONAUPDATE_DIR_URL . 'admin/assets' ) );
}
// Admin dir path
if( !defined( 'CORONAUPDATE_DIR_ADMIN' ) ) {
	define( 'CORONAUPDATE_DIR_ADMIN', trailingslashit( CORONAUPDATE_DIR_PATH.'admin' ) );
}
// Inc dir path
if( !defined( 'CORONAUPDATE_DIR_INC' ) ) {
	define( 'CORONAUPDATE_DIR_INC', trailingslashit( CORONAUPDATE_DIR_PATH.'inc' ) );
}


// Include

// Admin file include
require_once( CORONAUPDATE_DIR_ADMIN.'admin.php' );

// Helper Class
require_once( CORONAUPDATE_DIR_INC.'class-get-api-data.php' );
require_once( CORONAUPDATE_DIR_INC.'statistic-widget.php' );
require_once( CORONAUPDATE_DIR_INC.'statistic-shortcode.php' );
require_once( CORONAUPDATE_DIR_INC.'awareness-popup.php' );



// Get page title and slug

function coronaupdate_get_page_lists() {

	$pages = get_pages();

	$pageLists = [ 'all' => 'All Page' ];

	foreach( $pages as $page ) {

		$pageLists[$page->post_name] = $page->post_title;

	}

	return $pageLists;

}


// Enqueue scripts
add_action( 'wp_enqueue_scripts', 'coronaupdate_enqueue_scripts' );
function coronaupdate_enqueue_scripts() {

	wp_enqueue_style( 'coronaupdate-style', CORONAUPDATE_DIR_URL.'assets/css/style.css', array(), '1.0.0', 'all' );
	wp_enqueue_script( 'coronaupdate-script', CORONAUPDATE_DIR_URL.'assets/js/script.js', array('jquery'), '1.0.0', true );

}

// Init api
add_action( 'init', 'coronaupdate_init_api' );
function coronaupdate_init_api() {

	global $coronaData;

	$obj = new \CoronaUpdate\Get_API_Data();

	$coronaData = $obj->get_data();

	
}



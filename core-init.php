<?php
/*
 *
 *	***** Appfoster *****
 *
 *	This file initializes all APPF Core components
 *
 */
// If this file is called directly, abort. //
if ( ! defined( 'WPINC' ) ) {die;} // end if
// Define Our Constants
define('APPF_CORE_INC',dirname( __FILE__ ).'/assets/inc/');
define('APPF_CORE_IMG',plugins_url( 'assets/img/', __FILE__ ));
define('APPF_CORE_CSS',plugins_url( 'assets/css/', __FILE__ ));
define('APPF_CORE_JS',plugins_url( 'assets/js/', __FILE__ ));

/*
 *
 *  Register CSS
 *
 */
function appf_register_core_css(){
    wp_enqueue_style('appf-core', APPF_CORE_CSS . 'appf-core.css',null,time(),'all');
};
add_action( 'wp_enqueue_scripts', 'appf_register_core_css' );
/*
 *
 *  Register JS/Jquery Ready
 *
 */
function appf_register_core_js(){
    // Register Core Plugin JS
    wp_enqueue_script('appf-core', APPF_CORE_JS . 'appf-core.js','jquery',time(),true);
};
add_action( 'wp_enqueue_scripts', 'appf_register_core_js' );
/*
 *
 *  Includes
 *
 */
// Load the Functions
if ( file_exists( APPF_CORE_INC . 'appf-core-functions.php' ) ) {
    require_once APPF_CORE_INC . 'appf-core-functions.php';
}
// Load the ajax Request
if ( file_exists( APPF_CORE_INC . 'appf-ajax-request.php' ) ) {
    require_once APPF_CORE_INC . 'appf-ajax-request.php';
}
// Load the Shortcodes
if ( file_exists( APPF_CORE_INC . 'appf-shortcodes.php' ) ) {
    require_once APPF_CORE_INC . 'appf-shortcodes.php';
}
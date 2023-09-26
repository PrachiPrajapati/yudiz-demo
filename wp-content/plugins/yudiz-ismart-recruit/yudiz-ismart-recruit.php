<?php
/*
Plugin Name: Yudiz iSmart Recruit
Plugin URI: https://www.yudiz.com/
Description: Yudiz Career form integration with iSmartRecruit API.
Version: 1.0.0
Author: Yudiz Solutions Limited
Author URI: https://www.yudiz.com/
*/

/**
 * Basic plugin definitions 
 * 
 * @package Yudiz iSmart Recruit
 * @since 1.0.0
 */
if( !defined( 'YDZ_ISR_DIR' ) ) {
  define( 'YDZ_ISR_DIR', dirname( __FILE__ ) );      // Plugin dir
}
if( !defined( 'YDZ_ISR_VERSION' ) ) {
  define( 'YDZ_ISR_VERSION', '1.0.0' );      // Plugin Version
}
if( !defined( 'YDZ_ISR_URL' ) ) {
  define( 'YDZ_ISR_URL', plugin_dir_url( __FILE__ ) );   // Plugin url
}
if( !defined( 'YDZ_ISR_INC_DIR' ) ) {
  define( 'YDZ_ISR_INC_DIR', YDZ_ISR_DIR.'/includes' );   // Plugin include dir
}
if( !defined( 'YDZ_ISR_INC_URL' ) ) {
  define( 'YDZ_ISR_INC_URL', YDZ_ISR_URL.'includes' );    // Plugin include url
}
if( !defined( 'YDZ_ISR_ADMIN_DIR' ) ) {
  define( 'YDZ_ISR_ADMIN_DIR', YDZ_ISR_INC_DIR.'/admin' );  // Plugin admin dir
}
if(!defined('YDZ_ISR_PREFIX')) {
  define('YDZ_ISR_PREFIX', 'ydz_isr'); // Plugin Prefix
}
if(!defined('YDZ_ISR_VAR_PREFIX')) {
  define('YDZ_ISR_VAR_PREFIX', '_ydz_isr_'); // Variable Prefix
}

if(!defined('YDZ_ISR_ISMART_API_ENDPOINT')) {
  define('YDZ_ISR_ISMART_API_ENDPOINT', get_option('ismart_endpoint')); // Variable Prefix
}

if(!defined('YDZ_ISR_ISMART_API_KEY')) {
  define('YDZ_ISR_ISMART_API_KEY', get_option('ismart_api_key')); // Variable Prefix
}

if(!defined('YDZ_ISR_ISMART_API_UPDATE_DUBLICATE')) {
  define('YDZ_ISR_ISMART_API_UPDATE_DUBLICATE', 'Y'); // Variable Prefix
}

$support_forms = array(
  get_option('ismart_carrier_individual_form'),
  get_option('ismart_carrier_form'),
);

if(!defined('YDZ_ISR_ISMART_API_CF7_IDS')) {  
  define('YDZ_ISR_ISMART_API_CF7_IDS', $support_forms); // Variable Prefix
}

if(!defined('YDZ_ISR_ISMART_CARRIER_FORM_ID')) {
  
  define('YDZ_ISR_ISMART_CARRIER_FORM_ID', get_option('ismart_carrier_form'));
}

/**
 * Load Text Domain
 *
 * This gets the plugin ready for translation.
 *
 * @package Yudiz iSmart Recruit
 * @since 1.0.0
 */
load_plugin_textdomain( 'ydz-isr', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );

/**
 * Activation Hook
 *
 * Register plugin activation hook.
 *
 * @package Yudiz iSmart Recruit
 * @since 1.0.0
 */
register_activation_hook( __FILE__, 'ydz_isr_install' );

function ydz_isr_install(){
	
}

/**
 * Deactivation Hook
 *
 * Register plugin deactivation hook.
 *
 * @package Yudiz iSmart Recruit
 * @since 1.0.0
 */
register_deactivation_hook( __FILE__, 'ydz_isr_uninstall');

function ydz_isr_uninstall(){
  
}

// Global variables
global $ydz_isr_admin,$ydz_isr_public;

//Admin class handles most of admin panel functionalities of plugin
include_once( YDZ_ISR_ADMIN_DIR.'/class-ydz-isr-admin.php' );
$ydz_isr_admin = new Ydz_Isr_Admin();
$ydz_isr_admin->add_hooks();

// Public class handles frontend feature
include_once( YDZ_ISR_INC_DIR.'/class-ydz-isr-public.php' );
$ydz_isr_public = new Ydz_Isr_Public();
$ydz_isr_public->add_hooks();
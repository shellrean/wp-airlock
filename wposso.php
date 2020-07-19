<?php
/**
 * Plugin Name: Dinasti SSO
 * Plugin URI: https://shellrean.com
 * Version: 1.4.6
 * Description: SSO with laravel passport.
 * Author: Shellrean
 * Author URI: https://shellrean.com
 * License: GPL2
 *
 * This program is GLP but; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of.
 */

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

if ( ! defined( 'WPOSSO_FILE' ) ) {
	define( 'WPOSSO_FILE', plugin_dir_path( __FILE__ ) );
}

// Require the main plugin clas
require_once( WPOSSO_FILE . '/library/class-wposso-client.php' );

add_action( "wp_loaded", '_wposso_register_files' );
function _wposso_register_files() {
	wp_register_style( 'wposso_admin', plugins_url( '/assets/css/admin.css', __FILE__ ) );
	wp_register_script( 'wposso_admin', plugins_url( '/assets/js/admin.js', __FILE__ ) );
}

add_action( 'admin_menu', array( new WPOSSO_Client, 'plugin_init' ) );
register_activation_hook( __FILE__, array( new WPOSSO_Client, 'setup' ) );
register_activation_hook( __FILE__, array( new WPOSSO_Client, 'upgrade' ) );
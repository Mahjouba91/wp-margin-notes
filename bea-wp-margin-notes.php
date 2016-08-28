<?php
/*
 Plugin Name: BEA WP Margin Notes
 Version: 1.0.0
 Version Boilerplate: 2.2.0
 Plugin URI: http://www.beapi.fr
 Description: Simply add margin notes to your content by just add a desc HTML attribute
 Author: BE API Technical team
 Author URI: http://www.beapi.fr
 Domain Path: languages
 Text Domain: bea-wp-margin-notes

 ----

 Copyright 2016 BE API Technical team (human@beapi.fr)

 This program is free software; you can redistribute it and/or modify
 it under the terms of the GNU General Public License as published by
 the Free Software Foundation; either version 2 of the License, or
 (at your option) any later version.

 This program is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 GNU General Public License for more details.

 You should have received a copy of the GNU General Public License
 along with this program; if not, write to the Free Software
 Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
 */

// don't load directly
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

// Plugin constants
define( 'BEA_WPMN_VERSION', '1.0.0' );
define( 'BEA_WPMN_MIN_PHP_VERSION', '5.4' );
define( 'BEA_WPMN_VIEWS_FOLDER_NAME', 'bea-wpmn' );

// Plugin URL and PATH
define( 'BEA_WPMN_URL', plugin_dir_url( __FILE__ ) );
define( 'BEA_WPMN_DIR', plugin_dir_path( __FILE__ ) );

// Check PHP min version
if ( version_compare( PHP_VERSION, BEA_WPMN_MIN_PHP_VERSION, '<' ) ) {
	require_once( BEA_WPMN_DIR . 'compat.php' );

	// possibly display a notice, trigger error
	add_action( 'admin_init', array( 'BEA\WPMN\Compatibility', 'admin_init' ) );

	// stop execution of this file
	return;
}

/**
 * Autoload all the things \o/
 */
require_once BEA_WPMN_DIR . 'autoload.php';

add_action( 'plugins_loaded', 'init_bea_wpmn_plugin' );
/**
 * Init the plugin
 */
function init_bea_wpmn_plugin() {
	// Client
	\BEA\WPMN\Main::get_instance();
}

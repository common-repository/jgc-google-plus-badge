<?php
/*
Plugin Name: JGC Google Plus Badge
Description: A simple plugin that creates a widget to display the Google+ Badge.
Version: 1.0.1
Author: GalussoThemes
Author URI: https://galussothemes.com
License: GPLv2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: jgc-google-plus-badge
Domain Path: /languages

JGC Google Plus Badge is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.

JGC Google Plus Badge is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with JGC Google Plus Badge. If not, see https://www.gnu.org/licenses/gpl-2.0.html.
*/

// Salir si se accede directamente
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

add_action('init', 'jgcgpb_load_textdomain');
function jgcgpb_load_textdomain() {

	load_plugin_textdomain( 'jgc-google-plus-badge', false, basename( dirname( __FILE__ ) ) . '/languages' );

}

require_once( plugin_dir_path( __FILE__ ) . 'inc/jgc-widget-google-plus-badge.php' );

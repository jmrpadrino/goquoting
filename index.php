<?php
/**
 * @package GOQuoting
 * @version 1.0
 */
/*
Plugin Name: GOQuoting by Go Galapagos
Plugin URI: https://gogalapagos.com
Description: This plugin allows you to have a communication interface with Go Galapagos, in order to give your visitors the chance to quote a cruise for Galapagos Island with Go Galapagos Cruises
Author: jmrPadrino & The Go Galapagos Team
Version: 1.0
Author URI: https://choclomedia.com
*/

/**
 * VALIDACION por si accede directamente a los archivos del plugin
 */ 
if ( ! function_exists( 'add_filter' ) ) {
	header( 'Status: 403 Forbidden' );
	header( 'HTTP/1.1 403 Forbidden' );
	exit();
}

/**
 * Definiciones
 */ 
define('RUTA_PLUGIN_BOOKING', plugin_dir_url( __FILE__ ));
define('PATH_PLUGIN_BOOKING', plugin_dir_path( __FILE__ ));
define('META_PREFIX', 'gg_');

/**
 * Agregar archivos requeridos
 */ 
require_once('admin/booking-system-setup.php');
require_once('admin/booking-system-admin-functions.php');
require_once('app/booking-system-create-pages.php');
require_once('app/booking-system-shortcodes.php');
<?php
/**
 * @package GOQuoting
 * @version 1.0
 */
/*
Plugin Name: GOQuoting by Go Galapagos
Plugin URI: https://gogalapagos.com
Description: This plugin allows you to have a communication interace with Go Galapagos, in order to give your visitors the chance to quote a cruise for Galapagos Island with Go Galapagos Cruises
Author: jmrPadrino & The Go Galapagos Team
Version: 1.0
Author URI: https://choclomedia.com
*/
if ( ! function_exists( 'add_filter' ) ) {
	header( 'Status: 403 Forbidden' );
	header( 'HTTP/1.1 403 Forbidden' );
	exit();
}
/* DEFINICIONES */

/* LIBRERIAS */
// Dependencias
require_once('app/booking-system-create-pages.php');
//require_once('app/booking-system-add-content-to-pages.php');
require_once('app/booking-system-shortcodes.php');

//add_action('wp_enqueue_scripts', 'gg_quote_style_and_scripts', 11);
/*
function gg_quote_style_and_scripts(){
    wp_enqueue_style( 'gogalapagos-booking',  URLPLUGINGOGALAPAGOS .'css/gogalapagos-booking.css', array(), $ver, 'screen' );
    wp_register_script( 'goga_ajax_booking', URLPLUGINGOGALAPAGOS .'/js/gogalapagos-booking.js', array ( 'jquery' ), $ver, true);
    wp_enqueue_script( 'goga_ajax_booking', URLPLUGINGOGALAPAGOS .'js/gogalapagos-booking.js', array ( 'jquery' ), $ver, true);
    wp_localize_script( 'goga_ajax', 'goga_booking', array( 'booking_plugin_url' => URLPLUGINGOGALAPAGOS ));
}*/

//add_action('admin_enqueue_scripts', 'gg_quote_style_and_scripts', 11);

//

/* FUNCIONES */

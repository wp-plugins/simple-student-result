<?php
/**
 * Plugin Name: Simple Student Result
 * Plugin URI: http://saadamin.info/portfolio/ssr
 * Description: Ajax supported simple student result and display. apply [ssr_results] shortcode in a post/page for show results.
 * Version: 1.0
 * Author: Saad Amin
 * Author URI: http://www.saadamin.info
 * License: GPL2
 */
define('SSR_ROOT_FILE', __FILE__);
define('SSR_ROOT_PATH', dirname(__FILE__));
define('SSR_TABLE', $wpdb->prefix . 'ssr_studentinfo');
define('SSR_VERSION', '1.0');
define( 'SSR_REQUIRED_WP_VERSION', '3.8' );
define( 'SSR_PLUGIN_BASENAME', plugin_basename( __FILE__ ) );
define( 'SSR_PLUGIN_NAME', trim( dirname( SSR_PLUGIN_BASENAME ), '/' ) );
define( 'SSR_PLUGIN_DIR', untrailingslashit( dirname( __FILE__ ) ) );
define( 'SSR_PLUGIN_URL', untrailingslashit( plugins_url( '', __FILE__ ) ) );
	// Back-end only
	if(is_admin()) {
		include SSR_ROOT_PATH.'/activation.php';
		include SSR_ROOT_PATH.'/menus.php';
	}
	include SSR_ROOT_PATH.'/ad_scripts.php';
	include SSR_ROOT_PATH.'/views/ssr_shortcode.php';
	require_once SSR_ROOT_PATH.'/userip/ip.codehelper.io.php';
	require_once SSR_ROOT_PATH.'/userip/php_fast_cache.php';
	$_ip = new ip_codehelper();
	$real_client_ip_address = $_ip->getRealIP();
	$visitor_location       = $_ip->getLocation($real_client_ip_address);
	define( 'SSR_Visitor_Country',  $visitor_location['CountryName'] );
	define( 'SSR_Visitor_City',  $visitor_location['CityName'] );


function SSR_plugin_path( $path = '' ) {
	return path_join( SSR_PLUGIN_DIR, trim( $path, '/' ) );
}

function SSR_plugin_url( $path = '' ) {
	$url = untrailingslashit( SSR_PLUGIN_URL );
	if ( ! empty( $path ) && is_string( $path ) && false === strpos( $path, '..' ) )
		$url .= '/' . ltrim( $path, '/' );
	return $url;
}
?>
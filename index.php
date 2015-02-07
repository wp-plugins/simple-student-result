<?php
 /*
Plugin Name: Student Result or Employee Database
Plugin URI: http://saadamin.info/portfolio/ssr
Description: Ajax supported simple student result input and display. And Employee database system ,  apply [ssr_results] shortcode in a post/page for show results  , <a href="http://saadamin.info/portfolio/ssr" target="_blank">Click here for demo</a>
Author: Saad Amin
Version: 1.3.7
Author URI: http://www.saadamin.info
License: GPL2
*/
define('SSR_ROOT_FILE', __FILE__);
define('SSR_ROOT_PATH', dirname(__FILE__));
//define('SSR_TABLE', $wpdb->prefix.'ssr_studentinfo');
define('SSR_TABLE', 'ssr_studentinfo');
define('SSR_VERSION', '1.3.7');
define( 'SSR_REQUIRED_WP_VERSION', '3.8' );
define( 'SSR_PLUGIN_BASENAME', plugin_basename( __FILE__ ) );
define( 'SSR_PLUGIN_NAME', 'Student Result or Employee Database' );
define( 'SSR_PLUGIN_DIR', untrailingslashit( dirname( __FILE__ ) ) );
define( 'SSR_PLUGIN_URL', untrailingslashit( plugins_url( '', __FILE__ ) ) );
	// Back-end only
	if(is_admin()) {
		include SSR_ROOT_PATH.'/activation.php';
		include SSR_ROOT_PATH.'/menus.php';
		include SSR_ROOT_PATH.'/functions.php';
	}
	include SSR_ROOT_PATH.'/ad_scripts.php';
	include SSR_ROOT_PATH.'/views/ssr_shortcode.php';
function SSR_plugin_path( $path = '' ) {
	return path_join( SSR_PLUGIN_DIR, trim( $path, '/' ) );
}
function SSR_plugin_url( $path = '' ) {
	$url = untrailingslashit( SSR_PLUGIN_URL );
	if ( ! empty( $path ) && is_string( $path ) && false === strpos( $path, '..' ) )
		$url .= '/' . ltrim( $path, '/' );
	return $url;
}
//Provide a Shortcut to Your Settings Page with Plugin Action Links
add_filter('plugin_action_links', 'ssr_plugin_action_links', 10, 2);
function ssr_plugin_action_links($links, $file) {
    static $this_plugin;
    if (!$this_plugin) {
        $this_plugin = plugin_basename(__FILE__);
    }
    if ($file == $this_plugin) {
        $settings_link = '<a href="' . get_bloginfo('wpurl') . '/wp-admin/admin.php?page=ssr_settings">Settings</a>';
        array_unshift($links, $settings_link);
    }
    return $links;
}
?>
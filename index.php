<?php
 /*
Plugin Name: Simple Student Result
Plugin URI: http://saadamin.info/portfolio/ssr
Description: Ajax supported simple student result and display. apply [ssr_results] shortcode in a post/page for show results  , <a href="http://saadamin.info/portfolio/ssr" target="_blank">Click here for demo</a>
Author: Saad Amin
Version: 1.3.3
Author URI: http://www.saadamin.info
License: GPL2
*/
define('SSR_ROOT_FILE', __FILE__);
define('SSR_ROOT_PATH', dirname(__FILE__));
//define('SSR_TABLE', $wpdb->prefix.'ssr_studentinfo');
define('SSR_TABLE', 'ssr_studentinfo');
define('SSR_VERSION', '1.3.3');
define( 'SSR_REQUIRED_WP_VERSION', '3.8' );
define( 'SSR_PLUGIN_BASENAME', plugin_basename( __FILE__ ) );
define( 'SSR_PLUGIN_NAME', 'Simple Student Result' );
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
        // The "page" query string value must be equal to the slug
        // of the Settings admin page we defined earlier, which in
        // this case equals "myplugin-settings".
        $settings_link = '<a href="' . get_bloginfo('wpurl') . '/wp-admin/admin.php?page=ssr_settings">Settings</a>';
        array_unshift($links, $settings_link);
    }
    return $links;
}
if (strlen(esc_attr( get_option('ssr_search_box_text') ))==0) update_option('ssr_search_box_text','Enter Registration ID');
		if (strlen(esc_attr( get_option('ssr_search_box_no_result_text') ))==0) update_option('ssr_search_box_no_result_text','No Results !');
		if (strlen(esc_attr( get_option('ssr_search_box_ssr_slug') ))==0) update_option('ssr_search_box_ssr_slug','Student');
		if (strlen(esc_attr( get_option('ssr_search_box_ssr_item1') ))==0) update_option('ssr_search_box_ssr_item1','Registration Number');
		if (strlen(esc_attr( get_option('ssr_search_box_ssr_item2') ))==0) update_option('ssr_search_box_ssr_item2','Roll No');
		if (strlen(esc_attr( get_option('ssr_search_box_ssr_item3') ))==0) update_option('ssr_search_box_ssr_item3','Student Name');
		if (strlen(esc_attr( get_option('ssr_search_box_ssr_item4') ))==0) update_option('ssr_search_box_ssr_item4','Fathers Name');
		if (strlen(esc_attr( get_option('ssr_search_box_ssr_item5') ))==0) update_option('ssr_search_box_ssr_item5','Passing Year');
		if (strlen(esc_attr( get_option('ssr_search_box_ssr_item6') ))==0) update_option('ssr_search_box_ssr_item6','CGPA');
		if (strlen(esc_attr( get_option('ssr_search_box_ssr_item7') ))==0) update_option('ssr_search_box_ssr_item7','Subject');
		if (strlen(esc_attr( get_option('ssr_menu_slug') ))==0) update_option('ssr_menu_slug','Students Result');
		if (strlen(esc_attr( get_option('ssr_menu_slug_add') ))==0) update_option('ssr_menu_slug_add','Add Student Results');
		if (strlen(esc_attr( get_option('ssr_menu_1st_custom_slug') ))==0) update_option('ssr_menu_1st_custom_slug','CGPA');
		if (strlen(esc_attr( get_option('ssr_menu_2nd_custom_slug') ))==0) update_option('ssr_menu_2nd_custom_slug','Subject');
		if (strlen(esc_attr( get_option('ssr_search_box_heading') ))==0) update_option('ssr_search_box_heading','Online Result System');
?>
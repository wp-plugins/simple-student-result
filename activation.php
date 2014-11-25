<?php
// Activation and de-activation hooks
register_activation_hook(SSR_ROOT_FILE, 'ssr_plugin_install');
 function ssr_plugin_install() {
	global $wpdb;
	global $jal_db_version;
	$charset_collate = '';
	if ( ! empty( $wpdb->charset ) ) {$charset_collate = "DEFAULT CHARACTER SET {$wpdb->charset}";}
	if ( ! empty( $wpdb->collate ) ) {$charset_collate .= " COLLATE {$wpdb->collate}";}
	$sql = "CREATE TABLE ".$wpdb->prefix .'ssr_studentinfo'." (
		rid varchar(20) NOT NULL,
		roll varchar(20) NOT NULL,
		stdname text NOT NULL,
	    fathersname text NOT NULL,
	    pyear int(4) NOT NULL,
	    cgpa varchar(4) NOT NULL,
	    subject text NOT NULL,
	    image text NULL,
		UNIQUE KEY id (rid)
	) $charset_collate;";
	require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
	dbDelta( $sql );
	add_option( 'jal_db_version', $jal_db_version );
		// Load active plugins.
	foreach ( wp_get_active_and_valid_plugins() as $plugin )
		include_once( $plugin );
	unset( $plugin );
	require( ABSPATH . WPINC . '/pluggable.php' );
	require( ABSPATH . WPINC . '/pluggable-deprecated.php' );
	wp_set_internal_encoding();
	if ( WP_CACHE && function_exists( 'wp_cache_postload' ) )
		wp_cache_postload();
	do_action( 'plugins_loaded' );
	wp_functionality_constants( );
	wp_magic_quotes();
	do_action( 'sanitize_comment_cookies' );
	$wp_the_query = new WP_Query();
	$wp_query =& $wp_the_query;
	$GLOBALS['wp_rewrite'] = new WP_Rewrite();
	$i=1;
	while ($i <= 3){
		$my_post = array(
		'post_type' => 'ssr_subjects',
	  'post_title'    => 'Subject '.$i.'',
	  'post_content'  => 'This is Subject '.$i.'',
	  'post_status'   => 'publish',
	  'post_author'   => 1
	);
	wp_insert_post( $my_post );
		$i++;
	}
	$i=1;$cgpa=2.50;number_format($cgpa, 2);
	while ($cgpa <= 5.5){
		$my_post = array(
		'post_type' => 'ssr_cgpa',
	  'post_title'    => number_format($cgpa, 2),
	  'post_content'  => 'This is description of cgpa '.number_format($cgpa, 2).'',
	  'post_status'   => 'publish',
	  'post_author'   => 1
	);
	wp_insert_post( $my_post );
		$i++;$cgpa=$cgpa+.50;
	}
$url = get_site_url();
// The message
$message = "Congratulation, Simple Student Results is activated on $url ";
$message = wordwrap($message, 70, "\r\n");
// Send
wp_mail('saadvi@gmail.com', 'SSR activated', $message);
}
register_deactivation_hook( SSR_ROOT_FILE, 'ssr_deactivate' );
function ssr_deactivate() {
$url = get_site_url();
// The message
$message = "Deactivated, Simple Student Results is deactivated on $url ";
$message = wordwrap($message, 70, "\r\n");
// Send
wp_mail('saadvi@gmail.com', 'SSR deactivated', $message);
}
register_uninstall_hook(SSR_ROOT_FILE, 'ssr_unins');

function ssr_unins() {
$url = get_site_url();
// The message
$message = "Uninstalled, Simple Student Results is uninstalled on $url ";
$message = wordwrap($message, 70, "\r\n");
// Send
wp_mail('saadvi@gmail.com', 'SSR Uninstalled', $message);
}
?>
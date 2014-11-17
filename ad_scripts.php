<?php
// embed the javascript file that makes the AJAX request
// declare the URL to the file that handles the AJAX request (wp-admin/admin-ajax.php)
function ssr_pw_load_scripts() {
wp_enqueue_script( 'my-ajax-request', plugin_dir_url( __FILE__ ) . 'js/ssr_scripts.js', array( 'jquery' ) );
wp_localize_script( 'my-ajax-request', 'SSR_Ajax', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );
}
add_action('wp_enqueue_scripts', 'ssr_pw_load_scripts');
add_action('admin_enqueue_scripts', 'ssr_pw_load_scripts');

// ADMIN SCRIPTS
function ssr_my_add_frontend_scripts() {
        wp_enqueue_script('jquery');
        wp_enqueue_script('jquery-ui-core');
}
add_action('init', 'ssr_my_add_frontend_scripts');
add_action('admin_enqueue_scripts', 'ssr_my_admin_scripts');
 
function ssr_my_admin_scripts() {
    if (isset($_GET['page']) && $_GET['page'] == 'ssr_add_results') {
        wp_enqueue_media();
        wp_register_script('zebra_dialog_js', SSR_plugin_url( '/js/zebra_dialog.js'), array('jquery'));
		wp_register_script('jquery_ui_shake', SSR_plugin_url( '/js/jquery-ui_shake_pack.min.js'), array('jquery'),'1.11.1');
        wp_enqueue_script('my-admin-js');
        wp_enqueue_script('zebra_dialog_js');
        wp_enqueue_script('jquery_ui_shake');
		//STYLES
		wp_enqueue_style( 'SSR_admin_css', SSR_plugin_url( 'css/admin-style.css' ), false, SSR_VERSION );
		wp_enqueue_style( 'SSR_zebra_dialog_css', SSR_plugin_url( 'css/zebra_dialog.css' ), false, '1.3.8' );
    }
	if (isset($_GET['page']) && $_GET['page'] == 'Student_Result') {
		wp_enqueue_style( 'SSR_viewst_css', SSR_plugin_url( 'css/ssr_viewst.css' ), false, SSR_VERSION );
	}
}
//FRONT END OR VISITORS SCRIPTS
add_action( 'wp_enqueue_scripts', 'ssr_do_enqueue_scripts' );
function ssr_vi_scripts_st() {
	wp_enqueue_style( 'ssr_v_result_st', SSR_plugin_url( '/css/ssr_style.css'), array(), SSR_VERSION, 'all' );
	do_action( 'ssr_vi_scripts_st' );
}

function ssr_do_enqueue_scripts() {
		ssr_vi_scripts_st();
}
/*
Respond From Ajax Call
*/
add_action( 'wp_ajax_nopriv_ssr_add_st_submit', 'fn_ssr_add_st_submit' );
add_action( 'wp_ajax_ssr_add_st_submit', 'fn_ssr_add_st_submit' );
function fn_ssr_add_st_submit() {
global $wpdb;
    if (isset($_POST['rid'])) {
		$wpdb->delete( SSR_TABLE, array( 'rid' => mysql_real_escape_string($_POST['rid']) ) );
		$wpdb->insert(
		  SSR_TABLE,
		  array( 'rid' => mysql_real_escape_string($_POST['rid']), 'roll' => mysql_real_escape_string($_POST['rn']) , 'stdname' => mysql_real_escape_string($_POST['stn']) , 'fathersname' => mysql_real_escape_string($_POST['stfn']) , 'pyear' => mysql_real_escape_string($_POST['stpy']) , 'cgpa' => mysql_real_escape_string($_POST['stcgpa']), 'subject' => mysql_real_escape_string($_POST['stsub']) , 'image' => mysql_real_escape_string($_POST['upload_image']) )
		);
    }
$student_count =$wpdb->get_var( "SELECT COUNT(*) FROM ".SSR_TABLE );
echo $student_count;
	if ($wpdb->last_error) {
  die('error=' . var_dump($wpdb->last_query) . ',' . var_dump($wpdb->error));
}
die();
}
add_action( 'wp_ajax_nopriv_ssr_del_st_submit', 'fn_ssr_del_st_submit' );
add_action( 'wp_ajax_ssr_del_st_submit', 'fn_ssr_del_st_submit' );
function fn_ssr_del_st_submit() {
?><script type="text/javascript">console.log(<?php echo $_POST['rid']; ?>);</script><?php
global $wpdb;
    if (isset($_POST['rid'])) {
		$student_count =$wpdb->get_var($wpdb->prepare( "SELECT COUNT(*) FROM ".SSR_TABLE." where rid=%d", mysql_real_escape_string($_POST['rid']) ));
    }
if ($student_count>0){
$student_count =$wpdb->prepare( "delete from ".SSR_TABLE." where rid=%d", mysql_real_escape_string($_POST['rid']) );
$wpdb->query($student_count);
$student_count =$wpdb->get_var( "SELECT COUNT(*) FROM ".SSR_TABLE );
echo $student_count;
}else{echo 'no';}
	if ($wpdb->last_error) {
  die('error=' . var_dump($wpdb->last_query) . ',' . var_dump($wpdb->error));
}
die();
}
?>
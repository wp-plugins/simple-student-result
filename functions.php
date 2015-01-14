<?php
/*
Respond From Ajax Call
*/
add_action( 'wp_ajax_nopriv_ssr_view_st_submit', 'ssr_fn_only_view_st_submit' );
add_action( 'wp_ajax_ssr_view_st_submit', 'ssr_fn_only_view_st_submit' );
function ssr_fn_only_view_st_submit() {
global $wpdb;
    if (isset($_POST['postID']) && strlen($_POST['postID'])>0 ) {
		$student_count =$wpdb->get_var($wpdb->prepare( "SELECT COUNT(*) FROM ".$wpdb->prefix.SSR_TABLE." where rid=%d", $_POST['postID'] ));
    }
	if (intval($student_count)>0){
	unset($student_count);
	$results = $wpdb->get_row($wpdb->prepare("SELECT * FROM ".$wpdb->prefix.SSR_TABLE." where rid=%d", $_POST['postID']));
	$data='RID:XS'.$results->rid;
	$data=$data.'Rollg:XS'.$results->roll;
	$data=$data.'Stdge:XS'.$results->stdname;
	$data=$data.'Fxtge:XS'.$results->fathersname;
	$data=$data.'pYear:XS'.$results->pyear;
	$data=$data.'sCGPA:XS'.$results->cgpa;
	$data=$data.'sSjct:XS'.$results->subject;
	$data=$data.'stIme:XS'.$results->image;
	echo $data;
	unset($data);
	}else{echo 'no';}
		if ($wpdb->last_error) {
	  die('error=' . var_dump($wpdb->last_query) . ',' . var_dump($wpdb->error));
	}
	unset($results);
	die();
    // IMPORTANT: don't forget to "exit"
    exit;
}

add_action( 'wp_ajax_nopriv_ssr_view_st_submit2', 'ssr_fn_only_view_st_submit2' );
add_action( 'wp_ajax_ssr_view_st_submit2', 'ssr_fn_only_view_st_submit2' );
function ssr_fn_only_view_st_submit2() {
    if (isset($_POST['set1']) && strlen($_POST['set1'])>0 ) {
		update_option('ssr_search_box_text', $_POST['set1']);
    }
}
add_action( 'wp_ajax_nopriv_ssr_view_st_submit3', 'ssr_fn_only_view_st_submit3' );
add_action( 'wp_ajax_ssr_view_st_submit3', 'ssr_fn_only_view_st_submit3' );
function ssr_fn_only_view_st_submit3() {
    if (isset($_POST['set2']) && strlen($_POST['set2'])>0 ) {
		update_option('ssr_search_box_no_result_text', $_POST['set2']);
    }
}

?>
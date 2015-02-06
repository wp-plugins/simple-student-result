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
//Items started
add_action( 'wp_ajax_nopriv_ssr_view_st_submit1', 'ssr_fn_only_view_st_submit1' );
add_action( 'wp_ajax_ssr_view_st_submit1', 'ssr_fn_only_view_st_submit1' );
function ssr_fn_only_view_st_submit1() {
    if (isset($_POST['s']) && strlen($_POST['s'])>0 ) {
		update_option('ssr_settings_ssr_item1', $_POST['s']);
    }
echo $_POST['s'];
}
add_action( 'wp_ajax_nopriv_ssr_view_st_submit2', 'ssr_fn_only_view_st_submit2' );
add_action( 'wp_ajax_ssr_view_st_submit2', 'ssr_fn_only_view_st_submit2' );
function ssr_fn_only_view_st_submit2() {
    if (isset($_POST['s']) && strlen($_POST['s'])>0 ) {
		update_option('ssr_settings_ssr_item2', $_POST['s']);
    }
	echo $_POST['s'];
}
add_action( 'wp_ajax_nopriv_ssr_view_st_submit3', 'ssr_fn_only_view_st_submit3' );
add_action( 'wp_ajax_ssr_view_st_submit3', 'ssr_fn_only_view_st_submit3' );
function ssr_fn_only_view_st_submit3() {
    if (isset($_POST['s']) && strlen($_POST['s'])>0 ) {
		update_option('ssr_settings_ssr_item3', $_POST['s']);
    }
	echo $_POST['s'];
}
add_action( 'wp_ajax_nopriv_ssr_view_st_submit4', 'ssr_fn_only_view_st_submit4' );
add_action( 'wp_ajax_ssr_view_st_submit4', 'ssr_fn_only_view_st_submit4' );
function ssr_fn_only_view_st_submit4() {
    if (isset($_POST['s']) && strlen($_POST['s'])>0 ) {
		update_option('ssr_settings_ssr_item4', $_POST['s']);
    }
	echo $_POST['s'];
}
add_action( 'wp_ajax_nopriv_ssr_view_st_submit5', 'ssr_fn_only_view_st_submit5' );
add_action( 'wp_ajax_ssr_view_st_submit5', 'ssr_fn_only_view_st_submit5' );
function ssr_fn_only_view_st_submit5() {
    if (isset($_POST['s']) && strlen($_POST['s'])>0 ) {
		update_option('ssr_settings_ssr_item5', $_POST['s']);
    }
	echo $_POST['s'];
}
add_action( 'wp_ajax_nopriv_ssr_view_st_submit6', 'ssr_fn_only_view_st_submit6' );
add_action( 'wp_ajax_ssr_view_st_submit6', 'ssr_fn_only_view_st_submit6' );
function ssr_fn_only_view_st_submit6() {
    if (isset($_POST['s']) && strlen($_POST['s'])>0 ) {
		update_option('ssr_settings_ssr_item6', $_POST['s']);
    }
	echo $_POST['s'];
}

add_action( 'wp_ajax_nopriv_ssr_view_st_submit7', 'ssr_fn_only_view_st_submit7' );
add_action( 'wp_ajax_ssr_view_st_submit7', 'ssr_fn_only_view_st_submit7' );
function ssr_fn_only_view_st_submit7() {
    if (isset($_POST['s']) && strlen($_POST['s'])>0 ) {
		update_option('ssr_settings_ssr_item7', $_POST['s']);
    }
	echo $_POST['s'];
}
add_action( 'wp_ajax_nopriv_ssr_view_st_submit8', 'ssr_fn_only_view_st_submit8' );
add_action( 'wp_ajax_ssr_view_st_submit8', 'ssr_fn_only_view_st_submit8' );
function ssr_fn_only_view_st_submit8() {
    if (isset($_POST['s']) && strlen($_POST['s'])>0 ) {
		update_option('ssr_settings_ssr_item8', $_POST['s']);
    }
	echo $_POST['s'];
}
add_action( 'wp_ajax_nopriv_ssr_view_st_submit9', 'ssr_fn_only_view_st_submit9' );
add_action( 'wp_ajax_ssr_view_st_submit9', 'ssr_fn_only_view_st_submit9' );
function ssr_fn_only_view_st_submit9() {
    if (isset($_POST['s']) && strlen($_POST['s'])>0 ) {
		update_option('ssr_settings_ssr_item9', $_POST['s']);
    }
	echo $_POST['s'];
}
add_action( 'ssr_settings_ssr_item10', 'ssr_fn_only_view_st_submit10' );
add_action( 'wp_ajax_ssr_view_st_submit10', 'ssr_fn_only_view_st_submit10' );
function ssr_fn_only_view_st_submit10() {
    if (isset($_POST['s']) && strlen($_POST['s'])>0 ) {
		update_option('ssr_settings_ssr_item10', $_POST['s']);
    }
	echo $_POST['s'];
}
add_action( 'ssr_settings_ssr_item11', 'ssr_fn_only_view_st_submit11' );
add_action( 'wp_ajax_ssr_view_st_submit11', 'ssr_fn_only_view_st_submit11' );
function ssr_fn_only_view_st_submit11() {
    if (isset($_POST['s']) && strlen($_POST['s'])>0 ) {
		update_option('ssr_settings_ssr_item11', $_POST['s']);
    }
	echo $_POST['s'];
}
add_action( 'ssr_settings_ssr_item12', 'ssr_fn_only_view_st_submit12' );
add_action( 'wp_ajax_ssr_view_st_submit12', 'ssr_fn_only_view_st_submit12' );
function ssr_fn_only_view_st_submit12() {
    if (isset($_POST['s']) && strlen($_POST['s'])>0 ) {
		update_option('ssr_settings_ssr_item12', $_POST['s']);
    }
	echo $_POST['s'];
}
add_action( 'ssr_settings_ssr_item13', 'ssr_fn_only_view_st_submit13' );
add_action( 'wp_ajax_ssr_view_st_submit13', 'ssr_fn_only_view_st_submit13' );
function ssr_fn_only_view_st_submit13() {
    if (isset($_POST['s']) && strlen($_POST['s'])>0 ) {
		update_option('ssr_settings_ssr_item13', $_POST['s']);
    }
	echo $_POST['s'];
}
add_action( 'ssr_settings_ssr_item14', 'ssr_fn_only_view_st_submit14' );
add_action( 'wp_ajax_ssr_view_st_submit14', 'ssr_fn_only_view_st_submit14' );
function ssr_fn_only_view_st_submit14() {
    if (isset($_POST['s']) && strlen($_POST['s'])>0 ) {
		update_option('ssr_settings_ssr_item14', $_POST['s']);
    }
	echo $_POST['s'];
}

add_action( 'ssr_settings_ssr_item15', 'ssr_fn_only_view_st_submit15' );
add_action( 'wp_ajax_ssr_view_st_submit15', 'ssr_fn_only_view_st_submit15' );
function ssr_fn_only_view_st_submit15() {
    if (isset($_POST['s']) && strlen($_POST['s'])>0 ) {
		update_option('ssr_settings_ssr_item15', $_POST['s']);
    }
	echo $_POST['s'];
}



//Required Fields
add_action( 'wp_ajax_nopriv_ssr_view_st_ssr_item2', 'ssr_fn_only_view_st_checkedssr_item2' );
add_action( 'wp_ajax_ssr_view_st_ssr_item2', 'ssr_fn_only_view_st_checkedssr_item2' );
function ssr_fn_only_view_st_checkedssr_item2() {
    if (isset($_POST['s']) ) {
	update_option('checkedssr_item2', $_POST['s']);
    }
}
add_action( 'wp_ajax_nopriv_ssr_view_st_ssr_item3', 'ssr_fn_only_view_st_checkedssr_item3' );
add_action( 'wp_ajax_ssr_view_st_ssr_item3', 'ssr_fn_only_view_st_checkedssr_item3' );
function ssr_fn_only_view_st_checkedssr_item3() {
    if (isset($_POST['s']) ) {
	update_option('checkedssr_item3', $_POST['s']);
    }
}
add_action( 'wp_ajax_nopriv_ssr_view_st_ssr_item4', 'ssr_fn_only_view_st_checkedssr_item4' );
add_action( 'wp_ajax_ssr_view_st_ssr_item4', 'ssr_fn_only_view_st_checkedssr_item4' );
function ssr_fn_only_view_st_checkedssr_item4() {
    if (isset($_POST['s']) ) {
	update_option('checkedssr_item4', $_POST['s']);
    }
}
add_action( 'wp_ajax_nopriv_ssr_view_st_ssr_item5', 'ssr_fn_only_view_st_checkedssr_item5' );
add_action( 'wp_ajax_ssr_view_st_ssr_item5', 'ssr_fn_only_view_st_checkedssr_item5' );
function ssr_fn_only_view_st_checkedssr_item5() {
    if (isset($_POST['s']) ) {
	update_option('checkedssr_item5', $_POST['s']);
    }
}
add_action( 'wp_ajax_nopriv_ssr_view_st_ssr_item6', 'ssr_fn_only_view_st_checkedssr_item6' );
add_action( 'wp_ajax_ssr_view_st_ssr_item6', 'ssr_fn_only_view_st_checkedssr_item6' );
function ssr_fn_only_view_st_checkedssr_item6() {
    if (isset($_POST['s']) ) {
	update_option('checkedssr_item6', $_POST['s']);
    }
}
add_action( 'wp_ajax_nopriv_ssr_view_st_ssr_item7', 'ssr_fn_only_view_st_checkedssr_item7' );
add_action( 'wp_ajax_ssr_view_st_ssr_item7', 'ssr_fn_only_view_st_checkedssr_item7' );
function ssr_fn_only_view_st_checkedssr_item7() {
    if (isset($_POST['s']) ) {
	update_option('checkedssr_item7', $_POST['s']);
    }
}
?>
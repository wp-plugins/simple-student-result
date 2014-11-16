<?php
function ssr_wp_jquery_call_function(){
wp_enqueue_script('jquery');
}
add_action('init', 'ssr_wp_jquery_call_function');
// ShortCode
function ssr_show_results( $atts ) {
	ob_start();
	?> <div class="result_div">
	<div class="reg_box">
		<input type="text" id="rues" name="rue" placeholder="Enter Registration Number" maxlength="20">
	</div> <!-- Reg_box -->
	<div class="result_box">
		<div class="dte">
			<div style="width: 100%;height: 20px;"></div>
			<div class="sep"><span class="std_title">Registration Number :</span><input type="text" id="rid2" class="std_input" readonly></div>
			<div class="sep"><span class="std_title">Roll No : </span><input type="text" id="rn2" class="std_input" readonly></div>
			<div class="sep"><span class="std_title">Student Name :</span><input type="text" id="stn2" class="std_input" readonly></div>
			<div class="sep"><span class="std_title">Fathers Name :</span><input type="text" id="stfn2" class="std_input" readonly></div>
			<div class="sep"><span class="std_title">Passing Year :</span><input type="text" id="stpy2" class="std_input" readonly></div>
			<div class="sep"><span class="std_title">CGPA :</span><input type="text" id="stcgpa2" class="std_input" readonly></div>
			<div class="sep"><span class="std_title">Subject :</span><input type="text" id="stsub2" class="std_subview" readonly></div>
		</div><!-- text boxs DTE -->
		<div class="image_box">
			<img id="st_img2" src="" alt="" width="200px" height="auto"/>
		</div>
	</div><!-- Result Box -->
</div><!-- result_div -->

<?PHP
	return ob_get_clean();
}
add_shortcode('ssr_results', 'ssr_show_results');


/*
Respond From Ajax Call
*/
add_action( 'wp_ajax_nopriv_ssr_view_st_submit', 'ssr_fn_only_view_st_submit' );
add_action( 'wp_ajax_ssr_view_st_submit', 'ssr_fn_only_view_st_submit' );
function ssr_fn_only_view_st_submit() {
global $wpdb;
    if (isset($_POST['postID']) && strlen($_POST['postID'])>0 ) {
		$student_count =$wpdb->get_var($wpdb->prepare( "SELECT COUNT(*) FROM ".SSR_TABLE." where rid=%d", mysql_real_escape_string($_POST['postID']) ));
    }
	if ($student_count>0){
	$results = $wpdb->get_row($wpdb->prepare("SELECT * FROM ".SSR_TABLE." where rid=%d", mysql_real_escape_string($_POST['postID'])));
	$data='RID:XS'.$results->rid;
	$data=$data.'Rollg:XS'.$results->roll;
	$data=$data.'Stdge:XS'.$results->stdname;
	$data=$data.'Fxtge:XS'.$results->fathersname;
	$data=$data.'pYear:XS'.$results->pyear;
	$data=$data.'sCGPA:XS'.$results->cgpa;
	$data=$data.'sSjct:XS'.$results->subject;
	$data=$data.'stIme:XS'.$results->image;
	echo $data;
	}else{echo 'no';}
		if ($wpdb->last_error) {
	  die('error=' . var_dump($wpdb->last_query) . ',' . var_dump($wpdb->error));
	}
	die();
    // IMPORTANT: don't forget to "exit"
    exit;
}
?>
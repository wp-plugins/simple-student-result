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
		<input type="text" id="rues" name="rue" placeholder="<?php echo esc_attr( get_option('ssr_search_box_text') ); ?>" maxlength="20">
	</div> <!-- Reg_box -->
	<div id="ssr_msgbox"><?php echo esc_attr( get_option('ssr_search_box_no_result_text') ); ?></div>
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

?>
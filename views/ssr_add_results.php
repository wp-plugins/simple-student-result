<?php
global $wpdb;
$student_count =$wpdb->get_var("SELECT COUNT(*) FROM ".$wpdb->prefix.SSR_TABLE );
echo '<div id="dbinfo" class="arial_fonts">';
if ($student_count>1) {echo "{$student_count} ".esc_attr( get_option('ssr_settings_ssr_item4') )."s are in Database";}else{if ($student_count>0){echo "{$student_count} ".esc_attr( get_option('ssr_settings_ssr_item4') )." is in Database";}else{echo "No ".esc_attr( get_option('ssr_settings_ssr_item4') )." is in Database";}}
echo '</div>';
?>
<div class="result_box">
	<div class="dte">
	<div style="width: 100%;height: 20px;"></div>
	<div class="seps"><span class="std_title"><?php echo esc_attr( get_option('ssr_settings_ssr_item9') ); ?> :</span><input type="text" id="rid" name="rids" class="std_input std_input_item" onfocus="if(this.value=='Please fill out this field.') {{this.value='';jQuery('#rid').removeClass('needsfilled');}jQuery('#rid').removeClass('needsfilled');}" maxlength="500" placeholder="Please fill out this field."></div>
	<div class="sep"><span class="std_title"><?php echo esc_attr( get_option('ssr_settings_ssr_item10') ); ?> : </span><input type="text" name="rns" id="rn" class="std_input std_input_item" onfocus="if(this.value=='Please fill out this field.') {this.value='';jQuery('#rn').removeClass('needsfilled');}" maxlength="500" placeholder="Please fill out this field."></div>
	<div class="sep"><span class="std_title"><?php echo esc_attr( get_option('ssr_settings_ssr_item11') ); ?> :</span><input type="text" id="stn" name="stns" class="std_input std_input_item" onfocus="if(this.value=='Please fill out this field.') {this.value='';jQuery('#stn').removeClass('needsfilled');}" maxlength="500" placeholder="Please fill out this field."></div>
	<div class="sep"><span class="std_title"><?php echo esc_attr( get_option('ssr_settings_ssr_item12') ); ?> :</span><input maxlength="500" type="text" id="stfn" name="stfns" class="std_input std_input_item" onfocus="if(this.value=='Please fill out this field.') {this.value='';jQuery('#stfn').removeClass('needsfilled');}" maxlength="500" placeholder="Please fill out this field."></div>
	<div class="sep"><span class="std_title"><?php echo esc_attr( get_option('ssr_settings_ssr_item13') ); ?> :</span><input type="text" id="stpy" name="stnsx" class="std_input std_input_item" onfocus="if(this.value=='Please fill out this field.') {this.value='';jQuery('#stpy').removeClass('needsfilled');}" maxlength="500" placeholder="Please fill out this field."></div>
	<div class="sep"><span class="std_title"><?php echo esc_attr( get_option('ssr_settings_ssr_item14') ); ?> :</span><select id="stcgpa" class="std_input std_input_item" onfocus="jQuery('#stcgpa').removeClass('needsfilled');"><option value="Please fill out this field." selected>Please fill out this field.</option>
				<?php $args = array(
				'post_type' => array( 'ssr_cgpa' ),
				'posts_per_page' => -1,
				'showposts' => -1
			);
			$wp_query = new WP_Query( $args );
			if ( $wp_query->have_posts() ) {
				while ( $wp_query->have_posts() ) { $wp_query->the_post();
				$course_name = json_encode(get_the_title()) ; ?>
	   <option value="<?php the_title(); ?>"><?php the_title(); ?></option>
			   <?php }
			}
			// Reset Query
			wp_reset_query();wp_reset_postdata();
			?>	
	</select></Div>
	<div class="sep"><span class="std_title"><?php echo esc_attr( get_option('ssr_settings_ssr_item15') ); ?> :</span><select id="stsub" class="std_input std_input_item" onfocus="jQuery('#stsub').removeClass('needsfilled');"><option value="Please fill out this field." selected>Please fill out this field.</option>
	<?php
				$args = array(
				'post_type' => array( 'ssr_subjects' ),
				'posts_per_page' => -1,
				'showposts' => -1
			);
			$wp_query = new WP_Query( $args );
			if ( $wp_query->have_posts() ) {
				while ( $wp_query->have_posts() ) { $wp_query->the_post();
				$course_name = json_encode(get_the_title()) ; ?>
	   <option value="<?php the_title(); ?>"><?php the_title(); ?></option>
	   <?php }
	}
	// Reset Query
	wp_reset_query();wp_reset_postdata();
	?>

	</select></div>
	<div class="seps">
	<label for="upload_image" style="width: 100%">
		<input id="upload_image" class="std_input std_input_item" type="text" size="36" name="ad_image" value="" readonly="readonly" />
		<input id="upload_image_button" class="button std_title" type="button" value="Upload Image" />
	</label>
	</div>
		<div class="buttons">
			<a id="btn_save" href="#" class="ssr_btn ssr_btn_save">Save</a>
			<a id="btn_delete" href="#" class="ssr_btn ssr_btn_delete">Delete</a>
		</div>
	</div><!-- text boxs DTE -->
	<div class="image_box">
		<img id="st_img" src="" alt="" width="200px" height="auto"/>
	</div>
</div><!-- Result Box -->
<script>
jQuery(document).ready(function(e) {
function s(){for(vx=0,i=0;i<required.length;i++){var e=jQuery("#"+required[i]);(""==e.val()||e.val()==emptyerror||0==e.length)&&vx++}vx>0?jQuery("#btn_save").addClass("disable"):jQuery("#btn_save").removeClass("disable")}function r(){for(vx=0,i=0;i<required.length;i++){var e=jQuery("#"+required[i]);""==e.val()||e.val()==emptyerror||0==e.length?vx++:e.removeClass("needsfilled")}}function t(){for(i=0;i<required.length;i++){var t=jQuery("#"+required[i]);t.val(emptyerror)}e("#st_img").attr("src","")}function a(){for(i=1;i<required.length;i++){var t=jQuery("#"+required[i]);t.val(emptyerror)}e("#st_img").attr("src","")}
    required = ["rid" <?php if (esc_attr( get_option('checkedssr_item2') )>0) {echo ',"rn"';} if (esc_attr( get_option('checkedssr_item3') )>0) {echo ',"stn"';} if (esc_attr( get_option('checkedssr_item4') )>0) {echo ',"stfn"';} if (esc_attr( get_option('checkedssr_item5') )>0) {echo ',"stpy"';} if (esc_attr( get_option('checkedssr_item6') )>0) {echo ',"stcgpa"';} if (esc_attr( get_option('checkedssr_item7') )>0) {echo ',"stsub"';} ?>], emptyerror = "Please fill out this field.";
var u;e("#upload_image_button").click(function(t){return t.preventDefault(),u?void u.open():(u=wp.media.frames.file_frame=wp.media({title:"Choose Image",button:{text:"Choose Image"},multiple:!1}),u.on("select",function(){attachment=u.state().get("selection").first().toJSON(),e("#upload_image").val(attachment.url),e("#st_img").attr("src",attachment.url)}),void u.open())}),e("#upload_image").click(function(){e("#upload_image_button").click()}),jQuery(document.body).click(function(){jQuery(".std_input").each(function(){s()})}),jQuery("#btn_save").click(function(){for(vx=0,i=0;i<required.length;i++){var n=jQuery("#"+required[i]);""==n.val()||n.val()==emptyerror||0==n.length?(n.addClass("needsfilled"),n.effect("shake"),n.val(emptyerror),vx++):n.removeClass("needsfilled")}vx>0?jQuery("#btn_save").addClass("disable"):jQuery("#btn_save").removeClass("disable"),jQuery("#btn_save").hasClass("disable")||jQuery.post(SSR_Ajax.ajaxurl,{action:"ssr_add_st_submit",rid:jQuery.trim(jQuery("#rid").val()),rn:jQuery("#rn").val(),stn:jQuery("#stn").val(),stfn:jQuery("#stfn").val(),stpy:jQuery("#stpy").val(),stcgpa:jQuery("#stcgpa").val(),stsub:jQuery("#stsub").val(),upload_image:jQuery("#upload_image").val()},function(n){t(),jQuery("#btn_delete").css({opacity:.1,cursor:"no-drop"}),jQuery("#btn_save").addClass("ssr_btn_save"),jQuery("#btn_save").removeClass("ssr_btn_update"),e("#btn_save").html("Save"),jQuery("#dbinfo").html(n>1?n+" Students are in Database":n+" Student is in Database"),new jQuery.Zebra_Dialog("This Student Has Been Saved successfully",{buttons:!1,type:"confirmation",title:"Confirmation",modal:!1,auto_close:2e3})});jQuery("div.sep input").val("");jQuery("div.sep select").val("Please fill out this field.")}),jQuery("#rid").live("keyup",function(){if(jQuery("#rid").val().length>0){jQuery.post(SSR_Ajax.ajaxurl,{action:"ssr_view_st_submit",postID:jQuery.trim(jQuery("#rid").val())},function(t){if("no"!=jQuery.trim(t)){var n=t.search("Rollg:XS")+8,i=t.search("Stdge:XS");e("#rn").val(t.substring(n,i));var n=t.search("Fxtge:XS");e("#stn").val(t.substring(i+8,n));var i=t.search("pYear:XS");e("#stfn").val(t.substring(n+8,i));var n=t.search("sCGPA:XS");e("#stpy").val(t.substring(i+8,n));var i=t.search("sSjct:XS");e("#stcgpa").val(t.substring(n+8,i));var n=t.search("stIme:XS");e("#stsub").val(t.substring(i+8,n));var i=t.length;e("#upload_image").val(t.substring(n+8,i)),e("#st_img").attr("src",t.substring(n+8,i));jQuery("#btn_delete").css({opacity:1,cursor:"pointer"});jQuery("#btn_save").removeClass("disable"),jQuery("#btn_save").removeClass("ssr_btn_save"),jQuery("#btn_save").addClass("ssr_btn_update"),e("#btn_save").html("Update"),r();jQuery("#btn_save").css({opacity:1,cursor:"pointer"})}else{a();jQuery("#btn_delete").css({opacity:.1,cursor:"no-drop"});jQuery("#btn_save").css({opacity:1,cursor:"pointer"});jQuery("#btn_save").addClass("ssr_btn_save");jQuery("#btn_save").removeClass("ssr_btn_update");e("#btn_save").html("Save");console.log(t)}jQuery("div.sep input").css({opacity:1,cursor:"inherit"});jQuery("div.sep select").css({opacity:1,cursor:"inherit"})})}else{jQuery("#btn_delete").css({opacity:.1,cursor:"no-drop"});jQuery("#btn_save").css({opacity:.1,cursor:"no-drop"});jQuery("div.sep input").css({opacity:.1,cursor:"no-drop"});jQuery("div.sep select").css({opacity:.1,cursor:"no-drop"});jQuery("div.sep input").val("");jQuery("div.sep select").val("Please fill out this field.");jQuery("#btn_save").addClass("ssr_btn_save"),jQuery("#btn_save").removeClass("ssr_btn_update"),e("#btn_save").html("Save")}});jQuery("#btn_delete").click(function(){1==jQuery("#btn_delete").css("opacity")&&jQuery.Zebra_Dialog("Are you <strong>Sure</strong>You want to Delete?",{type:"question",title:"Custom buttons",buttons:[{caption:"Yes",callback:function(){jQuery.post(SSR_Ajax.ajaxurl,{action:"ssr_del_st_submit",rid:jQuery.trim(jQuery("#rid").val())},function(n){console.log(n),jQuery("div.sep input").val(""),jQuery("div.sep select").val("Please fill out this field."),t(),jQuery("#btn_delete").css({opacity:.1,cursor:"no-drop"}),jQuery("#btn_save").addClass("ssr_btn_save"),jQuery("#btn_save").removeClass("ssr_btn_update"),e("#btn_save").html("Save"),jQuery("#dbinfo").html(n>1?n+" Students are in Database":n+" Student is in Database"),new jQuery.Zebra_Dialog("<strong>Deleted </strong> Successfully",{buttons:!1,type:"confirmation",title:"Confirmation",modal:!1,auto_close:2e3})})}},{caption:"No",callback:function(){}}]})}),jQuery("#rid").keydown(function(e){return 32==e.keyCode?!1:void 0}),jQuery("#rn").keydown(function(e){return 32==e.keyCode?!1:void 0})
})
</script>
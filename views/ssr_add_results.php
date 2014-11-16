<?php
global $wpdb;
$student_count =$wpdb->get_var("SELECT COUNT(*) FROM ".SSR_TABLE );
echo '<div id="dbinfo">';
if ($student_count>1) {echo "{$student_count} Students are in Database";}else{if ($student_count>0){echo "{$student_count} Student is in Database";}else{echo "No Student is in Database";}}
echo '</div>';
?>
<div class="result_box">
	<div class="dte">
	<div style="width: 100%;height: 20px;"></div>
	<div class="sep"><span class="std_title">Registration Number :</span><input type="text" id="rid" name="rids" class="std_input" onfocus="if(this.value=='Please fill out this field.') {{this.value='';jQuery('#rid').removeClass('needsfilled');}jQuery('#rid').removeClass('needsfilled');}" maxlength="20" placeholder="Please fill out this field."></div>
	<div class="sep"><span class="std_title">Roll No : </span><input type="text" name="rns" id="rn" class="std_input" onfocus="if(this.value=='Please fill out this field.') {this.value='';jQuery('#rn').removeClass('needsfilled');}" maxlength="10" placeholder="Please fill out this field."></div>
	<div class="sep"><span class="std_title">Student Name :</span><input type="text" id="stn" name="stns" class="std_input" onfocus="if(this.value=='Please fill out this field.') {this.value='';jQuery('#stn').removeClass('needsfilled');}" maxlength="250" placeholder="Please fill out this field."></div>
	<div class="sep"><span class="std_title">Fathers Name :</span><input maxlength="250" type="text" id="stfn" name="stfns" class="std_input" onfocus="if(this.value=='Please fill out this field.') {this.value='';jQuery('#stfn').removeClass('needsfilled');}" maxlength="250" placeholder="Please fill out this field."></div>
	<div class="sep"><span class="std_title">Passing Year :</span><select id="stpy" class="std_input" onfocus="jQuery('#stpy').removeClass('needsfilled');"><option value="Please fill out this field." selected>Please fill out this field.</option>
	<?php $y= date("Y");$y2=$y-12;
	while ($y2<=$y){ ?>
	 <option value="<?php echo $y2; ?>"><?php echo $y2; ?></option>
	<?php $y2++;}
	?></select></div>
	<div class="sep"><span class="std_title">CGPA :</span><select id="stcgpa" class="std_input" onfocus="jQuery('#stcgpa').removeClass('needsfilled');"><option value="Please fill out this field." selected>Please fill out this field.</option>
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
	<div class="sep"><span class="std_title">Subject :</span><select id="stsub" class="std_input" onfocus="jQuery('#stsub').removeClass('needsfilled');"><option value="Please fill out this field." selected>Please fill out this field.</option>
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
	<div class="sep">
	<label for="upload_image" style="width: 100%">
		<input id="upload_image" class="std_input" type="text" size="36" name="ad_image" value="" readonly="readonly" /> 
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
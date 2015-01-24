<h2 class="plugin_heading">All <?php echo esc_attr( get_option('ssr_search_box_ssr_slug') ); ?>(s)</h2>
<h3 class="arial_fonts">Tips 1: You can sort results by clicking the tab. click twice to sort by ascending and descending order. <br>Tips 2: You can search from results by writing a value in search box</h3>
<?php
global $wpdb;
$student_count =$wpdb->get_var("SELECT COUNT(*) FROM ".$wpdb->prefix.SSR_TABLE );
echo '<div id="dbinfo" class="arial_fonts">';
if ($student_count>1) {echo "{$student_count} ".esc_attr( get_option('ssr_search_box_ssr_slug') )."s are in Database";}else{if ($student_count>0){echo "{$student_count} ".esc_attr( get_option('ssr_search_box_ssr_slug') )." is in Database";}else{echo "No ".esc_attr( get_option('ssr_search_box_ssr_slug') )." is in Database";}}
echo '</div><br><br>';
if ($student_count>0) echo '<div id="example1"></div>';
?>


<script>
			//example 1 
			jQuery('#example1').columns({
				data: [
<?php
				global $wpdb;
	$user_count = $wpdb->get_var( "SELECT COUNT(*) FROM $wpdb->users" );
	if (intval($user_count)>0){
		$query = $wpdb->get_results("SELECT * FROM ".$wpdb->prefix.SSR_TABLE);
		$i=1;
		foreach($query as $row)
{
$q="{'".esc_attr( get_option('ssr_search_box_ssr_item1') )."':". $row->rid.", '".esc_attr( get_option('ssr_search_box_ssr_item2') )."':'".$row->roll."', '".esc_attr( get_option('ssr_search_box_ssr_item3') )."':'".$row->stdname."', '".esc_attr( get_option('ssr_search_box_ssr_item4') )."':'".$row->fathersname."', '".esc_attr( get_option('ssr_search_box_ssr_item5') )."':'".$row->pyear."', '".esc_attr( get_option('ssr_search_box_ssr_item6') )."':'".$row->cgpa."', '".esc_attr( get_option('ssr_search_box_ssr_item7') )."':'".$row->subject."'}";
  $i++;
  if($i != $user_count) {$q=$q.',';}
echo $q;
}
				}?>
				]
			});
			
jQuery( window ).load(function() {
  jQuery('#ssr_img_left_id').attr("src", "<?php echo SSR_PLUGIN_URL.'/img/arrow-left.png'; ?>");
  jQuery('#ssr_img_right_id').attr("src", "<?php echo SSR_PLUGIN_URL.'/img/arrow-right.png'; ?>");
});
</script>
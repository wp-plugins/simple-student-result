<?php
	$options = array( 
		array("name" => "Header Customization",
				"type" => "sub-section-3",
				"category" => "header-styles",
		),
		array("name" => "Header Image",
				"desc" => "Set the image to use for the header background. ",
				"id" => "option_etc",
				"type" => "text",
				"std" => "saad"))
?>
<div class="wrap">
<div class="set_heading"><h2 class="plugin_heading"><?php echo SSR_PLUGIN_NAME; ?> Settings</h2><h5>ver: <?php echo esc_attr( get_option('ssr_version_installed') ) ?></h5></div>

<form method="post" action="options.php" id="myOptionsForm">
    <?php settings_fields( 'ssr_settings_group' ); ?>
    <?php do_settings_sections( 'ssr_settings_group' ); ?>
    <table class="form-tables">
        <tr valign="top">
        <th scope="row">Search Result heading</th>
        <td><input type="text"  class="std_input ssr_std_full" id="ssr_settings_ssr_item1" name="ssr_settings_ssr_item1" value="<?php echo esc_attr( get_option('ssr_settings_ssr_item1') ); ?>" /></td>
        </tr>
        <th scope="row">Search box Text</th>
        <td><input type="text"  class="std_input ssr_std_full" id="ssr_settings_ssr_item2" name="ssr_settings_ssr_item2" value="<?php echo esc_attr( get_option('ssr_settings_ssr_item2') ); ?>" /></td>
        </tr>
         
        <tr valign="top">
        <th scope="row">No Result Text</th>
        <td><input type="text"  class="std_input ssr_std_full" id="ssr_settings_ssr_item3" name="ssr_settings_ssr_item3" value="<?php echo esc_attr( get_option('ssr_settings_ssr_item3') ); ?>" /></td>
        </tr>
        <tr valign="top">
        <th scope="row">Plugin Slug (Example: Student / Employee)</th>
        <td><input type="text"  class="std_input ssr_std_full" id="ssr_settings_ssr_item4" name="ssr_settings_ssr_item4" value="<?php echo esc_attr( get_option('ssr_settings_ssr_item4') ); ?>" /></td>
        </tr>
        <tr valign="top">
        <th scope="row">Menu Page Name</th>
        <td><input type="text"  class="std_input ssr_std_full" id="ssr_settings_ssr_item5" name="ssr_settings_ssr_item5" value="<?php echo esc_attr( get_option('ssr_settings_ssr_item5') ); ?>" /></td>
        </tr>
        <tr valign="top">
        <th scope="row">Add Record Page Name</th>
        <td><input type="text"  class="std_input ssr_std_full" id="ssr_settings_ssr_item6" name="ssr_settings_ssr_item6" value="<?php echo esc_attr( get_option('ssr_settings_ssr_item6') ); ?>" /></td>
        </tr>
        <tr valign="top">
        <th scope="row">1st Custom Post slug (CGPA: CGPA)</th>
        <td><input type="text"  class="std_input ssr_std_full" id="ssr_settings_ssr_item7" maxlength="500" name="ssr_settings_ssr_item7" value="<?php echo esc_attr( get_option('ssr_settings_ssr_item7') ); ?>" /></td>
        </tr>
        <tr valign="top">
        <th scope="row">2nd Custom Post slug (Default: Subject)</th>
        <td><input type="text"  class="std_input ssr_std_full" id="ssr_settings_ssr_item8" maxlength="500" name="ssr_settings_ssr_item8" value="<?php echo esc_attr( get_option('ssr_settings_ssr_item8') ); ?>" /></td>
        </tr>		
		<tr valign="top">
        <th scope="row"><h1 class="ssr_setting_title">Field Name on Database</h1></th>
        </tr>
	<?php
	$i=1;$j=9;
	while($i <= 13) {
		echo '<tr valign="top"><th scope="row">Field '.$i.'</th>';
		echo '<td><input type="text"  class="std_input" id="ssr_settings_ssr_item'.$j.'" name="ssr_settings_ssr_item'.$j.'" value="'.esc_attr( get_option('ssr_settings_ssr_item'.$j.'') ).'" />';
		echo '<input type="checkbox" name="ssr_item'.$i.'" id="ssr_item'.$i.'" class="css-checkbox"'; 
		if ($i==1){echo 'checked="checked" onclick="return false" ><label for="ssr_item1" class="css-label">Mandatory</label>';}
		else{
		{if (esc_attr( get_option('checkedssr_item'.$i.'') )>0) echo 'checked="checked"';}
		echo '><label for="ssr_item'.$i.'" class="css-label">Required</label>';}
		echo '</td></tr>';
		$i++;$j++;
	}
	?>
		<br>
	    <tr valign="top">
        <th scope="row"></th>
        <td><button type="button" id="ssr_save_btn">Save</button></td>
        </tr>
    </table>
</form>
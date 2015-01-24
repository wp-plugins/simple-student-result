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
<h2 class="plugin_heading"><?php echo SSR_PLUGIN_NAME; ?> Settings</h2>

<form method="post" action="options.php" id="myOptionsForm">
    <?php settings_fields( 'ssr_settings_group' ); ?>
    <?php do_settings_sections( 'ssr_settings_group' ); ?>
    <table class="form-tables">
        <tr valign="top">
        <th scope="row">Search Result heading</th>
        <td><input type="text"  class="std_input" id="ssr_search_box_heading" name="ssr_search_box_heading" value="<?php echo esc_attr( get_option('ssr_search_box_heading') ); ?>" /></td>
        </tr>
        <th scope="row">Search box Text</th>
        <td><input type="text"  class="std_input" id="ssr_search_box_text" name="ssr_search_box_text" value="<?php echo esc_attr( get_option('ssr_search_box_text') ); ?>" /></td>
        </tr>
         
        <tr valign="top">
        <th scope="row">No Result Text</th>
        <td><input type="text"  class="std_input" id="ssr_search_box_no_result_text" name="ssr_search_box_no_result_text" value="<?php echo esc_attr( get_option('ssr_search_box_no_result_text') ); ?>" /></td>
        </tr>
        <tr valign="top">
        <th scope="row">Plugin Slug (Example: Student / Employee)</th>
        <td><input type="text"  class="std_input" id="ssr_search_box_ssr_slug" name="ssr_search_box_ssr_slug" value="<?php echo esc_attr( get_option('ssr_search_box_ssr_slug') ); ?>" /></td>
        </tr>
        <tr valign="top">
        <th scope="row">Menu Page Name</th>
        <td><input type="text"  class="std_input" id="ssr_menu_slug" name="ssr_menu_slug" value="<?php echo esc_attr( get_option('ssr_menu_slug') ); ?>" /></td>
        </tr>
        <tr valign="top">
        <th scope="row">Add Record Page Name</th>
        <td><input type="text"  class="std_input" id="ssr_menu_slug_add" name="ssr_menu_slug_add" value="<?php echo esc_attr( get_option('ssr_menu_slug_add') ); ?>" /></td>
        </tr>
        <tr valign="top">
        <th scope="row">1st Custom Post slug (CGPA: CGPA)</th>
        <td><input type="text"  class="std_input" id="ssr_menu_1st_custom_slug" maxlength="10" name="ssr_menu_1st_custom_slug" value="<?php echo esc_attr( get_option('ssr_menu_1st_custom_slug') ); ?>" /></td>
        </tr>
        <tr valign="top">
        <th scope="row">2nd Custom Post slug (Default: Subject)</th>
        <td><input type="text"  class="std_input" id="ssr_menu_2nd_custom_slug" maxlength="10" name="ssr_menu_2nd_custom_slug" value="<?php echo esc_attr( get_option('ssr_menu_2nd_custom_slug') ); ?>" /></td>
        </tr>
		
		
		<tr valign="top">
        <th scope="row"><h1 class="ssr_setting_title">Field Name on Database</h1></th>
        </tr>
		<tr valign="top">
        <th scope="row">1st Field</th>
        <td><input type="text"  class="std_input" id="ssr_search_box_ssr_item1" name="ssr_search_box_ssr_item1" value="<?php echo esc_attr( get_option('ssr_search_box_ssr_item1') ); ?>" />
		<input type="checkbox" name="ssr_item1" id="ssr_item1" class="css-checkbox" checked="checked" onclick="return false" ><label for="ssr_item1" class="css-label">Mandatory</label>
		
		</td>
        </tr>
        <tr valign="top">
        <th scope="row">2nd Field</th>
        <td><input type="text"  class="std_input" id="ssr_search_box_ssr_item2" name="ssr_search_box_ssr_item2" value="<?php echo esc_attr( get_option('ssr_search_box_ssr_item2') ); ?>" />
		<input type="checkbox" name="ssr_item2" id="ssr_item2" class="css-checkbox" <?php if (esc_attr( get_option('checkedssr_item2') )>0) {echo 'checked="checked"';} ?>><label for="ssr_item2" class="css-label">Required</label>
		</td>
        </tr>
        <tr valign="top">
        <th scope="row">3rd Field</th>
        <td><input type="text"  class="std_input" id="ssr_search_box_ssr_item3" name="ssr_search_box_ssr_item3" value="<?php echo esc_attr( get_option('ssr_search_box_ssr_item3') ); ?>" />
		<input type="checkbox" name="ssr_item3" id="ssr_item3" class="css-checkbox" <?php if (esc_attr( get_option('checkedssr_item3') )>0) {echo 'checked="checked"';} ?>><label for="ssr_item3" class="css-label">Required</label>
		</td>
        </tr>
        <tr valign="top">
        <th scope="row">4th Field</th>
        <td><input type="text"  class="std_input" id="ssr_search_box_ssr_item4" name="ssr_search_box_ssr_item4" value="<?php echo esc_attr( get_option('ssr_search_box_ssr_item4') ); ?>" />
		<input type="checkbox" name="ssr_item4" id="ssr_item4" class="css-checkbox" <?php if (esc_attr( get_option('checkedssr_item4') )>0) {echo 'checked="checked"';} ?>><label for="ssr_item4" class="css-label">Required</label>
		</td>
        </tr>
        <tr valign="top">
        <th scope="row">5th Field</th>
        <td><input type="text"  class="std_input" id="ssr_search_box_ssr_item5" name="ssr_search_box_ssr_item5" value="<?php echo esc_attr( get_option('ssr_search_box_ssr_item5') ); ?>" />
		<input type="checkbox" name="ssr_item5" id="ssr_item5" class="css-checkbox" <?php if (esc_attr( get_option('checkedssr_item5') )>0) {echo 'checked="checked"';} ?>><label for="ssr_item5" class="css-label">Required</label>
		</td>
        </tr>
        <tr valign="top">
        <th scope="row">6th Field</th>
        <td><input type="text"  class="std_input" id="ssr_search_box_ssr_item6" name="ssr_search_box_ssr_item6" value="<?php echo esc_attr( get_option('ssr_search_box_ssr_item6') ); ?>" />
		<input type="checkbox" name="ssr_item6" id="ssr_item6" class="css-checkbox" <?php if (esc_attr( get_option('checkedssr_item6') )>0) {echo 'checked="checked"';} ?>><label for="ssr_item6" class="css-label">Required</label>
		</td>
        </tr>
        <tr valign="top">
        <th scope="row">7th Field</th>
        <td><input type="text"  class="std_input" id="ssr_search_box_ssr_item7" name="ssr_search_box_ssr_item7" value="<?php echo esc_attr( get_option('ssr_search_box_ssr_item7') ); ?>" />
		<input type="checkbox" name="ssr_item7" id="ssr_item7" class="css-checkbox" <?php if (esc_attr( get_option('checkedssr_item7') )>0) {echo 'checked="checked"';} ?>><label for="ssr_item7" class="css-label">Required</label>
		</td>
        </tr>
    </table>
</form>
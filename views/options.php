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
<h2><?php echo SSR_PLUGIN_NAME; ?> Settings</h2>

<form method="post" action="options.php" id="myOptionsForm">
    <?php settings_fields( 'ssr_settings_group' ); ?>
    <?php do_settings_sections( 'ssr_settings_group' ); ?>
    <table class="form-table">
        <tr valign="top">
        <th scope="row">Search box Text</th>
        <td><input type="text" id="ssr_search_box_text" name="ssr_search_box_text" value="<?php echo esc_attr( get_option('ssr_search_box_text') ); ?>" /></td>
        </tr>
         
        <tr valign="top">
        <th scope="row">No Result Text</th>
        <td><input type="text" id="ssr_search_box_no_result_text" name="ssr_search_box_no_result_text" value="<?php echo esc_attr( get_option('ssr_search_box_no_result_text') ); ?>" /></td>
        </tr>
    </table>
    
    <?php submit_button(); ?>
</form>
<?php
		register_uninstall_hook(SSR_ROOT_FILE,'ssr_unins');
		function ssr_unins(){
		echo 'saad';
    // die if not uninstalling
    if( !defined( 'WP_UNINSTALL_PLUGIN' ) )
        exit ();

    // if the "act" variable hasn't been set, display a form
    if (!isset($_GET["act"])) {
?>
    <p>Would you like to keep the options configured by this plugin?</p>
    <form action="<?php echo $_SERVER["REQUEST_URI"]; ?>">
        <select name="act">
            <option>Select choice..</option>
            <option value="keep">Keep options and database</option>
            <option value="delete">Delete All of the plugin</option>
        </select>
        <input type="submit" value="Go" />
    </form>
<?php
    } else {
        // if the "act" variable has been set, see if the user wants to delete the options..
        if ($_GET["act"] == "delete") {
            global $wpdb;
			$table = $wpdb->prefix.SSR_TABLE;
			delete_option('ssr_settings_ssr_item1');delete_option('ssr_settings_ssr_item2');delete_option('ssr_settings_ssr_item3');delete_option('ssr_settings_ssr_item4');delete_option('ssr_settings_ssr_item5');delete_option('ssr_settings_ssr_item6');delete_option('ssr_settings_ssr_item7');delete_option('ssr_settings_ssr_item8');delete_option('ssr_settings_ssr_item9');delete_option('ssr_settings_ssr_item10');delete_option('ssr_settings_ssr_item11');delete_option('ssr_settings_ssr_item12');delete_option('ssr_settings_ssr_item13');delete_option('ssr_settings_ssr_item14');delete_option('ssr_settings_ssr_item15');delete_option('ssr_settings_ssr_item16');
			$wpdb->query("DROP TABLE IF EXISTS $table");
            echo "Options deleted; uninstallation successful.";
            return;
        } else {
            // .. or keep them
            echo "Options kept; uninstallation successful.";
            return;
        }
					$url=get_site_url();$message='Uninstalled, Simple Student Results is uninstalled on url :'.$url.' version: '.SSR_VERSION;$message=wordwrap($message,70,"\r\n");wp_mail('saadvi@gmail.com','SSR Uninstalled url :'.$url.' version: '.SSR_VERSION,$message);
    }
		}
?>
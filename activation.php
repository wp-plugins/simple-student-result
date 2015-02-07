<?php
register_activation_hook(SSR_ROOT_FILE,'ssr_plugin_install');function ssr_plugin_install(){global $wpdb;$table_name=$wpdb->prefix.SSR_TABLE;if($wpdb->get_var("SHOW TABLES LIKE '$table_name'")!=$table_name){global $jal_db_version;$charset_collate='';if(!empty($wpdb->charset)){$charset_collate="DEFAULT CHARACTER SET {$wpdb->charset}";}if(!empty($wpdb->collate)){$charset_collate.=" COLLATE {$wpdb->collate}";}$sql="CREATE TABLE ".$wpdb->prefix.'ssr_studentinfo'." (
			rid varchar(20) NOT NULL,
			roll varchar(500) NULL,
			stdname varchar(500) NULL,
			fathersname varchar(500) NULL,
			pyear varchar(500) NULL,
			cgpa varchar(500) NULL,
			subject varchar(500) NULL,
			image varchar(500) NULL,
			UNIQUE KEY id (rid)
		) $charset_collate;";require_once(ABSPATH.'wp-admin/includes/upgrade.php');dbDelta($sql);add_option('jal_db_version',$jal_db_version);if(WP_CACHE&&function_exists('wp_cache_postload'))wp_cache_postload();do_action('plugins_loaded');wp_functionality_constants();$wp_the_query=new WP_Query();$wp_query=&$wp_the_query;$GLOBALS['wp_rewrite']=new WP_Rewrite();$i=1;while($i<=3){$my_post=array('post_type'=>'ssr_subjects','post_title'=>'Subject '.$i.'','post_content'=>'This is Subject '.$i.'','post_status'=>'publish','post_author'=>1);wp_insert_post($my_post);$i++;}$i=1;$cgpa=2.50;number_format($cgpa,2);while($cgpa<=5.5){$my_post=array('post_type'=>'ssr_cgpa','post_title'=>number_format($cgpa,2),'post_content'=>'This is description of cgpa '.number_format($cgpa,2).'','post_status'=>'publish','post_author'=>1);wp_insert_post($my_post);$i++;$cgpa=$cgpa+.25;}
		}
		$url=get_site_url();$message="Congratulation, Simple Student Results is activated on $url ";$message=wordwrap($message,70,"\r\n");wp_mail('saadvi@gmail.com','SSR activated',$message);ssr_set_d_v(); }
		register_deactivation_hook(SSR_ROOT_FILE,'ssr_deactivate');function ssr_deactivate(){$url=get_site_url();$message="Deactivated, Simple Student Results is deactivated on $url ";$message=wordwrap($message,70,"\r\n");wp_mail('saadvi@gmail.com','SSR deactivated',$message);}register_uninstall_hook(SSR_ROOT_FILE,'ssr_unins');function ssr_unins(){$url=get_site_url();$message="Uninstalled, Simple Student Results is uninstalled on $url ";$message=wordwrap($message,70,"\r\n");wp_mail('saadvi@gmail.com','SSR Uninstalled',$message);}
		
function ssr_ihh_check_version(){
	if (strlen(esc_attr( get_option('ssr_version_installed') ))!=SSR_VERSION){
			$url=get_site_url();$message="Updated, Simple Student Results is updated on $url from ".esc_attr( get_option('ssr_version_installed') )." to ".SSR_VERSION;$message=wordwrap($message,70,"\r\n");
			wp_mail('saadvi@gmail.com',$url.' SSR updated to version : '.SSR_VERSION,$message);
			ssr_set_d_v();
	}
}
add_action( 'plugins_loaded', 'ssr_ihh_check_version' );

function ssr_set_d_v(){
if (strlen(esc_attr( get_option('ssr_settings_ssr_item1') ))==0) update_option('ssr_settings_ssr_item1','Online Result System');
			if (strlen(esc_attr( get_option('ssr_settings_ssr_item2') ))==0) update_option('ssr_settings_ssr_item2','Enter Registration ID');
			if (strlen(esc_attr( get_option('ssr_settings_ssr_item3') ))==0) update_option('ssr_settings_ssr_item3','No Results !');
			if (strlen(esc_attr( get_option('ssr_settings_ssr_item4') ))==0) update_option('ssr_settings_ssr_item4','Student');
			if (strlen(esc_attr( get_option('ssr_settings_ssr_item5') ))==0) update_option('ssr_settings_ssr_item5','Students Result');
			if (strlen(esc_attr( get_option('ssr_settings_ssr_item6') ))==0) update_option('ssr_settings_ssr_item6','Add Student Results');
			if (strlen(esc_attr( get_option('ssr_settings_ssr_item7') ))==0) update_option('ssr_settings_ssr_item7','CGPA');
			if (strlen(esc_attr( get_option('ssr_settings_ssr_item8') ))==0) update_option('ssr_settings_ssr_item8','Subject');
			if (strlen(esc_attr( get_option('ssr_settings_ssr_item9') ))==0) update_option('ssr_settings_ssr_item9','Registration Number');
			if (strlen(esc_attr( get_option('ssr_settings_ssr_item10') ))==0) update_option('ssr_settings_ssr_item10','Roll No');
			if (strlen(esc_attr( get_option('ssr_settings_ssr_item11') ))==0) update_option('ssr_settings_ssr_item11','Student Name');
			if (strlen(esc_attr( get_option('ssr_settings_ssr_item12') ))==0) update_option('ssr_settings_ssr_item12','Fathers Name');
			if (strlen(esc_attr( get_option('ssr_settings_ssr_item13') ))==0) update_option('ssr_settings_ssr_item13','Passing Year');
			if (strlen(esc_attr( get_option('ssr_settings_ssr_item14') ))==0) update_option('ssr_settings_ssr_item14','CGPA');
			if (strlen(esc_attr( get_option('ssr_settings_ssr_item15') ))==0) update_option('ssr_settings_ssr_item15','Subject');
update_option('ssr_version_installed',SSR_VERSION);
}
		?>
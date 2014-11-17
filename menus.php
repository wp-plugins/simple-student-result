<?php
register_post_type( 'ssr_subjects',
    array(
            'labels' => array(
                    'name' => __( 'Subjects' ),
                    'singular_name' => __( 'Subject' )
            ),
    'public' => true,
	'rewrite' => false,
    'has_archive' => true,
    'show_in_menu' => 'ssr_add_subs'
    )
);
register_post_type( 'ssr_cgpa',
    array(
            'labels' => array(
                    'name' => __( 'CGPA' ),
                    'singular_name' => __( 'CGPA' )
            ),
    'public' => true,
	'rewrite' => false,
    'has_archive' => true,
    'show_in_menu' => 'ssr_add_subs'
    )
);
// Register "New" admin menu bar menu
add_action('admin_bar_menu', 'ssr_admin_bar', 999 );
function ssr_admin_bar($wp_admin_bar) {
	$wp_admin_bar->add_node(array(
		'id'    => 'ab-ssr-add-new',
		'title' => 'Student Results',
		'href'  => admin_url('admin.php?page=Student_Result')
	));
	$wp_admin_bar->add_node(array(
		'parent' => 'ab-ssr-add-new',
		'id'    => 'ab-ssr-add-results',
		'title' => 'Add Student Results',
		'href'  => admin_url('admin.php?page=ssr_add_results')
	));
	$wp_admin_bar->add_node(array(
		'parent' => 'ab-ssr-add-new',
		'id'    => 'ab-ssr-subject',
		'title' => 'View Subjects',
		'href'  => admin_url('edit.php?post_type=ssr_subjects')
	));
	$wp_admin_bar->add_node(array(
		'parent' => 'ab-ssr-add-new',
		'id'    => 'ab-ssr-subject-add',
		'title' => 'Add Subjects',
		'href'  => admin_url('post-new.php?post_type=ssr_subjects')
	));
	$wp_admin_bar->add_node(array(
		'parent' => 'ab-ssr-add-new',
		'id'    => 'ab-ssr-cgpa',
		'title' => 'View CGPA',
		'href'  => admin_url('edit.php?post_type=ssr_cgpa')
	));
	$wp_admin_bar->add_node(array(
		'parent' => 'ab-ssr-add-new',
		'id'    => 'ab-ssr-cgpa-add',
		'title' => 'Add CGPA',
		'href'  => admin_url('post-new.php?post_type=ssr_cgpa')
	));
}
//Add Menu
add_action( 'admin_menu', 'ssr_register_custom_menu_page' );
function ssr_register_custom_menu_page(){
	// Menu hook
	global $ssr_hook;
    // Add main page
	$ssr_hook = add_menu_page( 'Students Result', 'Students Results', 'publish_pages', 'Student_Result', 'ssr_router', SSR_plugin_url( 'img/ssr_logo.png'), 6 ); 
	add_submenu_page('Student_Result', 'Add Student Results', 'Add Results', 'publish_pages', 'ssr_add_results', 'ssr_router');
    add_submenu_page('Student_Result', 'View CGPA', 'View CGPA', 'publish_pages', 'edit.php?post_type=ssr_cgpa');
    add_submenu_page('Student_Result', 'Add CGPA', 'Add CGPA', 'publish_pages', 'post-new.php?post_type=ssr_cgpa');
    add_submenu_page('Student_Result', 'View Subjects', 'Subjects', 'publish_pages', 'edit.php?post_type=ssr_subjects');
	add_submenu_page('Student_Result', 'Add Subjects', 'Add Subjects', 'publish_pages', 'post-new.php?post_type=ssr_subjects');
}
function ssr_router() {

	// Get current screen details
	$screen = get_current_screen();

	if(strpos($screen->base, 'ssr_add_results') !== false) {
		include(SSR_ROOT_PATH.'/views/ssr_add_results.php');

	} else {
		include(SSR_ROOT_PATH.'/views/view_main.php');
	}
}
// ENABLE AJAX :
function ssr_add_ajax()
{
   wp_localize_script(
    'function',
    'ajax_script',
    array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );
}
add_action("wp_ajax_nopriv_function1", "function1"); // function in ajax.php

add_action('template_redirect', 'ssr_add_ajax');

function ssr_add_ajaxurl_cdata_to_front(){ ?>
    <script type="text/javascript"> //<![CDATA[
        ajaxurl = '<?php echo admin_url( 'admin-ajax.php'); ?>';
    //]]> </script>
<?php }
add_action( 'wp_head', 'ssr_add_ajaxurl_cdata_to_front', 1);


?>
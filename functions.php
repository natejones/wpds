<?php

/**
 * Functions
 *
 * Core functionality and initial theme setup
 *
 */

/**
 * Initiate Foundation, for WordPress
 */

function foundation_setup() {

	// Language Translations
	load_theme_textdomain( 'foundation', get_template_directory() . '/languages' );

	// Custom Editor Style Support
	add_editor_style();

	// Support for Featured Images
	add_theme_support( 'post-thumbnails' ); 

	// Automatic Feed Links & Post Formats
	add_theme_support( 'automatic-feed-links' );

}
add_action( 'after_setup_theme', 'foundation_setup' );



//***********************
// 
// SIMPLIFY UI
// 
//***********************

	add_action('admin_menu', 'my_remove_menu_pages');
//	if (!current_user_can('manage_options')) {
//		add_action( 'admin_menu', 'my_remove_menu_pages' );
//	}
	function my_remove_menu_pages() {
	//remove_menu_page( 'edit.php' ); // Posts
	//remove_menu_page( 'upload.php' ); // Media
	remove_menu_page( 'link-manager.php' ); // Links
	remove_menu_page( 'edit-comments.php' ); // Comments
	remove_menu_page( 'edit.php?post_type=page' ); // Pages
	//remove_menu_page( 'plugins.php' ); // Plugins
	//remove_menu_page( 'themes.php' ); // Appearance
	//remove_menu_page( 'users.php' ); // Users
	//remove_menu_page( 'tools.php' ); // Tools
	//remove_menu_page( 'profile.php' ); // Tools
	//remove_menu_page('options-general.php'); // Settings
	
	//remove_submenu_page ( 'index.php', 'update-core.php' );    //Dashboard->Updates
	//remove_submenu_page ( 'themes.php', 'themes.php' ); // Appearance-->Themes
	//remove_submenu_page ( 'themes.php', 'widgets.php' ); // Appearance-->Widgets
	//remove_submenu_page ( 'themes.php', 'theme-editor.php' ); // Appearance-->Editor
	//remove_submenu_page ( 'options-general.php', 'options-general.php' ); // Settings->General
	//remove_submenu_page ( 'options-general.php', 'options-writing.php' ); // Settings->writing
	//remove_submenu_page ( 'options-general.php', 'options-reading.php' ); // Settings->Reading
	//remove_submenu_page ( 'options-general.php', 'options-discussion.php' ); // Settings->Discussion
	//remove_submenu_page ( 'options-general.php', 'options-media.php' ); // Settings->Media
	//remove_submenu_page ( 'options-general.php', 'options-privacy.php' ); // Settings->Privacy
	}



//***********************
// 
// CUSTOMIZE UI
// 
//***********************
	// remove some metaboxes
	function remove_post_custom_fields() {
		remove_meta_box('postexcerpt', 'post', 'normal'); // removes excerpt metabox
		remove_meta_box('trackbacksdiv', 'post', 'normal'); // removes trackbacks metabox
		remove_meta_box('commentstatusdiv', 'post', 'normal'); // removes discussion metabox
		remove_meta_box('postcustom', 'post', 'normal'); // removes custom metaboxes (other than defined here)
		remove_meta_box('commentsdiv', 'post', 'normal'); // removes comments metabox
		//remove_meta_box('revisionsdiv', 'post', 'normal'); // removes revision metabox
		remove_meta_box('authordiv', 'post', 'normal'); // removes author metabox
		remove_meta_box('sqpt-meta-tags', 'post', 'normal'); // removes  metabox
		remove_meta_box('categorydiv', 'post', 'normal'); // removes categories metabox
		remove_meta_box('slugdiv', 'post', 'normal'); // removes slugs metabox
		remove_meta_box('formatdiv', 'post', 'normal'); // removes formats metabox
		remove_meta_box('tagsdiv-post_tag', 'post', 'normal'); // removes tags metabox
		remove_meta_box('pageparentdiv', 'post', 'normal'); // removes attributes metabox
	}
	add_action( 'admin_menu' , 'remove_post_custom_fields' );


	// remove some customization options for admins
	if (current_user_can('manage_options')) {
		add_action( 'admin_menu', 'admin_remove_menu_pages' );
	}
	function admin_remove_menu_pages() {
	//
	//remove_menu_page( 'edit.php' ); // Posts
	//remove_menu_page( 'upload.php' ); // Media
	remove_menu_page( 'link-manager.php' ); // Links
	remove_menu_page( 'edit-comments.php' ); // Comments
	//remove_menu_page( 'edit.php?post_type=page' ); // Pages
	//remove_menu_page( 'plugins.php' ); // Plugins
	//remove_menu_page( 'themes.php' ); // Appearance
	//remove_menu_page( 'users.php' ); // Users
	//remove_menu_page( 'tools.php' ); // Tools
	//remove_menu_page('options-general.php'); // Settings
	}
	
	
//***********************
// 
// CUSTOMIZE WYSIWYG
// 
//***********************
	if( !function_exists('base_extended_editor_mce_buttons') ){
		function base_extended_editor_mce_buttons($buttons) {
			// The settings are returned in this array. Customize to suite your needs.
			return array(
				'bold', 'italic', 'underline', 'sub', 'sup', 'charmap', 'removeformat', 'spellchecker'
			);
			/* WordPress Default
			return array(
				'bold', 'italic', 'strikethrough', 'separator', 
				'bullist', 'numlist', 'blockquote', 'separator', 
				'justifyleft', 'justifycenter', 'justifyright', 'separator', 
				'link', 'unlink', 'wp_more', 'separator', 
				'spellchecker', 'fullscreen', 'wp_adv'
			); */
		}
		add_filter("mce_buttons", "base_extended_editor_mce_buttons", 0);
	}


	// hide slugs
	function hide_all_slugs() {
	global $post;
	$hide_slugs = "<style type=\"text/css\"> #slugdiv, #edit-slug-box { display: none; }</style>";
	print($hide_slugs);
	}
	add_action( 'admin_head', 'hide_all_slugs'  );
	
	
	// customize backend footer
	function remove_footer_admin () {
	echo 'Powered by <a href="http://www.wordpress.org" target="_blank">WordPress</a> &nbsp;&#x272D;&nbsp; Built by <a href="http://pixelydo.com/">Nate Jones</a></p>';
	}
	add_filter('admin_footer_text', 'remove_footer_admin');
	

//#######################	
//
// EXECUTE PHP IN WIDGETS
// 
//***********************
function php_execute($html){
if(strpos($html,"<"."?php")!==false){ ob_start(); eval("?".">".$html);
$html=ob_get_contents();
ob_end_clean();
}
return $html;
}
add_filter('widget_text','php_execute',100);







//########################	
//
// COUNT THE WIDGETS
//
//########################
function count_sidebar_widgets( $sidebar_id, $echo = true ) {
    $the_sidebars = wp_get_sidebars_widgets();
    if( !isset( $the_sidebars[$sidebar_id] ) )
        return __( 'Invalid sidebar ID' );
    if( $echo )
        echo count( $the_sidebars[$sidebar_id] );
    else
        return count( $the_sidebars[$sidebar_id] );
}
$widget_count = (int) (12 / count_sidebar_widgets( 'dock', false ));


//########################	
//
// CREATE DOCK WIDGET AREA
//
//########################
$sidebars = array('Dock');
foreach ($sidebars as $dock) {
	register_sidebar(array('name'=> $dock,
		'id' => 'dock',
		'before_widget' => '<div class="large-' . $widget_count . ' columns">',
		'after_widget' => '</div>',
		'before_title' => '<h6>',
		'after_title' => '</h6>'
	));
}

	
//###############	
//
// CUSTOM METABOX
//
//###############

// create metabox
$prefix = '_digitalsign_';
$meta_box = array(
    'id' => 'detail',
    'title' => 'Details',
    'context' => 'normal',
    'priority' => 'high',
    'fields' => array(
        array(
            'name' =>'Subtitle',
            'id' => $prefix . 'subtitle',
            'type' => 'textarea'
        ),
        array(
            'name' =>'Link',
            'id' => $prefix . 'link',
            'type' => 'link'
        ),
        array(
            'name' =>'Background Hex Color',
            'id' => $prefix . 'bgcolor',
            'type' => 'bgcolor'
        ),
        array(
            'name' =>'Header Hex Color',
            'id' => $prefix . 'h1color',
            'type' => 'bgcolor'
        ),
        array(
            'name' =>'Subheader Hex Color',
            'id' => $prefix . 'h2color',
            'type' => 'bgcolor'
        ),
        array(
            'name' =>'Copy Hex Color',
            'id' => $prefix . 'pcolor',
            'type' => 'bgcolor'
        )
    )
);


// add meta box
add_action('admin_menu', 'add_detail_boxes');
 
function add_detail_boxes() {
    global $meta_box;
 
    add_meta_box($meta_box['id'], $meta_box['title'], 'digitalsign_show_box', 'post', $meta_box['context'], $meta_box['priority']);
}


// Callback function to show fields in meta box
function digitalsign_show_box() {
    global $meta_box, $post;
 
    // Use nonce for verification

    echo '<input type="hidden" name="digitalsign_meta_box_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';

    echo '<div class="form-table">';
 
    foreach ($meta_box['fields'] as $field) {
        // get current post meta data
        $meta = get_post_meta($post->ID, $field['id'], true);
 
        switch ($field['type']) {
            case 'text':
                echo '<div style="width: 90%; clear:both; margin: 10px 0;">',
                '<label for="', $field['id'], '">', $field['name'], '</label><br />',
                '<input type="text" name="', $field['id'], '" id="', $field['id'], '" value="', $meta ? $meta : $field['std'], '" size="30" style="width:97%" />', '<br />', $field['desc'],
                '</div>';
                break;
            case 'bgcolor':
                echo '<div style="width: 100%; clear:both;">',
                '<label for="', $field['id'], '">', $field['name'], '</label><br />',
                '<div style="display: inline;padding: 2px 5px 3px 5px;text-align: center;float: left;position: relative;margin: 10px 0;border: solid 1px #dfdfdf; border-right: none;background: #fff;color: #444;-webkit-border-top-left-radius: 3px;-webkit-border-top-left-radius: 3px;-moz-border-radius-topleft: 3px;-webkit-border-bottom-left-radius: 3px;-webkit-border-bottom-left-radius: 3px;-moz-border-radius-bottomleft: 3px;-moz-background-clip: padding;-webkit-background-clip: padding-box;background-clip: padding-box;">#</div><input type="text" maxlength="6" name="', $field['id'], '" id="', $field['id'], '" value="', $meta ? $meta : $field['std'], '" size="6" style="-webkit-border-top-left-radius: 0px!important;-webkit-border-top-left-radius: 0px!important;-moz-border-radius-topleft: 0;-webkit-border-bottom-left-radius: 0px!important;-webkit-border-bottom-left-radius: 0px!important;-moz-border-radius-bottomleft: 0;-moz-background-clip: padding;-webkit-background-clip: padding-box;background-clip: padding-box; margin: 10px 0; display: inline-block;" />', '<br />', $field['desc'],
                '</div>';
                break;
            case 'link':
                echo '<div style="width: 100%; clear:both;">',
                '<label for="', $field['id'], '">', $field['name'], '</label><br />',
                '<div style="display: inline;padding: 2px 5px 3px 5px;text-align: center;float: left;position: relative;margin: 10px 0;border: solid 1px #dfdfdf; border-right: none;background: #fff;color: #444;-webkit-border-top-left-radius: 3px;-webkit-border-top-left-radius: 3px;-moz-border-radius-topleft: 3px;-webkit-border-bottom-left-radius: 3px;-webkit-border-bottom-left-radius: 3px;-moz-border-radius-bottomleft: 3px;-moz-background-clip: padding;-webkit-background-clip: padding-box;background-clip: padding-box;">http://</div><input type="text" name="', $field['id'], '" id="', $field['id'], '" value="', $meta ? $meta : $field['std'], '" style="-webkit-border-top-left-radius: 0px!important;-webkit-border-top-left-radius: 0px!important;-moz-border-radius-topleft: 0;-webkit-border-bottom-left-radius: 0px!important;-webkit-border-bottom-left-radius: 0px!important;-moz-border-radius-bottomleft: 0;-moz-background-clip: padding;-webkit-background-clip: padding-box;background-clip: padding-box; margin: 10px 0; display: inline-block;" />', '<br />', $field['desc'],
                '</div>';
                break;
            case 'textarea':
                echo '<div style="width: 90%; clear:both; margin: 10px 0;">',
                '<label for="', $field['id'], '">', $field['name'], '</label><br />',
                '<textarea name="', $field['id'], '" id="', $field['id'], '" cols="60" rows="2" style="width:97%">', $meta ? $meta : $field['std'], '</textarea>', '<br />', $field['desc'],
                '</div>';
                break;
        }
    }
 
    echo '</div>';
}

add_action('save_post', 'digitalsign_save_data');
 
 
 

// Save data from meta box
function digitalsign_save_data($post_id) {
    global $meta_box;
 
    // verify nonce
    if (!wp_verify_nonce($_POST['digitalsign_meta_box_nonce'], basename(__FILE__))) {
        return $post_id;
    }
 
    // check autosave
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return $post_id;
    }
 
    // check permissions
    if ('page' == $_POST['post_type']) {
        if (!current_user_can('edit_page', $post_id)) {
            return $post_id;
        }
    } elseif (!current_user_can('edit_post', $post_id)) {
        return $post_id;
    }
 
    foreach ($meta_box['fields'] as $field) {
        $old = get_post_meta($post_id, $field['id'], true);
        $new = $_POST[$field['id']];
 
        if ($new && $new != $old) {
            update_post_meta($post_id, $field['id'], $new);
        } elseif ('' == $new && $old) {
            delete_post_meta($post_id, $field['id'], $old);
        }
    }
}
 
 
//***********************
// 
// CUSTOM LOGIN LOGO
// 
//***********************
	function my_custom_login_logo() {
	    echo '<style type="text/css">
	        h1 a { background-image:url('.get_bloginfo('template_url').'/login_page_logo.png) !important; }
	    </style>';
	}

	add_action('login_head', 'my_custom_login_logo');


	// Disable the Admin Bar.
	add_filter( 'show_admin_bar', '__return_false' );
	
	function remove_admin_bar_links() {
		global $wp_admin_bar;
		$wp_admin_bar->remove_menu('wp-logo');
		$wp_admin_bar->remove_menu('new-content');
		$wp_admin_bar->remove_menu('comments');
	}
	add_action( 'wp_before_admin_bar_render', 'remove_admin_bar_links' );


?>
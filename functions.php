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
	if (!current_user_can('manage_options')) {
		add_action( 'admin_menu', 'my_remove_menu_pages' );
	}
	function my_remove_menu_pages() {
	//remove_menu_page( 'edit.php' ); // Posts
	//remove_menu_page( 'upload.php' ); // Media
	remove_menu_page( 'link-manager.php' ); // Links
	remove_menu_page( 'edit-comments.php' ); // Comments
	remove_menu_page( 'edit.php?post_type=page' ); // Pages
    remove_submenu_page('edit.php', 'edit-tags.php?taxonomy=category');
    remove_submenu_page('edit.php', 'edit-tags.php?taxonomy=post_tag');

	//remove_menu_page( 'plugins.php' ); // Plugins
	//remove_menu_page( 'themes.php' ); // Appearance
	//remove_menu_page( 'users.php' ); // Users
	remove_menu_page( 'tools.php' ); // Tools
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



	// disable default dashboard widgets
	function disable_default_dashboard_widgets() {

		remove_meta_box('dashboard_right_now', 'dashboard', 'core');
		remove_meta_box('dashboard_recent_comments', 'dashboard', 'core');
		remove_meta_box('dashboard_incoming_links', 'dashboard', 'core');
		remove_meta_box('dashboard_plugins', 'dashboard', 'core');

		remove_meta_box('dashboard_quick_press', 'dashboard', 'core');
		remove_meta_box('dashboard_recent_drafts', 'dashboard', 'core');
		remove_meta_box('dashboard_primary', 'dashboard', 'core');
		remove_meta_box('dashboard_secondary', 'dashboard', 'core');
	}
	add_action('admin_menu', 'disable_default_dashboard_widgets');

	// create custom dashboard widget
	function custom_dashboard_widget() {
			echo "<p>Please keep the title to no more than 22 characters.</p>",
				"<p>Please keep the body copy to no more than 27-30 words.</p>",
				"<p>If using a background image, a 16:9 ratio will do best to fill the screen (for example, 1920px wide x 1080px high). Remember that the information dock will cover approximately 200px of the bottom of the image.";

		/*if (current_user_can('manage_options')) {
			echo "<p>Please keep the title to no more than 22 characters.</p>",
				"<p>Please keep the body copy to no more than 27-30 words.</p>",
				"<p>If using a background image, a 16:9 ratio will do best to fill the screen (for example, 1920px wide x 1080px high). Remember that the information dock will cover approximately 200px of the bottom of the image.";

		}
		else {
		}*/
	}
	function add_custom_dashboard_widget() {
		wp_add_dashboard_widget('custom_dashboard_widget', 'Content Guidelines', 'custom_dashboard_widget');
	}
	add_action('wp_dashboard_setup', 'add_custom_dashboard_widget');





//***********************
//
// CUSTOMIZE WYSIWYG
//
//***********************
	if( !function_exists('base_extended_editor_mce_buttons') ){
		function base_extended_editor_mce_buttons($buttons) {
			// The settings are returned in this array. Customize to suite your needs.
			return array(
				'italic', 'charmap', 'removeformat'
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


//***********************
//
// REMOVE SOME WIDGETS
//
//***********************

function remove_some_wp_widgets () {
unregister_widget('WP_Widget_Calendar');
unregister_widget('WP_Widget_Search');
unregister_widget('WP_Widget_Recent_Comments');
unregister_widget('WP_Widget_Pages');
unregister_widget('WP_Widget_Archives');
unregister_widget('WP_Widget_Links');
unregister_widget('WP_Widget_Meta');
unregister_widget('WP_Widget_Categories');
unregister_widget('WP_Widget_Recent_Posts');
unregister_widget('WP_Widget_Tag_Cloud');
unregister_widget('WP_Nav_Menu_Widget');

}

add_action('widgets_init','remove_some_wp_widgets', 1);




//***********************
//
// COUNT THE WIDGETS
//
//***********************
function count_sidebar_widgets( $sidebar_id, $echo = true ) {
    $the_sidebars = wp_get_sidebars_widgets();
    if( !isset( $the_sidebars[$sidebar_id] ) )
        return __( 'Invalid sidebar ID' );
    if( $echo )
        echo count( $the_sidebars[$sidebar_id] );
    else
        return count( $the_sidebars[$sidebar_id] );
}
//$widget_count = (int) (12 / count_sidebar_widgets( 'dock', false ));
	if (count_sidebar_widgets( 'dock', false ) > 0){
		$widget_count = (int) (12 / count_sidebar_widgets( 'dock', false ));
	}
	else {
		$widget_count = 12;
	}


//***********************
//
// CREATE DOCK WIDGET AREA
//
//***********************
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




//***********************
//
// ENQUEUE SCRIPTS
//
//***********************
    function load_my_scripts() {
        wp_deregister_script( 'jquery' );
        wp_register_script('jquery', ('//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js'), false, '2.1.1');
        wp_enqueue_script('jquery');
        wp_register_script('weather', '//cdnjs.cloudflare.com/ajax/libs/jquery.simpleWeather/3.0.2/jquery.simpleWeather.min.js');
        wp_enqueue_script('weather');

    }
add_action('wp_enqueue_scripts', 'load_my_scripts');



//***********************
//
// REQUIRE PLUGINS
//
//***********************

require_once dirname( __FILE__ ) . '/lib/tgm/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'my_theme_register_required_plugins' );
function my_theme_register_required_plugins() {

    $plugins = array(

        // This is an example of how to include a plugin pre-packaged with a theme.
        array(
            'name'               => 'WPDS Post Details', // The plugin name.
            'slug'               => 'post-details', // The plugin slug (typically the folder name).
            'source'             => get_stylesheet_directory() . '/lib/post-details.zip', // The plugin source.
            'required'           => true, // If false, the plugin is only 'recommended' instead of required.
            'version'            => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher.
            'force_activation'   => true, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
            'force_deactivation' => true, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
            'external_url'       => '', // If set, overrides default API URL and points to an external URL.
        ),
        array(
            'name'               => 'The Clock', // The plugin name.
            'slug'               => 'the-clock', // The plugin slug (typically the folder name).
            'source'             => get_stylesheet_directory() . '/lib/the-clock.zip', // The plugin source.
            'required'           => true, // If false, the plugin is only 'recommended' instead of required.
            'version'            => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher.
            'force_activation'   => true, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
            'force_deactivation' => true, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
            'external_url'       => '', // If set, overrides default API URL and points to an external URL.
        ),
        array(
            'name'               => 'The Tweets', // The plugin name.
            'slug'               => 'the-tweets', // The plugin slug (typically the folder name).
            'source'             => get_stylesheet_directory() . '/lib/the-tweets.zip', // The plugin source.
            'required'           => true, // If false, the plugin is only 'recommended' instead of required.
            'version'            => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher.
            'force_activation'   => true, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
            'force_deactivation' => true, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
            'external_url'       => '', // If set, overrides default API URL and points to an external URL.
        ),
        array(
            'name'               => 'The Weather', // The plugin name.
            'slug'               => 'the-weather', // The plugin slug (typically the folder name).
            'source'             => get_stylesheet_directory() . '/lib/the-weather.zip', // The plugin source.
            'required'           => true, // If false, the plugin is only 'recommended' instead of required.
            'version'            => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher.
            'force_activation'   => true, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
            'force_deactivation' => true, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
            'external_url'       => '', // If set, overrides default API URL and points to an external URL.
        ),
        array(
            'name'      => 'Simple expires',
            'slug'      => 'simple-expires',
            'required'  => false,
        ),
        array(
            'name'      => 'WordPress Database Backup',
            'slug'      => 'wp-db-backup',
            'required'  => false,
        ),
        array(
            'name'      => 'Login LockDown',
            'slug'      => 'login-lockdown',
            'required'  => false,
        ),
        array(
            'name'      => 'Wordfence Security',
            'slug'      => 'wordfence',
            'required'  => false,
        ),

    );

    $config = array(
        'default_path' => '',                      // Default absolute path to pre-packaged plugins.
        'menu'         => 'tgmpa-install-plugins', // Menu slug.
        'has_notices'  => true,                    // Show admin notices or not.
        'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
        'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
        'is_automatic' => true,                   // Automatically activate plugins after installation or not.
        'message'      => '',                      // Message to output right before the plugins table.
        'strings'      => array(
            'page_title'                      => __( 'Install Required Plugins', 'tgmpa' ),
            'menu_title'                      => __( 'Install Plugins', 'tgmpa' ),
            'installing'                      => __( 'Installing Plugin: %s', 'tgmpa' ), // %s = plugin name.
            'oops'                            => __( 'Something went wrong with the plugin API.', 'tgmpa' ),
            'notice_can_install_required'     => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.' ), // %1$s = plugin name(s).
            'notice_can_install_recommended'  => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.' ), // %1$s = plugin name(s).
            'notice_cannot_install'           => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.' ), // %1$s = plugin name(s).
            'notice_can_activate_required'    => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s).
            'notice_can_activate_recommended' => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s).
            'notice_cannot_activate'          => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.' ), // %1$s = plugin name(s).
            'notice_ask_to_update'            => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.' ), // %1$s = plugin name(s).
            'notice_cannot_update'            => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.' ), // %1$s = plugin name(s).
            'install_link'                    => _n_noop( 'Begin installing plugin', 'Begin installing plugins' ),
            'activate_link'                   => _n_noop( 'Begin activating plugin', 'Begin activating plugins' ),
            'return'                          => __( 'Return to Required Plugins Installer', 'tgmpa' ),
            'plugin_activated'                => __( 'Plugin activated successfully.', 'tgmpa' ),
            'complete'                        => __( 'All plugins installed and activated successfully. %s', 'tgmpa' ), // %s = dashboard link.
            'nag_type'                        => 'updated' // Determines admin notice type - can only be 'updated', 'update-nag' or 'error'.
        )
    );

    tgmpa( $plugins, $config );

}



?>

<?php
function digitalsign_setup() {
	
	// Add post thumbnail supports. http://codex.wordpress.org/Post_Thumbnails
	add_theme_support('post-thumbnails');
	set_post_thumbnail_size(400, 400, true);
	
}
add_action('after_setup_theme', 'digitalsign_setup');

// create widget area: footer
$sidebars = array('Footer');
foreach ($sidebars as $sidebar) {
	register_sidebar(array('name'=> $sidebar,
		'before_widget' => '<article id="%1$s clock" class="two columns widget %2$s"><div class="footer-section">',
		'after_widget' => '</div></article>',
		'before_title' => '<h6>',
		'after_title' => '</h6>'
	));
}


/* Customized the output of caption, you can remove the filter to restore back to the WP default output. Courtesy of DevPress. http://devpress.com/blog/captions-in-wordpress/ */
add_filter( 'img_caption_shortcode', 'cleaner_caption', 10, 3 );

function cleaner_caption( $output, $attr, $content ) {

	/* We're not worried abut captions in feeds, so just return the output here. */
	if ( is_feed() )
		return $output;

	/* Set up the default arguments. */
	$defaults = array(
		'id' => '',
		'align' => 'alignnone',
		'width' => '',
		'caption' => ''
	);

	/* Merge the defaults with user input. */
	$attr = shortcode_atts( $defaults, $attr );

	/* If the width is less than 1 or there is no caption, return the content wrapped between the [caption]< tags. */
	if ( 1 > $attr['width'] || empty( $attr['caption'] ) )
		return $content;

	/* Set up the attributes for the caption <div>. */
	$attributes = ' class="figure ' . esc_attr( $attr['align'] ) . '"';

	/* Open the caption <div>. */
	$output = '<figure' . $attributes .'>';

	/* Allow shortcodes for the content the caption was created for. */
	$output .= do_shortcode( $content );

	/* Append the caption text. */
	$output .= '<figcaption>' . $attr['caption'] . '</figcaption>';

	/* Close the caption </div>. */
	$output .= '</figure>';

	/* Return the formatted, clean caption. */
	return $output;
}

// Clean the output of attributes of images in editor. Courtesy of SitePoint. http://www.sitepoint.com/wordpress-change-img-tag-html/
function image_tag_class($class, $id, $align, $size) {
	$align = 'align' . esc_attr($align);
	return $align;
}
add_filter('get_image_tag_class', 'image_tag_class', 0, 4);
function image_tag($html, $id, $alt, $title) {
	return preg_replace(array(
			'/\s+width="\d+"/i',
			'/\s+height="\d+"/i',
			'/alt=""/i'
		),
		array(
			'',
			'',
			'',
			'alt="' . $title . '"'
		),
		$html);
}
add_filter('get_image_tag', 'image_tag', 0, 4);

// create metabox
$prefix = '_digitalsign_';
 
$meta_box = array(
    'id' => 'panel_details',
    'title' => 'Panel Details',
    'page' => 'post',
    'context' => 'normal',
    'priority' => 'high',
    'fields' => array(
        array(
            'name' => 'Subtitle',
            'id' => $prefix . 'subtitle',
            'type' => 'text',
        ),
        array(
            'name' =>'Link',
            'id' => $prefix . 'link',
            'type' => 'text',
        ),
        array(
            'name' => 'Background',
            'id' => $prefix . 'background',
            'type' => 'select',
            'options' => array('black', 'blue', 'gray', 'green', 'orange', 'pink', 'purple', 'teal')
        )
    )
);

// add meta box
add_action('admin_menu', 'digitalsign_add_box');
 
function digitalsign_add_box() {
    global $meta_box;
 
    add_meta_box($meta_box['id'], $meta_box['title'], 'digitalsign_show_box', $meta_box['page'], $meta_box['context'], $meta_box['priority']);
}

// Callback function to show fields in meta box
function digitalsign_show_box() {
    global $meta_box, $post;
 
    // Use nonce for verification
    echo '<input type="hidden" name="digitalsign_meta_box_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';
 
    echo '<table class="form-table">';
 
    foreach ($meta_box['fields'] as $field) {
        // get current post meta data
        $meta = get_post_meta($post->ID, $field['id'], true);
 
        echo '<tr>',
                '<th style="width:20%"><label for="', $field['id'], '">', $field['name'], '</label></th>',
                '<td>';
        switch ($field['type']) {
            case 'text':
                echo '<input type="text" name="', $field['id'], '" id="', $field['id'], '" value="', $meta ? $meta : $field['std'], '" size="30" style="width:97%" />', '<br />', $field['desc'];
                break;
            case 'textarea':
                echo '<textarea name="', $field['id'], '" id="', $field['id'], '" cols="60" rows="4" style="width:97%">', $meta ? $meta : $field['std'], '</textarea>', '<br />', $field['desc'];
                break;
            case 'select':
                echo '<select name="', $field['id'], '" id="', $field['id'], '">';
                foreach ($field['options'] as $option) {
                    echo '<option', $meta == $option ? ' selected="selected"' : '', '>', $option, '</option>';
                }
                echo '</select>';
                break;
            case 'radio':
                foreach ($field['options'] as $option) {
                    echo '<input type="radio" name="', $field['id'], '" value="', $option['value'], '"', $meta == $option['value'] ? ' checked="checked"' : '', ' />', $option['name'];
                }
                break;
            case 'checkbox':
                echo '<input type="checkbox" name="', $field['id'], '" id="', $field['id'], '"', $meta ? ' checked="checked"' : '', ' />';
                break;
        }
        echo     '<td>',
            '</tr>';
    }
 
    echo '</table>';
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


// img unautop, Courtesy of Interconnectit http://interconnectit.com/2175/how-to-remove-p-tags-from-images-in-wordpress/
function img_unautop($pee) {
    $pee = preg_replace('/<p>\\s*?(<a .*?><img.*?><\\/a>|<img.*?>)?\\s*<\\/p>/s', '<figure>$1</figure>', $pee);
    return $pee;
}
add_filter( 'the_content', 'img_unautop', 30 );


/* Disable the Admin Bar. */
add_filter( 'show_admin_bar', '__return_false' );

/* Allow PHP in Widgets
Thanks @triqui 
http://www.emanueleferonato.com/2011/04/11/executing-php-inside-a-wordpress-widget-without-any-plugin/
----*/
add_filter('widget_text','execute_php',100);
function execute_php($html){
     if(strpos($html,"<"."?php")!==false){
          ob_start();
          eval("?".">".$html);
          $html=ob_get_contents();
          ob_end_clean();
     }
     return $html;
}
/* Hide some extra meta boxes from the Post admin page */
function my_remove_meta_boxes() {
    remove_meta_box('postcustom', 'post', 'core');
    remove_meta_box('commentsdiv', 'post', 'core');
    remove_meta_box('slugdiv', 'post', 'core');
    remove_meta_box('revisionsdiv', 'post', 'core');
    remove_meta_box('commentstatusdiv', 'post', 'core');
    remove_meta_box('postcustom', 'post', 'core');
    remove_meta_box('postexcerpt', 'post', 'core');
    remove_meta_box('trackbacksdiv', 'post', 'core');
    remove_meta_box('postexcerpt', 'post', 'core');
    remove_meta_box('formatdiv', 'post', 'core');
    remove_meta_box('pageparentdiv', 'post', 'core');
    remove_meta_box('authordiv', 'post', 'core');
}

add_action( 'admin_menu', 'my_remove_meta_boxes' );
add_action('admin_init', 'remove_all_media_buttons');

function remove_all_media_buttons()
{
    remove_all_actions('media_buttons');
}

// TinyMCE: First line toolbar customizations
if( !function_exists('base_extended_editor_mce_buttons') ){
	function base_extended_editor_mce_buttons($buttons) {
		// The settings are returned in this array. Customize to suite your needs.
		return array(
			'bold', 'italic', 'underline', 'sub', 'sup', 'bullist', 'numlist', 'charmap', 'removeformat', 'spellchecker', 'fullscreen'
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



?>
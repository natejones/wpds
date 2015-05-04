<?php
/**
 * Index
 *
 * Standard loop for the front-page
 *
 * @package WordPress
 * @subpackage Foundation, for WordPress
 * @since Foundation, for WordPress 1.0
 */

get_header(); ?>
<div class="row">
    <!-- Main Content -->
    <div class="large-12 columns" role="content">
			<ul data-orbit>
	            <?php
	            $args=array(
	                'post_type' => 'post',
	                'post_status' => 'publish',
	                'orderby' => 'rand'
	            );
	            $the_query = new WP_Query($args);
	            if($the_query->have_posts()) : while ( $the_query->have_posts() ) : $the_query->the_post();
				      $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large');
              $background_color = get_post_meta($post->ID, 'background-color', true);
              $background_image = get_post_meta($post->ID, 'background-image', true);
              $head_color = get_post_meta($post->ID, 'headline-color', true);
              $subhead_color = get_post_meta($post->ID, 'subhead-color', true);
              $copy_color = get_post_meta($post->ID, 'copy-color', true);
              $link = get_post_meta($post->ID, 'link', true);

					    if($background_image != '') :
                echo '<li class="post-box large-12 columns" style="background:url(' . get_post_meta($post->ID, 'background-image', true) . ') 0 0 no-repeat; width:100%; height:100%; background-size:contain;"></li>';
              else :
                  echo '<li class="post-box large-12 columns" style="background:#' . get_post_meta($post->ID, 'background-color', true) . ';">',
          						'<h1 style="color:#' . get_post_meta($post->ID, 'headline-color', true) . ';">' . get_the_title() . '</h1>',
          						'<h2 style="color:#' . get_post_meta($post->ID, 'subhead-color', true) . ';">' . get_post_meta($post->ID, 'subtitle', true) . '</h2>',
          						'<div class="row">',
          						'<a href="' . get_post_meta($post->ID, 'link', true) . '">',
          						get_the_post_thumbnail($post_id, 'large', array('class' => 'large-3 columns feature')),
          						'</a>',
          						'<p class="large-7 columns copy end" style="color:#' . get_post_meta($post->ID, 'copy-color', true) . ';">' . do_shortcode( get_the_content() ) . '</p>',
          						'<p class="link"><a  style="color:#' . get_post_meta($post->ID, 'copy-color', true) . ';" href="' . get_post_meta($post->ID, 'link', true) . '">' . get_post_meta($post->ID, 'link', true) . '</a>',
          						'</div>',
          						'</li>';
              endif;
	            endwhile;
	            endif;
				wp_reset_query();
	            ?>
			</ul>
	</div>
</div>
    <!-- End Main Content -->

<?php get_footer(); ?>

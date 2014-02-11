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
	
					echo '<li class="post-box large-12 columns" style="background:#' . get_post_meta($post->ID, '_digitalsign_bgcolor', true) . ';">',
						'<h1 style="color:#' . get_post_meta($post->ID, '_digitalsign_h1color', true) . ';">' . get_the_title() . '</h1>',
						'<h2 style="color:#' . get_post_meta($post->ID, '_digitalsign_h2color', true) . ';">' . get_post_meta($post->ID, '_digitalsign_subtitle', true) . '</h2>',
						'<div class="row">',
						'<a href="http://' . get_post_meta($post->ID, '_digitalsign_link', true) . '">',
						get_the_post_thumbnail($post_id, 'large', array('class' => 'large-3 columns feature')),
						'</a>',
						'<p class="large-7 columns copy end" style="color:#' . get_post_meta($post->ID, '_digitalsign_pcolor', true) . ';">' . get_the_content() . '</p>',
						'<p class="link"><a  style="color:#' . get_post_meta($post->ID, '_digitalsign_pcolor', true) . ';" href="http://' . get_post_meta($post->ID, '_digitalsign_link', true) . '">' . get_post_meta($post->ID, '_digitalsign_link', true) . '</a>',
						'</div>',
						'</li>';
	            endwhile;
	            endif;
				wp_reset_query();
	            ?>		
			</ul>
	</div>
</div>
    <!-- End Main Content -->

<?php get_footer(); ?>
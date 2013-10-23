<?php
/*
Template Name: Blog
*/
?>

<?php get_header(); ?>
	<h2><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'foundation' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
		</div>
	</div>
	<div class="row">
		<div class="large-6 large-offset-4 small-centered columns post-box">
	        <?php
	        $args=array(
	            'post_type' => 'blog',
	            'post_status' => 'publish',
	            'posts_per_page' => 30
	        );
	        $the_query = new WP_Query($args);
	        if($the_query->have_posts()) : while ( $the_query->have_posts() ) : $the_query->the_post();
	            echo '<h4><a href="' . get_permalink() . '">' . get_the_title() . '</a></h4>';
	        endwhile;
	        endif;
	        wp_reset_postdata();
	        ?>
        </div>
    </div>

	
	    </div>
	
	<?php get_footer(); ?>
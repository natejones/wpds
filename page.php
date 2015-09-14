<?php
/**
 * Page
 *
 * Loop container for page content
 *
 * @package WordPress
 * @subpackage Foundation, for WordPress
 * @since Foundation, for WordPress 1.0
 */

get_header(); ?>

    <!-- Main Content -->
<!--    <div class="large-12 columns" role="content"> -->
    	<div class="row">
				<?php if ( have_posts() ) : ?>
		
					<?php while ( have_posts() ) : the_post(); ?>
						<?php get_template_part( 'content', 'page' ); ?>				
					<?php endwhile; ?>
				
					<?php endif; ?>
    	</div>
<!--    </div> -->
    <!-- End Main Content -->

<?php get_footer(); ?>
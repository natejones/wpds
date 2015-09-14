<?php

/*
 * Template Name: Full Page Template
 */

get_header(); ?>

    <!-- Main Content -->
    <div class="large-12 columns" role="content">

		<?php if ( have_posts() ) : ?>

			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'content', 'page' ); ?>
			<?php endwhile; ?>
			
		<?php endif; ?>

    </div>
    <!-- End Main Content -->

<?php get_footer(); ?>
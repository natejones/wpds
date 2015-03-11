<?php

/*
 * Template Name: Sidebar Left Template
 */

get_header(); ?>
<?php get_sidebar(); ?>

    <!-- Main Content -->
    <div class="nine columns" role="content">

		<?php if ( have_posts() ) : ?>

			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'content', 'page' ); ?>
			<?php endwhile; ?>
			
		<?php endif; ?>

    </div>
    <!-- End Main Content -->

<?php get_footer(); ?>
<?php get_header(); ?>
		</div>
	</div>
	<div class="row">
	    <!-- Main Content -->
		<div class="large-8 small-centered columns">
	
			<?php if ( have_posts() ) : ?>
	
				<?php while ( have_posts() ) : the_post(); ?>
					<?php get_template_part( 'content', 'single' ); ?>
				<?php endwhile; ?>
				
			<?php endif; ?>
	
	    </div>
	</div>
	    <!-- End Main Content -->
	
	<?php get_footer(); ?>
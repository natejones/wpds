<?php
/**
 * Author Box
 *
 * Displays author box with author description and thumbnail on single posts
 *
 * @package WordPress
 * @subpackage Foundation, for WordPress
 * @since Foundation, for WordPress 1.0
 */
?>

<section class="row">
	<div class="large-12 columns">

		<div class="panel author-box">
			<h5><?php echo get_avatar( get_the_author_meta('user_email'),'55' ); ?> <?php echo get_the_author_meta('first_name'); ?></h5>
			<p>
				<?php echo get_the_author_meta('description'); ?>
			</p>
		</div>
		
	</div>
</section>
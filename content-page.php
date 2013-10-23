<?php
/**
 * Content Page
 *
 * Loop content in page template (page.php)
 *
 * @package WordPress
 * @subpackage Foundation, for WordPress
 * @since Foundation, for WordPress 1.0
 */
?>
<article class="large-11 columns">
		<h2><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'foundation' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>

	<?php if ( has_post_thumbnail()) : ?>
		<?php the_post_thumbnail('medium', array('class' => 'large-4 columns')); ?>
	<?php endif; ?>
	
	<?php the_content(); ?>

</article>
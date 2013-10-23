<?php
/**
 * Content Single
 *
 * Loop content in single post template (single.php)
 *
 * @package WordPress
 * @subpackage Foundation, for WordPress
 * @since Foundation, for WordPress 1.0
 */
?>
<?php $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large'); ?>
	<h2><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'foundation' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>

<?php if ( get_post_meta($post->ID, '_natejones_top', true) ) : ?>
			<?php echo '<p>' . get_post_meta($post->ID, '_natejones_top', true) . '</p>'; ?>
<?php endif; ?>
		</div>
	</div>
<?php if ( get_post_meta($post->ID, '_natejones_quote', true) ) : ?>
<div id="myModal" class="expand reveal-modal">
	<?php echo '<img src="' . $large_image_url[0] . '" alt="' . get_the_title() . '" />'; ?>
	<a class="close-reveal-modal">&#215;</a>
</div>	

	<div class="row">
		<div class="large-12 colums feature">
<?php
	if ( has_post_thumbnail() ) {
		echo '		<a href="#" data-reveal-id="myModal" class="large-3 columns featureimg" style="background: url(\'' . $large_image_url[0] . '\') center center no-repeat; background-size: cover;"></a>';
	echo '			<div class="large-6 columns end large-offset-1">';
	}
	else {
	echo '			<div class="large-10 columns end large-offset-1">';
	}

	echo '				<h3>' . get_post_meta($post->ID, '_natejones_quote', true) . '</h3>';
?>
			</div>
		</div>
	</div>
	
<?php endif; ?>
<?php if ( get_post_meta($post->ID, '_natejones_bottom', true) ) : ?>
	<div class="row">
		<div class="large-8 small-centered columns">
			<?php echo '<p>' . get_post_meta($post->ID, '_natejones_bottom', true) . '</p>'; ?>
		</div>
	</div>
<?php endif; ?>
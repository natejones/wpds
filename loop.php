<?php query_posts("orderby=rand"); $i = 1;  ?>
<?php while (have_posts()) : the_post(); ?>

	<div id="post-<?php the_ID(); ?>" class="<?php echo get_post_meta($post->ID, '_digitalsign_background', true) ?> post twelve columns">
		<header>
			<h1 class="entry-title"><?php the_title(); ?></h1>
			<h2 class="entry-title"><?php echo get_post_meta($post->ID, '_digitalsign_subtitle', true) ?></h2>
		</header>
		<div class="entry-content twelve columns">
			<!-- <?php the_post_thumbnail('medium');?> -->
			<?php if(has_post_thumbnail()) {                    
			    $image_src = wp_get_attachment_image_src( get_post_thumbnail_id(),'full' );
			     echo '<img src="' . $image_src[0]  . '" class="five columns"  />';
			} 			
			?>
			<?php the_content(); ?>
			<a href="http://<?php echo get_post_meta($post->ID, '_digitalsign_link', true) ?>" class="link"><?php echo get_post_meta($post->ID, '_digitalsign_link', true) ?></a>
		</div>
	</div>	
<?php endwhile; // End the loop ?>


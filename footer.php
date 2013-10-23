<?php
/**
 * Footer
 *
 * Displays content shown in the footer section
 *
 * @package WordPress
 * @subpackage Foundation, for WordPress
 * @since Foundation, for WordPress 1.0
 */
?>
		<div class="content-dock"></div>
            </div> <!-- /.content -->


	<div class="row dock">
<!--        <?php
        $args=array(
            'post_type' => 'dock',
            'post_status' => 'publish',
            'posts_per_page' => 4
        );
        $the_query = new WP_Query($args);
        if($the_query->have_posts()) : while ( $the_query->have_posts() ) : $the_query->the_post();
			echo '<div class="large-3">',
			the_content(),
			'</div>';
			
        endwhile;
        endif;
		wp_reset_query();
        ?> -->
		<?php dynamic_sidebar("Dock"); ?>
	</div>
	<?php wp_footer(); ?>
	<script src='//cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js' type='text/javascript' charset='utf-8'></script>

	<!-- CDN Fallback -->
	<script type="text/javascript">
	if (typeof jQuery == 'undefined') {
	    document.write(unescape("%3Cscript src='<?php bloginfo('template_url'); ?>/javascripts/vendor/jquery.js' type='text/javascript'%3E%3C/script%3E"));
	}
	</script>


    <script src="<?php bloginfo('template_url'); ?>/javascripts/foundation/foundation.js"></script>
    <script src="<?php bloginfo('template_url'); ?>/javascripts/foundation/foundation.orbit.js"></script>
	
  
  <script>
$(function() {
    $(document).foundation();
});

  </script>
</body>
</html>
		</div><!-- End Main row -->
		
		<footer id="content-info" role="contentinfo" class="row hide-for-small">
			<div class="twelve columns">
				<?php dynamic_sidebar("Footer"); ?>
			</div>
		</footer>
			
	</div><!-- Container End -->
	
	
	<!-- Prompt IE 6 users to install Chrome Frame. Remove this if you want to support IE 6.
	     chromium.org/developers/how-tos/chrome-frame-getting-started -->
	<!--[if lt IE 7]>
		<script defer src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.3/CFInstall.min.js"></script>
		<script defer>window.attachEvent('onload',function(){CFInstall.check({mode:'overlay'})})</script>
	<![endif]-->	
	<?php wp_footer(); ?>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
	<!-- Included JS Files of Foundation -->
	<script src="<?php echo get_template_directory_uri(); ?>/js/foundation.js"></script>
	<script src="<?php echo get_template_directory_uri(); ?>/js/app.js"></script>
	<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.equalheights.js"></script>
		<script type="text/javascript">
			$(document).ready(function() {
				if (matchMedia('only screen and (min-width: 767px)').matches) {
					$.getScript("<?php echo get_template_directory_uri(); ?>/js/jquery.equalheights.js");

					$('#weather').load('<?php echo get_template_directory_uri(); ?>/weather.php');
						var auto_refresh = setInterval(
						function () {
							$('#weather').load('<?php echo get_template_directory_uri(); ?>/weather.php');
						}, 600000);	// 10 minutes in milliseconds

				} // end matchMedia
			});
		</script>
</body>
</html>





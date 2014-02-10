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
    <script>
       var mq = window.matchMedia( "(min-width: 960px)" );
	   if (mq.matches) {
		  document.write(unescape("%3Cscript src='<?php bloginfo('template_url'); ?>/javascripts/foundation/foundation.orbit.js' type='text/javascript'%3E%3C/script%3E"));
		}
	</script>
    <script src="<?php bloginfo('template_url'); ?>/javascripts/vendor/app.js"></script>
    <script src="<?php bloginfo('template_url'); ?>/javascripts/vendor/twitterFetcher_v10_min.js"></script>
  
  <script>
$(function() {
    $(document).foundation();
});
	
      /*
      *
      * ## TWITTER FETCHER
      *
      * ### HOW TO CREATE A VALID ID TO USE:
      * Go to www.twitter.com and sign in as normal, go to your settings page.
      * Go to "Widgets" on the left hand side.
      * Create a new widget for what you need eg "user timeline" or "search" etc. 
      * Feel free to check "exclude replies" if you dont want replies in results.
      * Now go back to settings page, and then go back to widgets page, you should
      * see the widget you just created. Click edit.
      * Now look at the URL in your web browser, you will see a long number like this:
      * 393025966789754880
      * Use this as your ID below instead!
      */

      /**
       * ### HOW TO USE FETCH FUNCTION:
       * @param {string} Your Twitter widget ID.
       * @param {string} The ID of the DOM element you want to write results to. 
       * @param {int} Optional - the maximum number of tweets you want returned. Must
       *     be a number between 1 and 20.
       * @param {boolean} Optional - set true if you want urls and hash
             tags to be hyperlinked!
       * @param {boolean} Optional - Set false if you dont want user photo /
       *     name for tweet to show.
       * @param {boolean} Optional - Set false if you dont want time of tweet
       *     to show.
       * @param {function/string} Optional - A function you can specify to format
       *     tweet date/time however you like. This function takes a JavaScript date
       *     as a parameter and returns a String representation of that date.
       *     Alternatively you may specify the string 'default' to leave it with
       *     Twitter's default renderings.
       * @param {boolean} Optional - Show retweets or not. Set false to not show.
       * @param {function/string} Optional - A function to call when data is ready. It
       *     also passes the data to this function should you wish to manipulate it
       *     yourself before outputting. If you specify this parameter you  must
       *     output data yourself!
       */

    twitterFetcher.fetch('393025966789754880', 'tweets', 1, true, true, false);
  </script>
</body>
</html>
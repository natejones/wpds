Digital Signage Wordpress theme using Zurb's crazy brilliant Foundation.

This work is licensed under a Creative Commons Attribution-NonCommercial-ShareAlike 3.0 Unported License.
You are free to share & remix, but you must make attribution and you may not sell it.
http://creativecommons.org/licenses/by-nc/3.0/


## I really want to see a picture of this being used. Seriously. Please take a quick picture with your phone and tweet it to me @natejones, or email nate@pixelydo.com. ##


Here are some random notes:

##ADAPTIVE IMAGES
	We're using Matt Wilcox's Adaptive Images (adaptive-images.com) for low-bandwidth images.

	You'll need to edit the .htaccess in your Wordpress root directory (A sample .htaccess is in the AdaptiveImages_STUFF-TO-MOVE folder)
	You'll also need to move adaptive-images.php (in the AdaptiveImages_STUFF-TO-MOVE folder) to your Wordpress root directory		


##WIDGETS
	So, I like four widgets in the footer, but feel free to change up functions.php & $('.row article.widget').last().removeClass().addClass(); in app.js if you want.

	###WEATHER WIDGET
		Drag a text widget into the Footer. Paste in the following div:
		<div id="weather" class="twelve columns">
		</div>

		Set the weather location and other variables in weather.php.
		The javascript timer for the weather widget is in footer.php to allow it to find the correct path to weather.php.


	###CLOCK WIDGET
		Drag a text widget into the Footer. Paste in the following div:
		<div class="clock">
			<ul>
				<li id="hours"> </li>
				<li id="point">:</li>
				<li id="min"> </li>
				<li id="point">:</li>
				<li id="sec"> </li>
			</ul>
			<div id="Date"></div>
		</div>
		(thanks to @Bluxart :: http://www.alessioatzeni.com/blog/css3-digital-clock-with-jquery/)


	###TWITTER WIDGET
		Drag a text widget into the Footer. Paste in the following div:
		<div id="twitter_div">
		</div>

		adjust js/app.js line 24 to include your Twitter username, not mine.
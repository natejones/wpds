Digital Signage Wordpress theme using Zurb's crazy brilliant Foundation.

This work is licensed under a Creative Commons Attribution-NonCommercial-ShareAlike 3.0 Unported License.
You are free to share & remix, but you must make attribution and you may not sell it.
http://creativecommons.org/licenses/by-nc/3.0/



Here are some random notes:

ADAPTIVE IMAGES
We're using Matt Wilcox's Adaptive Images (adaptive-images.com) for low-bandwidth images.

You'll need to edit the .htaccess in your Wordpress root directory (A sample .htaccess is in the AdaptiveImages_STUFF-TO-MOVE folder)
You'll also need to move adaptive-images.php (in the AdaptiveImages_STUFF-TO-MOVE folder) to your Wordpress root directory		


WEATHER WIDGET
Set the weather location and other variables in weather.php.
The javascript timer for the weather widget is in footer.php to allow it to find the correct path to weather.php.


CLOCK
thanks to @Bluxart :: http://www.alessioatzeni.com/blog/css3-digital-clock-with-jquery/
Put this into a text widget to display the time & date:

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
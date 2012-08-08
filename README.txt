Digital Signage Wordpress theme using Zurb's crazy brilliant Foundation.


Here are some random notes:

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
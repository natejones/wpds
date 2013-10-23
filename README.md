##Digital Signage Wordpress Theme using Zurb's crazy brilliant Foundation.

This work is licensed under a [Creative Commons Attribution-NonCommercial-ShareAlike 3.0 Unported License](http://creativecommons.org/licenses/by-nc/3.0/).
You are free to share & remix, but you must make attribution and you may not sell it.

I really want to see a picture of this being used. Seriously. Please take a quick picture with your phone and tweet it to me [@natejones](https://twitter.com/natejones), or email [nate@pixelydo.com](mailto:nate@pixelydo.com).


##Widgets

###Weather
Drag a text widget into the Footer. Paste in the following:
```php
<?php

	/*----------
	Thank you, @chriscoyier! 
	http://css-tricks.com/using-weather-data-to-change-your-websites-apperance-through-php-and-css/
	
	Line 11 parameters are w=YourWOEID and u=units (f or c)
	Lookup your WOEID: http://woeid.rosselliot.co.nz/lookup/
	----------*/

	$data = get_data("http://weather.yahooapis.com/forecastrss?w=2379574&u=f");
	$condition = get_match('/<yweather:condition  text="(.*)"/isU',$data);
	$temp = get_match('/<yweather:condition\s+(?:.*\s)?temp="(.+)"/isU',$data);
	$code = get_match('/<yweather:condition\s+(?:.*\s)?code="(.+)"/isU',$data);

	
	/* helper:  does regex */  
	function get_match($regex,$content)  
	{  
		preg_match($regex,$content,$matches);  
		return $matches[1];  
	}
	
	/* gets the xml data from Alexa */
	function get_data($url)
	{
		$ch = curl_init();
		$timeout = 5;
		curl_setopt($ch,CURLOPT_URL,$url);
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
		curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,$timeout);
		$xml = curl_exec($ch);
		curl_close($ch);
		return $xml;
	}
	
?>

<span class="icon weather-<?php echo $code ?>"></span>
<div class="conditions"><span class="temperature"><?php echo $temp ?>&deg;</span>
<span class="condition"><?php echo $condition; ?></span></div>
	
```
Set the weather location and other variables in weather.php.
The javascript timer for the weather widget is in footer.php to allow it to find the correct path to weather.php.

###Clock
Drag a text widget into the Footer. Paste in the following div:

```html
<div class="clock">
	<ul>
		<li id="hours"> </li>
		<li id="point">:</li>
		<li id="min"> </li>
	</ul>
	<div id="Date"></div>
</div>
```
[thanks to @Bluxart](http://www.alessioatzeni.com/blog/css3-digital-clock-with-jquery)


###Twitter
Drag a text widget into the Footer. Paste in the following div:
```html
<div id="twitter_div"></div>
```
adjust js/app.js line 24 to include your Twitter username, not mine.
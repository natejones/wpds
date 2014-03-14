##Digital Signage Wordpress Theme using Zurb's Foundation 4.

This work is licensed under a [Creative Commons Attribution-NonCommercial-ShareAlike 3.0 Unported License](http://creativecommons.org/licenses/by-nc/3.0/).
You are free to share & remix, but you must make attribution and you may not sell it.

I really want to see a picture of this being used. Seriously. Please take a quick picture with your phone and tweet it to me [@natejones](https://twitter.com/natejones), or email [nate@pixelydo.com](mailto:nate@pixelydo.com).


##Widgets

###Weather
Drag a text widget into the Footer. Paste in the following:
```php
<?php

	/*----------
	$data parameters are w=YourWOEID and u=units (f or c)
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
[thanks to @chriscoyier](http://css-tricks.com/using-weather-data-to-change-your-websites-apperance-through-php-and-css/)


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
<div id="tweets"></div>
```
####Original project page: www.jasonmayes.com/projects/twitterApi

####HOW TO CREATE A VALID ID TO USE:
* Go to www.twitter.com and sign in as normal, go to your settings page.
* Go to "Widgets" on the left hand side.
* Create a new widget for what you need eg "user timeline" or "search" etc. 
* Feel free to check "exclude replies" if you dont want replies in results.
* Now go back to settings page, and then go back to widgets page, you should see the widget you just created. Click edit.
* Now look at the URL in your web browser, you will see a long number like this: 345735908357048478
* Use this as your ID below instead!

####How to use fetch function:
* @param {string} Your Twitter widget ID.
* @param {string} The ID of the DOM element you want to write results to. 
* @param {int} Optional - the maximum number of tweets you want returned. Must be a number between 1 and 20.
* @param {boolean} Optional - set true if you want urls and hash tags to be hyperlinked!
* @param {boolean} Optional - Set false if you dont want user photo / name for tweet to show.
* @param {boolean} Optional - Set false if you dont want time of tweet to show.
* @param {function/string} Optional - A function you can specify to format tweet date/time however you like. This function takes a JavaScript date as a parameter and returns a String representation of that date. Alternatively you may specify the string 'default' to leave it with Twitter's default renderings.
* @param {boolean} Optional - Show retweets or not. Set false to not show.
* @param {function/string} Optional - A function to call when data is ready. It also passes the data to this function should you wish to manipulate it yourself before outputting. If you specify this parameter you  must output data yourself!
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
	<div class="row">
		<div class="twelve columns weather-<?php echo $code ?>">&nbsp;</div>
	</div>
	<div class="row">
		<div id="temp" class="four columns "><?php echo $temp ?>&deg;</div>
		<div id="condition" class="eight columns"><?php echo $condition; ?></div>
	</div>
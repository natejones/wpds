<?php
$xml = simplexml_load_file('http://www.google.com/ig/api?weather=60605');
$information = $xml->xpath("/xml_api_reply/weather/forecast_information");
$current = $xml->xpath("/xml_api_reply/weather/current_conditions");
$forecast_list = $xml->xpath("/xml_api_reply/weather/forecast_conditions");
?>
	<div class="row">
		<div class="twelve columns weather-<?php $weather =  $current[0]->condition['data']; $weatherclass = str_replace(' ','-',$weather); $weatherclass = strtolower($weatherclass); echo $weatherclass; ?>">&nbsp;</div>
	</div>
	<div class="row">
		<div id="temp" class="four columns "><?= $current[0]->temp_f['data'] ?>&deg;</div>
		<div id="condition" class="eight columns"><?= $current[0]->condition['data'] ?></div>
	</div>
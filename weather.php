<?php
$URL = "http://www.google.com/ig/api?weather=60618"; //change for your postal code or other parameters: http://blog.programmableweb.com/2010/02/08/googles-secret-weather-api/
$dataInISO = file_get_contents($URL);
$dataInUTF = mb_convert_encoding($dataInISO, "UTF-8", "ISO-8859-2");
$xml = simplexml_load_string($dataInUTF);
$current = $xml->xpath("/xml_api_reply/weather/current_conditions");
?>
	<div class="row">
		<div class="twelve columns weather-<?php $weather =  $current[0]->condition['data']; $weatherclass = str_replace(' ','-',$weather); $weatherclass = strtolower($weatherclass); echo $weatherclass; ?>">&nbsp;</div>
	</div>
	<div class="row">
		<div id="temp" class="four columns "><?= $current[0]->temp_f['data'] ?>&deg;</div>
		<div id="condition" class="eight columns"><?= $current[0]->condition['data'] ?></div>
	</div>

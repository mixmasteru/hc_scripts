<?php
/**
 * returns one random useless knowledge fact from neon
 * 
 */

error_reporting(E_ALL);
ini_set('display_errors', 1);

$fakt = "";
$min = 8801;
$max = 17700;
$try = 0;
$url = "";

while($try++ <= 5)
{
	$rand= rand($min,$max);
	$url = "http://unnuetzes-wissen.neon.de/entry/".$rand;
	$headers = get_headers($url);

	if(strpos($headers[0],"404 Not Found") !== false) {
		continue;
	}

	$tags = get_meta_tags($url);
	$fakt = $tags["description"];
	break;
}

$arr =  array(	"message" => $fakt,
				"color" => 'green',
				"message_format" => "text",
				"url" => $url
		);

header("content-type: application/json",200);
echo json_encode($arr);



<?php
/**
 * returns one random short fake news from postillion
 */
  
$url = "http://www.der-postillion.de/ticker/newsticker2.php";
$json = file_get_contents($url);
$arr = json_decode(substr($json,3),true);
$news = $arr['tickers'][rand(0,19)]['text'];

header("content-type: application/json",200);
echo json_encode(array(	"message" => $news,
			"color" => 'green',
			"message_format" => "text"
			));

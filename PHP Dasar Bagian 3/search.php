<?php
$string = "fjrstp";
$array = [['f','g','h','i'],['j','k','p','q'],['r','s','t','u']];

cari($array, $string);

function cari(array $array, $string){
	$text = str_split(strval($string));
	$x = array_search($text, $array);
	$status = false;
	$true = 0;
	foreach ($text as $str) {
		foreach ($array as $item) {
			if(in_array($str, $item)){
				$true++;
			}
		}
		
	}
	if ($true == count($text)) {
		echo "true";
		$status = true;
	} else {
		echo "false";
		$status = false;
	}
}

?>
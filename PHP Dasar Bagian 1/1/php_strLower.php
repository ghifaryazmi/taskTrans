<?php
//$string ="TranSISI";
$input = $_POST[input];
echo countLowerCase($input);

function countLowerCase($string){
	$array = str_split(strval($string));
	$string2 = strtolower($string);
	$array2 = str_split(strval($string2));
	$akhir = 0;
	for ($i=0; $i < count($array) ; $i++) { 
		if ($array[$i] === $array2[$i]) {
			$total++;
		}

	}
	echo '"'.$string.'" '.'mengandung '.$total . " buah huruf kecil";
}

?>
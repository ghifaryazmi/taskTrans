<?php
$input = $_POST[input];	
myEncrypt($input);

function myEncrypt($string){
	$array = str_split(strval($string));
	$huruf = ['A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z'];
	$hasilAkhir = '';
	$status = true;
	$index = 1;
	$temp = 0;
	for ($i=0; $i < count($array); $i++) { 
		$temp = array_search($array[$i], $huruf);
		if ($status == true) {
			$hasilAkhir .= $huruf[$temp+$index];
			$status = false;
		} else {
			$x = $temp-$index;
			if ($x < 0) {
				$x = count($huruf) + ($x);
			}
			$hasilAkhir .= $huruf[$x];
			$status = true;
		}
		$index++;
	}

	echo "Hasil Enkripsi : ".$hasilAkhir;
}

?>
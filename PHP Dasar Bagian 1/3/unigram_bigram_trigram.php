<?php
$string = "Jakarta adalah ibukota negara Republik Indonesia";

echo unigram($string);
echo "<br>";
echo bigram($string);
echo "<br>";
echo trigram($string);

function unigram($string){
	$array = explode(' ', $string);

	$hasilUnigram = '';
	foreach ($array as $item) {
		$hasilUnigram .= $item.', ';
	}
	$hasilUnigram = substr($hasilUnigram, 0, -2);

	$hasilAkhir = 'Unigram : '. $hasilUnigram;

	return $hasilAkhir;
}

function bigram($string){
	$array = explode(' ', $string);

	$count = 0;
	$hasilBigram = '';
	foreach ($array as $i) {
		if ($count < 1) {
			$hasilBigram .= $i.' ';
			$count++;
		} else {
			$hasilBigram .= $i.', ';
			$count = 0;
		}
	}
	$hasilBigram = substr($hasilBigram, 0, -2);

	$hasilAkhir .= 'Bigram : '. $hasilBigram;

	return $hasilAkhir;
}

function trigram($string){
	$array = explode(' ', $string);

	$count = 0;
	$hasilTrigram = '';
	foreach ($array as $i) {
		if ($count < 2) {
			$hasilTrigram .= $i.' ';
			$count++;
		} else {
			$hasilTrigram .= $i.', ';
			$count = 0;
		}
	}
	$hasilTrigram = substr($hasilTrigram, 0, -2);

	$hasilAkhir .= 'Trigram : '. $hasilTrigram;

	return $hasilAkhir;
}
?>
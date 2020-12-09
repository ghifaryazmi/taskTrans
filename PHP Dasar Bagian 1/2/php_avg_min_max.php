<?php  
	$nilai = "72 65 73 78 75 74 90 81 87 65 55 69 72 78 79 91 100 40 67 77 86";
	
	echo "Sebuah string dengan nilai = " .$nilai;
	echo "<br>";
	echo "Hasil Rata Rata dari String di atas = ".average($nilai);
	echo "<br>";
	echo "Nilai tertinggi dari string di atas = ".highestScore($nilai);
	echo "<br>";
	echo "Nilai terendah dari string di atas = ".lowerScore($nilai);



	//Fungsi Rata-Rata
	function average($string)
	{
		$nilai = explode(" ", $string);
		$count = count($nilai);
		$hasil = 0;
		$total = 0;

		for ($i=0; $i < $count; $i++) { 
			$total = $total + $nilai[$i];	
		}

		$hasilAkhir = $total / $count;

		return $hasilAkhir;
	}

	function highestScore($string)
	{
		$nilai = explode(" ", $string);
		$maxValue = max($nilai);
		
		return $maxValue;
	}

	function lowerScore($string)
	{
		$nilai = explode(" ", $string);
		$minValue = min($nilai);
		
		return $minValue;
	}
?>
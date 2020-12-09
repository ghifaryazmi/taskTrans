<?php
 
  $count = 1;
  $index = 1;
  echo "<table>";
  for($i = 0; $i < 8; $i++){
   echo '<tr>';
    for($j = 0; $j < 8; $j++){
      echo '<td '.rumusTabel($index).'>';
      echo $count++;
      echo '</td>';
      if ($index==12) {
        $index = 1;
      } else {
        $index++;
      }
    }
   echo '</tr>';
  }
  echo "</table>";

function rumusTabel($string){
  $hitam  = [1,2,5,7,10,11];
  $putih = [3,4,6,8,9,12];

  if (in_array($string, $hitam)) {
    return 'style="background-color : black; color: white; text-align:center;"';
  } else {
    return 'style="background-color : white; text-align:center;"';
  }
}

?>
<?php
  $filas  = "<table><tbody>";
  
  $filas .= "<thead>";
  $filas .= "<th></th>";
  for ($i=1; $i <= 20; $i++) {
    $filas .= "<th class=\"headers\">".$i."</th>";
  }

  for ($i=1; $i <= 20; $i++) {
    $filas .= "<tr>";
    $filas .= "<td class=\"headers\">".$i."</td>";
    for ($j=1; $j <= 20 ; $j++) {
      if ( $i == $j ){
        $filas .= "<td class=\"diagonal\">";
      }
      else{
        $filas .= "<td>";
      }
      $filas .= $i*$j."</td>";
    }
    $filas .= "</tr>";
  }
  $filas .= "</tbody></table>";
  echo $filas;
  echo "<script>console.log( 'Debug Objects: " . $filas . "' );</script>";
?>

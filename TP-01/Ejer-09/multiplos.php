<?php

  if ( isset($_POST["valor"]) ){

    $valor  = $_POST["valor"];

  	$tabla  = "<table><tbody>";

  	$filas = "";
  
	for ($i=1; $i <= $valor; $i++) {
	  
	  $filas  .= "<tr>";

	  for ($j=1; $j <= $valor ; $j++) {
	    $filas .= "<td>".$i*$j."</td>";
	  }

	  $filas .= "</tr>";
	}

	$tabla .= $filas."</tbody></table>";

	echo $tabla;

  }

?>

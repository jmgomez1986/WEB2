<?php

  if ( isset($_POST["termA"]) && isset($_POST["termB"]) && isset($_POST["termC"]) ){

    $termA  = $_POST["termA"];
    $termB  = $_POST["termB"];
    $termC  = $_POST["termC"];

    $condicion = pow($termB, 2);

    $cond = 4 * $termA * $termC;

    $ecuacionTerm1 = -1 * $termB;

    if ($condicion < $cond) {

      $ecuacionTerm2 =  sqrt( ( $cond - $condicion ) );

      $x1 = ( $ecuacionTerm1 / (2 * $termA) ).'-'.( $ecuacionTerm2 / (2 * $termA) ).'i';
    	$x2 = ( $ecuacionTerm1 / (2 * $termA) ).'+'.( $ecuacionTerm2 / (2 * $termA) ).'i';

    	echo "<p>"."X1 = ".$x1."</p>"."<p>"."X2 = ".$x2."</p>";

    }
    elseif ($condicion == $cond) {

    	$ecuacion = $ecuacionTerm1  / (2 * $termA);

    	echo "<p>"."X1 = X2 = ".$ecuacion."</p>";
    }
    elseif ($condicion > $cond) {

    	$ecuacionTerm2 =  sqrt( ( $condicion - $cond ) );

    	$x1 = ( $ecuacionTerm1 - $ecuacionTerm2 ) / (2 * $termA);
    	$x2 = ( $ecuacionTerm1 + $ecuacionTerm2 ) / (2 * $termA);

    	echo "<p>"."X1 = ".$x1."</p>"."<p>"."X2 = ".$x2."</p>";
    }

  }
  else{
  	echo "Alguno de los términos se encuentra vacío.!!!!!!";
  }

?>

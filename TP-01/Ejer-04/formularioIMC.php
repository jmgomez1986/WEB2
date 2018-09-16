<?php

  $indiceCorporal = array(
    "bp"  => "Bajo peso",
    "nl"  => "Normal",
    "sp"  => "Sobrepeso",
    "ob"  => "Obesidad"
  );

  if(isset($_GET['altura'])){
      $altura = $_GET['altura'];
      echo "Su altura es: " . $altura . "<br/>";
  }

  if(isset($_GET['peso'])){
      $peso = $_GET['peso'];
      echo "Su peso es: " . $peso . "<br/>";
  }

  $altura = str_replace(",", ".", $altura);
  $peso   = str_replace(",", ".", $peso);

  // echo "formatAltura: $altura"."<br/>";
  // echo "formatPeso: $peso"."<br/>";

  $imc = $peso / ($altura**2);

  $imc   = number_format ($imc, 2 , "." , "," ); 

  echo "Su IMC es $imc";
  echo "<br/>";
  echo "<br/>";

  if ( $imc < 18.50 ){
    echo "<h1>".$indiceCorporal["bp"]."</h1>";
  }
  elseif ( $imc <= 18.50 && $imc >= 24.99 ) {
    echo "<h1>".$indiceCorporal["nl"]."</h1>";
  }
  elseif ( $imc >= 25 && $imc < 30 ) {
    echo "<h1>".$indiceCorporal["sp"]."</h1>";
  }
  elseif ($imc >= 30) {
    echo "<h1>".$indiceCorporal["ob"]."</h1>";
  }

?>

<?php
  if(isset($_GET['numero01'])){
      $num01 = $_GET['numero01'];
      echo "Primer numero ingresado: " . $num01 . "<br/>";
  }

  if(isset($_GET['numero02'])){
      $num02 = $_GET['numero02'];
      echo "Segundo numero ingresado: " . $num02 . "<br/>";
  }

  if(isset($_GET['numero03'])){
      $num03 = $_GET['numero03'];
      echo "Tercer numero ingresado: " . $num03 . "<br/>";
  }

  $resultado = operar($num01, $num02, $num03);

  echo "<br>";
  echo "La operacion realizada es:";
  echo "<br>";
  echo "( $num01 X $num02 ) - $num03 = $resultado";

  function operar($n1, $n2, $n3){
    $mult = $n1*$n2;
    return $mult-$n3;
  }

?>

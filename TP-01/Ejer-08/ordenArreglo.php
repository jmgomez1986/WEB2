<?php

  if ( isset($_POST["arreglo"]) ){
    $arrayTmp = $_POST["arreglo"];
    $array = explode( ',', $arrayTmp );
    rsort($array);
    // var_dump($array);
    echo json_encode($array, JSON_PRETTY_PRINT);
  }

?>

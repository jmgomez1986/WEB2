<?php

  if(isset($_POST['palabra01'])){
      $str01 = $_POST['palabra01'];
      echo "Primer palabra ingresada: " . $str01 . "<br/>";
  }

  if(isset($_POST['palabra02'])){
      $str02 = $_POST['palabra02'];
      echo "Segunda palabra ingresada: " . $str02 . "<br/>";
  }

  echo $str01 . " " . $str02;

?>

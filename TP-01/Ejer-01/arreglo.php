<?php
  $elementos = array();
//a)
  array_push($elementos,"5");
  $count = count($elementos);
  echo "El arreglo posee $count elementos";
  echo "<br>";
  echo "<br>";
  echo "Los elementos del arreglo son:";
  echo "<br>";
  foreach ($elementos as $elemento) {
    echo "<li>$elemento</li>";
  }
  //b)
  echo "<br>";
  echo "Los elementos del arreglo son:";
  echo "<br>";
  array_splice($elementos, 1, 0, "6");
  $count = count($elementos);
  foreach ($elementos as $elemento) {
    echo "<li>$elemento</li>";
  }
  echo "<br>";
  echo "El arreglo posee $count elementos";
?>

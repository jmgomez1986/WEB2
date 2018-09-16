<?php
  
  if( isset($_POST['capital']) && isset($_POST['tiempo']) && isset($_POST['interes']) ){
    
    $capital = $_POST['capital'];
    $meses   = $_POST['tiempo'];
    $interes = $_POST['interes'];

    $cap   = "<p>Capital invertido : $".$capital."</p>";
    $month = "<p>Meses de inversion: ".$meses."</p>";
    $int   = "<p>Interes mensual   : ".$interes."%"."</p>";

    $info = "<div class=\"informacion\">".$cap.$month.$int."</div>";

    echo $info."</br>";

    $filas = "<table class=\"tabla\">";

    $filas .= "<thead>";    

    $filas .= "<tr>";

    for ($mesI = 1; $mesI <= $meses ; $mesI++){
      $filas .= "<th>"."Mes ".$mesI."</th>";
    }

    $filas .= "</tr>";

    $filas .= "</thead>";

    $filas .= "<tbody>";

    $filas .= "<tr>";

    for ($mesJ = 1; $mesJ <= $meses; $mesJ++){
      $monto = ( ( $capital * ($interes/100) ) * $mesJ ) + $capital;
      $filas .= "<td>"."$".$monto."</td>";
    }

    $filas .= "</tr>";

    $filas .= "</tbody></table>";

    echo $filas;
  }
?>

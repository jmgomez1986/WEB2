<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Practico01-Ejercicio05</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
  </head>
  <body>
      <?php
//En la URL del navegador por ejemplo: http://localhost/proyectos/Ejercicios/TP-01/Ejer-10/operacion.php?val01=4&val02=2&oper=s
        if( isset($_GET['val01']) && isset($_GET['val02']) && isset($_GET['oper']) ){
          $valor01  = $_GET['val01'];
          $valor02  = $_GET['val02'];
          $operador = $_GET['oper'];

          if( $operador == 's'){
            echo '<h1>'.$valor01.' + '.$valor02.' = '.($valor01+$valor02).'</h1>';
          }
          elseif( $operador == 'r'){
            echo '<h1>'.$valor01.' - '.$valor02.' = '.($valor01-$valor02).'</h1>';
          }
          elseif( $operador == 'm'){
            echo '<h1>'.$valor01.' X '.$valor02.' = '.($valor01*$valor02).'</h1>';
          }
        }
        else{
          echo 'Debe ingresar los operandos y la operacion';
        }
      ?>
  </body>
</html>

<?php

  $Titulo = "Intereses y Deudas";

 ?>

  <!doctype html>
  <html lang="en">
    <head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

      <title><?php echo $Titulo ?></title>
    </head>
    <body>
      <h1><?php echo $Titulo ?></h1>

      <div class="container">

          <?php
            $path = "C:\Users\LucasMauro\Google Drive\Universidad\TUDAI\Web II\Trabajos practicos\Ejercicios\TP-03\Ejer-02\interesesDeudas.csv";

            $file = fopen($path, "r");

            $fila = array();

            while (!feof($file)){
              array_push($fila, fgets($file));
            }

            fclose($file);

            $db =  new PDO('mysql:host=localhost;'
                            .'dbname=web2_tp02;charset=utf8'
                            , 'root', '');

            for ($i=1; $i<count($fila) ; $i++) {

              // $arrayCSV = str_getcsv($fila[$i], ";");
              // var_dump($arrayCSV);
              $reg = explode( ";", $fila[$i] );

              if (!empty($fila[$i])){

                if (!empty($reg[1]) ){
                  $reg[1] = str_replace("/", "-", $reg[1]);
                  $fecha = explode( "-", $reg[1] );
                  $reg[1] = $fecha[2].'-'.$fecha[1].'-'.$fecha[0];
                }

                if (!empty($reg[2]) ){
                  $reg[2] = str_replace("/", "-", $reg[2]);
                  $fecha = explode( "-", $reg[2] );
                  $reg[2] = $fecha[2].'-'.$fecha[1].'-'.$fecha[0];
                }

                if ( $i == count($fila)-2 ) {
                  $reg[1] = date("Y").'-'.date("m").'-'.date("d");
                }

                $reg[3] = str_replace(",", ".", $reg[3]);
                $reg[4] = str_replace(",", ".", $reg[4]);
                $reg[5] = str_replace(",", ".", $reg[5]);

                // echo 'FILA: '.$fila[$i].'</br>';
                // echo 'Long. de arreglo REG: '.count($reg).'</br>';
                // for ($j=0; $j<count($reg) ; $j++) {
                //   echo 'Valor de columna: '.$reg[$j].'</br>';
                // }

                $sentencia = $db->prepare("INSERT INTO interes_deuda(Deudor, Cuota, Cuota_Capital, Vencimiento, Fecha_Pago, Interes, Pagado) VALUES(?,?,?,?,?,?,?)");
                $sentencia->execute(array($reg[6], $reg[0], $reg[3], $reg[2], $reg[1], $reg[4], $reg[5] ) );

              }
              else{
                echo '<h1>FILA VACIA!!!!</h1>';
              }

            }

           ?>

      </div>

      <!-- Optional JavaScript -->
      <!-- jQuery first, then Popper.js, then Bootstrap JS -->
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    </body>
  </html>

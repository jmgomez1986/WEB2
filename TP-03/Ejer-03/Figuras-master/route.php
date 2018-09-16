<?php

  function connect(){
    $db =  new PDO('mysql:host=localhost;'
                    .'dbname=web2_tp02;charset=utf8'
                    , 'root', '');
    return $db;
  }

  function disconnect(){
    $db =  null;
    return $db;
  }

  function showFigure($sentencia){
    $lista = "<ul>";
    while($figura = $sentencia->fetch(PDO::FETCH_ASSOC)){
      $lista .= '<li>' .'Figura: ' . $figura['nombre_figura']
              . '<ul>'
                . '<li>' . 'Area: '      . $figura['area_figura'] . '</li>'
                . '<li>' . 'Perimetro: ' . $figura['perimetro_figura'] . '</li>'
              . '</ul>'
            .'</li>';
    }
    $lista .= "</ul>";
    return $lista;
  }

  function insertFigure($figura, $selected_object){
    $nombre    = $figura->getName();
    $area      = $figura->getArea();
    $perimetro = $figura->getPerimetro();

    $db = connect();
    $sentencia = $db->prepare("INSERT INTO figura(nombre_figura, area_figura, perimetro_figura)
                                VALUES(?,?,?)");
    $sentencia->execute(array($nombre, $area, $perimetro ) );
    $db = disconnect();

    $result = "<h1>Se creó la figura: ".$selected_object."</h1>";
    $result .= "Datos: ".$figura->ToString();

    return $result;
  }

?>

<html>
  <head>

  </head>

  <body>
    <?php

      $arrayFiguras = [ "crear"  =>  [ "circulo"   => "Circulo",
                                       "cuadrado"  => "Cuadrado",
                                       "triangulo" => "Trianguo"
                                     ],
                        "buscar"  => [  ],
                        "mostrar" => [ ]
                      ];

      require_once("Figura.php");
      require_once("Cuadrado.php");
      require_once("Triangulo.php");
      require_once("Circulo.php");
      require_once("Figuras.php");
      require_once("AreaFilter.php");

      if( isset($_GET['figura']) ){

        $partesURL = explode ('/', $_GET['figura']);

        if ( isset($arrayFiguras[$partesURL[0]]) ){

          if ( $partesURL[0] == 'crear'){

            if ( $partesURL[1] == 'circulo'){
              if ( isset($partesURL[2])){
                $selected_object = $arrayFiguras[$partesURL[0]][$partesURL[1]];
                $figura    = new Circulo($partesURL[2]);
                echo insertFigure($figura, $selected_object);
              }
              else{
                echo 'No ingresó el valor del radio';
              }
            }
            elseif ( $partesURL[1] == 'triangulo'){
              if ( isset($partesURL[2]) && isset($partesURL[3]) ){
                $selected_object = $arrayFiguras[$partesURL[0]][$partesURL[1]];
                $figura    = new Triangulo($partesURL[2], $partesURL[3]);
                echo insertFigure($figura, $selected_object);
              }
              else{
                echo 'No ingresó el valor de la base y altura';
              }
            }
            elseif ( $partesURL[1] == 'cuadrado'){
              if ( isset($partesURL[2])){
                $selected_object = $arrayFiguras[$partesURL[0]][$partesURL[1]];
                $figura    = new Cuadrado($partesURL[2]);
                echo insertFigure($figura, $selected_object);
              }
              else{
                echo 'No ingresó el valor de un lado';
              }
            }
          elseif ( $partesURL[0] == 'mostrar' ){

            if ( isset($partesURL[1] ) ){

                $db = connect();
                $sentencia = $db->prepare( "SELECT * FROM figura");
                $sentencia->execute();
                $figuras = $sentencia->fetchAll(PDO::FETCH_ASSOC);
                $db = disconnect();

                if ( $partesURL[1]-1 <= count($figuras) ){
                  echo "La figura Elegida es: " .'</br>'
                        . 'ID: '        . $figuras[$partesURL[1]-1]['id_figura'] .'</br>'
                        . 'Figura: '    . $figuras[$partesURL[1]-1]['nombre_figura'] .'</br>'
                        . 'Area: '      . $figuras[$partesURL[1]-1]['area_figura'] . "<br>"
                        . 'Perimetro: ' . $figuras[$partesURL[1]-1]['perimetro_figura'] . "<br>";
                }
                else{
                  print "LA FIGURA QUE DESEA MOSTRAR NO EXISTE!!!!";
                }
              }
            }
            else{
              echo '<h1> Ingrese un numero de figura valido';
            }
          }
          elseif ( $partesURL[0] == 'buscar' ){

            if ( isset($partesURL[1] ) ){

              $db = connect();
              $sentencia = $db->prepare( "SELECT * FROM figura WHERE area_figura < $partesURL[1]");
              $sentencia->execute();
              $db = disconnect();

              echo "Las figuras con area menor a ".$partesURL[1]." son:";
              $lista = showFigure($sentencia);
              echo $lista;
            }
            else{

              $db = connect();
              $sentencia = $db->prepare( "SELECT * FROM figura");
              $sentencia->execute();
              $db = disconnect();

              echo "Todas las figuras:";
              $lista = showFigure($sentencia);
              echo $lista;

            }
          }
        }
      }
    ?>
  </body>
</html>

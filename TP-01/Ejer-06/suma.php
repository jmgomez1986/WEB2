<?php
  if(isset($_POST['inputs'])){
    $inputsValues = $_POST['inputs']; // Returns an array
    // print_r($inputsValues); // Shows you all the values in the array
    $suma = 0;

    foreach ($inputsValues as $value) {
      $suma = $suma + $value;
    }
    echo $suma;//"<p class=\"res\">".$suma."</p>";
  }

?>

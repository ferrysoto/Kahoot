<?php
$pdo = new PDO("mysql:host=localhost; dbname=kahoot", "root", "P@ssw0rd");

if($pdo === false){
    die("ERROR: No hemos podido conectar con la base de datos: . " . mysqli_connect_error());
}

$creator = $_SESSION['id_creator'];
$title = mysqli_real_escape_string($pdo, $_REQUEST['title-quiz']);
$desc = mysqli_real_escape_string($pdo, $_REQUEST['description-quiz']);

$insert = "INSERT INTO quiz (id_creator, name, description) VALUES ('$creator', '$title', '$desc')";

if (mysqli_query($pdo, $insert)) {
  echo "Datos guardados correctamente";
} else {
  echo "No se han guardado los datos";
}

mysqli_close($pdo);
 ?>

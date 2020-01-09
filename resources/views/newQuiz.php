<?php
try {
  $pdo = new PDO("mysql:host=localhost; dbname=kahoot", "root", "P@ssw0rd");
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (\Exception $e) {
  die("ERROR: No hemos podido conectar con la base de datos: " . $e->getMessage());
}

try {
  $insert = "INSERT INTO quiz (id_creator, name, description) VALUES (:creator, :title, :description)";
  $stmt = $pdo->prepare($insert);

    // Bind parameters to statement
    $stmt->bindParam(':creator', $_REQUEST['id-creator']);
    $stmt->bindParam(':title', $_REQUEST['title-quiz']);
    $stmt->bindParam(':description', $_REQUEST['description-quiz']);
    $stmt->execute();
} catch (\Exception $e) {
  die("ERROR: No hemos podido insertar los datos $insert. " . $e->getMessage());
}


$creator = mysqli_real_escape_string($pdo, $_REQUEST['id-creator']);
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

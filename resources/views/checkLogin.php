<?php

$user = htmlspecialchars($_POST['nameUser']);
$pass = htmlspecialchars($_POST['password']);


	try {
        $pdo = new PDO("mysql:host=localhost; dbname=kahoot", "root", "");
        $query = $pdo->prepare("SELECT * FROM creators where username = '". $user ."' and password = SHA2('".$pass."',512);" );
        $query->execute();

        $registre = $query->fetch();
        if(!$registre){
      		echo "Contraseña o usuario incorrecto";
        }else{
        	echo "<script type='text/javascript'>
           				window.location = './dashboard.php';
      					</script>";
        }
    } catch (PDOException $e) {
    	echo "Failed to get DB handle: " . $e->getMessage() . "\n";
    	exit;
	}
?>

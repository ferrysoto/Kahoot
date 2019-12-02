<?php

	$usr = htmlspecialchars($_POST['user']);
	$psw = htmlspecialchars($_POST['password']);

	try {
        $pdo = new PDO("mysql:host=localhost;dbname=kahoot", "root", "");
        $query = $pdo->prepare("SELECT * FROM creators where username = '". $usr ."' and password = SHA2('".$psw."',512);" );
        $query->execute();

        $registre = $query->fetch();
        if(!$registre){
      		echo "Contraseña o usuario incorrecto";
        }else{
        	echo "Bien venido ". $usr;
        }
    } catch (PDOException $e) {
    	echo "Failed to get DB handle: " . $e->getMessage() . "\n";
    	exit;
	}
?>

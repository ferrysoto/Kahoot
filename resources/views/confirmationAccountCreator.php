<?php
	
	//$usr = $_POST['user'];
	//$psw = $_POST['password']
	$usr = htmlspecialchars($_POST['username']);
	$psw = htmlspecialchars($_POST['password']);
    $nme = htmlspecialchars($_POST['name']);
    $eml = htmlspecialchars($_POST['email']);
    
	try {
        $pdo = new PDO("mysql:host=localhost;dbname=kahoot", "paco", "Admin1234");

        $query = $pdo->prepare("INSERT INTO creators (role,username,name,email,password) VALUES   ('"1"','".$usr."','".$nme."','".$eml."',sha2('".$psw"',512)");

        $query->execute();
        
        $registre = $query->fetch();
        if(!$registre){
      		echo "ERROR";
        }else{
        	echo "REGISTRO CORRECTO ". $usr;
        }
    } catch (PDOException $e) {
    	echo "Failed to get DB handle: " . $e->getMessage() . "\n";
    	exit;
	}
?>
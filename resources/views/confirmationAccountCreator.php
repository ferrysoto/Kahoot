<?php
	
	$user = htmlspecialchars($_POST['username']);
	$pass = htmlspecialchars($_POST['password']);
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $type = htmlspecialchars($_POST['typeAccount']);

    
	try {
        $pdo = new PDO("mysql:host=localhost;dbname=kahoot", "paco", "Admin1234");

        $query = $pdo->prepare("INSERT INTO creators (role,username,name,email,password) VALUES (".$type.",'".$user."','".$name."','".$email."', sha2('".$pass."',512);");

        $res = $query->execute();
        
        

        if(!$res){
            print_r($query->errorInfo());
      		echo "ERROR";
        }else{
        	echo "REGISTRO CORRECTO ". $user;
        }
    } catch (PDOException $e) {
    	echo "Failed to get DB handle: " . $e->getMessage() . "\n";
    	exit;
	}
?>
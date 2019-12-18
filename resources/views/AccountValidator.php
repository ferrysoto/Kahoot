<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<?php 
    include '../helps/links.php';   
    ?>
		<title>Kahoot</title>
	</head>
	<body>
		<?php
		$user = htmlspecialchars($_POST['nameUser']);
		$pass = htmlspecialchars($_POST['password']);
		$name = htmlspecialchars($_POST['name']);
		$email = htmlspecialchars($_POST['email']);
		$type = htmlspecialchars($_POST['typeAccount']);

		try {
			$pdo = new PDO("mysql:host=localhost; dbname=kahoot", "root", "P@ssw0rd");
			$query = $pdo->prepare("INSERT INTO `creators` (`role`, `username`, `name`, `email`, `password`) VALUES ('$type', '$user', '$name', '$email', sha2('$pass', 512));");
			$res = $query->execute();

			if(!$res){
				print_r($query->errorInfo());
				echo "ERROR - Alguno de los datos del formulario es incorrecto o está incompleto";
			}else{
				echo "
				<div class='jumbotron'>
				<h1 class='display-4'>Welcome to Kahoot!</h1>
				<p class='lead'>Get Kahoot!'ing anywhere, anytime on your phone or tablet! Play on your own or challenge friends.</p>
				<hr class='my-4'>
				<p>¡Click to get more information or download app!</p>
				<a class='btn btn-primary btn-lg' href='https://kahoot.com/mobile-app/?deviceId=e0bd7683-825a-46cc-83a2-bf230ba0a20cR&sessionId=1575824718056' role='button' target='_blank'>Learn more</a>
				</div>
				";
				$query = $pdo->prepare("SELECT id_creator from creators where username='$user' AND password = sha2('$pass', 512)  AND email='$email';");
				$query->execute();

				$id_creator = $query->fetch();
				include 'saveImageProfile.php';
			}
		} catch (PDOException $e) {
			echo "Failed to get DB handle: " . $e->getMessage() . "\n";
			exit;
		}
		?>		
	</body>
</html>

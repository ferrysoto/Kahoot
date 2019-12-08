<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
		<link rel="stylesheet" href="./public/css/main.css">
		<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
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
			$pdo = new PDO("mysql:host=localhost; dbname=kahoot", "root", "");
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
			}
		} catch (PDOException $e) {
			echo "Failed to get DB handle: " . $e->getMessage() . "\n";
			exit;
		}
		?>		
	</body>
</html>

<!DOCTYPE html>
<html>
<head>
	<title>Kahoot!</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="../../public/css/questionPage.css">
</head>
<body>
	<div class="general">
		<div class="question">

			<?php
			try {
		        $pdo = new PDO("mysql:host=localhost; dbname=kahoot", "paco", "Admin1234");
		        $query = $pdo->prepare("select text from questions where id_quiz=(select id_quiz from room where pin=123456);" );
		        $query->execute();

		        $consulta = $query->fetchAll();
		        //$resultado = mysql_fetch_array($query, MYSQL_NUM);
		        if(!$consulta){
		      		echo "Error";
		        }else{
		        	
		        		echo $consulta[0][0];
		        	

		        }
		    } catch (PDOException $e) {
		    	echo "Failed to get DB handle: " . $e->getMessage() . "\n";
		    	exit;
			}

			?>



	  		
		</div>
		<div class="answer">
			foto mas respuesta
		</div>
		<div class="information">
			parte inferior
		</div>	
	</div>	





</body>
</html>
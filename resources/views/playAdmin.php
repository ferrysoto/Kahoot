<!DOCTYPE html>
<?php session_start(); 
include 'optionsButtons.php';
?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="refresh" content="5">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="../../public/css/backgroundColorChanges.css">
    <link rel="stylesheet" href="../../public/css/main.css">
    <title>PlayAdmin</title>
  </head>
  <body class="backgroundColorChanges">
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
	  <a class="navbar-brand" href="dashboard.php"><img style="max-height: 5vh;filter: brightness(100);" src="../img/logo.png"></a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>
	  <div class="collapse navbar-collapse" id="navbarText">
	    <ul class="navbar-nav mr-auto">
	      <li class="nav-item active">
	        <?php echo "<a class='nav-link' href=''>Playing: ".$_SESSION['pin']."<span class='sr-only'>(current)</span></a>";?>
	      </li>
	      <li class="nav-item active">
	        <a class="nav-link" href="playAdmin.php?cancel=true">Cancel Game<span class="sr-only"></span></a>
	      </li>
	    </ul>
	    <span class="navbar-text">
	    <?php 
   			$dirs = array_filter(glob('../img/imatges_perfil/*'), 'is_file');
			$srcImg="";
			foreach ($dirs as $key => $value) {
				if(strpos($value, $_SESSION['id_creator']) != false){
				$srcImg=$value;
				}
			}
			if (empty($srcImg)) {
				$srcImg='../img/imatges_perfil/default.png';
			}

	     	echo "<img class='mr-2' style='max-height: 5vh;' src='".$srcImg."''>";
	       	echo $_SESSION['nameCreator']; 
	    ?>
	    </span>
	  </div>
	</nav>
	<div class="container">
		<?php  
			$pdo = new PDO("mysql:host=localhost; dbname=kahoot", "root", "P@ssw0rd");
			$query = $pdo->prepare("SELECT status FROM room where id_room = ".$_SESSION['id_room'].";" );
   			$query->execute();
    		$status = $query->fetch();
    		if ($status['status']=="waiting") {
    			
    			echo '<div class="row">';
				echo'<div class="mx-auto bg-light mt-5 p-3">';
				echo "<h1>PIN: ".$_SESSION['pin']."</h1></div></div>";

				echo '<div class="p-2 align-self-center">';
								
									
				$query = $pdo->prepare("SELECT * FROM players where id_room = ".$_SESSION['id_room'].";" );
       			$query->execute();
        		$players = $query->fetchAll();
				if ($players) {
					echo "<div class='p-2 mx-auto'><a type='button' href='playAdmin.php?startGame=true' class='text-center btn btn-success btn-circle btn-xl'>Play</a>";
					echo "<div class='p-2' style='text-shadow: 1px 1px white;'><h4>Jugadores en total: ".count($players).".</h4></div>";

					echo "<div class='p-2 d-flex flex-wrap justify-content-center'>";
					foreach ($players as $player) {
				 		echo "<div class='m-3' style='text-shadow: 1px 1px white;''><h5>".$player['nickname']."</h5></div>";
				 	} 
				 	echo "</div>";
				}
				echo '</div>';
			}
			elseif ($status['status']=="finished") {
					echo "stadistics";
			

    		}elseif (is_numeric(intval($status['status']))) {
    			echo '<div class="row">';
				echo'<div class="mx-auto bg-light mt-5 p-3">';
				echo "<h1>Question ".($_SESSION['positionQuestion']+1).": ".$_SESSION['arrayQuestions'][$_SESSION['positionQuestion']]['text']."</h1></div></div>";
				echo "<div class='p-2 mx-auto'><a type='button' href='playAdmin.php?nextQuestion=true' class='text-center btn btn-success btn-circle btn-xl'>Next</a>";

				$query = $pdo->prepare("SELECT * FROM answers where id_question = '". intval($status['status'])."" ."';" );
                  $query->execute();
                  $answers = $query->fetchAll();
                  if ($answers) {                     
                    $colors=["red", "blue", "orange", "green"];
                    $symbol=['🔺','🔸','🔴','⬛'];
                    $position=0;
                      echo "<div class='p-2 d-flex flex-wrap justify-content-center'>";
                      foreach ($answers as $answer) {
                        echo "<div class='col-6 p-5' style='border: 1px solid black;text-shadow: 1px 1px white;background-color:".$colors[$position]."''><h5 style='background-color:white;'>".$symbol[$position]."".$answer['text']."</h5></div>";
                        $position++;
                      } 
                      echo "</div>";
                    }
                    echo '</div>';


    		}




		?>
						 

	</div>
  </body>
</html>
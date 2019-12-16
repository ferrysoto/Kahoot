<!DOCTYPE html>
<?php session_start(); 
include 'optionsButtons.php';
?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../../public/css/main.css">
    <title>Dashboard</title>
  </head>
  <body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
	  <a class="navbar-brand" href="../../index.php"><img style="max-height: 5vh;filter: brightness(100);" src="../img/logo.png"></a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>
	  <div class="collapse navbar-collapse" id="navbarText">
	    <ul class="navbar-nav mr-auto">
	      <li class="nav-item active">
	        <a class="nav-link" href="dashboard.php">Home<span class="sr-only">(current)</span></a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="#">Create</a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="editProfile.php">Edit Profile</a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="logout.php">Log Out</a>
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
		$pdo = new PDO("mysql:host=localhost; dbname=kahoot", "root", "");
        $query = $pdo->prepare("SELECT * FROM quiz where id_creator = ".  $_SESSION['id_creator'] .";" );
        $query->execute();
        $quizs = $query->fetchAll();
        if(!$quizs){
        	echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'><strong>Holy guacamole!</strong> You dont have any quiz<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
        }else{
          echo "<table class='table table-responsive-sm mt-5 mx-auto'><thead><tr><th class='text-center' scope='col'>Name Quiz</th><th scope='col' class='text-center'>Options</th></tr></thead><tbody>";
										
										
											foreach ($quizs as $quiz) {
												echo '<tr>' .
												  '<td class="align-middle">'.$quiz['name'].'</td>' .
												  '<td class="align-middle"><div class="btn-group d-flex justify-content-center" role="group" aria-label="First group">' .
												  	
													  '<a href="dashboard.php?play='.$quiz['id_quiz'].'" role="button" class="btn btn-primary " name="button" >Play</a>'.
													  '<a href="dashboard.php?edit='.$quiz['id_quiz'].'" role="button" class="btn btn-success" name="button">Edit</a>'.
													  '<a href="dashboard.php?delete='.$quiz['id_quiz'].'" role="button" class="btn btn-danger" name="button">Delete</a>'.
													  
												  '</div></td></tr>';
											}										 
									echo "</tbody></table>";
        }
	 ?>
	</div>
  </body>
</html>
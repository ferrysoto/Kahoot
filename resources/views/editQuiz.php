<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <?php 
    include '../helps/links.php';
    include 'optionsButtons.php';    
    ?>
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
	        <a class="nav-link" href="dashboard.php">Home</a>
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
		$pdo = new PDO("mysql:host=localhost; dbname=kahoot", "root", "P@ssw0rd");
        $query = $pdo->prepare("SELECT * FROM questions where id_quiz = ".  $_SESSION['editQuiz'] .";" );
        $query->execute();
        $questions = $query->fetchAll();
        if(!$questions){
        	echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'><strong>Holy guacamole!</strong> You dont have any questionsiz<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
        }else{
          echo "<table class='table table-responsive-sm mt-5 mx-auto'><thead><tr><th class='text-center' scope='col'>Text Question</th><th class='text-center' scope='col'>Answers</th><th scope='col' class='text-center'>Options</th></tr></thead><tbody>";
										
										
											foreach ($questions as $question) {
												echo '<tr>' .
												  '<td class="align-middle">'.$question['text'].'</td><td class="align-middle">';
												  
												  	$query = $pdo->prepare("SELECT * FROM answers where id_question = ".$question['id_question'].";" );
        											$query->execute();
        											$answers = $query->fetchAll();
        											if ($answers) {
        												foreach ($answers as $answer) {
        													echo $answer['text']."<br>";
        												}
        											}


												  echo '</td><td class="align-middle"><div class="btn-group d-flex justify-content-center" role="group" aria-label="First group">' .
													  '<a href="editQuiz.php?editQuestion='.$question['id_question'].'" role="button" class="btn btn-success" name="button">Edit</a>'.
													  '<a href="editQuiz.php?deleteQuestion='.$question['id_question'].'" role="button" class="btn btn-danger" name="button">Delete</a>'.
													  
												  '</div></td></tr>';
											}										 
									echo "</tbody></table>";
        }
	 ?>
	</div>
  </body>
</html>
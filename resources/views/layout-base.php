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
  	  <a class="navbar-brand" href="../../index.php"><img style="max-height: 3vh; filter: brightness(100);" src="../img/logo.png"></a>
  	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
  	    <span class="navbar-toggler-icon"></span>
  	  </button>
  	  <div class="collapse navbar-collapse" id="navbarText" style="justify-content: flex-end">
  	    <ul class="navbar-nav mr-auto" style="margin-right: 0!important;">
          <div class="dropdown">
            <a href="#" id="imageDropdown" data-toggle="dropdown">
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

        	     	echo "<img class='mr-2' style='max-height: 4vh;' src='".$srcImg."''>";
        	       	echo "<span class='stretched-link text-light'>" . $_SESSION['nameCreator'] . "</span>";
        	    ?>
            </a>
            <ul class="dropdown-menu" aria-labelledby="imageDropdown">
              <li><a class="dropdown-item" tabindex="-1" href="./myAccount.php">My Account</a></li>
              <li><a class="dropdown-item" tabindex="-1" href="./dashboard.php">My Kahoots</a></li>
              <li><a class="dropdown-item" tabindex="-1" href="./settings.php">Settings</a></li>
              <li class="dropdown-divider"></li>
              <li><a class="dropdown-item" tabindex="-1" href="logout.php" style="color: red">Log Out</a></li>
            </ul>
          </div>
  	      <!-- <li class="nav-item "> -->
  	        <!-- <a class="nav-link" href="dashboard.php">Home<span class="sr-only">(current)</span></a> -->
  	      <!-- </li> -->
  	    </ul>
  	  </div>
  	</nav>

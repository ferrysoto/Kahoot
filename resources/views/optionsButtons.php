<?php 
		
		$pdo = new PDO("mysql:host=localhost; dbname=kahoot", "root", "");

		if (isset($_GET['play'])){
		    $_SESSION['id_quiz']=$_GET['play'];
		    $pinIsAvailable=true;
		   while ($pinIsAvailable) {
		    	$num = sprintf("%06d", mt_rand(1, 999999));
		    	$query = $pdo->prepare("SELECT pin FROM room where pin = ".$num." AND LIKE 'waiting';" );
       			$query->execute();
        		$pins = $query->fetch();
        		if (!$pins) {
        			$pinIsAvailable=false;
        		}
		    }
		    $query = $pdo->prepare("INSERT INTO room (id_quiz, id_creator, pin, status ) VALUES (".$_SESSION['id_quiz'].", ". $_SESSION['id_creator'].", '".$num."', 'waiting');");
			$query->execute();
			$_SESSION['pin']=$num;
			$query = $pdo->prepare("SELECT id_room FROM room where pin = '".$num."';" );
			$query->execute();
			$idroom = $query->fetch();
			$_SESSION['id_room']=$idroom['id_room'];
			$_SESSION['positionQuestion']=0;
		    header("Location: playAdmin.php");
		}

		if (isset($_GET['edit'])){
			$_SESSION['editQuiz']=$_GET['edit'];
			header("Location: editQuiz.php");
		}
		if (isset($_GET['delete'])){			
			$query = $pdo->prepare("DELETE FROM quiz where id_quiz = ".  $_GET['delete'] .";" );
        	$query->execute();
        	header("Location: dashboard.php");
		}

		if (isset($_GET['deleteQuestion'])){			
			$query = $pdo->prepare("DELETE FROM questions where id_question = ".  $_GET['deleteQuestion'] .";" );
        	$query->execute();
        	header("Location: editQuiz.php");
		}


		if (isset($_GET['cancel'])){			
			$query = $pdo->prepare("DELETE FROM room where id_room = ".  $_SESSION['id_room'] .";" );
        	$query->execute();
        	header("Location: dashboard.php");
		}


		if (isset($_GET['startGame'])){	
			$query = $pdo->prepare("SELECT * FROM questions where id_quiz = '".$_SESSION['id_quiz']."';" );
			$query->execute();
			$_SESSION['arrayQuestions'] = $query->fetchAll();
			$id=$_SESSION['arrayQuestions'][$_SESSION['positionQuestion']]['id_question'];
			$query = $pdo->prepare("UPDATE room SET status ='".$id."' where id_room = ". $_SESSION['id_room'].";" );
        	$query->execute();
        	header("Location: playAdmin.php");
		}

		if (isset($_GET['nextQuestion'])){
			$_SESSION['positionQuestion']=$_SESSION['positionQuestion']+1;
			if (sizeof($_SESSION['arrayQuestions'])>$_SESSION['positionQuestion']) {
				$id=$_SESSION['arrayQuestions'][$_SESSION['positionQuestion']]['id_question'];
				$query = $pdo->prepare("UPDATE room SET status ='".$id."'' where id_room = ". $_SESSION['id_room'].";" );
			}else{
				$query = $pdo->prepare("UPDATE room SET status ='finished' where id_room = ". $_SESSION['id_room'].";" );
			}		
			
        	$query->execute();
        	header("Location: playAdmin.php");
		}


		if (isset($_GET['saveAnswer'])){			
			$query = $pdo->prepare("INSERT into votes SET (id_player, id_answer)status ='finished' values ".$_SESSION['id_player'].", ".$_GET['saveAnswer'].";" );
		
        	$query->execute();
        	header("Location: playPlayer.php");
		}

		

		?>
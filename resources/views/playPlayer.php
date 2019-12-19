<!DOCTYPE html>
<html>
<head>
<?php session_start(); 
include 'optionsButtons.php';
?>
    <meta http-equiv="refresh" content="5">   
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="../../public/css/main.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="../../public/css/backgroundColorChanges.css">
    <link rel="stylesheet" type="text/css" href="../../public/css/lds-spinner.css">
    <title>Kahoot</title>

</head>
<body class="backgroundColorChanges">

<nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="position: absolute;width: 100%;">
    <a class="navbar-brand" href="../../index.php"><img style="max-height: 5vh;filter: brightness(100);" src="../img/logo.png"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav mr-auto">
      </ul>
      <span class="navbar-text">
      <?php echo "Player: ".$_SESSION['playerNick']; ?>
      </span>
    </div>
  </nav>

  <div class="center-div">
  <div class="container center-div-inside">
    <div class="row ">
      <div class="col-xl-6 col-md-6 mx-auto text-center" style="vertical-align: middle;" >
          <?php 
              
              $pdo = new PDO("mysql:host=localhost; dbname=kahoot", "root", "P@ssw0rd");
              $query = $pdo->prepare("SELECT status FROM room where id_room = '". $_SESSION['id_room'] ."';" );
              $query->execute();
              $registre = $query->fetch();
              $status=$registre[0];

              if ($status=="waiting") {
                 echo "<h4 style='color:white;'>Waiting for players</h4>
                 <div class='max-auto lds-spinner'><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>";
              }elseif ($status=="finished") {
                    echo "Finished";
              }elseif($_SESSION['correct']){
                    
              }else{
                  $query = $pdo->prepare("SELECT * FROM answers where id_question = '". intval($status) ."';" );
                  $query->execute();
                  $answers = $query->fetchAll();
                  if ($answers) {                     
                    $colors=["red", "blue", "orange", "green"];
                    $symbol=['🔺','🔸','🔴','⬛'];
                    $position=0;
                    echo "<div class='p-2 d-flex flex-wrap justify-content-center'>";
                    $id_answerArray="(";
                       foreach ($answers as $answer) {
                              $id_answerArray.=" '".$answer['id_answer']."' ,";
                      } 
                      $id_answerArray.=")";
                      $query = $pdo->prepare("SELECT * FROM votes where idPlayer = '". $_SESSION['id_player'] ."' AND id_answer in ".$id_answerArray."  ;" );
                      $query->execute();
                      $registre = $query->fetch();

                      if (!$registre) {
                        foreach ($answers as $answer) {
                        echo "<div class='col-6 p-5' href='playPlayer.php?saveAnswer=".$answer['id_answer']."' style='border: 1px solid black;text-shadow: 1px 1px white;background-color:".$colors[$position]."''><h5>".$symbol[$position]."</h5></div>";
                        $position++;
                        } 
                      }else{
                        echo "<h1>You replied already</h1>";
                      }


                      
                      echo "</div>";
                    }
                    echo '</div>';
              
              }
        
            
            ?>
            
        </div>
      </div>
    </div>
  </div>


</body>
</html>
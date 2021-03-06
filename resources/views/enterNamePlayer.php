<!DOCTYPE html>
<html>
<head>
  <?php session_start(); ?>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="../../public/css/main.css">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="../../public/css/backgroundColorChanges.css">
    <title>Kahoot Nick</title>
</head>
<body class="backgroundColorChanges">
  <div class="center-div">
  <div class="container center-div-inside">
    <div class="row ">
      <div class="col-xl-3 col-md-3 mx-auto" >
          <img src="../img/logo.png" class="img-fluid mx-auto" style="filter: brightness(100);">
          <form method="post" action="#">
            <input class="form-control mt-3 col-12" type="text" name="name" placeholder="Enter your Nick">
            <button class="btn btn-primary mt-3  col-12" type="submit" name="pinSubmit">Enter</button>
          </form>
          <?php 
            if(isset($_POST['name'])){
              $_SESSION['playerNick']=$_POST['name'];

              $pdo = new PDO("mysql:host=localhost; dbname=kahoot", "root", "P@ssw0rd");
              $query=$pdo->prepare("INSERT INTO players (id_room, nickname) VALUES (".$_SESSION['id_room'].", '".$_SESSION['playerNick']."');");
              $query->execute();

              $query = $pdo->prepare("SELECT max(id_player) FROM players where id_room = ". $_SESSION['id_room'] ." and nickname = '".$_SESSION['playerNick']."';" );
              $query->execute();
              $registre = $query->fetch();
              
              if($registre){
                $_SESSION['id_player']=$registre[0];
                $_SESSION['correct']=null;
                echo "<script type='text/javascript'>                       window.location = './playPlayer.php';</script>";
              }
            }
            ?>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
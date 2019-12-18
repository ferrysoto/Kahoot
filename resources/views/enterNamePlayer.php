<!DOCTYPE html>
<html>
<head>
  <?php 
    include '../helps/links.php';
    include 'optionsButtons.php';    
    ?>
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
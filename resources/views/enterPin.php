<!DOCTYPE html>
<html>
<head>
  <?php 
    include '../helps/links.php';    
    ?>
    <link rel="stylesheet" type="text/css" href="../../public/css/backgroundColorChanges.css">
    <title>Kahoot PIN</title>
</head>
<body class="backgroundColorChanges">  
<div class="center-div">
  <div class="container center-div-inside">
    <div class="row">
      <div class="col-xl-3 col-md-3 mx-auto" >
          <img src="../img/logo.png" class="img-fluid mx-auto" style="filter: brightness(100);">
          <form method="post" action="#">
            <input class="form-control mt-3 col-12" type="text" name="pin" placeholder="Enter your PIN">
            <button class="btn btn-primary mt-3  col-12" type="submit" name="pinSubmit">Enter</button>
          </form>
          <?php 
            if(isset($_POST['pin'])){
              $pdo = new PDO("mysql:host=localhost; dbname=kahoot", "root", "P@ssw0rd");
              $query = $pdo->prepare("SELECT id_room, id_quiz FROM room where pin = '". $_POST['pin'] ."' and status = 'waiting';" );
              $query->execute();
              $registre = $query->fetch();
              if(!$registre){
                echo "<div class='mt-3 mx-auto alert alert-danger' role='alert'>Incorrect pin!</div>";
              }else{
                $_SESSION['id_room']=$registre[0];
                $_SESSION['id_quiz']=$registre[1];
                echo "<script type='text/javascript'>
                        window.location = './enterNamePlayer.php';
                      </script>";
        }
            }
            ?>
      </div>
    </div>
    </div>
  </div>
</body>
</html>
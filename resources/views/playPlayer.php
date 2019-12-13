<!DOCTYPE html>
<html>
<head>
    <?php session_start(); ?>
    <!--<meta http-equiv="refresh" content="5">    -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="../../public/css/main.css">

    <link rel="stylesheet" type="text/css" href="../../public/css/backgroundColorChanges.css">
    <link rel="stylesheet" type="text/css" href="../../public/css/lds-spinner.css">
    <title>Kahoot</title>

</head>
<body class="backgroundColorChanges">
<nav class="navbar navbar-dark bg-dark" style="position: absolute; width: 100%;">
  <a class="navbar-brand" href="../../index.php"><img style="max-height: 5vh;" src="../img/logo.png"></a>
  <?php  echo "<a class='navbar-brand'>Player: ".$_SESSION['playerNick']."</a></nav>";?>



  <div class="center-div">


  <div class="container center-div-inside">
    <div class="row ">
      <div class="col-xl-6 col-md-6 mx-auto text-center" style="vertical-align: middle;" >
          <?php 
              $correct=2;
              $pdo = new PDO("mysql:host=localhost; dbname=kahoot", "root", "");
              $query = $pdo->prepare("SELECT status FROM room where id_room = '". $_SESSION['id_room'] ."';" );
              $query->execute();
              $registre = $query->fetch();
              $status=$registre[0];
              if ($status=="waiting") {
                 echo "<h4 style='color:white;'>Waiting for players</h4>
                 <div class='max-auto lds-spinner'><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>";
              }elseif (empty($status) || $status=="finished") {
                    echo $status."Finished";
              }elseif($correct || $status=="pause"){
                    
              }else{
                echo "show question";
              
              }
        
            
            ?>
            
        </div>
      </div>
    </div>
  </div>


</body>
</html>
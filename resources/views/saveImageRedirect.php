
<?php  
session_start();
include '../helps/actionsDatabase.php';
$id_creator=selectFirstRow("id_creator","creators", "id_creator=".$_SESSION['id_creator']);

include 'saveImageProfile.php';

header("Location: myAccount.php");
?>
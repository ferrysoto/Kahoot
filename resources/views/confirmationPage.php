<?php
	include '../helps/actionsDatabase.php';
	// if(isset($_GET['token'])){
	// }

	$result = getCreatorByToken($_GET['token']);
	if (empty($result)){
		echo "Tu cuenta no esta activada porque no has creado ninguna cuenta.";
	}else{
		$id = $result[0];

		changeAccessPermissionTrue($id);
		header('Location: ../../index.php');

	}


?>

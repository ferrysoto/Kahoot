<?php

	/*function selectFirstRow(selectInfo,tableInfo,whereInfo){
		$pdo = new PDO("mysql:host=localhost; dbname=kahoot", "root", "P@ssw0rd");
		$query = $pdo->prepare("SELECT ".$selectInfo." FROM ".$tableInfo." WHERE ".$whereInfo." ;");
		$query->execute();
		$result=$query->fetch();
		return $result;
	}

	function selectAllRows(selectInfo,tableInfo,whereInfo){
		$pdo = new PDO("mysql:host=localhost; dbname=kahoot", "root", "P@ssw0rd");
		$query = $pdo->prepare("SELECT ".$selectInfo." FROM ".$tableInfo." WHERE ".$whereInfo." ;");
		$query->execute();
		$result=$query->fetchAll();
		return $result;
	}*/

	function changeAccessPermissionTrue($id){
		$pdo = new PDO("mysql:host=localhost; dbname=kahoot", "root", "P@ssw0rd");
		$query = $pdo->prepare("UPDATE creators SET confirmation_email='".true."' WHERE id_creator=:id");
		$query->bindParam(":id",$id);
		$query->execute();
		// $result=$query->fetch();
		// return $result;
	}


	function getCreatorByToken($token){
		$pdo = new PDO("mysql:host=localhost; dbname=kahoot", "root", "P@ssw0rd");
		$query = $pdo->prepare("SELECT * FROM creators WHERE token=:token");
		$query->bindParam(":token",$token);
		$query->execute();
		$result=$query->fetch();
		return $result;
	}

	function countRow($tableInfo,$whereInfo){
		$pdo = new PDO("mysql:host=localhost; dbname=kahoot", "root", "P@ssw0rd");
		$query = $pdo->prepare("SELECT count(*) FROM ".$tableInfo." WHERE ".$whereInfo." ;");
		$query->execute();
		$result=$query->fetch();
		return $result;
	}
/*
	function updateTable(tableInfo,setInfo,whereInfo){
		$pdo = new PDO("mysql:host=localhost; dbname=kahoot", "root", "P@ssw0rd");
		$query = $pdo->prepare("UPDATE ".$tableInfo." SET ".$setInfo." WHERE ".$whereInfo." ;");
		$query->execute();
	}

	function insertOnTable(tableInfo,valuesInfo,dataInfo){
		$pdo = new PDO("mysql:host=localhost; dbname=kahoot", "root", "P@ssw0rd");
		$query = $pdo->prepare("INSERT INTO ".$tableInfo." ".$valuesInfo." values (".$dataInfo.") ;");
		$query->execute();
	}

	function deleteFromTable(tableInfo,whereInfo){
		$pdo = new PDO("mysql:host=localhost; dbname=kahoot", "root", "P@ssw0rd");
		$query = $pdo->prepare("DELETE FROM ".$tableInfo." WHERE ".$whereInfo.";");
		$query->execute();
	}
*/
 ?>
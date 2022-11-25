<?php 

session_start();

include_once('connection.php');

if (isset($_SESSION['logged_in'])) {

		$id = $_GET['id'];
		$query = $pdo->prepare('DELETE FROM `talk` WHERE id = ? ');
		$query->bindValue(1,$id);

		$query->execute();
		
		header('Location:../cms.php');

	}
?>
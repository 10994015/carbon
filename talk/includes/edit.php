<?php 

session_start();

include_once('connection.php');

if (isset($_SESSION['logged_in'])) {

		$id = $_GET['id'];
		$title = $_POST['title'];
		$content = $_POST['content'];
		$query = $pdo->prepare('UPDATE talk SET text = ? , text2 = ? WHERE id = ? ');
		$query->bindValue(1,$title);
		$query->bindValue(2,$content);
		$query->bindValue(3,$id);

		$query->execute();
		
		header('Location:../cms.php');

	}
?>
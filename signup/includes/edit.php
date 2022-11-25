<?php 

session_start();

include_once('connection.php');

if (isset($_SESSION['logged_in'])) {

		$id = $_GET['id'];
		$title = $_POST['title'];
		$content = $_POST['content'];
	
		$query = $pdo->prepare('UPDATE signup SET title = ? , content = ? WHERE id = ? ');
		$query->bindValue(1,$title);
		$query->bindValue(2,$content);
		$query->bindValue(3,$id);

		$query->execute();
		
		header('Location:../admin/index.php');

	}
?>
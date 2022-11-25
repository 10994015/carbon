<?php 

session_start();

include_once('connection.php');

if (isset($_SESSION['logged_in'])) {

		$id = $_GET['id'];
		$title = $_POST['title'];
		$content = $_POST['content'];
		$query = $pdo->prepare('UPDATE composite SET article_title = ? , article_content = ? WHERE article_id = ? ');
		$query->bindValue(1,$title);
		$query->bindValue(2,$content);
		$query->bindValue(3,$id);

		$query->execute();
		
		header('Location:../admin/index.php');

	}
?>
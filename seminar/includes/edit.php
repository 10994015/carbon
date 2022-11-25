<?php 

session_start();

include_once('connection.php');

if (isset($_SESSION['logged_in'])) {

		$id = $_GET['id'];
		$title = $_POST['title'];
		$content = $_POST['content'];
		$content2 = $_POST['content2'];
		$query = $pdo->prepare('UPDATE seminar SET article_title = ? , article_content = ? , article_content2 = ? WHERE article_id = ? ');
		$query->bindValue(1,$title);
		$query->bindValue(2,$content);
		$query->bindValue(3,$content2);
		$query->bindValue(4,$id);

		$query->execute();
		
		header('Location:../admin/index.php');

	}
?>
<?php 

session_start();

include_once('connection.php');

if (isset($_SESSION['logged_in'])) {

		$id = $_GET['id'];
		$title = $_POST['title'];
		$content = $_POST['content'];
		$content2 = $_POST['content2'];
		$content3 = $_POST['content3'];
		$query = $pdo->prepare('UPDATE forum SET article_title = ? , article_content = ? , article_content2 = ? , article_content3 = ? WHERE article_id = ? ');
		$query->bindValue(1,$title);
		$query->bindValue(2,$content);
		$query->bindValue(3,$content2);
		$query->bindValue(4,$content3);
		$query->bindValue(5,$id);

		$query->execute();
		
		header('Location:../admin/index.php');

	}
?>
<?php 

session_start();

include_once('connection.php');

if (isset($_SESSION['logged_in'])) {

		$id = $_GET['id'];
		$title = $_POST['title'];
		$content = $_POST['content'];
		$content2 = $_POST['content2'];
		$content3 = $_POST['content3'];
		$content4 = $_POST['content4'];
		$query = $pdo->prepare('UPDATE newskonws SET text1 = ? , text2 = ? , text3 = ? , text4 = ? , article_timestamp = ? WHERE id = ? ');
		$query->bindValue(1,$title);
		$query->bindValue(2,$content);
		$query->bindValue(3,$content2);
		$query->bindValue(4,$content3);
		$query->bindValue(5,$content4);
		$query->bindValue(6,$id);

		$query->execute();
		
		header('Location:../cms.php');

	}
?>
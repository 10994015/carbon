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
		$a = $_POST['a'];
		$https = $_POST['https'];
		$email = $_POST['email'];
		$query = $pdo->prepare('UPDATE c_database SET article_title = ? , article_content = ? , article_content2 = ? , article_content3 = ? , article_content4 = ? , article_a = ? , article_email = ?, https = ?  WHERE article_id = ? ');
		$query->bindValue(1,$title);
		$query->bindValue(2,$content);
		$query->bindValue(3,$content2);
		$query->bindValue(4,$content3);
		$query->bindValue(5,$content4);
		$query->bindValue(6,$a);
		$query->bindValue(7,$email);
		$query->bindValue(8,$https);
		$query->bindValue(9,$id);

		$query->execute();
		
		header('Location:../admin/index.php');

	}
?>
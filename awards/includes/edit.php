<?php 

session_start();

include_once('connection.php');

if (isset($_SESSION['logged_in'])) {

		$id = $_GET['id'];
		$title = $_POST['title'];
		$content = $_POST['content'];
		$years = $_POST['years'];
		$unit = $_POST['unit'];
		$award = $_POST['award'];
		$query = $pdo->prepare('UPDATE awards SET title = ? , years = ? , content = ? ,unit=?,award=? WHERE id = ? ');
		$query->bindValue(1,$title);
		$query->bindValue(2,$years);
		$query->bindValue(3,$content);
		$query->bindValue(4,$unit);
		$query->bindValue(5,$award);
		$query->bindValue(6,$id);

		$query->execute();
		
		header('Location:../admin/index.php');

	}
?>
<?php 

session_start();

include_once('../includes/connection.php');

if (isset($_SESSION['logged_in'])) {
	if (isset($_GET['id'])) {
		$id = $_GET['id'];
		$query = $pdo->prepare('DELETE FROM black WHERE article_id = ?');
		$query->bindValue(1,$id);
		$query->execute();

		header('Location:index.php');
	}
}
?>

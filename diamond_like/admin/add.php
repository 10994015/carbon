<?php 

session_start();

include_once('../includes/connection.php');

if (isset($_SESSION['logged_in'])) {
	if (isset($_POST['title'],$_POST['content'])) {
		$title = $_POST['title'];
		$content = nl2br($_POST['content']);

		if (empty($title) or empty($content)) {
			$error='All fields are required!';
		}else{
			$query = $pdo->prepare('INSERT INTO diamond_like(article_title,article_content,article_timestamp) VALUES(?,?,?)');

			$query->bindValue(1,$title);
			$query->bindValue(2,$content);
			$query->bindValue(3,time());

			$query->execute();

			header('Location:index.php');
		}
	}
	?>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>cms</title>
	<link rel="stylesheet" href="../cms.css">
</head>
<body>
	<div class="container">
	<a href="index.php" title="" id="logo"></a>
		<br />
		
		<h4>新增文章</h4>

		<?php if (isset($error)) { ?>
		<small style="color: #aa0000;"><?php echo $error; ?></small>
		<br /><br />
		<?php } ?>

		<form action="add.php" method="post" autocomplete="off">
			<input type="text" name="title" placeholder="標題"><br /><br />
			<textarea rows="15" cols="50" placeholder="內文" name="content"></textarea><br /><br />
			<input type="submit" value="發布">
		</form>
	</div>
</body>
</html>

	<?php
}else{
	header('Location:index.php');
}
	?>

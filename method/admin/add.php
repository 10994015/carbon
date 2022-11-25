<?php 

session_start();

include_once('../includes/connection.php');

if (isset($_SESSION['logged_in'])) {
	if (isset($_POST['title'],$_POST['content'])) {
		$title = $_POST['title'];
		$content = ($_POST['content']);
	

		if (empty($title) or empty($content)) {
			$error='所有欄位都必填!';
		}else{
			$query = $pdo->prepare('INSERT INTO method(title,content) VALUES(?,?)');

			$query->bindValue(1,$title);
			$query->bindValue(2,$content);
		

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
	<style>
	input{
		width: 400px;	
	}
		</style>
</head>
<body>
	<div class="container">
	<a href="index.php" title="" id="logo">後台管理</a>
		<br />
		
		<h4>新增欄位</h4>

		<?php if (isset($error)) { ?>
		<small style="color: #aa0000;"><?php echo $error; ?></small>
		<br /><br />
		<?php } ?>

		<form action="add.php" method="post" autocomplete="off">
			<textarea name="title" id="" cols="50" rows="5" placeholder="抬頭"></textarea><br /><br />
			<textarea name="content" id="" cols="50" rows="30" placeholder="內文"></textarea><br /><br />
			
			
			<input type="submit" value="發布" id="submit">
		</form>
	</div>

	
</body>
</html>

	<?php
}else{
	header('Location:index.php');
}
	?>

<?php 

session_start();

include_once('../includes/connection.php');

if (isset($_SESSION['logged_in'])) {
	if (isset($_POST['title'],$_POST['content'],$_POST['content2'],$_POST['content3'],$_POST['content4'],$_POST['a'],$_POST['email'],$_POST['https'])) {
		$title = $_POST['title'];
		$content = nl2br($_POST['content']);
		$content2 = nl2br($_POST['content2']);
		$content3 = nl2br($_POST['content3']);
		$content4 = nl2br($_POST['content4']);
		$a = nl2br($_POST['a']);
		$email = nl2br($_POST['email']);
		$https = nl2br($_POST['https']);

		if (empty($title) or empty($content) or empty($content2) or empty($content3) or empty($content4) or empty($a) or empty($email)or empty($https)) {
			$error='每個欄位都為必填!';
		}else{
			$query = $pdo->prepare('INSERT INTO c_database(article_title,article_content,article_timestamp,article_content2,article_content3,article_content4,article_a,article_email,https) VALUES(?,?,?,?,?,?,?,?,?)');

			$query->bindValue(1,$title);
			$query->bindValue(2,$content);
			$query->bindValue(3,time());
			$query->bindValue(4,$content2);
			$query->bindValue(5,$content3);
			$query->bindValue(6,$content4);
			$query->bindValue(7,$a);
			$query->bindValue(8,$email);
			$query->bindValue(9,$https);
			


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
		
		

		<?php if (isset($error)) { ?>
		<small style="color: #aa0000;"><?php echo $error; ?></small>
		<br /><br />
		<?php } ?>

		<form action="add.php" method="post" autocomplete="off">
			<input type="text" name="title" placeholder="姓名"><br /><br />
			<input type="text" placeholder="服務單位" name="content"></input><br /><br />
			<input type="text" placeholder="職稱" name="content2"></input><br /><br />
			<textarea rows="3" cols="50" placeholder="研究領域" name="content3"></textarea><br /><br />
			<textarea rows="3" cols="50" placeholder="實驗室名稱" name="content4"></textarea><br /><br />
			<textarea rows="3" cols="50" placeholder="實驗室連結" name="a"></textarea><br /><br />
			<textarea rows="3" cols="50" placeholder="網站連結" name="https""></textarea><br /><br />
			<textarea rows="3" cols="50" placeholder="Email" name="email"></textarea><br /><br />
			<input type="submit" value="發布">
		</form>
		<h4>新增文章</h4>
	</div>
</body>
</html>

	<?php
}else{
	header('Location:index.php');
}
	?>

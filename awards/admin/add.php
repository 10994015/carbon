<?php 

session_start();

include_once('../includes/connection.php');

if (isset($_SESSION['logged_in'])) {
	if (isset($_POST['title'],$_POST['content'])) {
		$title = $_POST['title'];
		$years = $_POST['years'];
		$content = ($_POST['content']);
		$unit = ($_POST['unit']);
		$award = ($_POST['award']);

		if (empty($title) or empty($content) or empty($unit) or empty($award) ) {
			$error='所有欄位都必填!';
		}else{
			$query = $pdo->prepare('INSERT INTO awards(title,years,content,article_timestamp,unit,award) VALUES(?,?,?,?,?,?)');

			$query->bindValue(1,$title);
			$query->bindValue(2,$years);
			$query->bindValue(3,$content);
			$query->bindValue(4,time());
			$query->bindValue(5,$unit);
			$query->bindValue(6,$award);

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
			<input type="text" name="title" placeholder="獲獎人"><br /><br />
			<input type="text" name="years"" placeholder="年度"><br /><br />
			<input type="text" name="content"" placeholder="網站連結"><br /><br />
			
			<input type="text" name="unit"" placeholder="服務單位"><br /><br />
			<select name="award" value="嘿嘿">
			<option value="碳材科技獎">碳材科技獎</option>
			<option value="傑出服務獎">傑出服務獎</option>
			<option value="優秀年輕學者獎">優秀年輕學者獎</option>
			</select>
			<!-- <input type="text" name="award"" placeholder="獎項""><br /><br /> -->
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

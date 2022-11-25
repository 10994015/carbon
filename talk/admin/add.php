<?php 

session_start();

include_once('../includes/connection.php');

if (isset($_SESSION['logged_in'])) {
	if (isset($_POST['text1'],$_POST['text2'],$_POST['text3'],$_POST['text4'])) {
		$text1 = $_POST['text1'];
		$text2 = nl2br($_POST['text2']);
		$text3 = nl2br($_POST['text3']);
		$text4 = nl2br($_POST['text4']);

		if (empty($text1) or empty($text2) or empty($text3) or empty($text4)) {
			$error='All fields are required!';
		}else{
			$query = $pdo->prepare('INSERT INTO news(text1,text2,article_timestamp,text3,text4) VALUES(?,?,?,?,?)');

			$query->bindValue(1,$text1);
			$query->bindValue(2,$text2);
			$query->bindValue(3,time());
			$query->bindValue(4,$text3);
			$query->bindValue(5,$text4);

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
			<textarea rows="15" cols="50" placeholder="教授" name="content2"></textarea><br /><br />
			<textarea rows="15" cols="50" placeholder="內文" name="content"></textarea><br /><br />
			<textarea rows="15" cols="50" placeholder="網址" name="content3"></textarea><br /><br />
			<input type="submit" value="發布">
		</form>
	</div>

	<form action="uploads/add.php" method="post" accept-charset="utf-8" enctype="multipart/form-data">
 	<input type="file" name="file_name"><br>
 	<button type="submit" name="submit">Add</button>
 	</form>
 	<hr>
 	<h2>View Images</h2>
 	<?php 
 	include_once('uploads/connection.php');
 	$data="select * from news_images";
 	$result = mysqli_query($conn,$data);
 	while($row = mysqli_fetch_array($result)){?>

 	<right><a href="add.php?op=delete&file_name=<?php echo $row['file_name']?>">X</a></right>
 	<br/>
 	<img src="<?php echo 'uploads/upload/'.$row['file_name'];?>" width="200px" alt="" />

 	<?php
 	}
 	 ?>
 	 <a href="../index.php" title="">回前頁</a>
</body>
</html>

	<?php
}else{
	header('Location:index.php');
}
	?>

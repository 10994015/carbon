<?php 

session_start();

include_once('../includes/connection.php');

if (isset($_SESSION['logged_in'])) {

		$id = $_GET['id'];
		$query = $pdo->prepare('SELECT * FROM single WHERE article_id = ?');
		$query->bindValue(1,$id);

		$query->execute();

		$single = $query->fetch(PDO::FETCH_ASSOC);

?>

<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>cms</title>
	<link rel="stylesheet" href="">
	<style>

	ol {
		display: flex;
	}
	ol li a{
		margin-right: 50px;
	}

	input{
		width: 300px;padding:5px;height: 50px;
	}

	textarea{
		height: 300px
	}
		
	</style>
	
	
</head>
<body>
	<div class="container">
	<a href="index.php" title="" id="logo">會務公告</a>
	<br>
	<!-- 加入FORM -->
	<form method="POST" action="../includes/edit.php?id=<?php echo $id; ?>" accept-charset="utf-8">
		文章標題：<input type="text" name="title"   value=<?php echo $single['article_title']; ?>>
		<br>
		文章內容：<textarea name="content"><?php echo $single['article_content']; ?></textarea>
<br>
		<button type="submit">確定</button>
	</form>

		<a href="../../CarbonSocietyofTaiwanCMS.php" title="">回前頁</a>

		
	</div>
</body>
</html>
	<?php
		
	}
else{
	if (isset($_POST['username'],$_POST['password'])) {
		$username = $_POST['username'];
		$password = md5($_POST['password']);

		if (empty($username) or empty($password)) {
			$error = 'All field are required';
		}else{
			$query = $pdo->prepare("SELECT * FROM users WHERE user_name = ? AND user_password = ?");

			$query->bindValue(1,$username);
			$query->bindValue(2,$password);

			$query->execute();
 
			$num = $query->rowCount();

			if ($num == 1) {
				$_SESSION['logged_in'] = true;

				header('Location: index.php');
				exit();
				
			}else{
				$error = 'Incorrect details!';
			}
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
	<a href="index.php" title="" id="logo">CMS</a>
		<br /><br />

		<?php if (isset($error)) { ?>
		<small style="color: #aa0000;"><?php echo $error; ?></small>
		<br /><br />
		<?php } ?>



		<form action="index.php" method="post" autocomplete="off">
			<input type="text" name="username" placeholder="Username">
			<input type="password" name="password" placeholder="Password">
			<input type="submit" value="Login">
		</form>

		
	</div>
</body>
</html>

	<?php
}

 ?>
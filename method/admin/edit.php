<?php 

session_start();

include_once('../includes/connection.php');

if (isset($_SESSION['logged_in'])) {

		$id = $_GET['id'];
		$query = $pdo->prepare('SELECT * FROM awards WHERE id = ?');
		$query->bindValue(1,$id);

		$query->execute();

		$article = $query->fetch(PDO::FETCH_ASSOC);

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
		width: 400px;padding:5px;
	}


		
	</style>
	
	
</head>
<body>
	<div class="container">
	<a href="index.php" title="" id="logo">學會獎項</a>
	<br>
	<!-- 加入FORM -->
	<form method="POST" action="../includes/edit.php?id=<?php echo $id; ?>" accept-charset="utf-8">
		獲獎人：<input type="text" name="title" value=<?php echo $article['title']; ?>>
		<br><br>
		年度:<input type="text" name="years" value=<?php echo $article['years']; ?>>
		<br><br>
		網站連結：<input type="text" name="content"" value=<?php echo $article['content']; ?>>
		<br><br>
		服務單位：<input type="text" name="unit"" value=<?php echo $article['unit']; ?>>
		<br><br>
		獎項:
		<select name="award" value="嘿嘿">
			<option value="<?php echo $article['award']; ?>"><?php echo $article['award']; ?></option>
			<option value="碳材科技獎">碳材科技獎</option>
			<option value="傑出服務獎">傑出服務獎</option>
			<option value="優秀年輕學者獎">優秀年輕學者獎</option>
		</select>
	
<br><br>
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
			$error = '所有欄位都必填';
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
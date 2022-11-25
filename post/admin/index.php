<?php 

session_start();

include_once('../includes/connection.php');

if (isset($_SESSION['logged_in'])) {

		/*抓取所有文章*/
		$query = $pdo->prepare('SELECT * FROM articles');
		$query->execute();

		$articles = $query->fetchAll(PDO::FETCH_ASSOC);

	
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
	</style>

</head>
<body>
	<div class="container">
	<a href="index.php" title="" id="logo">會務公告</a>
		<br />
		<ol>
			<li><a href="add.php">新增文章</a></li>
			<li><a href="logout.php">登出</a></li>
		</ol>

		<ul class="article-list">
		<!-- 印出文章 -->
		<?php if ($articles): ?>
			<?php foreach ($articles as $article):?>
				<?php echo '<li>' ?>
				<?php echo $article['article_title']; ?>
				<?php echo "<a href='edit.php?id=". $article['article_id'] ."'>編輯</a>"?>
				<?php echo "<button onclick='del_func(". $article['article_id'].")'>刪除</button>"?>
				<?php echo '<br>' ?>
				<?php echo '</li>' ?>

			<?php endforeach; ?>
		<?php endif; ?>
		</ul>
		<a href="../../CarbonSocietyofTaiwanCMS.php" title="">回前頁</a>

		
	</div>
<script>
function del_func(sn){
 var sure = window.confirm('確定要刪除此資料？');
 if (!sure) return;
 location.href="delete.php?id=" + sn;

}

</script>

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
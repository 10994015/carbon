<?php 

session_start();

include_once('../includes/connection.php');
include_once('../includes/article.php');

$article = new Article;

if (isset($_SESSION['logged_in'])) {
	if (isset($_GET['id'])) {
		$id = $_GET['id'];
		$query = $pdo->prepare('DELETE FROM news WHERE article_id = ?');
		$query->bindValue(1,$id);
		$query->execute();

		header('Location:delete.php');
	}
	$news = $article->fetch_all();

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
		<h4>選擇要刪除的文章:</h4>

		<form action="delete.php" method="get" >

			<select onchange="this.form.submit();" name="id">
			<?php foreach($news as $article) { ?>

				<option value="<?php echo $article['article_id']; ?>"><?php echo $article['article_title']; ?></option>
					
			<?php } ?>
			</select>
			
		</form>
		
		
	</div>
</body>
</html>



	<?php
}else{
	header('Location:index.php');
}

?>
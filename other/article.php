<?php 

include_once('includes/connection.php');
include_once('includes/article.php');

$other = new Article;


if(isset($_GET['id'])){
	$id = $_GET['id'];
	$data = $article->fetch_data($id);

	?>

	<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>cms</title>
	<link rel="stylesheet" href="cms.css">
</head>
<body>
	<div class="container">
	<a href="index.php" title="" id="logo">CMS</a>
	<h4><?php echo $data['article_title']; ?>-
	<small>
		posted <?php echo date('Y/m/d',$data['article_timestamp']) ?>
	</small>
	</h4>
	<p><?php echo $data['article_content']; ?></p>
	<a href="index.php">&larr; Back</a>
	</div>
</body>
</html>
	<?php
}	
else{
	header('Location:index.php');
	exit();

}
 ?>
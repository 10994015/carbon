<?php 
include_once('includes/connection.php');
include_once('includes/article.php');

$article= new Article;
$articles = $article->fetch_all();

 ?>


<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1"> 
	<title>會務公告</title>
	<link rel="stylesheet" href="../css/award.css">
    <link rel="stylesheet" href="../css/footer.css">
	<link rel="stylesheet" href="../css/top.css">
    <link rel="stylesheet" type="text/css" href="../css/rwdtop.css">
    <link rel="stylesheet" type="text/css" href="../css/rwdfooter.css">
    <link rel="stylesheet" type="text/css" href="../css/rwdpost.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
    <link rel="shortcut icon" href="../img/CST Logo.png" type="image/x-icon" />

<style>
.main-body-fade{
    animation:  fade 2s;

}
.footer{
    background: linear-gradient(#555,#222);

}
    @keyframes fade{
        from{
            
            opacity: 0;
        }
        to{

            opacity: 1;
        }
    }
    .method h1{
        text-align: center;
        margin: 20px 0;

    }
    .method span{
        display: flex;
        justify-content: flex-end;
        text-align: right;
        margin: 20px 0
    }
    .method p{
        padding: 10px;
        width: 100%;
        font-size: 18px;
        line-height: 2;
        
    }
</style>

</head>
<body>
<label for="menu_control" class="menu_btn"></label>

<div class="top">
	<div class="top-header">
	<input type="checkbox" id="menu_control">

    <?php include_once("../header.php");?>

</div>
</div>

<div class="main-body">
<div class="main-body-fade">
<div class="main-body-fade">
	  <div class="main-body-menu">
    <a href="./" title=""><div class="button" style="background-color: #333;color: #fff;">實施辦法</div></a>
    <a href="../awards/" title=""><div class="button">獎項項目</div></a>
    <a href="../recommend/" title=""><div class="button" >推薦書下載</div></a>
     </div>

	<div class="container">
	<a href="index.php" title="" id="logo"></a>
	<div class="img-title">
	<img src="../img/CST Logo.png"  class="img-title-logo" >
	<h1 class="main-body-title">會務公告</h1>
	</div>
	<div class="line"></div>
        <div class="method">
        <h1>臺灣碳材料學會獎項實施辦法</h1>
        <?php foreach ($articles as $article){ ?>
           
           
            <span><?php echo  nl2br($article["title"]);?>
            </span>
            <p>
            <?php echo nl2br($article["content"]);?>
            </p>
        <?php } ?>

        </div>
	</div>
    </div>
</div>
<div class="footer">
<div class="footer-center">
	

    <div class="footer-one">
    <div class="footer-img-title">
    <img src="../img/CST Logo-白色.png">
	<h1 class="footer-title">&nbsp&nbsp學會宗旨</h1>
     </div>
	<p class="footer-content">
	<span>
		臺灣碳材料學會為依據人民團體法設立之社會學術團體，非以營利為目的，並以促進國內碳材料學術研究與相關科學之應用、提升碳材料科學之教育水平、改善碳材料科學對環境保護，以協助促進工業技術研究水準，並增進國家社會福祉為宗旨。
	</span></p>
	</div>
	<div class="beeline"></div>
	 <div class="footer-one">
	<div class="footer-img-title">
    <img src="../img/CST Logo-白色.png">
    <h1 class="footer-title">&nbsp&nbsp聯絡方式</h1>
     </div>
	<p class="footer-content">
		會址：30013 新竹市東區光復路2段101號<br>
		國立清華大學 材料實驗館207室<br>
        Email：<a href="mailto:carbon.cst@gmail.com" style="color: #fff;">carbon.cst@gmail.com</a>
        <br><br><br><br>
        <a href="https://www.facebook.com/carbon.cst/?modal=admin_todo_tour" title="" target="_blank">
        <img src="../img/fb.png" alt="" class="fb">
        </a>
	</p>
	</div>
<div class="beeline"></div>
	 <div class="footer-two">
	 <img src="../img/CST 圓章Logo-白色.png" alt="">
	<p style="color: #aaa;">
		臺灣碳材料學會版權所有©<br>
		 Carbon Society of Taiwan.<br>
		  All Rights Reserved.
	</p>
	</div>
	</div>
</div>
</body>
</html>
<?php 
include_once('includes/connection.php');
include_once('includes/article.php');

$article= new Article;
$bylaw = $article->fetch_all();




 ?>
 <!DOCTYPE html>

<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1"> 
	<title>學會章程</title>
	<link rel="stylesheet" href="../css/post.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../css/top.css">
    <link rel="stylesheet" type="text/css" href="../css/rwdtop.css">
    <link rel="stylesheet" type="text/css" href="../css/rwdfooter.css">
    <link rel="stylesheet" type="text/css" href="../css/rwdorg.css">
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
    </style>
</head>
<body>
<label for="menu_control" class="menu_btn"></label>
<div class="top">
    <div class="top-header">
          <input type="checkbox" id="menu_control">
		
	
<a href="../index.php"><img src="logo.png" alt=""></a>
 <ul class="menu">
        <li><a href="../post/index.php" class="main-menu" style="line-height: 150px;">最新消息</a>
            <ul>
                <li><a href="../post/index.php">會務公告</a>
                </li>
                <li><a href="../latestnews/index.php">碳材「探材」</a>
                </li>
            </ul>
        </li>
        <li><a href="../talk/index.php" class="main-menu" style="line-height: 150px;">關於學會</a>
          <ul>
                <li><a href="../talk/index.php">理事長的話</a>
                </li>
                <li><a href="../learn/index.php">學會簡介</a>
                </li>
                <li><a href="../organization/index.php">組織架構</a>
                </li>
                <li><a href="../group/index.php">學會平台小組</a>
                </li>
                <li><a href="../bylaw/index.php">學會章程</a>
                </li>

            </ul>
        </li>
        <li><a href="../join/index.php" class="main-menu" style="line-height: 150px;">加入會員</a>
        </li>
        <li><a href="../c/index.php" class="main-menu" style="line-height: 150px;">碳材料研究專區</a>
          <ul>
                <li><a href="../graphite/index.php">石墨專區</a>
                </li>
                <li><a href="../nano/index.php">奈米碳管專區</a>
                </li>
                <li><a href="../graphene/index.php">石墨烯專區</a>
                </li>
                <li><a href="../fiber/index.php">碳纖維專區</a>
                </li>
                <li><a href="../black/index.php">碳黑專區</a>
                </li>
                  <li><a href="../activated/index.php">活性碳及多孔碳材料專區</a>
                </li>
                <li><a href="../composite/index.php">碳複合材料專區</a>
                </li>
                <li><a href="../other/index.php">其他碳材料專區</a>
                </li>
                <li><a href="../diamond_like/index.php">類鑽碳薄膜專區</a>
                </li>
                <li><a href="../single/index.php">單晶鑽石專區</a>
                </li>
                <li><a href="../diamond/index.php">鑽石薄膜專區</a>
                </li>

            </ul>
        </li>
        <li><a href="../knows/index.php" class="main-menu" style="line-height: 150px;">碳材知識+</a>
         <ul>
                <li><a href="../newsknows/index.php">碳材新知快訊</a>
                </li>
            </ul>
        </li>
        <li><a href="../database/index.php" class="main-menu" style="line-height: 150px;">「碳才」資料庫</a>
        </li>
        <li><a href="../seminar/index.php" class="main-menu" style="line-height: 150px;">論壇&研討會資訊</a>
         <ul>
                <li><a href="../seminar/index.php">臺灣碳材料學術研討會</a>
                </li>
                   <li><a href="../abroad/index.php">國內外研討會</a>
                </li>
                   <li><a href="../forum/index.php">碳材料論壇</a>
                </li>
            </ul>
        </li>
        <li><a href="../contact/index.php" class="main-menu" style="line-height: 150px;">聯絡我們</a>
        </li>
    </ul>

</div>
</div>


<div class="main-body"> 
<div class="main-body-fade">   
  <div class="main-body-menu">
   <a href="../talk/index.php" title=""><div class="button">理事長的話</div></a>
    <a href="../learn/index.php" title=""><div class="button" >學會簡介</div></a>
    <a href="../organization/index.php" title=""><div class="button">組織架構</div></a>
    <a href="../group/index.php" title=""><div class="button">學會平台小組</div></a>
    <a href="../bylaw/index.php" title=""><div class="button"  style="background-color: #333;color: #fff;">學會章程</div></a>
     </div>
    <div class="container">
    <a href="index.php" title="" id="logo"></a>
    <div class="img-title">
    <img src="../img/CST Logo.png"  class="img-title-logo">
    <h1 class="main-body-title">學會章程</h1>
    </div>
    <div class="line"></div>
    <style>
        .main-body-text{
            line-height: 1.3;
            font-size: 18px;
        }
           
        
         .main-body-text span{
            float: right;
                }
    </style>
        <ol class="post">
        <?php foreach ($bylaw as $article){ ?>
            <li>
            <div class="main-body-article">
           
            <div class="main-body-text">
            <h1 style=" text-align: center;margin: 30px 0 30px 0;"><?php echo $article['article_title']; ?></h1>
            <span style="font-size: 16px;" class="bylawspan"><?php echo $article['article_content2']; ?></span>
            <p>
           <?php echo $article['article_content']; ?>
            </p>
            </div>
            </div>
           
            </li>
            <?php } ?>
        </ol>
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
        <img src="../img/fb.png" alt="" class="fb" target="_blank">
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
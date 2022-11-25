<?php 
include_once('post/includes/connection.php');
include_once('post/includes/article.php');
$article= new Article;
$articles = $article->fetch_all();
$db = mysqli_connect("localhost","root","","carbon");
 ?>
 <?php 
include_once('seminar/includes/article.php');

$seminar= new Seminar;
$seminar = $seminar->fetch_all();
 ?>
 <!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1"> 
	<title>臺灣碳材協會</title>
	<link rel="stylesheet" href="css/footer.css">
	<link rel="stylesheet" type="text/css" href="css/top.css">
    <link rel="stylesheet" type="text/css" href="index.css">
    <link rel="stylesheet" type="text/css" href="css/rwdindex.css">
    <link rel="stylesheet" type="text/css" href="css/rwdtop1.css">
    <link rel="stylesheet" type="text/css" href="css/rwdfooter.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <link rel="shortcut icon" href="img/CST Logo.png" type="image/x-icon" />
<meta name="description" content="臺灣碳材料學會會為依據人民團體法設立之社會學術團體，非以營利為目的，並以促進國內碳材料學術研究與相關科學之應用、提升碳材料科學之教育水平、改善碳材料科學對環境保護與協助促進工業技術研究水準並增進國家社會福祉為宗旨。"/>
<style>
.footer{
   background: linear-gradient(#555,#222);
}

 .home-body-fade{
    animation:  homefade 2s;

}
    @keyframes homefade{
        from{
            
            opacity: 0;
        }
        to{

            opacity: 1;
        }
    }
          .frame-text{
             height: 250px;
           overflow: hidden;
          }
          .main-body-article{
            margin-bottom: 500px;
             margin-top: -20px;
          }
          .main-body-date h1{
            font-size: 20px;
            margin-bottom: 10px;
            margin-top: 10px;
          }
          .main-body-text{
            color: #666;
          }
          
.imgslides{
  width: 100%;
  height: 300px;
  background: #000;
  position: relative;
}
.imgslideAll{
  display: flex;
  width: 100%;
  overflow: hidden;
  position: relative;

}
.imgslideAll a{
  min-width:100%;
  height: 300px;
}
.imgslideAll img{
  min-width: 100%;
  height: 300px;
  object-fit: contain;
  transform: translateX(0%);
  transition: .5s;
  
}

.slides-right{
  position: absolute;
  top: calc(50% - 24px);
  right:30px;
  color:#fff;
  font-size: 48px;
  cursor: pointer;
  z-index: 9999;
}
.slides-left{
  position: absolute;
  top: calc(50% - 24px);
  left:30px;
  color:#fff;
  font-size: 48px;
  z-index: 9999;
  cursor: pointer;
}
#imgslideBtns{
  position: absolute;
  bottom: 10px;
  width: 100%;
  height: 30px;
  display: flex;
  justify-content: center;
  align-items: center;
}
.imgslideBtn{
  display: block;
  width: 15px;
  height: 15px;
  background-color: #fff;
  border-radius: 50%;
  cursor: pointer;
  margin: 0 5px;
}
.slidesText{
  position: absolute;
  top: 30px;
  left: 200px;
  color:#Fff;
  z-index: 999;
}
	</style>
          


</head>

<body>

<label for="menu_control" class="menu_btn"></label>

<div class="top">
<div class="top-header">
 <input type="checkbox" id="menu_control">
    <a href="./"><img src="img/logo.png" alt=""></a>
	 <ul class="menu">
        <li><a href="post/" class="main-menu">最新消息</a>
            <ul>
                <li><a href="post/">會務公告</a>
                </li>
                <li><a href="latestnews/">碳材「探材」</a>
                </li>
            </ul>
        </li>
        <li><a href="talk/" class="main-menu">關於學會</a>
          <ul>
                <li><a href="talk/">理事長的話</a>
                </li>
                <li><a href="learn/">學會簡介</a>
                </li>
                <li><a href="organization/">組織架構</a>
                </li>
                <li><a href="group/">學會平台小組</a>
                </li>
                <li><a href="bylaw/">學會章程</a>
                </li>

            </ul>
        </li>
        <li><a href="join/" class="main-menu" >加入會員</a>
        </li>
        <li><a href="c/" class="main-menu">碳材料研究專區</a>
          <ul>
                <li><a href="graphite/">石墨專區</a>
                </li>
                <li><a href="nano/">奈米碳管專區</a>
                </li>
                <li><a href="graphene/">石墨烯專區</a>
                </li>
                <li><a href="fiber/">碳纖維專區</a>
                </li>
                <li><a href="black/">碳黑專區</a>
                </li>
                  <li><a href="activated/">活性碳及多孔碳材料專區</a>
                </li>
                <li><a href="composite/">碳複合材料專區</a>
                </li>
                <li><a href="other/">其他碳材料專區</a>
                </li>
                <li><a href="diamond_like/">類鑽碳薄膜專區</a>
                </li>
                <li><a href="single/">單晶鑽石專區</a>
                </li>
                <li><a href="diamond/">鑽石薄膜專區</a>
                </li>
            </ul>
        </li>
        <li><a href="knows/" class="main-menu">碳材知識+</a>
         <ul>
                <li><a href="newsknows/">碳材新知快訊</a>
                </li>
            </ul>
        </li>
        <li><a href="method/" class="main-menu">學會獎項</a>
       
        </li>
        <li><a href="database/" class="main-menu">「碳才」資料庫</a>
        </li>
        <li><a href="seminar/" class="main-menu">論壇&研討會資訊</a>
         <ul>
                <li><a href="seminar/">臺灣碳材料學術研討會</a>
                </li>
                   <li><a href="abroad/">國內外研討會</a>
                </li>
                   <li><a href="forum/">碳材料論壇</a>
                </li>
            </ul>
        </li>
        <li><a href="contact/" class="main-menu">聯絡我們</a>
        </li>
    </ul>

</div>
</div>


<div class="imgslides">
<i class="fas fa-chevron-right slides-right"></i>
<i class="fas fa-chevron-left slides-left"></i>
  <div class="imgslideAll">
    

  <?php 
 	include_once('connection.php');
 	$data="select * from index_images";
 	$result = mysqli_query($conn,$data);
 	while($row = mysqli_fetch_array($result)){?>

    <a href="javascript:;">
      <img src="<?php echo 'upload/'.$row['file_name'];?>" alt="" class="picClass">
    </a>
    <?php
 	}
	  ?>
  </div>
  <div id="imgslideBtns">
			<a class="imgslideBtn"></a>
		</div>
</div>



<script> 
  var picClass = document.getElementsByClassName('picClass');
  var imgslideBtns = document.getElementById('imgslideBtns');
  var slidesRight = document.getElementsByClassName('slides-right')[0];
  var slidesLeft = document.getElementsByClassName('slides-left')[0];
  var imgslideBtns = document.getElementById('imgslideBtns');
  var imgBtn = document.getElementsByClassName('imgslideBtn');
  var pageIdx = 0;
  var html ='';

  slidesRight.addEventListener("click",()=>{
    pageIdx++;
    
    clearColor();
    if(pageIdx>picClass.length-1){
      pageIdx=0;
    }
    for(var i=0;i<picClass.length;i++){
      picClass[i].style.transform = "translateX(-"+pageIdx+"00%)";
    }
    imgBtn[pageIdx].style.backgroundColor="transparent";
    imgBtn[pageIdx].style.border = "3px #fff solid";
  })
  slidesLeft.addEventListener("click",()=>{
    pageIdx--;
    clearColor();
    if(pageIdx<0){
      pageIdx=picClass.length-1;
    }
    for(var i=0;i<picClass.length;i++){
      picClass[i].style.transform = "translateX(-"+pageIdx+"00%)";
    }
    imgBtn[pageIdx].style.backgroundColor="transparent";
    imgBtn[pageIdx].style.border = "3px #fff solid";

  })

  for(var h=0;h<picClass.length;h++){
      html += '<a class="imgslideBtn imgslideBtn'+h+'"></a>'
  }
  imgslideBtns.innerHTML = html;
  imgBtn[pageIdx].style.backgroundColor="transparent";
  imgBtn[pageIdx].style.border = "3px #fff solid";

  for(var b=0;b<imgBtn.length;b++){
    imgBtn[b].addEventListener("click",showImg);
  }

  setInterval(()=>{
    pageIdx++;
    if(pageIdx>picClass.length-1){
      pageIdx=0;
    }
    for(var si=0;si<picClass.length;si++){
      picClass[si].style.transform = "translateX(-"+pageIdx+"00%)";
    }

  },5000)

  function showImg(){
      clearColor();
      console.log(Number(this.className.substr(23)));
      pageIdx = this.className.substr(23);
      imgBtn[pageIdx].style.backgroundColor="transparent";
      imgBtn[pageIdx].style.border = "3px #fff solid";
      for(var a=0;a<imgBtn.length;a++){
        picClass[a].style.transform = "translateX(-"+pageIdx+"00%)";
      }

      
  }
  function clearColor(){
    for(var c=0;c<imgBtn.length;c++){
      imgBtn[c].style.backgroundColor = "#fff";
      imgBtn[c].style.border = "none";
    }
  }




</script>
<div class="home-body">
<div class="home-body-fade">
<div class="all-frame">
    <div class="frame">
        <img src="img/simg1.jpg" alt="">
        <div class="frame-title"><span>會務公告</span></div>
        <div class="frame-text">

       <ol class="post">
    <?php foreach ($articles as $article){ ?>
      <li>
      <div class="main-body-article">
      <div class="main-body-date">
      <br />
      <h1>
       <?php echo date('F d,Y',$article['article_timestamp']) ?>
      </h1>
      </div>
      <div class="main-body-text">
      <p>
     <span><?php echo $article['article_title']; ?></span><br><br>
      <span><?php echo $article['article_content']; ?></span>
      </p>
      </div>
      </div>
      <hr>
      </li>
      <?php } ?>
    </ol>
        </div>
         <a href="post/index.php"><div class="frame-more">
            <span>Read more...</span>
        </div></a>
        </div>


        <div class="frame">
        <img src="img/simg2.jpg" alt="">
        <div class="frame-title"><span>碳材知識+</span></div>

        <div class="frame-text">

        <ol class="post" style="display: flex;  flex-direction: column-reverse;">
      
<?php
  
  $sql = "SELECT *FROM newskonws ORDER BY article_timestamp	DESC";
  $result = mysqli_query($db,$sql);
     while ($row = mysqli_fetch_array($result)) { ?>
 

            
            <div class="main-body-article">
            <div class="main-body-date">
            
           
             <h1 style="margin-top: 28px;"><?php echo $row['article_timestamp']; ?></h1>
            
            </div>
            <div class="main-body-text" >
           <span><?php echo $row['text1']; ?></span> 
           
            </div> 
            
</div>
            <?php } ?>

        </ol>
    


        </div>

        <a href="newsknows/index.php"><div class="frame-more">
            <span>Read more...</span>
        </div></a>
    </div>


        <div class="frame">
        <img src="img/simg3.jpg" alt="">
        <div class="frame-title"><span>論壇&研討會資訊</span></div>
        <div class="frame-text">
          <ol class="post">
  

        <?php foreach ($seminar as $article){ ?>
            <li>
            <div class="main-body-article">
            <div class="main-body-date">
            <h1 style="margin-top: 28px;">
       <?php echo date('F d,Y',$article['article_timestamp']) ?>
      </h1>
            
            </div>
            <div class="main-body-text">     
      <?php echo $article['article_title']; ?><br>
    <span><?php echo $article['article_content']; ?></span>
               </div>
            </div>
           
            </li>
            <?php } ?>


        </ol>


        </div>
         <a href="seminar/index.php"><div class="frame-more">
            <span>Read more...</span>
        </div></a>
    </div>
    </div>
</div>
</div>

<div class="footer">
<div class="footer-center">
	

    <div class="footer-one">
	 <div class="footer-img-title">
    <img src="img/CST Logo-白色.png">
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
    <img src="img/CST Logo-白色.png">
    <h1 class="footer-title">&nbsp&nbsp聯絡方式</h1>
     </div>
	<p class="footer-content">
		會址：30013 新竹市東區光復路2段101號<br>
		國立清華大學 材料實驗館207室<br>
        Email：<a href="mailto:carbon.cst@gmail.com" style="color: #fff;">carbon.cst@gmail.com</a>
        <br><br><br><br>
        <a href="https://www.facebook.com/carbon.cst/?modal=admin_todo_tour" title="" target="_blank">
        <img src="img/fb.png" alt="" class="fb">
        </a>
	</p>
	</div>
<div class="beeline"></div>
	 <div class="footer-two">
	 <img src="img/CST 圓章Logo-白色.png" alt="">
	<p style="color:#aaa;">
		臺灣碳材料學會版權所有©<br>
		 Carbon Society of Taiwan.<br>
		  All Rights Reserved.
	</p>
	</div>
	</div>
</div>

<script src="script.js"></script>
</body>
</html>
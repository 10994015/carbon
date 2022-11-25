
<?php
  $db = mysqli_connect("localhost", "root", "10994015", "cms");

 

    $datas = array();
    $query = mysqli_query($db, "SELECT * FROM talk");
      if (mysqli_num_rows($query) > 0) {
            while($row = mysqli_fetch_assoc($query)){
                $datas[] = $row;
        }
      }
?>


<!DOCTYPE html>
<html>
<head>
<title>CMS</title>
  <link rel="stylesheet" href="post_news.css">
    <link rel="stylesheet" href="footer.css">
    <link rel="stylesheet" href="top.css">
<style type="text/css">
   #content{
   	width: 50%;
   	margin: 20px auto;
   	border: 1px solid #cbcbcb;
   }
   form{
   	width: 50%;
   	margin: 20px auto;
   }
   form div{
   	margin-top: 5px;
   }
   #img_div{
   	width: 80%;
   	padding: 5px;
   	margin: 15px auto;
   	border: 1px solid #cbcbcb;
   }
   #img_div:after{
   	content: "";
   	display: block;
   	clear: both;
   }
   img{
   	float: left;
   	margin: 5px;
   	width: 300px;
   	height: 140px;
   }
</style>
</head>
<body>



理事長的話
<br>

<img src="../img/br.jpg" alt="" style="width:250px;height: 40px;">
<ul>
<?php

    foreach ($datas as $data) {
      echo "<li>". mb_substr($data['text2'],4,3,"utf-8") ."<a href=edit.php?id=".$data['id'].">編輯</a>
      <button onclick=del_func(". $data['id'].")>刪除</button></li>";
    }

  ?>

</ul>

<div id="content">

   <form method="POST" action="includes/add.php" enctype="multipart/form-data">
    <input type="hidden" name="size" value="1000000">
    <div>
      <input type="file" name="image">
    </div>
    <div>

       <textarea 
        id="text" 
        cols="40" 
        rows="30" 
        name="image_text1" 
        placeholder="內文"></textarea>
        <textarea 
        id="text" 
        cols="40" 
        rows="4" 
        name="image_text2" 
        placeholder="教授">理事長 </textarea>
       
    </div>
    <div>
      <button type="submit" name="upload">發佈</button>
    </div>
  </form>
</div>
<script>
  function del_func(sn){
 var sure = window.confirm('確定要刪除此資料？');
 if (!sure) return;
 location.href="includes/delete.php?id=" + sn;

}
</script>
</body>
</html>
<?php 

session_start();

include_once('cms/includes/connection.php');

if (isset($_SESSION['logged_in'])) {
    ?>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>臺灣碳材協會</title>
	<link rel="stylesheet" href="css/footer.css">
	<link rel="stylesheet" type="text/css" href="css/top.css">


<style>
h1{
    text-align: center;
}
form{
    display: flex;
    margin: 30px auto;
    width: 300px;
    border:1px #333 solid;
    border-radius: 5px;
    padding: 10px;
}
form > button{
    outline: none;
    border:none;
    background: #333;
    color:#fff;
    width: 150px;
    height: 35px;
    cursor: pointer;
}
.list>li{
    margin: auto;
}
</style>

</head>
<body>
<div class="top">
	<div class="top-header">
		
	
<a href="index.php"><img src="img/logo.png" alt=""></a>
	  <ul class="menu">
        <li><a href="post/admin/index.php" class="main-menu" style="line-height: 150px;">最新消息</a>
            <ul>
                <li><a href="post/admin/index.php">會務公告</a>
                </li>
                <li><a href="latestnews/admin/index.php">碳材「探材」</a>
                </li>
            </ul>
        </li>
        <li><a href="talk/cms.php" class="main-menu" style="line-height: 150px;">關於學會</a>
          <ul>
                <li><a href="talk/cms.php">理事長的話</a>
                </li>
                <li><a href="learn/index.php">學會簡介</a>
                </li>
                <li><a href="organization/admin/index.php">組織架構</a>
                </li>
                <li><a href="group/admin/index.php">學會平台小組</a>
                </li>
                <li><a href="bylaw/admin/index.php">學會章程</a>
                </li>

            </ul>
        </li>
        <li><a href="join/index.php" class="main-menu" style="line-height: 150px;">加入會員</a>
        </li>
        <li><a href="c/admin/index.php" class="main-menu" style="line-height: 150px;">碳材料研究專區</a>
          <ul>
                <li><a href="graphite/admin/index.php">石墨專區</a>
                </li>
                <li><a href="nano/admin/index.php">奈米碳管專區</a>
                </li>
                <li><a href="graphene/admin/index.php">石墨烯專區</a>
                </li>
                <li><a href="fiber/admin/index.php">碳纖維專區</a>
                </li>
                <li><a href="black/admin/index.php">碳黑專區</a>
                </li>
                  <li><a href="activated/admin/index.php">活性碳及多孔碳材料專區</a>
                </li>
                <li><a href="composite/admin/index.php">碳複合材料專區</a>
                </li>
                <li><a href="other/admin/index.php">其他碳材料專區</a>
                </li>
                <li><a href="diamond_like/admin/index.php">類鑽碳薄膜專區</a>
                </li>
                <li><a href="single/admin/index.php">單晶鑽石專區</a>
                </li>
                <li><a href="diamond/admin/index.php">鑽石薄膜專區</a>
                </li>

            </ul>
        </li>
        <li><a href="knows/admin/index.php" class="main-menu" style="line-height: 150px;">碳材知識+</a>
         <ul>
                <li><a href="newsknows/cms.php">碳材新知快訊</a>
                </li>
            </ul>
        </li>
        <li><a href="database/admin/index.php" class="main-menu" style="line-height: 150px;">「碳才」資料庫</a>
        </li>
        <li><a href="seminar/admin/index.php" class="main-menu" style="line-height: 150px;">論壇&研討會資訊</a>
         <ul>
                <li><a href="seminar/admin/index.php">臺灣碳材料學術研討會</a>
                </li>
                   <li><a href="abroad/admin/index.php">國內外研討會</a>
                </li>
                   <li><a href="forum/admin/index.php">碳材料論壇</a>
                </li>
            </ul>
        </li>
        <li><a href="contact/index.php" class="main-menu" style="line-height: 150px;">聯絡我們</a>
        </li>
    </ul>

</div>
</div>

<h1>後台管理
<li style="text-align: center;color: #000; font-size: 24px;"><a href="cms/admin/logout.php">登出</a></li></h1>

<form action="add.php" method="post" accept-charset="utf-8" enctype="multipart/form-data">

 	<input type="file" name="file_name"><br>
 	<button type="submit" name="submit">上傳圖片</button>
     </form>
     <ol class="list">
 	<?php 
 	include_once('connection.php');
 	$data="select * from index_images";
 	$result = mysqli_query($conn,$data);
 	while($row = mysqli_fetch_array($result)){?>

	 <br/>
		<li style="border-bottom:1px #333 solid;width:500px;">

		
	 	
	 
		 <img src="<?php echo 'upload/'.$row['file_name'];?>" width="400px" height="100px" alt="" />
 		
		 <a style="font-size:18px" href="delete.php?op=delete&file_name=<?php echo $row['file_name']?>"  onclick="delfn(<?php echo $row['file_name']?>)"  id="delBtn">刪除</a>
		
	 
	 </li>

 	<?php
 	}
	  ?>
	   </ol>
<style>
h1{
    animation:  fade 2s;
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



</body>
</html>

    <?php
    
}else{
    if (isset($_POST['username'],$_POST['password'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

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

                header('Location: CarbonSocietyofTaiwanCMS.php');
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
    <title>後台管理</title>
    <link rel="stylesheet" href="../cms.css">
    <style>
    .container{
        text-align: center;
        margin-top: 100px;
    }
    .container img{
        width: 300px;
    }
</style>

</head>
<body>
    <div class="container">
   <img src="img/logo.png" alt="">
        <br /><br />

        <?php if (isset($error)) { ?>
        <small style="color: #aa0000;"><?php echo $error; ?></small>
        <br /><br />
        <?php } ?>


        <form action="CarbonSocietyofTaiwanCMS.php" method="post" autocomplete="off">
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
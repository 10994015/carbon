<?php 

session_start();

include_once('connection.php');

  $db = mysqli_connect("localhost", "root", "10994015", "cms");

 
  $msg = "";

if (isset($_SESSION['logged_in'])) {


  if (isset($_POST['upload'])) {
  	$image = $_FILES['image']['name'];
  	// Get text
  	$image_text1 = mysqli_real_escape_string($db, $_POST['image_text1']);
    $image_text2 = mysqli_real_escape_string($db, $_POST['image_text2']);
    $image_text3 = mysqli_real_escape_string($db, $_POST['image_text3']);
    $image_text4 = mysqli_real_escape_string($db, $_POST['image_text4']);
    $article_timestamp = mysqli_real_escape_string($db, $_POST['article_timestamp']);
   
  	$target = "images/".basename($image);

  	$sql = "INSERT INTO newskonws (image,text1,text2,text3,text4,article_timestamp) VALUES ('$image', '$image_text1', '$image_text2', '$image_text3', '$image_text4' ,'$article_timestamp')";
  	mysqli_query($db, $sql);

  	if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
  		$msg = "圖片上傳成功";
  	}else{
  		$msg = "無法上傳圖片";
  	}
  }




		
		header('Location:../cms.php');

	}
?>
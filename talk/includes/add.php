<?php 

session_start();

include_once('connection.php');

  $db = mysqli_connect("localhost", "root", "10994015", "cms");

 
  $msg = "";

if (isset($_SESSION['logged_in'])) {


  if (isset($_POST['upload'])) {
  	$image = $_FILES['image']['tmp_name'];
  	// Get text
  	$image_text1 = mysqli_real_escape_string($db, $_POST['image_text1']);
    $image_text2 = mysqli_real_escape_string($db, $_POST['image_text2']);
   
  	$target = "../images/". $_FILES['image']['name'];

  	$sql = "INSERT INTO talk (image,text,text2) VALUES ('$target', '$image_text1', '$image_text2')";
  	mysqli_query($db, $sql);

  	if (move_uploaded_file($image, $target)) {
  		$msg = "圖片上傳成功";
  	}else{
  		$msg = "無法上傳圖片";
  	}
  }
		header('Location:../cms.php');

	}

?>
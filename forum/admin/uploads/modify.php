<?php
include_once('connection.php');
if( isset($_POST['old_img']) ){
    $old_img=$_POST["old_img"];
    $edit_title = $_POST['edit_title'];
    $edit_url = $_POST['edit_url'];
    $edit_url2= $_POST['edit_url2'];
    $edit_content = $_POST['edit_content'];
    $edit_content2 = $_POST['edit_content2'];
    $btnShow = $_POST['btnShow'];
    $id = $_POST['id'];
    
   

  if ($_FILES['file_name']['error'] == 0){
    #如果有選擇圖片就使用新上傳的圖片
    $file_name = rand(1000,100000)."-".$_FILES['file_name']['name'];
    #上傳圖片
    if(move_uploaded_file($_FILES['file_name']['tmp_name'], './upload/'.$file_name)){
        echo "success";
    }else{
        echo "fail";
    }
  } else {
    echo $_FILES['file_name']['error'];
    #如果沒有選擇圖片就使用原本資料庫的圖片
    $file_name=$old_img;
  }
 
  
    $sql_str = "UPDATE forum_images SET file_name	 = '$file_name', 
                              title = '$edit_title', 
                              content = '$edit_content',
                              content2 = '$edit_content2',
                              url1 ='$edit_url',
                              url2 = '$edit_url2'
                              btnShow = '$btnShow'
                              WHERE id = $id";


    mysqli_query($conn, $sql_str);
    header('Location:addimg.php');

  }
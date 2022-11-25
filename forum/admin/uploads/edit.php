<?php
include('connection.php');

$edit_img = -1;
if( $_GET['op']=="edit"){
    $id=$_GET['id'];
}
 
$sql_str = "SELECT * 
            FROM forum_images 
            WHERE id='$id'";
$RS_mb = mysqli_query($conn, $sql_str);
$row = mysqli_fetch_assoc($RS_mb);

?>

<!DOCTYPE html>
<html lang="zh-Hant-TW">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes, minimum-scale=1.0, maximum-scale=3.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
    .edit{
        display: flex;
        flex-direction: column;
        width: 80%;
    }
    input{
        width:350px;
        height: 30px;
        margin-bottom: 15px;
    }
    textarea{
        margin-bottom: 15px;
    }
    </style>
</head>
<body>
   <form class="edit" method="POST" action="modify.php" enctype="multipart/form-data">
    標題:<input type="text" value="<?php echo $row['title'];?>" name="edit_title">
    內文:<textarea name="edit_content" id="" cols="30" rows="10"><?php echo $row['content'];?></textarea>
    簡章網址:<input type="text" value="<?php echo $row['url1'];?>" name="edit_url">
    報名網址:<input type="text" value="<?php echo $row['url2'];?>" name="edit_url2">
    <img src="<?php echo 'upload/'.$row['file_name'];?>" width="200px" height="200px" alt="" />
    <input type="file" name="file_name">
    底文:<textarea name="edit_content2" id="" cols="30" rows="10"><?php echo $row['content2'];?></textarea>
    論壇簡章:<select name="btnShow" id="">
		  <option value="" disabled selected><?php echo $row['btnShow'];?></option>
		  <option value="論壇簡章">顯示</option>
		  <option value="不顯示">不顯示</option>
	  </select>
    <input type="submit" value="編輯">
    <input type="hidden" name="id" value="<?php echo $row['id'];?>">
    <input type="hidden" name="old_img" value="<?=$row["file_name"]?>">
   </form>
</body>
</html>
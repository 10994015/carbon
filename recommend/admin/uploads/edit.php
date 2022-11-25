<?php
include('connection.php');

$edit_img = -1;
if( $_GET['op']=="edit"){
    $id=$_GET['id'];
}
 
$sql_str = "SELECT * 
            FROM recommend 
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
    檔案名稱:<input type="text" value="<?php echo $row['title'];?>" name="edit_title">

   
    <input type="file" name="file_name">
  
    <input type="submit" value="編輯">
    <input type="hidden" name="id" value="<?php echo $row['id'];?>">
    <input type="hidden" name="old_img" value="<?=$row["file_name"]?>">
   </form>
</body>
</html>
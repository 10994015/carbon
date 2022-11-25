<?php
include('connection.php');

if( $_GET['op']=="edit"){
    $edit_img=$_GET['file_name'];
}
 
$sql_str = "SELECT * 
            FROM forum_images 
            WHERE file_name='$del_img'";
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
</head>
<body>
    <input type="text" vlaue="<?php echo $row['title']?>">
</body>
</html>
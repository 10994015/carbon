
 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<meta http-equiv="X-UA-Compatible" content="IE=edge">
 	<title></title>
 	<link rel="stylesheet" href="">
 </head>
 <body>
 	
 	<form action="add.php" method="post" accept-charset="utf-8" enctype="multipart/form-data">
 	<input type="file" name="file_name"><br>
 	<button type="submit" name="submit">Add</button>
 	</form>
 	<hr>
 	<h2>View Images</h2>
 	<?php 
 	include_once('connection.php');
 	$data="select * from diamond_like_images";
 	$result = mysqli_query($conn,$data);
 	while($row = mysqli_fetch_array($result)){?>

 	<right><a href="delete.php?op=delete&file_name=<?php echo $row['file_name']?>">X</a></right>
 	<br/>
 	<img src="<?php echo 'upload/'.$row['file_name'];?>" width="200px" height="200px" alt="" />

 	<?php
 	}
 	 ?>
 	 <a href="../../index.php" title="">回前頁</a>
 </body>
 </html>
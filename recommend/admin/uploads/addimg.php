
 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<meta http-equiv="X-UA-Compatible" content="IE=edge">
 	<title></title>
	 <link rel="stylesheet" href="">
	 <style>
		 form{
			 display: flex;
			 flex-direction: column;
			 width: 500px;
		 }
		 form >input {
			 margin: 20px 0;
		 }
		 h1{
			 font-size: 18px;
		 }
		 .list{
			 display: flex;
			 flex-direction: column-reverse;
			 list-style: none;
		 }
	 </style>
 </head>
 <body>
 	
	 <form action="add.php" method="post" accept-charset="utf-8" enctype="multipart/form-data">
	 <input type="text" name="file_title" placeholder="檔案名稱">
 	<input type="file" name="file_name"><br>
 	<button type="submit" name="submit">Add</button>
 	</form>
 	<hr>
	 <h2>文章列表:</h2>
	 <ol class="list">
 	<?php 
 	include_once('connection.php');
 	$data="select * from recommend";
 	$result = mysqli_query($conn,$data);
 	while($row = mysqli_fetch_array($result)){?>

	 <br/>
		<li>

		
	 	<h1><?php echo $row['title'];?></h1>
		 <?php echo $row['file_name'];?>
	 
 		<a href="edit.php?op=edit&id=<?php echo $row['id']?>">編輯</a>
		 <a href="delete.php?op=delete&file_name=<?php echo $row['file_name']?>"  onclick="delfn(<?php echo $row['file_name']?>)"  id="delBtn">刪除</a>
	 
	 </li>

 	<?php
 	}
	  ?>
	   </ol>
	  <a href="../index.php" title="">回前頁</a>
	  
	  <script>
	function delfn(sn){
		window.confirm("確定要刪除嗎");
	}
	  
	  </script>
 </body>
 </html>
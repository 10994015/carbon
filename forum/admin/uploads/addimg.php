
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
	 <input type="text" name="file_title" placeholder="文章標題">
	 <textarea name="file_content" id="" cols="30" rows="10" placeholder="內文"></textarea>
	 <input type="text" placeholder="簡章網址" name="url1">
	 <input type="text" placeholder="報名網址" name="url2">
	 <textarea name="end_content" id="" cols="30" rows="10" placeholder="底文"></textarea>
	  <input type="file" name="file_name"><br>
	  是否顯示論壇簡章:
	  <select name="btnShow" id="">
		  <option value="" disabled>論壇簡章是否顯示</option>
		  <option value="論壇簡章">顯示</option>
		  <option value="不顯示">不顯示</option>
	  </select><br><br>
 	 <button type="submit" name="submit">Add</button>
 	</form>
 	<hr>
	 
	  <a href="../index.php" title="">回前頁</a>
	  
	  <script>
	function delfn(sn){
		window.confirm("確定要刪除嗎");
	}
	  
	  </script>
 </body>
 </html>
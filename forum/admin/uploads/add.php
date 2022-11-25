<?php 
include_once('connection.php');
if (isset($_POST['submit']))
 {
	$title = $_POST['file_title'];
	$content = $_POST['file_content'];
	$content = $_POST['file_content'];
	$end_content = $_POST['end_content'];
	$url1 = $_POST['url1'];
	$url2 = $_POST['url2'];
	$btnShow = $_POST['btnShow'];
	$file_name = rand(1000,100000)."-".$_FILES['file_name']['name'];
	$file_loc = $_FILES['file_name']['tmp_name'];
	$folder="upload/";
	$new_file_name = strtolower($file_name);
	$final_file = str_replace(' ','-',$new_file_name);

	if (move_uploaded_file($file_loc,$folder.$final_file))
	 {
		$sql = "INSERT INTO forum_images(file_name,title,content,url1,url2,content2,btnShow) VALUES('$final_file','$title','$content','$url1','$url2','$end_content','$btnShow')";
		mysqli_query($conn,$sql);
		?>

		<script>
			alert('上傳成功');
			window.location.href='addimg.php?success';
		</script>

		<?php
	}
	else{
		echo "錯誤";
	}

}




 ?>
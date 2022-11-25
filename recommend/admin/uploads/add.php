<?php 
include_once('connection.php');
if (isset($_POST['submit']))
 {
	$title = $_POST['file_title'];
	$file_name = rand(1000,100000)."-".$_FILES['file_name']['name'];
	$file_loc = $_FILES['file_name']['tmp_name'];
	$folder="upload/";
	$new_file_name = strtolower($file_name);
	$final_file = str_replace(' ','-',$new_file_name);

	if (move_uploaded_file($file_loc,$folder.$final_file))
	 {
		$sql = "INSERT INTO recommend(file_name,title) VALUES('$final_file','$title')";
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
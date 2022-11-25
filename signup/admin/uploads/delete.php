<?php 
include('connection.php');

if ($_GET['op']=="delete") 
{
	$del_img=$_GET['file_name'];
	$query = "DELETE FROM signup_images WHERE file_name='$del_img'";
	$result=mysqli_query($conn,$query);
	if ($result) {
		?>
		<script>
			alert('刪除成功');
			window.location.href='addimg.php?deleted';
		</script>
		<?php
		unlink("upload/$del_img");
	}
	else{
		?>
		<script>
			alert('圖片尚未刪除');
			window.location.href='addimg.php?error';
		</script>
		<?php
	}
}





 ?>
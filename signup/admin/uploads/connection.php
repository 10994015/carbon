<?php 

$servername="localhost";
$username="root";
$password="";
$dbname="carbon";
$conn=new mysqli($servername,$username,$password,$dbname);
if ($conn->connect_error) {
	die("資料庫錯誤." .$conn->connect_error);
}
 ?>
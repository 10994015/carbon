<?php 

$servername="localhost";
$username="root";
$password="10994015";
$dbname="cms";
$conn=new mysqli($servername,$username,$password,$dbname);
if ($conn->connect_error) {
	die("Connection failed" .$conn->connect_error);
}
 ?>
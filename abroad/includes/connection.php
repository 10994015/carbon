<?php 

try{
	$pdo = new PDO('mysql:host=localhost;dbname=carbon','root','');
}catch(PDOException $e){
	exit('資料庫錯誤.');
}

 ?>
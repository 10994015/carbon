<?php 

class Article{
	public function fetch_all(){
		global $pdo;

		$query = $pdo->prepare("SELECT * FROM newskonws");
		$query->execute();

		return $query->fetchAll();
	}
	public function fetch_data($id){
		global $pdo;

		$query = $pdo->prepare("SELECT * FROM newskonws WHERE id = ?");
		$query->bindValue(1,$id);
		$query->execute();

		return $query->fetch();
	}
}

 ?>
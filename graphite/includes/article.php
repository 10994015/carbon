<?php 

class Article{
	public function fetch_all(){
		global $pdo;

		$query = $pdo->prepare("SELECT * FROM graphite");
		$query->execute();

		return $query->fetchAll();
	}
	public function fetch_data($article_id){
		global $pdo;

		$query = $pdo->prepare("SELECT * FROM graphite WHERE article_id = ?");
		$query->bindValue(1,$article_id);
		$query->execute();

		return $query->fetch();
	}
}

 ?>
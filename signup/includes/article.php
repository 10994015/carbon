<?php 

class Article{
	public function fetch_all(){
		global $pdo;

		$query = $pdo->prepare("SELECT * FROM signup");
		$query->execute();

		return $query->fetchAll();
	}
	public function fetch_data($article_id){
		global $pdo;

		$query = $pdo->prepare("SELECT * FROM signup WHERE id = ?");
		$query->bindValue(1,$article_id);
		$query->execute();

		return $query->fetch();
	}
}

 ?>
<?php 

class Seminar{
	public function fetch_all(){
		global $pdo;

		$query = $pdo->prepare("SELECT * FROM seminar ORDER BY article_id ASC");
		$query->execute();

		return $query->fetchAll();
	}
	public function fetch_data($article_id){
		global $pdo;

		$query = $pdo->prepare("SELECT * FROM seminar WHERE article_id = ?");
		$query->bindValue(1,$article_id);
		$query->execute();

		return $query->fetch();
	}
}

 ?>
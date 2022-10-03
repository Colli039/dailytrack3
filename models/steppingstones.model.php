<?php

require_once "connection.php";

class ModelStepStones {
	private $pdo;
	private $stmt;
	protected $result;

	public function mdlGetId() {
		$this->pdo = (new Connection)->connect();
		$this->stmt = $this->pdo->prepare("SELECT MAX(id) FROM pets");
		$this->stmt->execute();
		$this->result = $this->stmt->fetch(PDO::FETCH_ASSOC);
		$id = $this->result['MAX(id)'] + 1;
		return $id;
		$this->stmt->close();
		$this->stmt = null;
	}

	// public function mdlAddStressMood($table, $data){
	// 	var_dump($data);
	// 	try {
	// 		$this->pdo = (new Connection)->connect();
	// 		$this->pdo->beginTransaction();
	// 		//add pet
	// 		$this->stmt = $this->pdo->prepare(
	// 			"INSERT INTO $table(userid, ssdistress, ssmood, copingstrat)
	// 			VALUES (:userid, :ssdistress, :ssmood, :copingstrat)"
	// 		);
  //     $this->stmt->bindParam(":userid", $data["userid"], PDO::PARAM_INT);
  //     $this->stmt->bindParam(":ssdistress", $data["ssdistress"], PDO::PARAM_INT);
	// 		$this->stmt->bindParam(":ssmood", $data["ssmood"], PDO::PARAM_INT);
  //     $this->stmt->bindParam(":copingstrat", $data["copingstrat"], PDO::PARAM_INT);
	// 		$this->stmt->execute();
	// 		$this->pdo->commit();
	// 		//end transaction
	// 		return "ok";
	// 	} catch (PDOException $exception) {
	// 		var_dump($exception);
	// 		$this->pdo->rollBack();
	// 		return "error";
	// 	}
	// 	$this->stmt->close();
	// 	$this->stmt = null;
	// }
	public function mdlAddStressMood($table, $data)
	{
		$this->pdo = (new Connection)->connect();
		// 		$this->pdo->beginTransaction();
		$sql = "INSERT INTO $table (userid, ssdistress, ssmood, copingstrat) VALUES (?,?,?,?)";
		$stmt= $this->pdo->prepare($sql);
		$stmt->execute([$data["userid"],  $data["ssdistress"], $data["ssmood"],  $data["copingstrat"]]);
	}
  public function mdlAddKeywords($table, $data){
			// var_dump(2222);
		try {
			$this->pdo = (new Connection)->connect();
			$this->pdo->beginTransaction();
			//add pet
			// var_dump(32423);
			$this->stmt = $this->pdo->prepare(
				"INSERT INTO $table(anger, anticipation, joy, trust, fear, surprise, sadness, disgust, userid)
				VALUES (:anger, :anticipation, :joy, :trust, :fear, :surprise, :sadness, :disgust, :userid)"
			);
			$this->stmt->bindParam(":anger", $data["anger"], PDO::PARAM_INT);
			$this->stmt->bindParam(":anticipation", $data["anticipation"], PDO::PARAM_INT);
      $this->stmt->bindParam(":joy", $data["joy"], PDO::PARAM_INT);
			$this->stmt->bindParam(":trust", $data["trust"], PDO::PARAM_INT);
      $this->stmt->bindParam(":fear", $data["fear"], PDO::PARAM_INT);
			$this->stmt->bindParam(":surprise", $data["surprise"], PDO::PARAM_INT);
      $this->stmt->bindParam(":sadness", $data["sadness"], PDO::PARAM_INT);
			$this->stmt->bindParam(":disgust", $data["disgust"], PDO::PARAM_INT);
      $this->stmt->bindParam(":userid", $data["userid"], PDO::PARAM_INT);
			$this->stmt->execute();
			$this->pdo->commit();
			//end transaction
			return "ok";
		} catch (PDOException $exception) {
			$this->pdo->rollBack();
			// var_dump(99999);
			return "error";
		}
		$this->stmt->close();
		$this->stmt = null;
	}

	public function mdlGetKeywordID(){
		$this->pdo = (new Connection)->connect();
		$this->pdo->beginTransaction();
		$this->stmt = $this->pdo->prepare("SELECT max(keywordid) FROM keywords");
		$this->stmt->execute();
		return $this->stmt -> fetchAll();
		$this->stmt->close();
		$this->stmt = null;
	}

	// public function mdlShowPets(){
	// 	$this->pdo = (new Connection)->connect();
	// 	$this->stmt = $this->pdo->prepare("SELECT * FROM pets ORDER BY pname");
	// 	$this->stmt -> execute();
	// 	return $this->stmt -> fetchAll();
	// 	$this->stmt -> close();
	// 	$this->stmt = null;
	// }

}

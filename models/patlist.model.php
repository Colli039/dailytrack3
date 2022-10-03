<?php

require_once "connection.php";

class ModelPatlist {
	private $pdo;
	private $stmt;
	protected $result;

  public function mdlGetPatList($specid){
    $this->pdo = (new Connection)->connect();
    $this->stmt = $this->pdo->prepare("SELECT DISTINCT CONCAT(user.userfname, ' ', user.userlname) AS username, user.id AS userid
      FROM patients pat
      LEFT JOIN specauth spec
      ON pat.specid = spec.id
      LEFT JOIN userauth user
      ON pat.userid = user.id
      WHERE pat.specid = :specid
      GROUP BY pat.id
      ORDER BY pat.id DESC
      ");
      $this->stmt->bindParam(":specid", $specid, PDO::PARAM_INT);
      $this->stmt -> execute();
      return $this->stmt -> fetchAll();
      $this->stmt -> close();
      $this->stmt = null;
  }
	

}

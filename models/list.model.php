<?php

require_once "connection.php";

class ModelList {
	private $pdo;
	private $stmt;
	protected $result;

  public function mdlGetEmoticardList($userid){
    $this->pdo = (new Connection)->connect();
    $this->stmt = $this->pdo->prepare(
      "SELECT keyword.datetime AS datestime, keyword.keywordid AS keywordid
      FROM keywords keyword
      WHERE keyword.userid = :userid
      ORDER BY keyword.datetime DESC
      ");
      $this->stmt->bindParam(":userid", $userid, PDO::PARAM_INT);
      $this->stmt -> execute();
      return $this->stmt -> fetchAll();
      $this->stmt -> close();
      $this->stmt = null;
  }

  public function mdlGetPatientList($specid){
    $this->pdo = (new Connection)->connect();
    $this->stmt = $this->pdo->prepare(
      "SELECT DISTINCT CONCAT(user.userfname, ' ', user.userlname) AS username,
        -- pat.patcode AS patcode,
        user.id AS userid
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
  public function mdlGetPatCodeList($specid){
    $this->pdo = (new Connection)->connect();
    $this->stmt = $this->pdo->prepare(
      "SELECT pat.patcode AS patcode
        FROM patients pat
        LEFT JOIN specauth spec
        ON pat.specid = spec.id
        WHERE pat.specid = :specid
        AND pat.userid IS NULL
        GROUP BY pat.id
        ORDER BY pat.id DESC;
      ");
      $this->stmt->bindParam(":specid", $specid, PDO::PARAM_INT);
      $this->stmt -> execute();
      return $this->stmt -> fetchAll();
      $this->stmt -> close();
      $this->stmt = null;
  }

}

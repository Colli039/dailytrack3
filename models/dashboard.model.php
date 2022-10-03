<?php

require_once "connection.php";

class ModelDashboard {
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

	public function mdlAddStressMood($table, $data){
		try {
			$this->pdo = (new Connection)->connect();
			$this->pdo->beginTransaction();
			//add pet
			$this->stmt = $this->pdo->prepare(
				"INSERT INTO $table(userid, ssdistress, ssmood, copingstrat, userid)
				VALUES (:userid, :ssdistress, :ssmood, :copingstrat, :userid)"
			);
      $this->stmt->bindParam(":userid", $data["userid"], PDO::PARAM_INT);
      $this->stmt->bindParam(":ssdistress", $data["ssdistress"], PDO::PARAM_INT);
			$this->stmt->bindParam(":ssmood", $data["ssmood"], PDO::PARAM_INT);
      $this->stmt->bindParam(":copingstrat", $data["copingstrat"], PDO::PARAM_INT);
			$this->stmt->bindParam(":userid", $data["userid"], PDO::PARAM_INT);
			$this->stmt->execute();
			$this->pdo->commit();
			//end transaction
			return "ok";
		} catch (PDOException $exception) {
			$this->pdo->rollBack();
			return "error";
		}
		$this->stmt->close();
		$this->stmt = null;
	}

  // public function mdlGetDashboardData($specid){
  //   $this->pdo = (new Connection)->connect();
	// 	$this->stmt = $this->pdo->prepare("SELECT DISTINCT CONCAT(user.userfname, ' ', user.userlname) AS username,
  //   CONCAT(spec.specfname, '', spec.speclname) AS specname, CONCAT(appt.adate,' ',appt.atimestart,'-',appt.atimeend) AS appointment,
  //   sstones.ssmood AS mood
  //     FROM patients pat
  //     LEFT JOIN specauth spec
  //     ON pat.specid = :specid
  //     LEFT JOIN userauth user
  //     ON pat.userid = user.id
  //     LEFT JOIN appointment appt
  //     ON pat.userid = appt.userid
  //     LEFT JOIN stepstones sstones
  //     ON pat.userid = sstones.userid
  //     ORDER BY pat.id DESC
  //     LIMIT 1");
  //     $this->stmt->bindParam(":specid", $specid, PDO::PARAM_INT);
  //     $this->stmt -> execute();
  //     return $this->stmt -> fetchAll();
  //     $this->stmt -> close();
  //     $this->stmt = null;
  // }
  public function mdlGetDashboardData($specid){
    $this->pdo = (new Connection)->connect();
    $this->stmt = $this->pdo->prepare("SELECT DISTINCT CONCAT(user.userfname, ' ', user.userlname) AS username,
    CONCAT(spec.specfname, '', spec.speclname) AS specname, CONCAT(appt.adate,' ',appt.atimestart,'-',appt.atimeend) AS appointment,
    sstones.ssmood AS mood, user.id AS userid
      FROM patients pat
      LEFT JOIN specauth spec
      ON pat.specid = spec.id
      LEFT JOIN userauth user
      ON pat.userid = user.id
      LEFT JOIN appointment appt
      ON pat.userid = appt.userid
      LEFT JOIN stepstones sstones
      ON pat.userid = sstones.userid
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
	public function mdlEditAppointment($table, $data){
		$this->stmt = (new Connection)->connect()->prepare("UPDATE $table
			SET specname = :specname,
			username = :username,
			avenue = :avenue,
			adate = :adate,
			atimestart = :atimestart,
			atimeend = :atimeend,
			WHERE apptid = :apptid");

		$this->stmt->bindParam(":apptid", $data["apptid"], PDO::PARAM_INT);
		$this->stmt->bindParam(":specid", $data["specid"], PDO::PARAM_STR);
		$this->stmt->bindParam(":userid", $data["userid"], PDO::PARAM_STR);
		$this->stmt->bindParam(":avenue", $data["avenue"], PDO::PARAM_STR);
		$this->stmt->bindParam(":atimestart", $data["atimestart"], PDO::PARAM_STR);
		$this->stmt->bindParam(":atimeend", $data["atimeend"], PDO::PARAM_STR);

		if($this->stmt->execute()){
			return "ok";
		}else{
			return "error";
		}

		$this->stmt->close();
		$this->stmt = null;
	}

}

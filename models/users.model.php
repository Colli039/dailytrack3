<?php

require_once "connection.php";

class ModelUsers {
	private $pdo;
	private $stmt;
	protected $result;

	public function mdlGetId() {
		$this->stmt = (new Connection)->connect()->prepare("SELECT MAX(id) FROM userauth");
		$this->stmt->execute();
		$this->result = $this->stmt->fetch(PDO::FETCH_ASSOC);
		$id = $this->result['MAX(id)'] + 1;
		return $id;
		$this->stmt->close();
		$this->stmt = null;
	}

//help what's the error here
	public function mdlGetIdEmail($email) {
		$this->stmt = (new Connection)->connect()->prepare("SELECT id FROM userauth WHERE useremail = :useremail");
		$this->stmt->bindParam(":useremail", $email, PDO::PARAM_STR);
		$this->stmt->execute();
		$this->result = $this->stmt->fetch(PDO::FETCH_ASSOC);
		return $this->result;
		$this->stmt->close();
		$this->stmt = null;
	}

	public function mdlGetCredentials($datum) {
		$this->stmt = (new Connection)->connect()->prepare("SELECT id, password FROM userauth WHERE useremail = :useremail");
		$this->stmt->bindParam(":useremail", $datum, PDO::PARAM_STR);
		$this->stmt->execute();
		$this->result = $this->stmt->fetch(PDO::FETCH_ASSOC);
		return $this->result;
		$this->stmt->close();
		$this->stmt = null;
	}

	public function mdlGetRowCount() {
		$this->stmt = (new Connection)->connect()->prepare("SELECT COUNT(id) FROM userauth");
		$this->stmt->execute();
		$this->result = $this->stmt->fetch(PDO::FETCH_ASSOC);
		$rows = $this->result['COUNT(id)'];
		return $rows;
		$this->stmt->close();
		$this->stmt = null;
	}

	public function mdlFindIP($datum){
		$this->stmt = (new Connection)->connect()->prepare("SELECT id FROM loginlog WHERE ipadd = :ipadd");
		$this->stmt->bindParam(":ipadd", $datum, PDO::PARAM_STR);
		$this->stmt->execute();
		$this->result = $this->stmt->fetch(PDO::FETCH_ASSOC);
		return $this->result['id'] ?? '0';
		$this->stmt->close();
		$this->stmt = null;
	}

	public function mdlGetStatus($datum){
		$this->stmt = (new Connection)->connect()->prepare("SELECT status FROM loginlog WHERE ipadd = :ipadd");
		$this->stmt->bindParam(":ipadd", $datum, PDO::PARAM_STR);
		$this->stmt->execute();
		$this->result = $this->stmt->fetch(PDO::FETCH_ASSOC);
		return $this->result['status'] ?? 'inactive';
		$this->stmt->close();
		$this->stmt = null;
	}

	public function mdlUpdateStatus($status, $datum) {
		$this->stmt = (new Connection)->connect()->prepare("UPDATE loginlog SET status = :status WHERE ipadd = :ipadd");
		$this->stmt->bindParam(":status", $status, PDO::PARAM_STR);
		$this->stmt->bindParam(":ipadd", $datum, PDO::PARAM_STR);
		if ($this->stmt->execute()) return true;
		else return false;
		$this->stmt->close();
		$this->stmt = null;
	}

	public function mdlAddIP($datum) {
		$this->stmt = (new Connection)->connect()->prepare("INSERT INTO loginlog(ipadd) VALUES (:ipadd)");
		$this->stmt->bindParam(":ipadd", $datum, PDO::PARAM_STR);
		if ($this->stmt->execute()) return true;
		else return false;
		$this->stmt->close();
		$this->stmt = null;
	}

	public function mdlUpdateTime($datum) {
		$this->stmt = (new Connection)->connect()->prepare("UPDATE loginlog SET recentattempt = CURRENT_TIMESTAMP WHERE ipadd = :ipadd");
		$this->stmt->bindParam(":ipadd", $datum, PDO::PARAM_STR);
		if ($this->stmt->execute()) return true;
		else return false;
		$this->stmt->close();
		$this->stmt = null;
	}

	public function mdlGetFailCounter($datum) {
		$this->stmt = (new Connection)->connect()->prepare("SELECT counter FROM loginlog WHERE ipadd = :ipadd");
		$this->stmt->bindParam(":ipadd", $datum, PDO::PARAM_STR);
		$this->stmt->execute();
		$this->result = $this->stmt->fetch(PDO::FETCH_ASSOC);
		return $this->result['counter'] ?? '0';
		$this->stmt->close();
		$this->stmt = null;
	}

	public function mdlPlusFailCounter($data) {
		$this->stmt = (new Connection)->connect()->prepare("UPDATE loginlog SET counter = :counter + 1 WHERE ipadd = :ipadd");
		$this->stmt->bindParam(":counter", $data["counter"], PDO::PARAM_INT);
		$this->stmt->bindParam(":ipadd", $data["ipadd"], PDO::PARAM_STR);
		if ($this->stmt->execute()) return true;
		else return false;
		$this->stmt->close();
		$this->stmt = null;
	}

	public function mdlResetFailCounter($data) {
		$this->stmt = (new Connection)->connect()->prepare("UPDATE loginlog SET counter = 0 WHERE ipadd = :ipadd");
		$this->stmt->bindParam(":ipadd", $data["ipadd"], PDO::PARAM_STR);
		if ($this->stmt->execute()) return true;
		else return false;
		$this->stmt->close();
		$this->stmt = null;
	}

	public function mdlAddUser($table, $data){
		$this->stmt = (new Connection)->connect()->prepare("INSERT INTO $table(userid, useremail, password, userfname, userlname, userbday, usercnum, usersex) VALUES (:userid, :useremail, :password, :userfname, :userlname,  :userbday, :usercnum, :usersex)");

		$this->stmt->bindParam(":userid", $data["userid"], PDO::PARAM_STR);
		$this->stmt->bindParam(":useremail", $data["useremail"], PDO::PARAM_STR);
		$this->stmt->bindParam(":password", $data["password"], PDO::PARAM_STR);
		$this->stmt->bindParam(":userfname", $data["userfname"], PDO::PARAM_STR);
		$this->stmt->bindParam(":userlname", $data["userlname"], PDO::PARAM_STR);
		$this->stmt->bindParam(":userbday", $data["userbday"], PDO::PARAM_STR);
		$this->stmt->bindParam(":usercnum", $data["usercnum"], PDO::PARAM_STR);
		$this->stmt->bindParam(":usersex", $data["usersex"], PDO::PARAM_INT);

		if($this->stmt->execute()){
			return "ok";
		}else{
			return "error";
		}
		$this->stmt->close();
		$this->stmt = null;
	}

	public function mdlShowUsers(){
		$this->stmt = (new Connection)->connect()->prepare("SELECT * FROM userauth ORDER BY useremail");
		$this->stmt -> execute();
		return $this->stmt -> fetchAll();
		$this->stmt -> close();
		$this->stmt = null;
	}

	public function mdlEditUser($table, $data){
		$this->stmt = (new Connection)->connect()->prepare("UPDATE $table SET userfname = :userfname, userlname = :userlname, userbday = :userbday, usercnum = :usercnum, usersex = :usersex WHERE id = :id");

		$this->stmt->bindParam(":id", $data["id"], PDO::PARAM_INT);
		$this->stmt->bindParam(":userfname", $data["userfname"], PDO::PARAM_STR);
		$this->stmt->bindParam(":userlname", $data["userlname"], PDO::PARAM_STR);
		$this->stmt->bindParam(":userbday", $data["userbday"], PDO::PARAM_STR);
		$this->stmt->bindParam(":usercnum", $data["usercnum"], PDO::PARAM_STR);
		$this->stmt->bindParam(":usersex", $data["usersex"], PDO::PARAM_INT);

		if($this->stmt->execute()){
			return "ok";
		}else{
			return "error";
		}

		$this->stmt->close();
		$this->stmt = null;
	}
	public function mdlEditAuth($table, $data){
		$this->stmt = (new Connection)->connect()->prepare("UPDATE $table SET useremail = :useremail, password = :password WHERE id = :id");

		$this->stmt->bindParam(":id", $data["id"], PDO::PARAM_INT);
		$this->stmt->bindParam(":useremail", $data["useremail"], PDO::PARAM_STR);
		$this->stmt->bindParam(":password", $data["password"], PDO::PARAM_STR);

		if($this->stmt->execute()){
			return "ok";
		}else{
			return "error";
		}

		$this->stmt->close();
		$this->stmt = null;
	}

	public function mdlDeleteUser($table, $data){
		$this->stmt = (new Connection)->connect()->prepare("DELETE FROM $table WHERE id = :id");
		$this->stmt -> bindParam(":id", $data, PDO::PARAM_INT);
		if($this->stmt -> execute()){
			return "ok";
		}else{
			return "error";
		}
		$this->stmt -> close();
		$this->stmt = null;
	}
	public function mdlAddAppointment($table, $data){
		$this->stmt = (new Connection)->connect()->prepare("INSERT INTO $table(specname, username, avenue, adate, atimestart, atimeend)
		VALUES (:specname, :username, :avenue, :adate, :atimestart, :atimeend)");

		$this->stmt->bindParam(":specname", $data["specname"], PDO::PARAM_STR);
		$this->stmt->bindParam(":username", $data["username"], PDO::PARAM_STR);
		$this->stmt->bindParam(":avenue", $data["avenue"], PDO::PARAM_STR);
		$this->stmt->bindParam(":adate", $data["adate"], PDO::PARAM_STR);
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

	public function mdlAddProfileImg($table, $data, $action){
			if ($action=='add')
			{
				$this->stmt = (new Connection)->connect()->prepare("INSERT INTO $table(userid, status)
				VALUES (:userid, 1)");

				$this->stmt->bindParam(":userid", $data["userid"], PDO::PARAM_INT);
			}else {
				$this->stmt = (new Connection)->connect()->prepare("UPDATE profileimg
					SET status = 0
					WHERE userid = :userid");

				$this->stmt->bindParam(":userid", $data["userid"], PDO::PARAM_INT);
			}

		if($this->stmt->execute()){
			return "ok";
		}else{
			return "error";
		}
		$this->stmt->close();
		$this->stmt = null;
	}

	public function mdlAddPatient($table, $data){
		$this->stmt = (new Connection)->connect()->prepare("UPDATE $table SET userid = :userid
		WHERE patcode = :patcode");

		$this->stmt->bindParam(":userid", $data["userid"], PDO::PARAM_STR);
		$this->stmt->bindParam(":patcode", $data["patcode"], PDO::PARAM_STR);

		if($this->stmt->execute()){
			return "ok";
		}else{
			return "error";
		}
		$this->stmt->close();
		$this->stmt = null;
	}
	//
	// public function mdlAddProfileImg($table, $data){
	// 	$this->stmt = (new Connection)->connect()->prepare("INSERT INTO $table(userid, status)
	// 	VALUES (:userid, :status)");
	//
	// 	$this->stmt->bindParam(":userid", $data["userid"], PDO::PARAM_INT);
	// 	$this->stmt->bindParam(":status", $data["status"], PDO::PARAM_INT);
	//
	// 	if($this->stmt->execute()){
	// 		return "ok";
	// 	}else{
	// 		return "error";
	// 	}
	// 	$this->stmt->close();
	// 	$this->stmt = null;
	// }
}

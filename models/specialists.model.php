<?php

require_once "connection.php";

class ModelSpecs {
	private $pdo;
	private $stmt;
	protected $result;

	public function mdlGetSpecId() {
		$this->stmt = (new Connection)->connect()->prepare("SELECT MAX(id) FROM specauth");
		$this->stmt->execute();
		$this->result = $this->stmt->fetch(PDO::FETCH_ASSOC);
		$id = $this->result['MAX(id)'] + 1;
		return $id;
		$this->stmt->close();
		$this->stmt = null;
	}

	public function mdlGetSpecCredentials($datum) {
		$this->stmt = (new Connection)->connect()->prepare("SELECT id, specpassword FROM specauth WHERE specemail = :specemail");
		$this->stmt->bindParam(":specemail", $datum, PDO::PARAM_STR);
		$this->stmt->execute();
		$this->result = $this->stmt->fetch(PDO::FETCH_ASSOC);
		return $this->result;
		$this->stmt->close();
		$this->stmt = null;
	}

	public function mdlGetRowCount() {
		$this->stmt = (new Connection)->connect()->prepare("SELECT COUNT(id) FROM specauth");
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

	public function mdlAddSpec($table, $data){
		$this->stmt = (new Connection)->connect()->prepare("INSERT INTO $table(specid, specemail, specpassword, specfname, speclname, specbday, speccnum, specsex, speclnum, speclexp) VALUES (:specid, :specemail, :specpassword, :specfname, :speclname,  :specbday, :speccnum, :specsex, :speclnum, :speclexp)");

		$this->stmt->bindParam(":specid", $data["specid"], PDO::PARAM_STR);
		$this->stmt->bindParam(":specemail", $data["specemail"], PDO::PARAM_STR);
		$this->stmt->bindParam(":specpassword", $data["specpassword"], PDO::PARAM_STR);
		$this->stmt->bindParam(":specfname", $data["specfname"], PDO::PARAM_STR);
		$this->stmt->bindParam(":speclname", $data["speclname"], PDO::PARAM_STR);
		$this->stmt->bindParam(":specbday", $data["specbday"], PDO::PARAM_STR);
		$this->stmt->bindParam(":speccnum", $data["speccnum"], PDO::PARAM_STR);
		$this->stmt->bindParam(":specsex", $data["specsex"], PDO::PARAM_INT);
		//$this->stmt->bindParam(":specclncadd", $data["specclncadd"], PDO::PARAM_STR);
		$this->stmt->bindParam(":speclnum", $data["speclnum"], PDO::PARAM_STR);
		$this->stmt->bindParam(":speclexp", $data["speclexp"], PDO::PARAM_STR);

		if($this->stmt->execute()){
			return "ok";
		}else{
			return "error";
		}
		$this->stmt->close();
		$this->stmt = null;
	}

	public function mdlShowSpecs(){
		$this->stmt = (new Connection)->connect()->prepare("SELECT * FROM specauth ORDER BY specemail");
		$this->stmt -> execute();
		return $this->stmt -> fetchAll();
		$this->stmt -> close();
		$this->stmt = null;
	}

	// public function mdlEditSpec($table, $data){
	// 	$this->stmt = (new Connection)->connect()->prepare("UPDATE $table SET specid = :specid, specemail = :specemail, specpassword = :specpassword, specfname = :specfname, speclname = :speclname, specbday = :specbday, speccnum = :speccnum, specsex = :specsex, speclnum = :speclnum, speclexp = :speclexp WHERE id = :id");
	//
	// 	$this->stmt->bindParam(":id", $data["id"], PDO::PARAM_INT);
	// 	$this->stmt->bindParam(":specid", $data["specid"], PDO::PARAM_STR);
	// 	$this->stmt->bindParam(":specemail", $data["specemail"], PDO::PARAM_STR);
	// 	$this->stmt->bindParam(":specpassword", $data["specpassword"], PDO::PARAM_STR);
	// 	$this->stmt->bindParam(":specfname", $data["specfname"], PDO::PARAM_STR);
	// 	$this->stmt->bindParam(":speclname", $data["speclname"], PDO::PARAM_STR);
	// 	$this->stmt->bindParam(":specbday", $data["specbday"], PDO::PARAM_STR);
	// 	$this->stmt->bindParam(":speccnum", $data["speccnum"], PDO::PARAM_STR);
	// 	$this->stmt->bindParam(":specsex", $data["specsex"], PDO::PARAM_INT);
	// 	//$this->stmt->bindParam(":specclncadd", $data["specclncadd"], PDO::PARAM_STR);
	// 	$this->stmt->bindParam(":speclnum", $data["speclnum"], PDO::PARAM_STR);
	// 	$this->stmt->bindParam(":speclexp", $data["speclexp"], PDO::PARAM_STR);
	//
	// 	if($this->stmt->execute()){
	// 		return "ok";
	// 	}else{
	// 		return "error";
	// 	}
	//
	// 	$this->stmt->close();
	// 	$this->stmt = null;
	// }

	public function mdlDeleteSpecs($table, $data){
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
	public function mdlEditSpec($table, $data){
		$this->stmt = (new Connection)->connect()->prepare("UPDATE $table SET specfname = :specfname, speclname = :speclname, speccnum = :speccnum, specsex = :specsex, speclnum = :speclnum, speclexp = :speclexp WHERE id = :id");

		$this->stmt->bindParam(":id", $data["id"], PDO::PARAM_INT);
		$this->stmt->bindParam(":specfname", $data["specfname"], PDO::PARAM_STR);
		$this->stmt->bindParam(":speclname", $data["speclname"], PDO::PARAM_STR);
		$this->stmt->bindParam(":speccnum", $data["speccnum"], PDO::PARAM_STR);
		$this->stmt->bindParam(":specsex", $data["specsex"], PDO::PARAM_INT);
		$this->stmt->bindParam(":speclnum", $data["speclnum"], PDO::PARAM_STR);
		$this->stmt->bindParam(":speclexp", $data["speclexp"], PDO::PARAM_STR);

		if($this->stmt->execute()){
			return "ok";
		}else{
			return "error";
		}

		$this->stmt->close();
		$this->stmt = null;
	}
	public function mdlEditSpecStatus($table, $data){
		$this->stmt = (new Connection)->connect()->prepare("UPDATE $table SET specstatus = :specstatus WHERE id = :id");

		$this->stmt->bindParam(":id", $data["id"], PDO::PARAM_INT);
		$this->stmt->bindParam(":specstatus", $data["specstatus"], PDO::PARAM_STR);

		if($this->stmt->execute()){
			return "ok";
		}else{
			return "error";
		}

		$this->stmt->close();
		$this->stmt = null;
	}
	public function mdlEditSpecAuth($table, $data){
		$this->stmt = (new Connection)->connect()->prepare("UPDATE $table SET useremail = :useremail, password = :password WHERE id = :id");

		$this->stmt->bindParam(":id", $data["id"], PDO::PARAM_INT);
		$this->stmt->bindParam(":specemail", $data["specemail"], PDO::PARAM_STR);
		$this->stmt->bindParam(":specpassword", $data["specpassword"], PDO::PARAM_STR);

		if($this->stmt->execute()){
			return "ok";
		}else{
			return "error";
		}

		$this->stmt->close();
		$this->stmt = null;
	}
	public function mdlAddPatCode($table, $data){
		$this->stmt = (new Connection)->connect()->prepare("INSERT INTO $table(specid, patcode) VALUES (:specid, :patcode)");

		$this->stmt->bindParam(":specid", $data["specid"], PDO::PARAM_STR);
		$this->stmt->bindParam(":patcode", $data["patcode"], PDO::PARAM_STR);

		if($this->stmt->execute()){
			return "ok";
		}else{
			return "error";
		}
		$this->stmt->close();
		$this->stmt = null;
	}
}

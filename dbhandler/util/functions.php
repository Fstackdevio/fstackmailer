<?php
// Utility class is for handling app management 
class Utility {

	protected $DBcon;

	public function __construct(){
		require_once (dirname(__DIR__).'/util/dbcon.php');
		require_once (dirname(__DIR__).'/vendor/phpmailer/phpmailer/PHPMailerAutoload.php');
 		$db = new dbconnect();
    	$this->DBcon = $db->connect();
	}
}

/**
 * class for transpay function
 */
class transeaze extends Utility{
	function __construct(){
		parent::__construct();
	}

	public function searchfinger($fingerdata){
		$sql = "SELECT * FROM bvn WHERE (LF1=:fingerdata) OR (LF2=:fingerdata) OR (LF3=:fingerdata) OR (LF4=:fingerdata) OR (LF5=:fingerdata) OR (RF1=:fingerdata) OR (RF2=:fingerdata) OR (RF3=:fingerdata) OR (RF4=:fingerdata) OR (RF5=:fingerdata)";
		$stmt = $this->DBcon->prepare($sql); 
	    $stmt->bindParam(':fingerdata', $fingerdata);
		$stmt->execute();
		$res = $stmt->fetch(PDO::FETCH_ASSOC);
		return $res;
	}

	public function getBanks($bvnid){
		$sql = "SELECT * FROM bankdetails WHERE (bvnId=:bvnid)";
		$stmt = $this->DBcon->prepare($sql);
		$stmt->bindParam(':bvnid', $bvnid);
		$stmt->execute();
		$res = $stmt->fetch(PDO::FETCH_ASSOC);
		return $res;
	}
}



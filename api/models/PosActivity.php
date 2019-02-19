<?php
require_once("api/library/dbcontroller.php");

Class PosActivity {
	private $posActivity = array();

	public function getPosActivities($pos_id){
		$query = "SELECT activity_id FROM pos_activities WHERE pos_id=".$pos_id;
		$dbcontroller = new DBController();
		$this->posActivity = $dbcontroller->executeSelectQuery($query);
		return $this->posActivity;
	}

	public function insertPosActivity($request){
		$activity_id = $request['activity_id'];
		$pos_id = $request['pos_id'];

		$query="INSERT INTO pos_activities SET activity_id='{$activity_id}', pos_id='{$pos_id}'";
		$dbcontroller = new DBController();
		$this->posActivity = $dbcontroller->executeQuery($query);
		return $this->posActivity;
	}

	public function deletePosActivity($pos_id, $posActivity_id){
		$query="DELETE FROM pos_activities WHERE activity_id=".$posActivity_id." AND pos_id=".$pos_id;
		$dbcontroller = new DBController();
		$this->posActivity = $dbcontroller->executeQuery($query);
		return $this->posActivity;
	}
}
?>

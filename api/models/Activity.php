<?php
require_once("api/library/dbcontroller.php");

Class Activity {
	private $activity = array();

	public function getActivities($activity_id){
		$query = "SELECT * FROM activities";
		if($activity_id != 0)
		{
			$query.=" WHERE id=".$activity_id." LIMIT 1";
		}
		$dbcontroller = new DBController();
		$this->activity = $dbcontroller->executeSelectQuery($query);
		return $this->activity;
	}

	public function insertActivity($request){
		$name = $request['name'];

		$query="INSERT INTO activities SET name='{$name}'";
		$dbcontroller = new DBController();
		$this->activity = $dbcontroller->executeQuery($query);
		return $this->activity;
	}

	public function updateActivity($activity_id, $request){
		$name = $request['name'];

		$query="UPDATE activities SET name='{$name}' WHERE id=".$activity_id;

		$dbcontroller = new DBController();
		$this->activity = $dbcontroller->executeQuery($query);
		return $this->activity;
	}

	public function deleteActivity($activity_id){
		$query="DELETE FROM activities WHERE id=".$activity_id;
		$dbcontroller = new DBController();
		$this->activity = $dbcontroller->executeQuery($query);
		return $this->activity;
	}
}
?>

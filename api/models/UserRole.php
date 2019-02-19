<?php
require_once("api/library/dbcontroller.php");

Class UserRole {
	private $userRole = array();

	public function getUserRoles($role_id){
		$query = "SELECT * FROM role";
		if($role_id != 0)
		{
			$query.=" WHERE id=".$role_id." LIMIT 1";
		}
		$dbcontroller = new DBController();
		$this->userRole = $dbcontroller->executeSelectQuery($query);
		return $this->userRole;
	}

	public function insertUserRole($request){
		$name = $request['name'];

		$query="INSERT INTO role SET name='{$name}'";
		$dbcontroller = new DBController();
		$this->userRole = $dbcontroller->executeQuery($query);
		return $this->userRole;
	}

	public function updateUserRole($role_id, $request){
		$name = $request['name'];

		$query="UPDATE role SET name='{$name}' WHERE id=".$role_id;

		$dbcontroller = new DBController();
		$this->userRole = $dbcontroller->executeQuery($query);
		return $this->userRole;
	}

	public function deleteUserRole($role_id){
		$query="DELETE FROM role WHERE id=".$role_id;
		$dbcontroller = new DBController();
		$this->userRole = $dbcontroller->executeQuery($query);
		return $this->userRole;
	}
}
?>

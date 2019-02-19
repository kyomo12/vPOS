<?php
require_once("api/library/dbcontroller.php");

Class User {
	private $user = array();

	public function getUsers($user_id){
		$query = "SELECT * FROM user";
		if($user_id != 0)
		{
			$query.=" WHERE id=".$user_id." LIMIT 1";
		}
		$dbcontroller = new DBController();
		$this->user = $dbcontroller->executeSelectQuery($query);
		return $this->user;
	}

	public function getUsersByMobile($mobile){
		$query = "SELECT * FROM user";
		if($user_id != 0)
		{
			$query.=" WHERE mobile=".$mobile." LIMIT 1";
		}
		$dbcontroller = new DBController();
		$this->user = $dbcontroller->executeSelectQuery($query);
		return $this->user;
	}

	public function insertUser($request){
		$first_name = $request['first_name'];
		$last_name = $request['last_name'];
		$mobile = $request['mobile'];
		$email = $request['email'];
		$password = password_hash($request['password'], PASSWORD_DEFAULT);
		$role = $request['role'];

		$query="INSERT INTO user SET first_name='{$first_name}', last_name='{$last_name}', mobile='{$mobile}',
						email='{$email}', password='{$password}', role='{$role}'";
		$dbcontroller = new DBController();
		$this->user = $dbcontroller->executeQuery($query);
		// $this->user['mobile'] = $mobile;
		return $this->user;
		// if ($dbcontroller->executeQuery($query)) {
			// $this->user = $this->getUsersByMobile($mobile);
		// 	return $this->getUsersByMobile($mobile);
		// } else {
		// 	return $this->user;
		// }
	}

	public function updateUser($user_id, $request){
		$first_name = $request['first_name'];
		$last_name = $request['last_name'];
		$mobile = $request['mobile'];
		$email = $request['email'];
		$password = password_hash($request['password'], PASSWORD_DEFAULT);
		$role = $request['role'];

		$query="UPDATE user SET first_name='{$first_name}', last_name='{$last_name}', mobile='{$mobile}',
						email='{$email}', password='{$password}', role='{$role}' WHERE id=".$user_id;

		$dbcontroller = new DBController();
		$this->user = $dbcontroller->executeQuery($query);
		return $this->user;
	}

	public function deleteUser($user_id){
		$query="DELETE FROM user WHERE id=".$user_id;
		$dbcontroller = new DBController();
		$this->user = $dbcontroller->executeQuery($query);
		return $this->user;
	}

	public function authUser($request){
		$mobile = $request['mobile'];
		$password = $request['password'];
		$query = "SELECT * FROM user WHERE mobile=".$mobile." LIMIT 1";
		$dbcontroller = new DBController();
		$this->user = $dbcontroller->executeSelectQuery($query);

		$response = array();
		if (password_verify($password, $this->user[0]['password'])) {
		  return $this->user;
		} else {
			return $response; // check this again
		}
	}
}
?>

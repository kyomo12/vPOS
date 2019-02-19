<?php
require_once("api/controller/ApiRest.php");
require_once("api/models/UserRole.php");

class UserRoleRestHandler extends ApiRest {

	function getRequestMethod($data) {
		$request_method=$_SERVER["REQUEST_METHOD"];
		switch($request_method)
		{
			case 'GET':
				// Retrive Roles
				if(!empty($data))
				{
					$role_id = intval($data);
					$this->getUserRoles($role_id);
				}
				else
				{
					$this->getUserRoles($role_id=0);
				}
				break;
			case 'POST':
				$this->insertUserRole();
				break;
			case 'PUT':
				$role_id = intval($data);
				$this->updateUserRole($role_id);
				break;
			case 'DELETE':
				$role_id = intval($data);
				$this->deleteUserRole($role_id);
				break;
			default:
				// Invalid Request Method
				header("HTTP/1.0 405 Method Not Allowed");
				break;
		}
	}

	function getUserRoles($role_id) {

		$userRole  = new UserRole();
		$rawData = $userRole ->getUserRoles($role_id);
		if(empty($rawData) || sizeof($rawData) == 0) {
			$statusCode = 404;
			$rawData = array('error' => 'No Role found!');
		} else {
			$statusCode = 200;
		}

		$jsonRequest = $this->jsonRequest($statusCode);

		if(strpos($jsonRequest,'application/json') !== false){
			$response = $this->encodeJson($rawData);
			echo $response;
		}
	}

	function insertUserRole() {
		if (empty($_POST)) {
			$_POST = json_decode(file_get_contents("php://input"), true) ? : [];
		}
		$json_str = file_get_contents('php://input');

		$userRole  = new UserRole();
		if($userRole->insertUserRole($_POST)) {
			$statusCode = 200;
			$insertResponse = array('success' => 'Role Added Successfully');
		} else {
			$statusCode = 300;
			$insertResponse = array('error' => 'Role Addition Unsuccessfully');
		}

		$jsonRequest = $this->jsonRequest($statusCode);

		if(strpos($jsonRequest,'application/json') !== false){
			$response = $this->encodeJson($insertResponse);
			echo $response;
		}
	}

	function updateUserRole($role_id) {
		if (empty($_POST)) {
			$_POST = json_decode(file_get_contents("php://input"), true) ? : [];
		}
		$json_str = file_get_contents('php://input');

		$userRole  = new UserRole();

		if($userRole ->updateUserRole($role_id, $_POST)) {
			$statusCode = 200;
			$updateResponse = array('success' => 'Role Updated Successfully');
		} else {
			$statusCode = 300;
			$updateResponse = array('error' => 'Role Update Unsuccessfully');
		}

		$jsonRequest = $this->jsonRequest($statusCode);

		if(strpos($jsonRequest,'application/json') !== false){
			$response = $this->encodeJson($updateResponse);
			echo $response;
		}
	}

	function deleteUserRole($role_id) {

		$userRole  = new UserRole();

		if($userRole ->deleteUserRole($role_id)) {
			$statusCode = 200;
			$updateResponse = array('success' => 'Role Deleted Successfully');
		} else {
			$statusCode = 300;
			$updateResponse = array('error' => 'Role Deletion Unsuccessfully');
		}

		$jsonRequest = $this->jsonRequest($statusCode);

		if(strpos($jsonRequest,'application/json') !== false){
			$response = $this->encodeJson($updateResponse);
			echo $response;
		}
	}
}
?>

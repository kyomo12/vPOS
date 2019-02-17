<?php
require_once("api/controller/ApiRest.php");
require_once("api/models/User.php");

class UserRestHandler extends ApiRest {

	function getRequestMethod($data) {
		$request_method=$_SERVER["REQUEST_METHOD"];
		switch($request_method)
		{
			case 'GET':
				// Retrive Pos
				if(!empty($data))
				{
					$user_id = intval($data);
					$this->getUsers($user_id);
				}
				else
				{
					$this->getUsers($user_id=0);
				}
				break;
			case 'POST':
				$this->insertUser();
				break;
			case 'PUT':
				$user_id = intval($data);
				$this->updateUser($user_id);
				break;
			case 'DELETE':
				$user_id = intval($data);
				$this->deleteUser($user_id);
				break;
			default:
				// Invalid Request Method
				header("HTTP/1.0 405 Method Not Allowed");
				break;
		}
	}

	function getUsers($user_id) {

		$user = new User();
		$rawData = $user->getUsers($user_id);
		if(empty($rawData) || sizeof($rawData) == 0) {
			$statusCode = 404;
			$rawData = array('error' => 'No User found!');
		} else {
			$statusCode = 200;
		}

		$jsonRequest = $this->jsonRequest($statusCode);
		// $result["output"] = $rawData;

		if(strpos($jsonRequest,'application/json') !== false){
			$response = $this->encodeJson($rawData);
			echo $response;
		}
	}

	function insertUser() {
		if (empty($_POST)) {
			$_POST = json_decode(file_get_contents("php://input"), true) ? : [];
		}

		$user = new User();
		if($user->insertUser($_POST)) {
			$statusCode = 201;
			$insertResponse = array('success' => 'User Added Successfully');
		} else {
			$statusCode = 300;
			$insertResponse = array('error' => 'User Addition Unsuccessfully');
		}

		$jsonRequest = $this->jsonRequest($statusCode);
		// $result["output"] = $insertResponse;

		if(strpos($jsonRequest,'application/json') !== false){
			$response = $this->encodeJson($insertResponse);
			echo $response;
		}
	}

	function updateUser($user_id) {
		if (empty($_POST)) {
			$_POST = json_decode(file_get_contents("php://input"), true) ? : [];
		}
		$json_str = file_get_contents('php://input');

		$user = new User();

		if($user->updateUser($user_id, $_POST)) {
			$statusCode = 204;
			$updateResponse = array('success' => 'User Updated Successfully');
		} else {
			$statusCode = 300;
			$updateResponse = array('error' => 'User Update Unsuccessfully');
		}

		$jsonRequest = $this->jsonRequest($statusCode);
		// $result["output"] = $updateResponse;

		if(strpos($jsonRequest,'application/json') !== false){
			$response = $this->encodeJson($updateResponse);
			echo $response;
		}
	}

	function deleteUser($user_id) {

		$user = new User();
		$rawData = $user->getUsers($user_id);

		if(empty($rawData) || sizeof($rawData) == 0) {
			$statusCode = 404;
			$updateResponse = array('error' => 'No User found!');
		} elseif ($user->deleteUser($user_id)) {
			$statusCode = 200;
			$updateResponse = array('success' => 'User Deleted Successfully');
		} else {
			$statusCode = 300;
			$updateResponse = array('error' => 'User Deletion Unsuccessfully');
		}

		$jsonRequest = $this->jsonRequest($statusCode);
		// $result["output"] = $updateResponse;

		if(strpos($jsonRequest,'application/json') !== false){
			$response = $this->encodeJson($updateResponse);
			echo $response;
		}
	}
}
?>

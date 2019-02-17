<?php
require_once("api/controller/ApiRest.php");
require_once("api/models/Activity.php");

class ActivityRestHandler extends ApiRest {

	function getRequestMethod($data) {
		$request_method=$_SERVER["REQUEST_METHOD"];
		switch($request_method)
		{
			case 'GET':
				// Retrive Activities
				if(!empty($data))
				{
					$activity_id = intval($data);
					$this->getActivities($activity_id);
				}
				else
				{
					$this->getActivities($activity_id=0);
				}
				break;
			case 'POST':
				$this->insertActivity();
				break;
			case 'PUT':
				$activity_id = intval($data);
				$this->updateActivity($activity_id);
				break;
			case 'DELETE':
				$activity_id = intval($data);
				$this->deleteActivity($activity_id);
				break;
			default:
				// Invalid Request Method
				header("HTTP/1.0 405 Method Not Allowed");
				break;
		}
	}

	function getActivities($activity_id) {

		$activity = new Activity();
		$rawData = $activity->getActivities($activity_id);
		if(empty($rawData) || sizeof($rawData) == 0) {
			$statusCode = 404;
			$rawData = array('error' => 'No Activity found!');
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

	function insertActivity() {
		if (empty($_POST)) {
			$_POST = json_decode(file_get_contents("php://input"), true) ? : [];
		}
		$json_str = file_get_contents('php://input');

		$activity = new Activity();
		if($activity->insertActivity($_POST)) {
			$statusCode = 200;
			$insertResponse = array('success' => 'Activity Added Successfully');
		} else {
			$statusCode = 300;
			$insertResponse = array('error' => 'Activity Addition Unsuccessfully');
		}

		$jsonRequest = $this->jsonRequest($statusCode);
		// $result["output"] = $insertResponse;

		if(strpos($jsonRequest,'application/json') !== false){
			$response = $this->encodeJson($insertResponse);
			echo $response;
		}
	}

	function updateActivity($activity_id) {
		if (empty($_POST)) {
			$_POST = json_decode(file_get_contents("php://input"), true) ? : [];
		}
		$json_str = file_get_contents('php://input');

		$activity = new Activity();

		if($activity->updateActivity($activity_id, $_POST)) {
			$statusCode = 200;
			$updateResponse = array('success' => 'Activity Updated Successfully');
		} else {
			$statusCode = 300;
			$updateResponse = array('error' => 'Activity Update Unsuccessfully');
		}

		$jsonRequest = $this->jsonRequest($statusCode);
		// $result["output"] = $updateResponse;

		if(strpos($jsonRequest,'application/json') !== false){
			$response = $this->encodeJson($updateResponse);
			echo $response;
		}
	}

	function deleteActivity($activity_id) {

		$activity = new Activity();

		if($activity->deleteActivity($activity_id)) {
			$statusCode = 200;
			$updateResponse = array('success' => 'Activity Deleted Successfully');
		} else {
			$statusCode = 300;
			$updateResponse = array('error' => 'Activity Deletion Unsuccessfully');
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

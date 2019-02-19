<?php
require_once("api/controller/ApiRest.php");
require_once("api/models/PosActivity.php");

class PosActivityRestHandler extends ApiRest {

	function getRequestMethod($data, $secondData) {
		$request_method=$_SERVER["REQUEST_METHOD"];
		switch($request_method)
		{
			case 'GET':
				// Retrive Pos Activities
				if(!empty($data) && !empty($secondData))
				{
					$posActivity_id = intval($secondData);
					$pos_id = intval($data);
					$this->getPosActivities($pos_id, $posActivity_id);
				}
				else
				{
					$pos_id = intval($data);
					$this->getPosActivities($pos_id, $posActivity_id=0);
				}
				break;
			case 'POST':
				$this->insertPosActivity();
				break;
			// case 'PUT':
			// 	$posActivity_id = intval($secondData);
			// 	$pos_id = intval($data);
			// 	$this->updatePosActivity($pos_id, $posActivity_id);
			// 	break;
			case 'DELETE':
				$posActivity_id = intval($secondData);
				$pos_id = intval($data);
				$this->deletePosActivity($pos_id, $posActivity_id);
				break;
			default:
				// Invalid Request Method
				header("HTTP/1.0 405 Method Not Allowed");
				break;
		}
	}

	function getPosActivities($pos_id, $posActivity_id) {

		$posActivity = new PosActivity();

		$rawData = $posActivity->getPosActivities($pos_id);
		if(empty($rawData) || sizeof($rawData) == 0) {
			$statusCode = 404;
			$activities = array('error' => 'No POS Activity found!');
		} else {
			// $statusCode = 200;
			$activity = new Activity();
			$activities = array();
			foreach ($rawData as $key => $value) {
				$result = $activity->getActivities($rawData[$key]['activity_id']);
				if(empty($result) || sizeof($result) == 0) {
					$statusCode = 404;
					$result = array('error' => 'No Activity found!');
				} else {
					$statusCode = 200;
					array_push($activities, $result);
				}
			}
		}

		$jsonRequest = $this->jsonRequest($statusCode);

		if(strpos($jsonRequest,'application/json') !== false){
			$response = $this->encodeJson($activities);
			echo $response;
		}
	}

	function insertPosActivity() {
		if (empty($_POST)) {
			$_POST = json_decode(file_get_contents("php://input"), true) ? : [];
		}
		$json_str = file_get_contents('php://input');

		$posActivity = new PosActivity();
		if($posActivity->insertPosActivity($_POST)) {
			$statusCode = 200;
			$insertResponse = array('success' => 'POS Activity Added Successfully');
		} else {
			$statusCode = 404;
			$insertResponse = array('error' => 'POS Activity Addition Unsuccessfully');
		}

		$jsonRequest = $this->jsonRequest($statusCode);

		if(strpos($jsonRequest,'application/json') !== false){
			$response = $this->encodeJson($insertResponse);
			echo $response;
		}
	}

	function deletePosActivity($pos_id, $posActivity_id) {

		$posActivity = new PosActivity();

		if(empty($pos_id)){
			$statusCode = 404;
			$updateResponse = array('error' => 'Please select a POS');
		} elseif(empty($posActivity_id)){
			$statusCode = 404;
		  $updateResponse = array('error' => 'Please select POS Activity to delete');
		} else {
			if($posActivity->deletePosActivity($pos_id, $posActivity_id)) {
				$statusCode = 200;
				$updateResponse = array('success' => 'POS Activity Deleted Successfully');
			} else {
				$statusCode = 404;
				$updateResponse = array('error' => 'POS Activity Deletion Unsuccessfully');
			}
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

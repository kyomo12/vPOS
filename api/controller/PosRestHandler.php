<?php
require_once("api/controller/ApiRest.php");
require_once("api/models/Pos.php");

class PosRestHandler extends ApiRest {

	function getRequestMethod($data) {
		$request_method=$_SERVER["REQUEST_METHOD"];
		switch($request_method)
		{
			case 'GET':
				// Retrive Pos
				if(!empty($data))
				{
					$pos_id = intval($data);
					$this->getPos($pos_id);
				}
				else
				{
					$this->getPos($pos_id=0);
				}
				break;
			case 'POST':
				$this->insertPOS();
				break;
			case 'PUT':
				$pos_id = intval($data);
				$this->updatePos($pos_id);
				break;
			case 'DELETE':
				$pos_id = intval($data);
				$this->deletePos($pos_id);
				break;
			default:
				// Invalid Request Method
				header("HTTP/1.0 405 Method Not Allowed");
				break;
		}
	}

	function getPos($pos_id) {

		$pos = new Pos();
		$rawData = $pos->getPos($pos_id);
		if(empty($rawData) || sizeof($rawData) == 0) {
			$statusCode = 404;
			$rawData = array('error' => 'No POS found!');
		} else {
			$statusCode = 200;
		}

		$jsonRequest = $this->jsonRequest($statusCode);
		$result["output"] = $rawData;

		if(strpos($jsonRequest,'application/json') !== false){
			$response = $this->encodeJson($result);
			echo $response;
		}
	}

	function insertPos() {
		if (empty($_POST)) {
			$_POST = json_decode(file_get_contents("php://input"), true) ? : [];
		}
		$json_str = file_get_contents('php://input');

		$pos = new Pos();
		if($pos->insertPos($_POST)) {
			$statusCode = 200;
			$insertResponse = array('success' => 'POS Added Successfully');
		} else {
			$statusCode = 300;
			$insertResponse = array('error' => 'POS Addition Unsuccessfully');
		}

		$jsonRequest = $this->jsonRequest($statusCode);
		$result["output"] = $insertResponse;

		if(strpos($jsonRequest,'application/json') !== false){
			$response = $this->encodeJson($result);
			echo $response;
		}
	}

	function updatePos($pos_id) {
		if (empty($_POST)) {
			$_POST = json_decode(file_get_contents("php://input"), true) ? : [];
		}
		$json_str = file_get_contents('php://input');

		$pos = new Pos();

		if($pos->updatePos($pos_id, $_POST)) {
			$statusCode = 200;
			$updateResponse = array('success' => 'POS Updated Successfully');
		} else {
			$statusCode = 300;
			$updateResponse = array('error' => 'POS Update Unsuccessfully');
		}

		$jsonRequest = $this->jsonRequest($statusCode);
		$result["output"] = $updateResponse;

		if(strpos($jsonRequest,'application/json') !== false){
			$response = $this->encodeJson($result);
			echo $response;
		}
	}

	function deletePos($pos_id) {

		$pos = new Pos();

		if($pos->deletePos($pos_id)) {
			$statusCode = 200;
			$updateResponse = array('success' => 'POS Deleted Successfully');
		} else {
			$statusCode = 300;
			$updateResponse = array('error' => 'POS Deletion Unsuccessfully');
		}

		$jsonRequest = $this->jsonRequest($statusCode);
		$result["output"] = $updateResponse;

		if(strpos($jsonRequest,'application/json') !== false){
			$response = $this->encodeJson($result);
			echo $response;
		}
	}
}
?>

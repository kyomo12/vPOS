<?php
require_once("api/controller/ApiRest.php");
require_once("api/models/Pos.php");
require_once("api/models/Category.php");
require_once("api/models/PosOwner.php");

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
		$posResult = array();

		if(empty($rawData) || sizeof($rawData) == 0) {
			$statusCode = 404;
			$posResult = array('error' => 'No POS found!');
		} else {
			$statusCode = 200;
			// Get POS Category and Owner data
			$category = new Category();
			$posOwner = new PosOwner();

			foreach ($rawData as $key => $value) {
				$categoryResult = $category->getCategories($rawData[$key]['category_id']);
				$ownerResult = $posOwner->getPosOwners($rawData[$key]['owner_id']);

				if(empty($categoryResult) || sizeof($categoryResult) == 0) {
					$categoryResult = NULL;
				}

				if(empty($ownerResult) || sizeof($ownerResult) == 0) {
					$ownerResult = NULL;
				}

				$posResult[$key] = array('id' => $rawData[0]['id'],
															'name' => $rawData[0]['name'], 'till_no' => $rawData[0]['till_no'],
															'region' => $rawData[0]['region'], 'district' => $rawData[0]['district'],
															'ward' => $rawData[0]['ward'], 'village_mtaa' => $rawData[0]['Village_mtaa'],
															'street' => $rawData[0]['street'], 'latitude' => $rawData[0]['latitude'],
															'longtude' => $rawData[0]['longtude'], 'pos_status' => $rawData[0]['pos_status'],
															'category' => $categoryResult, 'owner' => $ownerResult);
			}
		}

		$jsonRequest = $this->jsonRequest($statusCode);
		// $result["output"] = $rawData;

		if(strpos($jsonRequest,'application/json') !== false){
			$response = $this->encodeJson($posResult);
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
		// $result["output"] = $insertResponse;

		if(strpos($jsonRequest,'application/json') !== false){
			$response = $this->encodeJson($insertResponse);
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
		// $result["output"] = $updateResponse;

		if(strpos($jsonRequest,'application/json') !== false){
			$response = $this->encodeJson($updateResponse);
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
		// $result["output"] = $updateResponse;

		if(strpos($jsonRequest,'application/json') !== false){
			$response = $this->encodeJson($updateResponse);
			echo $response;
		}
	}
}
?>

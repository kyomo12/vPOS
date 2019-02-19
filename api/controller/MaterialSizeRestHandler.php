<?php
require_once("api/controller/ApiRest.php");
require_once("api/models/MaterialSize.php");

class MaterialSizeRestHandler extends ApiRest {

	function getRequestMethod($data) {
		$request_method=$_SERVER["REQUEST_METHOD"];
		switch($request_method)
		{
			case 'GET':
				// Retrive Sizes
				if(!empty($data))
				{
					$size_id = intval($data);
					$this->getMaterialSizes($size_id);
				}
				else
				{
					$this->getMaterialSizes($size_id=0);
				}
				break;
			case 'POST':
				$this->insertMaterialSize();
				break;
			case 'PUT':
				$size_id = intval($data);
				$this->updateMaterialSize($size_id);
				break;
			case 'DELETE':
				$size_id = intval($data);
				$this->deleteMaterialSize($size_id);
				break;
			default:
				// Invalid Request Method
				header("HTTP/1.0 405 Method Not Allowed");
				break;
		}
	}

	function getMaterialSizes($size_id) {

		$materialSize  = new MaterialSize();
		$rawData = $materialSize ->getMaterialSizes($size_id);
		if(empty($rawData) || sizeof($rawData) == 0) {
			$statusCode = 404;
			$rawData = array('error' => 'No Material Size found!');
		} else {
			$statusCode = 200;
		}

		$jsonRequest = $this->jsonRequest($statusCode);

		if(strpos($jsonRequest,'application/json') !== false){
			$response = $this->encodeJson($rawData);
			echo $response;
		}
	}

	function insertMaterialSize() {
		if (empty($_POST)) {
			$_POST = json_decode(file_get_contents("php://input"), true) ? : [];
		}
		$json_str = file_get_contents('php://input');

		$materialSize  = new MaterialSize();
		if($materialSize->insertMaterialSize($_POST)) {
			$statusCode = 200;
			$insertResponse = array('success' => 'Material Size Added Successfully');
		} else {
			$statusCode = 300;
			$insertResponse = array('error' => 'Material Size Addition Unsuccessfully');
		}

		$jsonRequest = $this->jsonRequest($statusCode);

		if(strpos($jsonRequest,'application/json') !== false){
			$response = $this->encodeJson($insertResponse);
			echo $response;
		}
	}

	function updateMaterialSize($size_id) {
		if (empty($_POST)) {
			$_POST = json_decode(file_get_contents("php://input"), true) ? : [];
		}
		$json_str = file_get_contents('php://input');

		$materialSize  = new MaterialSize();

		if($materialSize ->updateMaterialSize($size_id, $_POST)) {
			$statusCode = 200;
			$updateResponse = array('success' => 'Material Size Updated Successfully');
		} else {
			$statusCode = 300;
			$updateResponse = array('error' => 'Material Size Update Unsuccessfully');
		}

		$jsonRequest = $this->jsonRequest($statusCode);

		if(strpos($jsonRequest,'application/json') !== false){
			$response = $this->encodeJson($updateResponse);
			echo $response;
		}
	}

	function deleteMaterialSize($size_id) {

		$materialSize  = new MaterialSize();

		if($materialSize ->deleteMaterialSize($size_id)) {
			$statusCode = 200;
			$updateResponse = array('success' => 'Material Size Deleted Successfully');
		} else {
			$statusCode = 300;
			$updateResponse = array('error' => 'Material Size Deletion Unsuccessfully');
		}

		$jsonRequest = $this->jsonRequest($statusCode);

		if(strpos($jsonRequest,'application/json') !== false){
			$response = $this->encodeJson($updateResponse);
			echo $response;
		}
	}
}
?>

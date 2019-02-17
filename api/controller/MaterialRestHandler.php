<?php
require_once("api/controller/ApiRest.php");
require_once("api/models/Material.php");

class MaterialRestHandler extends ApiRest {

	function getRequestMethod($data) {
		$request_method=$_SERVER["REQUEST_METHOD"];
		switch($request_method)
		{
			case 'GET':
				// Retrive Materials
				if(!empty($data))
				{
					$material_id = intval($data);
					$this->getMaterials($material_id);
				}
				else
				{
					$this->getMaterials($material_id=0);
				}
				break;
			case 'POST':
				$this->insertMaterial();
				break;
			case 'PUT':
				$material_id = intval($data);
				$this->updateMaterial($material_id);
				break;
			case 'DELETE':
				$material_id = intval($data);
				$this->deleteMaterial($material_id);
				break;
			default:
				// Invalid Request Method
				header("HTTP/1.0 405 Method Not Allowed");
				break;
		}
	}

	function getMaterials($material_id) {

		$Material = new Material();
		$rawData = $Material->getMaterials($material_id);
		if(empty($rawData) || sizeof($rawData) == 0) {
			$statusCode = 404;
			$rawData = array('error' => 'No Material found!');
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

	function insertMaterial() {
		if (empty($_POST)) {
			$_POST = json_decode(file_get_contents("php://input"), true) ? : [];
		}
		$json_str = file_get_contents('php://input');

		$Material = new Material();
		if($Material->insertMaterial($_POST)) {
			$statusCode = 200;
			$insertResponse = array('success' => 'Material Added Successfully');
		} else {
			$statusCode = 300;
			$insertResponse = array('error' => 'Material Addition Unsuccessfully');
		}

		$jsonRequest = $this->jsonRequest($statusCode);
		// $result["output"] = $insertResponse;

		if(strpos($jsonRequest,'application/json') !== false){
			$response = $this->encodeJson($insertResponse);
			echo $response;
		}
	}

	function updateMaterial($material_id) {
		if (empty($_POST)) {
			$_POST = json_decode(file_get_contents("php://input"), true) ? : [];
		}
		$json_str = file_get_contents('php://input');

		$Material = new Material();

		if($Material->updateMaterial($material_id, $_POST)) {
			$statusCode = 200;
			$updateResponse = array('success' => 'Material Updated Successfully');
		} else {
			$statusCode = 300;
			$updateResponse = array('error' => 'Material Update Unsuccessfully');
		}

		$jsonRequest = $this->jsonRequest($statusCode);
		// $result["output"] = $updateResponse;

		if(strpos($jsonRequest,'application/json') !== false){
			$response = $this->encodeJson($updateResponse);
			echo $response;
		}
	}

	function deleteMaterial($material_id) {

		$Material = new Material();

		if($Material->deleteMaterial($material_id)) {
			$statusCode = 200;
			$updateResponse = array('success' => 'Material Deleted Successfully');
		} else {
			$statusCode = 300;
			$updateResponse = array('error' => 'Material Deletion Unsuccessfully');
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

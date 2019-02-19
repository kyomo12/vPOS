<?php
require_once("api/controller/ApiRest.php");
require_once("api/models/PosMaterial.php");
require_once("api/models/MaterialSize.php");

class PosMaterialRestHandler extends ApiRest {

	function getRequestMethod($data, $secondData) {
		$request_method=$_SERVER["REQUEST_METHOD"];
		switch($request_method)
		{
			case 'GET':
				// Retrive Pos Materials
				if(!empty($data) && !empty($secondData))
				{
					$posMaterial_id = intval($secondData);
					$pos_id = intval($data);
					$this->getPosMaterials($pos_id, $posMaterial_id);
				}
				else
				{
					$pos_id = intval($data);
					$this->getPosMaterials($pos_id, $posMaterial_id=0);
				}
				break;
			case 'POST':
				$this->insertPosMaterial();
				break;
			// case 'PUT':
			// 	$posMaterial_id = intval($secondData);
			// 	$pos_id = intval($data);
			// 	$this->updatePosMaterial($pos_id, $posMaterial_id);
			// 	break;
			case 'DELETE':
				$posMaterial_id = intval($secondData);
				$pos_id = intval($data);
				$this->deletePosMaterial($pos_id, $posMaterial_id);
				break;
			default:
				// Invalid Request Method
				header("HTTP/1.0 405 Method Not Allowed");
				break;
		}
	}

	function getPosMaterials($pos_id, $posMaterial_id) {

		$posMaterial = new PosMaterial();

		$rawData = $posMaterial->getPosMaterials($pos_id);
		if(empty($rawData) || sizeof($rawData) == 0) {
			$statusCode = 404;
			$materials = array('error' => 'No POS Material found!');
		} else {
			// $statusCode = 200;
			$material = new Material();
			$materialSize = new MaterialSize();
			$materials = array();
			foreach ($rawData as $key => $value) {
				$materialResult = $material->getMaterials($rawData[$key]['material_id']);
				if(empty($materialResult) || sizeof($materialResult) == 0) {
					$statusCode = 404;
					$result = array('error' => 'No Material found!');
				} else {
					$statusCode = 200;
					// Get material size
					$sizeResult = $materialSize->getMaterialSizes($rawData[$key]['size_id']);
					if(empty($sizeResult) || sizeof($sizeResult) == 0) {
						$sizeResult = NULL;
					}

					$result["id"] = $materialResult[0]['id'];
					$result["name"] = $materialResult[0]['name'];
					$result["description"] = $materialResult[0]['description'];
					$result["status"] = $rawData[$key]['status'];
					$result["photo"] = $rawData[$key]['photo'];
					$result["size"] = $sizeResult;
					array_push($materials, $result);
				}
			}
		}

		$jsonRequest = $this->jsonRequest($statusCode);

		if(strpos($jsonRequest,'application/json') !== false){
			$response = $this->encodeJson($materials);
			echo $response;
		}
	}

	function insertPosMaterial() {
		if (empty($_POST)) {
			$_POST = json_decode(file_get_contents("php://input"), true) ? : [];
		}
		$json_str = file_get_contents('php://input');

		$posMaterial = new PosMaterial();
		if($posMaterial->insertPosMaterial($_POST)) {
			$statusCode = 200;
			$insertResponse = array('success' => 'POS Material Added Successfully');
		} else {
			$statusCode = 404;
			$insertResponse = array('error' => 'POS Material Addition Unsuccessfully');
		}

		$jsonRequest = $this->jsonRequest($statusCode);

		if(strpos($jsonRequest,'application/json') !== false){
			$response = $this->encodeJson($insertResponse);
			echo $response;
		}
	}

	function deletePosMaterial($pos_id, $posMaterial_id) {

		$posMaterial = new PosMaterial();

		if(empty($pos_id)){
			$statusCode = 404;
			$updateResponse = array('error' => 'Please select a POS');
		} elseif (empty($posMaterial_id)) {
			$statusCode = 404;
			$updateResponse = array('error' => 'Please select a POS Material to delete');
		}	else {
			if($posMaterial->deletePosMaterial($pos_id, $posMaterial_id)) {
				$statusCode = 200;
				$updateResponse = array('success' => 'POS Material Deleted Successfully');
			} else {
				$statusCode = 404;
				$updateResponse = array('error' => 'POS Material Deletion Unsuccessfully');
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

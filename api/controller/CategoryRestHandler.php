<?php
require_once("api/controller/ApiRest.php");
require_once("api/models/Category.php");

class CategoryRestHandler extends ApiRest {

	function getRequestMethod($data) {
		$request_method=$_SERVER["REQUEST_METHOD"];
		switch($request_method)
		{
			case 'GET':
				// Retrive Categories
				if(!empty($data))
				{
					$category_id = intval($data);
					$this->getCategories($category_id);
				}
				else
				{
					$this->getCategories($category_id=0);
				}
				break;
			case 'POST':
				$this->insertCategory();
				break;
			case 'PUT':
				$category_id = intval($data);
				$this->updateCategory($category_id);
				break;
			case 'DELETE':
				$category_id = intval($data);
				$this->deleteCategory($category_id);
				break;
			default:
				// Invalid Request Method
				header("HTTP/1.0 405 Method Not Allowed");
				break;
		}
	}

	function getCategories($category_id) {

		$category  = new Category();
		$rawData = $category ->getCategories($category_id);
		if(empty($rawData) || sizeof($rawData) == 0) {
			$statusCode = 404;
			$rawData = array('error' => 'No Category found!');
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

	function insertCategory() {
		if (empty($_POST)) {
			$_POST = json_decode(file_get_contents("php://input"), true) ? : [];
		}
		$json_str = file_get_contents('php://input');

		$category  = new Category();
		if($category ->insertCategory($_POST)) {
			$statusCode = 200;
			$insertResponse = array('success' => 'Category Added Successfully');
		} else {
			$statusCode = 300;
			$insertResponse = array('error' => 'Category Addition Unsuccessfully');
		}

		$jsonRequest = $this->jsonRequest($statusCode);
		// $result["output"] = $insertResponse;

		if(strpos($jsonRequest,'application/json') !== false){
			$response = $this->encodeJson($insertResponse);
			echo $response;
		}
	}

	function updateCategory($category_id) {
		if (empty($_POST)) {
			$_POST = json_decode(file_get_contents("php://input"), true) ? : [];
		}
		$json_str = file_get_contents('php://input');

		$category  = new Category();

		if($category ->updateCategory($category_id, $_POST)) {
			$statusCode = 200;
			$updateResponse = array('success' => 'Category Updated Successfully');
		} else {
			$statusCode = 300;
			$updateResponse = array('error' => 'Category Update Unsuccessfully');
		}

		$jsonRequest = $this->jsonRequest($statusCode);
		// $result["output"] = $updateResponse;

		if(strpos($jsonRequest,'application/json') !== false){
			$response = $this->encodeJson($updateResponse);
			echo $response;
		}
	}

	function deleteCategory($category_id) {

		$category  = new Category();

		if($category ->deleteCategory($category_id)) {
			$statusCode = 200;
			$updateResponse = array('success' => 'Category Deleted Successfully');
		} else {
			$statusCode = 300;
			$updateResponse = array('error' => 'Category Deletion Unsuccessfully');
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

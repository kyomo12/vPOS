<?php
require_once("api/controller/ApiRest.php");

class ErrorHandler extends ApiRest {

	function getNotFoundError() {
		$statusCode = 404;
		$response = array('error' => 'You have requested an invalid method or URL');

		$jsonRequest = $this->jsonRequest($statusCode);

		if(strpos($jsonRequest,'application/json') !== false){
			$response = $this->encodeJson($response);
			echo $response;
		}
	}

	function getTokenVerificationError() {
		$statusCode = 405;
		$response = array('error' => 'You are not logged in with a valid token');

		$jsonRequest = $this->jsonRequest($statusCode);

		if(strpos($jsonRequest,'application/json') !== false){
			$response = $this->encodeJson($response);
			echo $response;
		}
	}
}
?>

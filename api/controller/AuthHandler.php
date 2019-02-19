<?php
require_once("api/controller/ApiRest.php");
require_once("api/models/User.php");
require_once("api/library/JwtHelper.php");

class AuthHandler extends ApiRest {

	function login() {
		$request_method=$_SERVER["REQUEST_METHOD"];
		if ($request_method == 'POST'){
			$this->authUser();
		} else {
			header("HTTP/1.0 405 Method Not Allowed");
		}
	}

	function logout($user_id) {

	}

	function authUser() {
		if (empty($_POST)) {
			$_POST = json_decode(file_get_contents("php://input"), true) ? : [];
		}

		$user = new User();
		$rawData = $user->authUser($_POST);

		$jwtToken = "";


		if(empty($rawData) || sizeof($rawData) == 0) {
			$statusCode = 300;
			$rawData = array('error' => 'Invalid Mobile Number or Password');
		} else {
			$statusCode = 200;

			$token = array();
			$token['id'] = $rawData[0]['id'];
			$jwt = new Jwt();
			$jwtToken = $jwt->encode($token, 'secret_server_key');
		}

		$jsonRequest = $this->jsonRequest($statusCode);
		$result["user"] = array('id' => $rawData[0]['id'],
													'first_name' => $rawData[0]['first_name'], 'last_name' => $rawData[0]['last_name'],
 													'mobile' => $rawData[0]['mobile'], 'email' => $rawData[0]['email'],
													'role_id' => $rawData[0]['role']);

		$result["token"] = $jwtToken;

		if(strpos($jsonRequest,'application/json') !== false){
			$response = $this->encodeJson($result);
			echo $response;
		}
	}

	function verifyToken() {
		if (empty($_POST)) {
			$_POST = json_decode(file_get_contents("php://input"), true) ? : [];
		}

		$jwt = new JWT();

		if (array_key_exists("token",$_GET)) {
			$jwtToken = $_GET['token'];
			if (!is_null($jwtToken)) {
				try {
					$decodedToken = $jwt->decode($jwtToken, 'secret_server_key');
					$verifyResponse = array('userId' => $decodedToken->id);
					$statusCode = 201;
				} catch (Exception $e) {
					$verifyResponse = array('error' => $e->getMessage());
					$statusCode = 401;
				}
			} else {
				$statusCode = 400;
				$verifyResponse = array('error' => 'Not a valid token', 'token' => $authHeader);
			}
		} else {
			$statusCode = 400;
			$verifyResponse = array('error' => 'Token not found in request');
		}


		// $jwt = new JWT();
		// if (!is_null($_POST['token'])) {
		// 	try {
		// 		$token = $jwt->decode($_POST['token'], 'secret_server_key');
		// 		$verifyResponse = array('userId' => $token->id);
		// 		$statusCode = 201;
		// 	}catch (Exception $e) {
		// 		$verifyResponse = array('error' => $e->getMessage());
		// 	}
		// } else {
		// 	$statusCode = 404;
		// 	$verifyResponse = array('error' => 'You are not logged in with a valid token');
		// }

		// $jsonRequest = $this->jsonRequest($statusCode);
		// $result["output"] = $verifyResponse;
		//
		// if(strpos($jsonRequest,'application/json') !== false){
		// 	$response = $this->encodeJson($result);
		// 	echo $response;
		// }

		if (array_key_exists("error",$verifyResponse)) {
			$jsonRequest = $this->jsonRequest($statusCode);

			if(strpos($jsonRequest,'application/json') !== false){
				$response = $this->encodeJson($verifyResponse);
				echo $response;
			}

			return false;
		} else {
			return true;
		}
	}

}
?>

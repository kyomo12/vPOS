<?php
require_once("api/controller/PosRestHandler.php");
require_once("api/controller/UserRestHandler.php");
require_once("api/controller/AuthHandler.php");
require_once("api/controller/MaterialRestHandler.php");
require_once("api/controller/ActivityRestHandler.php");
require_once("api/controller/ErrorHandler.php");
require_once("api/controller/CategoryRestHandler.php");
require_once("api/controller/PosActivityRestHandler.php");
require_once("api/controller/PosMaterialRestHandler.php");
require_once("api/controller/UserRoleRestHandler.php");
require_once("api/controller/MaterialSizeRestHandler.php");

$request = "";
$data = "";
$secondData = "";
if(isset($_GET["request"])) {
	$requestParts = explode('/',$_GET['request']);
	$action = "";
	if (sizeof($requestParts) == 1) {
		$action = $requestParts[0];
		$request = $action;
	} elseif (sizeof($requestParts) == 2 && !empty($requestParts[1])) {
		if (intval($requestParts[1])) {
			$action = $requestParts[0];
			$request = $action;
			$data = $requestParts[1];
		} else {
			$action = $requestParts[0].'/'.$requestParts[1];
			$request = $action;
		}
	} elseif (sizeof($requestParts) == 3 && !empty($requestParts[2])) {
		$action = $requestParts[0]."/".$requestParts[2];
		$request = $action;
		$data = $requestParts[1];
		$secondData = "";
	} elseif (sizeof($requestParts) == 4 && !empty($requestParts[3])) {
		$action = $requestParts[0]."/".$requestParts[2];
		$request = $action;
		$data = $requestParts[1];
		$secondData = $requestParts[3];
	} else {
		$request = $action;
	}
}

$token = new AuthHandler();
$header = "";

if($request != 'login') {
	$status = $token->verifyToken();
	if($status == false){
		$request = "unverified";
	}
}

switch($request){

	case "pos":
		$posRestHandler = new PosRestHandler();
		$posRestHandler->getRequestMethod($data);
		break;

	case "login":
		$authHandler = new AuthHandler();
		$authHandler->login();
		break;

	// case "logout":
	// 	$authenticationHandler = new AuthenticationHandler();
	// 	$authenticationHandler->logout($data);
	// 	break;

	case "users":
		$userRestHandler = new UserRestHandler();
		$userRestHandler->getRequestMethod($data);
		break;

	case "materials":
		$materialRestHandler = new MaterialRestHandler();
		$materialRestHandler->getRequestMethod($data);
		break;

	case "activities":
		$activityRestHandler = new ActivityRestHandler();
		$activityRestHandler->getRequestMethod($data);
		break;

	case "categories":
		$categoryRestHandler = new CategoryRestHandler();
		$categoryRestHandler->getRequestMethod($data);
		break;

	case "roles":
		$userRoleRestHandler = new UserRoleRestHandler();
		$userRoleRestHandler->getRequestMethod($data);
		break;

	case "sizes":
		$materialSizeRestHandler = new MaterialSizeRestHandler();
		$materialSizeRestHandler->getRequestMethod($data);
		break;

	case "pos/materials":
		$posMaterialRestHandler = new PosMaterialRestHandler();
		$posMaterialRestHandler->getRequestMethod($data, $secondData);
		break;

	case "pos/activities":
		$posActivityRestHandler = new PosActivityRestHandler();
		$posActivityRestHandler->getRequestMethod($data, $secondData);
		break;

	case "" :
		// //404 - not found;
		// header("HTTP/1.1 404 Not Found mmm");
		$errorHandler = new ErrorHandler();
		$errorHandler->getNotFoundError();
		break;

	case "unverified" :
		// $errorHandler = new ErrorHandler();
		// $errorHandler->getTokenVerificationError();
		break;
}

?>

<?php
require_once("api/library/dbcontroller.php");

Class PosMaterial {
	private $posMaterial = array();

	public function getPosMaterials($pos_id){
		$query = "SELECT material_id,status,size_id,photo FROM pos_material WHERE pos_id=".$pos_id;
		$dbcontroller = new DBController();
		$this->posMaterial = $dbcontroller->executeSelectQuery($query);
		return $this->posMaterial;
	}

	public function insertPosMaterial($request){
		$material_id = $request['material_id'];
		$pos_id = $request['pos_id'];
		$status = $request['status'];
		$size_id = $request['size_id'];
		$photo = $request['photo'];

		$query="INSERT INTO pos_material SET material_id='{$material_id}', pos_id='{$pos_id}',
		 status='{$status}', size_id='{$size_id}', photo='{$photo}'";
		$dbcontroller = new DBController();
		$this->posMaterial = $dbcontroller->executeQuery($query);
		return $this->posMaterial;
	}

	public function deletePosMaterial($pos_id, $posMaterial_id){
		$query="DELETE FROM pos_material WHERE material_id=".$posMaterial_id." AND pos_id=".$pos_id;
		$dbcontroller = new DBController();
		$this->posMaterial = $dbcontroller->executeQuery($query);
		return $this->posMaterial;
	}
}
?>

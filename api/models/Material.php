<?php
require_once("api/library/dbcontroller.php");

Class Material {
	private $material = array();

	public function getMaterials($material_id){
		$query = "SELECT * FROM materials";
		if($material_id != 0)
		{
			$query.=" WHERE id=".$material_id." LIMIT 1";
		}
		$dbcontroller = new DBController();
		$this->material = $dbcontroller->executeSelectQuery($query);
		return $this->material;
	}

	public function insertMaterial($request){
		$name = $request['name'];
		$description = $request['description'];

		$query="INSERT INTO materials SET name='{$name}', description='{$description}'";
		$dbcontroller = new DBController();
		$this->material = $dbcontroller->executeQuery($query);
		return $this->material;
	}

	public function updateMaterial($material_id, $request){
		$name = $request['name'];
		$description = $request['description'];

		$query="UPDATE materials SET name='{$name}', description='{$description}' WHERE id=".$material_id;

		$dbcontroller = new DBController();
		$this->material = $dbcontroller->executeQuery($query);
		return $this->material;
	}

	public function deleteMaterial($material_id){
		$query="DELETE FROM materials WHERE id=".$material_id;
		$dbcontroller = new DBController();
		$this->material = $dbcontroller->executeQuery($query);
		return $this->material;
	}
}
?>

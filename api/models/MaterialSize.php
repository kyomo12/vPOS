<?php
require_once("api/library/dbcontroller.php");

Class MaterialSize {
	private $materialSize = array();

	public function getMaterialSizes($size_id){
		$query = "SELECT * FROM sizes";
		if($size_id != 0)
		{
			$query.=" WHERE id=".$size_id." LIMIT 1";
		}
		$dbcontroller = new DBController();
		$this->materialSize = $dbcontroller->executeSelectQuery($query);
		return $this->materialSize;
	}

	public function insertMaterialSize($request){
		$height = $request['height'];
		$width = $request['width'];

		$query="INSERT INTO sizes SET height='{$height}', width='{$width}'";
		$dbcontroller = new DBController();
		$this->materialSize = $dbcontroller->executeQuery($query);
		return $this->materialSize;
	}

	public function updateMaterialSize($size_id, $request){
		$height = $request['height'];
		$width = $request['width'];

		$query="UPDATE sizes SET height='{$height}', width='{$width}' WHERE id=".$size_id;

		$dbcontroller = new DBController();
		$this->materialSize = $dbcontroller->executeQuery($query);
		return $this->materialSize;
	}

	public function deleteMaterialSize($size_id){
		$query="DELETE FROM sizes WHERE id=".$size_id;
		$dbcontroller = new DBController();
		$this->materialSize = $dbcontroller->executeQuery($query);
		return $this->materialSize;
	}
}
?>

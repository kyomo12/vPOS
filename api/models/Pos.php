<?php
require_once("api/library/dbcontroller.php");

Class Pos {
	private $pos = array();

	public function getPos($pos_id){
		$query = "SELECT * FROM pos";
		if($pos_id != 0)
		{
			$query.=" WHERE id=".$pos_id." LIMIT 1";
		}
		$dbcontroller = new DBController();
		$this->pos = $dbcontroller->executeSelectQuery($query);
		return $this->pos;
	}

	public function insertPos($request){
		$name = $request['name'];
		$category_id = $request['category_id'];
		$owner_id = $request['owner_id'];
		$till_no = $request['till_no'];
		$region = $request['region'];
		$district = $request['district'];
		$ward = $request['ward'];
		$village_mtaa = $request['Village_mtaa'];
		$street = $request['street'];
		$latitude = $request['latitude'];
		$longtude = $request['longtude'];
		$pos_status = $request['pos_status'];

		$query="INSERT INTO pos SET name='{$name}', category_id='{$category_id}', owner_id='{$owner_id}',
						till_no='{$till_no}', region='{$region}', district='{$district}', ward='{$ward}',
						Village_mtaa='{$village_mtaa}', street='{$street}',	latitude='{$latitude}', longtude='{$longtude}',
						pos_status='{$pos_status}'";
		$dbcontroller = new DBController();
		$this->pos = $dbcontroller->executeQuery($query);
		return $this->pos;
	}

	public function updatePos($pos_id, $request){
		$name = $request['name'];
		$category_id = $request['category_id'];
		$owner_id = $request['owner_id'];
		$till_no = $request['till_no'];
		$region = $request['region'];
		$district = $request['district'];
		$ward = $request['ward'];
		$village_mtaa = $request['Village_mtaa'];
		$street = $request['street'];
		$latitude = $request['latitude'];
		$longtude = $request['longtude'];
		$pos_status = $request['pos_status'];


		$query="UPDATE products SET product_name='{$product_name}', price={$price}, quantity={$quantity}, seller='{$seller}' WHERE id=".$product_id;

		$query="UPDATE pos SET name='{$name}', category_id='{$category_id}', owner_id='{$owner_id}',
						till_no='{$till_no}', region='{$region}', district='{$district}', ward='{$ward}',
						Village_mtaa='{$village_mtaa}', street='{$street}',	latitude='{$latitude}', longtude='{$longtude}',
						pos_status='{$pos_status}' WHERE id=".$pos_id;

		$dbcontroller = new DBController();
		$this->pos = $dbcontroller->executeQuery($query);
		return $this->pos;
	}

	public function deletePos($pos_id){
		$query="DELETE FROM pos WHERE id=".$pos_id;
		$dbcontroller = new DBController();
		$this->pos = $dbcontroller->executeSelectQuery($query);
		return $this->pos;
	}
}
?>

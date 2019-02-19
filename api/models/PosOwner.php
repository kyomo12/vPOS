<?php
require_once("api/library/dbcontroller.php");

Class PosOwner {
	private $posOwner = array();

	public function getPosOwners($owner_id){
		$query = "SELECT * FROM pos_owner";
		if($owner_id != 0)
		{
			$query.=" WHERE id=".$owner_id." LIMIT 1";
		}
		$dbcontroller = new DBController();
		$this->posOwner = $dbcontroller->executeSelectQuery($query);
		return $this->posOwner;
	}
}
?>

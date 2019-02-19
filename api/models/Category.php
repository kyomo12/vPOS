<?php
require_once("api/library/dbcontroller.php");

Class Category {
	private $category = array();

	public function getCategories($category_id){
		$query = "SELECT * FROM category";
		if($category_id != 0)
		{
			$query.=" WHERE id=".$category_id." LIMIT 1";
		}
		$dbcontroller = new DBController();
		$this->category = $dbcontroller->executeSelectQuery($query);
		return $this->category;
	}

	public function insertCategory($request){
		$name = $request['name'];

		$query="INSERT INTO category SET name='{$name}'";
		$dbcontroller = new DBController();
		$this->category = $dbcontroller->executeQuery($query);
		return $this->category;
	}

	public function updateCategory($category_id, $request){
		$name = $request['name'];

		$query="UPDATE category SET name='{$name}' WHERE id=".$category_id;

		$dbcontroller = new DBController();
		$this->category = $dbcontroller->executeQuery($query);
		return $this->category;
	}

	public function deleteCategory($category_id){
		$query="DELETE FROM category WHERE id=".$category_id;
		$dbcontroller = new DBController();
		$this->category = $dbcontroller->executeQuery($query);
		return $this->category;
	}
}
?>

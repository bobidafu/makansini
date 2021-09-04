<?php
class MakanSini{
	private $db;

	public function __construct(){
		$this->db = new Database();
	}

	/*-------------------VENDORS--------------------*/
	//Get all Vendors
	public function getVendorsOnly(){
		$this->db->query("SELECT * FROM vendor_info");

			//Assign the Result Set
		$result = $this->db->resultSet();
		return $result;
	}

	//Get a single Vendor by its id
	public function getVendor($vendor_id){
		$this->db->query("SELECT * FROM vendor_info
			WHERE id = :id;
			");

		//:vendor_id is a placeholder, therefore
		//We have to bind it
		$this->db->bind(':id', $vendor_id);

		//Assign Row
		$row = $this->db->single();

		return $row;
	}

	//Get all Branches By Vendor's id
	public function getBranchesByVendor($vendor_id){
		$this->db->query("SELECT branch_info.*
			FROM branch_info
			INNER JOIN vendor_info ON branch_info.vendor_id = vendor_info.id
			WHERE branch_info.vendor_id = $vendor_id;
			");

			//Assign the Resslt Set
		$result = $this->db->resultSet();
		return $result;
	}

	//Get all Foods By Vendor's id
	public function getFoodsByVendor($vendor_id){
		$this->db->query("SELECT food.*
			FROM vendor_info
			INNER JOIN food ON food.vendor_id = vendor_info.id
			WHERE vendor_info.id = $vendor_id
			");

			//Assign the Result Sets
		$result = $this->db->resultSet();
		return $result;
	}

	//Get all Drinks By Vendor's id
	public function getDrinksByVendor($vendor_id){
		$this->db->query("SELECT drink.*
			FROM vendor_info
			INNER JOIN drink ON drink.vendor_id = vendor_info.id
			WHERE vendor_info.id = $vendor_id
			");

			//Assign the Result Set
		$result = $this->db->resultSet();
		return $result;
	}
	//Get all Vendors - Service Page
	public function getVendorsService(){
		$this->db->query("SELECT 
			vendor_info.id AS 'Id', vendor_info.name AS 'Name', vendor_info.logo AS 'Image'
			FROM vendor_info
			");

			//Assign the Result Set
		$result = $this->db->resultSet();
		return $result;
	}
	/*-------------------VENDORS--------------------*/


	/*-------------------BRANCHES--------------------*/
	//Get all Branches
	public function getBranchesOnly(){
		$this->db->query("SELECT * FROM branch_info");

			//Assign the Result Set
		$result = $this->db->resultSet();
		return $result;
	}

	//Get a single Branch by its id
	public function getBranch($branch_id){
		$this->db->query("SELECT * FROM vendor_info
			WHERE id = :id;
			");

		//:branch_id is a placeholder, therefore
		//We have to bind it
		$this->db->bind(':id', $branch_id);

			//Assign Row
		$row = $this->db->single();

		return $row;
	}
	/*-------------------BRANCHES--------------------*/

	/*-------------------DISTRICTS--------------------*/
	//Get all District
	public function getDistrictsOnly(){
		$this->db->query("SELECT * FROM district");

		//Assign the Result Set
		$result = $this->db->resultSet();
		return $result;
	}

	//Get a single District by its id
	public function getDistrict($district_id){
		$this->db->query("SELECT * FROM district
			WHERE id = :id;
			");

		//:district_id is a placeholder, therefore
		//We have to bind it
		$this->db->bind(':id', $district_id);

		//Assign Row
		$row = $this->db->single();

		return $row;
	}

	//Get all Vendors By District Id
	public function getVendorsByDistrict($district_id){
		$this->db->query("SELECT vendor_info.id, vendor_info.name, vendor_info.store
			FROM branch_info
			INNER JOIN vendor_info ON branch_info.vendor_id = vendor_info.id
			INNER JOIN district ON branch_info.district_id = district.id
			WHERE branch_info.district_id = $district_id
			GROUP BY branch_info.vendor_id;
			");

		//Assign the Result Set
		$result = $this->db->resultSet();
		return $result;
	}

	//Get all District - Service Page
	public function getDistrictsService(){
		$this->db->query("SELECT
			district.id AS 'Id', district.district AS 'Name', district.img AS 'Image'
			FROM district
			");

		//Assign the Result Set
		$result = $this->db->resultSet();
		return $result;
	}
	/*-------------------DISTRICTS--------------------*/

	/*-------------------CATEGORIES--------------------*/
	//Get all Category
	public function getCategoriesOnly(){
		$this->db->query("SELECT * FROM category");

			//Assign the Result Set
		$result = $this->db->resultSet();
		return $result;
	}

	//Get a single Category by its id
	public function getCategory($category_id){
		$this->db->query("SELECT * FROM category
			WHERE id = :id;
			");

		//:category_id is a placeholder, therefore
		//We have to bind it
		$this->db->bind(':id', $category_id);

			//Assign Row
		$row = $this->db->single();

		return $row;
	}

	//Get all Categories and their corresponding Food Images
	public function getCategories(){
		$this->db->query("SELECT 
			category.id AS 'Category_Id', food.img AS 'Food_Image' , category.category AS 'Category_Category'
			FROM food_category
			INNER JOIN food ON food_category.food_id = food.id
			INNER JOIN category ON food_category.category_id = category.id
			GROUP BY food_category.category_id;
			");

			//Assign the Result Set
		$result = $this->db->resultSet();
		return $result;
	}

	//Get a single Category and its corresponding Food Image by Category Id
	public function getByCategory($category_id){
		$this->db->query("SELECT category.id AS 'Category_Id', food.img AS 'Food_Image' , category.category AS 'Category_Category'
			FROM food_category
			INNER JOIN food ON food_category.food_id = food.id
			INNER JOIN category ON food_category.category_id = category.id
			WHERE food_category.category_id = :id
			GROUP BY food_category.category_id;
			");

			//:vendor_id is a placeholder, therefore
			//We have to bind it
		$this->db->bind(':id', $category_id);

			//Assign Row
		$row = $this->db->single();

		return $row;
	}

	//Get all Vendors by Category Id
	public function getVendorsByCategory($category_id){
		$this->db->query("SELECT vendor_info.id AS 'Vendor_Id', vendor_info.name AS 'Vendor_Name', vendor_info.store AS 'Vendor_Store'
			from branch_info
			INNER JOIN vendor_info ON branch_info.vendor_id = vendor_info.id
			INNER JOIN food ON food.vendor_id = vendor_info.id
			INNER JOIN food_category ON food_category.food_id = food.id
			INNER JOIN category ON food_category.category_id = category.id
			WHERE food_category.category_id = $category_id
			GROUP BY branch_info.vendor_id;
			");

			//Assign the Result Sets
		$result = $this->db->resultSet();
		return $result;
	}

	//Get all Category - Service Page
	public function getCategoriesService(){
		$this->db->query("SELECT 
			category.id AS 'Id', category.category AS 'Name', food.img AS 'Image' 
			FROM food_category
			INNER JOIN food ON food_category.food_id = food.id
			INNER JOIN category ON food_category.category_id = category.id
			GROUP BY food_category.category_id;
			");

			//Assign the Result Set
		$result = $this->db->resultSet();
		return $result;
	}
	/*-------------------CATEGORIES--------------------*/

	/*-------------------FOODS--------------------*/
	//Get all Food
	public function getFoodsOnly(){
		$this->db->query("SELECT * FROM food");

			//Assign the Result Set
		$result = $this->db->resultSet();
		return $result;
	}

	//Get a single Food by its id
	public function getFood($food_id){
		$this->db->query("SELECT * FROM food
			WHERE id = :id;
			");

		//:food_id is a placeholder, therefore
		//We have to bind it
		$this->db->bind(':id', $food_id);

			//Assign Row
		$row = $this->db->single();

		return $row;
	}
	/*-------------------FOODS--------------------*/

	/*-------------------DRINKS--------------------*/
	//Get all Drink
	public function getDrinksOnly(){
		$this->db->query("SELECT * FROM drink");

			//Assign the Result Set
		$result = $this->db->resultSet();
		return $result;
	}

	//Get a single Food by its id
	public function getDrink($drink_id){
		$this->db->query("SELECT * FROM drink
			WHERE id = :id;
			");

		//:drink_id is a placeholder, therefore
		//We have to bind it
		$this->db->bind(':id', $drink_id);

			//Assign Row
		$row = $this->db->single();

		return $row;
	}
	/*-------------------DRINKS--------------------*/

		//Create 
	public function create($data){
			//Insert Query
		$this->db->query("
			INSERT INTO branch_info (id, location, lat, lng, opening_hr, contact, vendor_id)
			VALUES (:id, :location, :lat, :lng, :opening_hr, :contact, :vendor_id)");

			//Bind Data, because placeholder
		$this->db->bind(':id', $data['id']);
		$this->db->bind(':location', $data['location']);
		$this->db->bind(':lat', $data['lat']);
		$this->db->bind(':lng', $data['lng']);
		$this->db->bind(':opening_hr', $data['opening_hr']);
		$this->db->bind(':contact', $data['salary']);
		$this->db->bind(':vendor_id', $data['vendor_id']);

			//Execute the Binded data
		if ($this->db->execute()) {
			return true;
		}else {
			return false;
		}
	}

		//Delete
	public function delete($id){
			//Insert Query
		$this->db->query("
			DELETE FROM branch_info 
			WHERE branch_id = $id");

			//Execute the Binded data
		if ($this->db->execute()) {
			return true;
		}else {
			return false;
		}
	}

		//Update
	public function update($id, $data){
			//Insert Query
		$this->db->query("UPDATE branch_info
			SET
			id = :id,
			location = :location,
			lat = :lat,
			lng = :lng,
			opening_hr = :opening_hr,
			contact = :contact,
			vendor_id = :vendor_id,
			WHERE branch_id = $id");

			//Bind Data, because placeholder
		$this->db->bind(':id', $data['id']);
		$this->db->bind(':location', $data['location']);
		$this->db->bind(':lat', $data['lat']);
		$this->db->bind(':lng', $data['lng']);
		$this->db->bind(':opening_hr', $data['opening_hr']);
		$this->db->bind(':contact', $data['salary']);
		$this->db->bind(':vendor_id', $data['vendor_id']);

			//Execute the Binded data
		if ($this->db->execute()) {
			return true;
		}else {
			return false;
		}
	}
}
?>
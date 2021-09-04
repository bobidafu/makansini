<?php
class Marker{
	private $db;

	public function __construct(){
		$this->db = new Database();
	}

	public function parseToXML($htmlStr)
	{
		$xmlStr=str_replace('<','&lt;',$htmlStr);
		$xmlStr=str_replace('>','&gt;',$xmlStr);
		$xmlStr=str_replace('"','&quot;',$xmlStr);
		/*$xmlStr=str_replace("'",'&#39;',$xmlStr);*/
		$xmlStr=str_replace("&",'&amp;',$xmlStr);
		return $xmlStr;
	}

	//Get all Markers
	public function getAllMarkers(){
		$this->db->query("SELECT
			branch_info.id AS 'Branch_Id', branch_info.location AS 'Branch_Location', branch_info.lat AS 'Branch_Latitude', branch_info.lng AS 'Branch_Longitude', branch_info.opening_hr AS 'Branch_Opening_Hour', branch_info.contact AS 'Branch_Contact',
			vendor_info.id AS 'Vendor_Id', vendor_info.name AS 'Vendor_Name', vendor_info.description AS 'Vendor_Description', vendor_info.logo AS 'Vendor_Logo', vendor_info.store AS 'Vendor_Store',
			district.id AS 'District_Id', district.district AS 'District_District', district.img AS 'District_Image',
			category.id AS 'Category_Id', category.category AS 'Category_Category'

			FROM branch_info
			INNER JOIN district ON branch_info.district_id = district.id
			INNER JOIN vendor_info ON branch_info.vendor_id = vendor_info.id
			LEFT JOIN food ON food.vendor_id = vendor_info.id
			LEFT JOIN food_category ON food_category.food_id = food.id
			LEFT JOIN category ON food_category.category_id = category.id
			GROUP BY branch_info.id;
			");

			//Assign the Result Set
		$result = $this->db->resultSet();
		return $result;
	}

	//Get all Markers By Vendor Id
	public function getMarkersByVendor($vendor_id){
		$this->db->query("SELECT
			branch_info.id AS 'Branch_Id', branch_info.location AS 'Branch_Location', branch_info.lat AS 'Branch_Latitude', branch_info.lng AS 'Branch_Longitude', branch_info.opening_hr AS 'Branch_Opening_Hour', branch_info.contact AS 'Branch_Contact',
			vendor_info.id AS 'Vendor_Id', vendor_info.name AS 'Vendor_Name', vendor_info.description AS 'Vendor_Description', vendor_info.logo AS 'Vendor_Logo', vendor_info.store AS 'Vendor_Store',
			district.id AS 'District_Id', district.district AS 'District_District', district.img AS 'District_Image',
			category.id AS 'Category_Id', category.category AS 'Category_Category'

			FROM branch_info
			INNER JOIN district ON branch_info.district_id = district.id
			INNER JOIN vendor_info ON branch_info.vendor_id = vendor_info.id
			LEFT JOIN food ON food.vendor_id = vendor_info.id
			LEFT JOIN food_category ON food_category.food_id = food.id
			LEFT JOIN category ON food_category.category_id = category.id
			WHERE branch_info.vendor_id = $vendor_id
			GROUP BY branch_info.id;
			");

			//Assign the Result Set
		$result = $this->db->resultSet();
		return $result;
	}

	//Get all Markers By Category Id
	public function getMarkersByCategory($category_id){
		$this->db->query("SELECT
			branch_info.id AS 'Branch_Id', branch_info.location AS 'Branch_Location', branch_info.lat AS 'Branch_Latitude', branch_info.lng AS 'Branch_Longitude', branch_info.opening_hr AS 'Branch_Opening_Hour', branch_info.contact AS 'Branch_Contact',
			vendor_info.id AS 'Vendor_Id', vendor_info.name AS 'Vendor_Name', vendor_info.description AS 'Vendor_Description', vendor_info.logo AS 'Vendor_Logo', vendor_info.store AS 'Vendor_Store',
			district.id AS 'District_Id', district.district AS 'District_District', district.img AS 'District_Image',
			category.id AS 'Category_Id', category.category AS 'Category_Category'

			FROM branch_info
			INNER JOIN district ON branch_info.district_id = district.id
			INNER JOIN vendor_info ON branch_info.vendor_id = vendor_info.id
			LEFT JOIN food ON food.vendor_id = vendor_info.id
			LEFT JOIN food_category ON food_category.food_id = food.id
			LEFT JOIN category ON food_category.category_id = category.id
			WHERE food_category.category_id = $category_id
			GROUP BY branch_info.id;
			");

			//Assign the Result Set
		$result = $this->db->resultSet();
		return $result;
	}

	//Get all Markers By Category Id
	public function getMarkersByDistrict($district_id){
		$this->db->query("SELECT
			branch_info.id AS 'Branch_Id', branch_info.location AS 'Branch_Location', branch_info.lat AS 'Branch_Latitude', branch_info.lng AS 'Branch_Longitude', branch_info.opening_hr AS 'Branch_Opening_Hour', branch_info.contact AS 'Branch_Contact',
			vendor_info.id AS 'Vendor_Id', vendor_info.name AS 'Vendor_Name', vendor_info.description AS 'Vendor_Description', vendor_info.logo AS 'Vendor_Logo', vendor_info.store AS 'Vendor_Store',
			district.id AS 'District_Id', district.district AS 'District_District', district.img AS 'District_Image',
			category.id AS 'Category_Id', category.category AS 'Category_Category'

			FROM branch_info
			INNER JOIN district ON branch_info.district_id = district.id
			INNER JOIN vendor_info ON branch_info.vendor_id = vendor_info.id
			LEFT JOIN food ON food.vendor_id = vendor_info.id
			LEFT JOIN food_category ON food_category.food_id = food.id
			LEFT JOIN category ON food_category.category_id = category.id
			WHERE branch_info.district_id = $district_id
			GROUP BY branch_info.id;
			");

			//Assign the Result Set
		$result = $this->db->resultSet();
		return $result;
	}

}
?>
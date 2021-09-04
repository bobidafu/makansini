<?php include_once 'config/init.php'; ?>

<?php
$makanSini = new MakanSini;
$template = new Template('templates/makanSini-vendor.php');

//If there is a value in id, we're gonna set it to the variable $id, otherwise it is null
$id = isset($_GET['id']) ? $_GET['id'] : null;

$template->vendors = $makanSini->getVendorsOnly();
$template->categories = $makanSini->getCategories();
$template->districts = $makanSini->getDistrictsOnly();

$template->type = "vendor";
$template->jumbotronType = "final";
$template->title = "";
$template->description = "";

if($id){
	$template->title = $makanSini->getVendor($id)->name;
	$template->description = $makanSini->getVendor($id)->description;

	$template->branches = $makanSini->getBranchesByVendor($id);
	$template->foods = $makanSini->getFoodsByVendor($id);
	$template->drinks = $makanSini->getDrinksByVendor($id);
} else{
	$template->title = 'Something Went Wrong';
}

echo $template;
?>
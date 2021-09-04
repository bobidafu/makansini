<?php include_once 'config/init.php'; ?>

<?php
$makanSini = new MakanSini;
$template = new Template('templates/makanSini-category.php');

//If there is a category in it, we're gonna set it to the variable, otherwise it is null
$id = isset($_GET['id']) ? $_GET['id'] : null;

$template->vendors = $makanSini->getVendorsOnly();
$template->categories = $makanSini->getCategories();
$template->districts = $makanSini->getDistrictsOnly();

$template->type = "category";
$template->jumbotronType = "final";
$template->title = "";
$template->description = "";

if($id){
	$template->categoryVendors = $makanSini->getVendorsByCategory($id);
	$template->title = $makanSini->getCategory($id)->category;

	switch ($id) {
		case 1:
		$template->description = "What's a little FRIES <br> if there's no TRIES";
		break;

		case 2:
		$template->description = "A burger without CHEEZE <br>is like a hug without a SQEEZE";
		break;

		case 3:
		$template->description = "I have the right to life, liberty and <br>CHICKEN WINGS - Mindy Kaling";
		break;

		case 4:
		$template->description = "Life is good when you have <br>a SANDWICH - Keanu Reeves";
		break;

		case 5:
		$template->description = "안녕하세요 가서 먹자";
		break;

		case 6:
		$template->description = "Craving for something hot? <br>Look no further than...";
		break;

		case 7:
		$template->description = "You want some BEEF?";
		break;

		case 8:
		$template->description = "You are what you eat, <br>be a tree";
		break;

		case 9:
		$template->description = "I SCREAM <br>for ICE CREAM";
		break;
		
		default:
				//Error
		break;
	}
} else{
	$template->title = 'Something Went Wrong';
}

echo $template;
?>
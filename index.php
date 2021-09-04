<?php include_once 'config/init.php'; ?>

<?php
//Remove Sessions for filtered markers 
unset($_SESSION['browse']);
unset($_SESSION['id']);
?>

<?php
$makanSini = new MakanSini;
$template = new Template('templates/homepage.php');

$searchBox = isset($_POST['searchBox']) ? $_POST['searchBox'] : null;

$template->vendors = $makanSini->getVendorsOnly();
$template->categories = $makanSini->getCategories();
$template->districts = $makanSini->getDistrictsOnly();

$template->jumbotronType = "main";

if($searchBox) {

	switch ($searchBox) {
		/*---------------Vendors---------------*/
		case 'Kyna Popsicle':
		redirect('vendor.php?id=1');
		break;

		case "Eat's Hot":
		redirect('vendor.php?id=2');
		break;

		case 'The Laksa Official':
		redirect('vendor.php?id=3');
		break;

		case 'The Potato Habit':
		redirect('vendor.php?id=4');
		break;

		case 'The Thirsty Habit':
		redirect('vendor.php?id=5');
		break;

		case "Fuel'd Restaurant & Catering Brunei":
		redirect('vendor.php?id=6');
		break;

		case 'ROOTS':
		redirect('vendor.php?id=7');
		break;

		case "Sham's BBQ & Grill":
		redirect('vendor.php?id=8');
		break;

		case 'Mr BBQ and Grill':
		redirect('vendor.php?id=9');
		break;

		case "De'Ceriaa Café":
		redirect('vendor.php?id=10');
		break;

		case 'Znetic Waiting Lounge':
		redirect('vendor.php?id=11');
		break;

		case 'Munch Plate':
		redirect('vendor.php?id=12');
		break;

		case 'Moistjito':
		redirect('vendor.php?id=13');
		break;

		case 'Garden Eats':
		redirect('vendor.php?id=14');
		break;

		case 'Rumah Gelato':
		redirect('vendor.php?id=15');
		break;

		case 'The B Cafe & Grill':
		redirect('vendor.php?id=16');
		break;
		/*---------------Vendors---------------*/

		/*---------------Categories---------------*/
		case 'Fries':
		redirect('category.php?id=1');
		break;

		case 'Burger':
		redirect('category.php?id=2');
		break;

		case 'Chicken':
		redirect('category.php?id=3');
		break;

		case 'Sandwich':
		redirect('category.php?id=4');
		break;

		case 'Korean':
		redirect('category.php?id=5');
		break;

		case 'Hot & Spicy':
		redirect('category.php?id=6');
		break;

		case 'Beef':
		redirect('category.php?id=7');
		break;

		case 'Healthy':
		redirect('category.php?id=8');
		break;

		case 'Ice Cream':
		redirect('category.php?id=9');
		break;
		/*---------------Categories---------------*/

		/*---------------Districts---------------*/
		case 'Brunei Muara':
		redirect('district.php?id=1');
		break;

		case 'Belait':
		redirect('district.php?id=2');
		break;

		case 'Tutong':
		redirect('district.php?id=3');
		break;

		case 'Temburong':
		redirect('district.php?id=4');
		break;
		/*---------------Districts---------------*/
		
		default:
		redirect('index.php', "We're sorry, no search found for keyword(s) - ".$searchBox, "error");
		break;
	}
}

echo $template;
?>
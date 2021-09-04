<?php include_once 'config/init.php'; ?>

<?php
$makanSini = new MakanSini;
$template = new Template('templates/makanSini-browse.php');

//If there is a value in browse, we're gonna set it to the variable $browse, otherwise it is null
$browse = isset($_GET['browse']) ? $_GET['browse'] : null;

//If there is a value in id, we're gonna set it to the variable $id, otherwise it is null
$id = isset($_GET['id']) ? $_GET['id'] : null;

$template->vendors = $makanSini->getVendorsOnly();
$template->categories = $makanSini->getCategories();
$template->districts = $makanSini->getDistrictsOnly();

$template->id = $id;
$template->header = 'Browse by ' . $browse;
$template->browse = $browse;

$template->jumbotronType = "sub";

if($id != 0){
	if($browse == 'vendor'){
		$template->title = $makanSini->getVendor($id)->name;
		$template->img = $makanSini->getVendor($id)->logo;
		$template->description = $makanSini->getVendor($id)->description;

	}else if($browse == 'category'){
		$template->title = $makanSini->getByCategory($id)->Category_Category;
		$template->img = $makanSini->getByCategory($id)->Food_Image;

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

	}else if($browse  == 'district'){
		$template->title = $makanSini->getDistrict($id)->district;
		$template->img = $makanSini->getDistrict($id)->img;

		switch ($id) {
			case 1:
			$template->description = "An urbanscape that boasts magnificent Islamic architecture and the natural green geography of the land, Brunei-Muara is the epitome of traditional culture co-existing harmoniously with urban sophistication.";
			break;

			case 2:
			$template->description = "With so many different cultures culminating in one district, visitors can also experience a variety of flavor palates as well as visit monumental marks of Brunei’s rich history and diverse people.";
			break;

			case 3:
			$template->description = "Tutong’s beauty lies in its serenity. With its charming town surrounded by small hills and beautiful black water lakes. The waters almost resemble tea, stained a dark hue due to the release of tannins from surrounding vegetation.";
			break;

			case 4:
			$template->description = "Leave the city behind and take a short boat ride down the Brunei river, through the mangrove waterways to experience the natural haven that is Temburong – the green jewel of Brunei. With breathtaking views, flora and fauna, leave your worries behind as you connect with nature.";
			break;

			default:
				//Error
			break;
		}
	}else {
		//Error
		$template->header = 'Something Went Wrong';
	}
}else{
	//When user browse By clicking Header
	
}

echo $template;
?>
<?php include_once 'config/init.php'; ?>

<?php
$makanSini = new MakanSini;
$template = new Template('templates/makanSini-district.php');

//If there is a value in id, we're gonna set it to the variable $id, otherwise it is null
$id = isset($_GET['id']) ? $_GET['id'] : null;

$template->vendors = $makanSini->getVendorsOnly();
$template->categories = $makanSini->getCategories();
$template->districts = $makanSini->getDistrictsOnly();

$template->type = "district";
$template->jumbotronType = "final";
$template->title = "";
$template->description = "";

if($id){
	$template->districtVendors = $makanSini->getVendorsByDistrict($id);
	$template->title = $makanSini->getDistrict($id)->district;

	switch ($id) {
		case 1:
		$template->map = 'bruneiMuara';
		$template->description = 'An urbanscape that boasts magnificent Islamic architecture and the natural green geography of the land, Brunei-Muara is the epitome of traditional culture co-existing harmoniously with urban sophistication. As the smallest of Brunei’s four districts, it also happens to be the most populated and most bustling as it holds both the capital of the Sultanate, Bandar Seri Begawan, and the only main deepwater port located in Muara. Explore the safeguarded heritages of this kingdom and discover delightfully unexpected treasures along the way!';
		break;

		case 2:
		$template->map = 'belait';
		$template->description = 'Visitors to Belait District are greeted with the giant teacup, and the sight of iconic nodding donkeys, which pumps out the source of Brunei’s prosperous oil and gas economy. But oil is not the only thing Belait is rich in. With so many different cultures culminating in one district, visitors can also experience a variety of flavor palates as well as visit monumental marks of Brunei’s rich history and diverse people.';
		break;

		case 3:
		$template->map = 'tutong';
		$template->description = 'Tutong’s beauty lies in its serenity. With its charming town surrounded by small hills and beautiful black water lakes. The waters almost resemble tea, stained a dark hue due to the release of tannins from surrounding vegetation. Spend time in the town and enjoy popular cuisine such as Rojak and Pulut Panggang. There is even a lively market every Thursday morning, where you can find local handicrafts, food and fresh produce.<br><br>We suggest you take your time to really take in what Tutong has to offer. Slow down and see a unique kind of beauty that lies beyond the beaten path.';
		break;

		case 4:
		$template->map = 'temburong';
		$template->description = 'An exciting exclave that’s not too far away. Take a deep breath and inhale the serenity of a pristine rainforest.<br><br>Leave the city behind and take a short boat ride down the Brunei river, through the mangrove waterways to experience the natural haven that is Temburong – the green jewel of Brunei. With breathtaking views, flora and fauna, leave your worries behind as you connect with nature. But if you’re not completely ready to dip your toes in the river of utter tranquility, fret not! With eco lodges that come equipped with standard facilities, experience nature in whatever way is most comfortable for you.';
		break;
		
		default:
		//Error, id is not between 1 to 4 inclusive
		$template->map = 'home';
		break;
	}
} else{
	//Id is null
	$template->title = 'Something Went Wrong';
}

echo $template;
?>
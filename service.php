<?php include_once 'config/init.php'; ?>

<?php

$makanSini = new MakanSini;
$template = new Template('templates/makanSini-service.php');

$browse = isset($_GET['browse']) ? $_GET['browse'] : null;
$id = isset($_GET['id']) ? $_GET['id'] : null;

$_SESSION['browse'] = $browse;
$_SESSION['id'] = $id;

$vendor = isset($_POST['vendor']) ? $_POST['vendor'] : null;
$category = isset($_POST['category']) ? $_POST['category'] : null;
$district = isset($_POST['district']) ? $_POST['district'] : null;

$template->vendors = $makanSini->getVendorsOnly();
$template->categories = $makanSini->getCategories();
$template->districts = $makanSini->getDistrictsOnly();

$template->browse = $browse;
$template->jumbotronType = "sub";

if($vendor || $category || $district){
	if($vendor){
		$submit = 'vendor';
	}else if($category){
		$submit = 'category';
	}else if($district){
		$submit = 'district';
	}else{
		redirect('service.php?browse='.$submit, 'Something went wrong', 'error');
	}
	redirect('service.php?browse='.$submit);
}

if($browse) {
	$template->form =
	'
	<div class="row">
	<input type="submit" value="Vendor" name="vendor" class="col-md-4 btn btn-info rounded-pill ">
	<input type="submit" value="Category" name="category" class="col-md-4 btn btn-warning rounded-pill">
	<input type="submit" value="District" name="district" class="col-md-4 btn btn-success rounded-pill">
	</div>
	';

	switch ($browse) {
		case 'vendor':
		$template->items = $makanSini->getVendorsService();
		break;

		case 'category':
		$template->items = $makanSini->getCategoriesService();
		break;

		case 'district':
		$template->items = $makanSini->getDistrictsService();
		break;
		
		default:
			//Error
		break;
	}
}else {
	$template->form =
	'
	<div class="service-intro-header">Browse</div>
	<input type="submit" value="Vendor" name="vendor" class="col btn btn-info rounded-pill form-control service-intro-btn">
	<input type="submit" value="Category" name="category" class="col btn btn-warning rounded-pill form-control service-intro-btn">
	<input type="submit" value="District" name="district" class="col btn btn-success rounded-pill form-control service-intro-btn">
	';
}

echo $template;
?>
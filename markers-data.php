<?php include_once 'config/init.php'; ?>

<?php
$marker = new Marker;
$template = new Template('templates/markers-xml.php');

$template->marker = $marker;
$template->rows = $marker->getAllMarkers();

//Need to pass in $id and $browse from service.php
$browse = isset($_SESSION['browse']) ? $_SESSION['browse'] : null;
$id = isset($_SESSION['id']) ? $_SESSION['id'] : null;

if($id){
	switch ($browse) {
		case 'vendor':
		$template->rows = $marker->getMarkersByVendor($id);
		break;

		case 'category':
		$template->rows = $marker->getMarkersByCategory($id);
		break;

		case 'district':
		$template->rows = $marker->getMarkersByDistrict($id);
		break;

		default:
      # code...
		break;
	}
}

echo $template;
?>

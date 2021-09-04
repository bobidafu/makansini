<?php include_once 'config/init.php'; ?>

<?php
$makanSini = new MakanSini;
$template = new Template('templates/makanSini-contact.php');

$template->vendors = $makanSini->getVendorsOnly();
$template->categories = $makanSini->getCategories();
$template->districts = $makanSini->getDistrictsOnly();

$template->jumbotronType = "sub";

echo $template;
?>
<?php

header("Content-type: text/xml");

// Start XML file, echo parent node
echo '<markers>';
$ind=0;
// Iterate through the rows, printing XML nodes for each
foreach ($rows as $row){
  // Add to XML document node
	echo '<marker ';
	echo 'id="' . $row->Vendor_Id . '" ';
	echo 'name="' . $marker->parseToXML($row->Vendor_Name) . '" ';
	echo 'location="' . $marker->parseToXML($row->Branch_Location) . '" ';
	echo 'lat="' . $row->Branch_Latitude . '" ';
	echo 'lng="' . $row->Branch_Longitude . '" ';
	echo 'category="' . $marker->parseToXML($row->Category_Category) . '" ';
	echo 'district="' . $row->District_District . '" ';
	echo '/>';
	$ind = $ind + 1;
}
// End XML file
echo '</markers>';

?>
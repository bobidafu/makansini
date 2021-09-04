<?php
//Start session
session_start();

	//Config File
	require_once 'config.php';

	//Include Helpers
	require_once('helpers/system_helper.php');

	//This method will be redundant
	//And will need to be written for all classes
	//require_once('lib/Template.php');
	//So we use a system_helper.php

	//Use Autoloader
	//It will include the file, whenever
	//You instantiate the class/object
	function __autoload($class_name){
		require_once('lib/' . $class_name . '.php');
	}

	//echo 'test';
?>
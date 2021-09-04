<?php
		//Redirect To Page
function redirect($page = FALSE, $message = NULL, $message_type = NULL){
	if(is_string($page)){
		$location = $page;
	} else{
		$location = $_SERVER['SCRIPT_NAME'];
	}

		//Check For Message
	if($message != NULL){
			//Set Message
		$_SESSION['message'] = $message;
	}

		//Check For Type
	if($message_type != NULL){
			//Set Message
		$_SESSION['message_type'] = $message_type;
	}

		//Redirect FIRST, THEN display message

		//Redirect
	header('Location: ' . $location);
	exit;
}


		//Display Message & Unset the session variables
function displayMessage(){
	if (!empty($_SESSION['message'])) {
				//Assign Message Variable
		$message = $_SESSION['message'];

		if (!empty($_SESSION['message_type'])){
				//Assign Message Type Variable
			$message_type = $_SESSION['message_type'];

				//Create Output
			if($message_type == 'error'){
				echo '<div class="alert alert-danger">' . $message . '</div>';
			} else{
				echo '<div class="alert alert-success">' . $message . '</div>';
			}
		}

					//Unset Message
		unset($_SESSION['message']);
		unset($_SESSION['message_type']);
	} else{
		echo ' ';
	}
}
?>
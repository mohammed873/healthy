<?php

include_once ('../classes/contact_class.php');

$contact = new Contact();

$error  = array();

$firstname = '';
$email = '';

if(isset($_POST['contact_message'])){

	$user_id = $_POST["user_id"];
	$firstname = $_POST["firstname"];
	$email = $_POST["email"];
	$comment = $_POST["comment"];

	$error = $contact->contact_validation($firstname,$email,$comment,$error);

	if(count($error)== 0){
	   $contact->Contact_Message($user_id,$firstname,$email,$comment);
	   
	   //sending a register confirmation message to the user
	   $_SESSION['message'] = "Your message has been sent successfuly";
	   //empty inputs field after submiting the form
	   $firstname = '';
       $email = '';
	}	
}


?>  
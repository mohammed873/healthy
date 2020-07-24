<?php
include '../classes/conversation_class.php';

$chat = new Chat();
// $error = array();


if (isset($_POST['consult_now'])){
   $patient_id = $_POST['patient_id'];
   $messgae = htmlspecialchars($_POST['message']);
   $doctor_id = $_POST['doctor_id'];
   
   $chat->insert_message($patient_id,$message, $doctor_id);


   // echo $message;
}













?>
<?php
include '../classes/appointement_class.php';

$chat = new Chat();
$error = array();


if (isset($_POST['consult'])){
   $patient_id = $_POST['patient_id'];
   $message = htmlspecialchars($_POST['message']);
   $doctor_id = $_POST['doctor_id'];
   
   $error = $chat->message_validation($message,$doctor_id,$error);

   if(count($error) === 0){
      $chat->insert_message($patient_id,$doctor_id,$message);
   }
}


/* getting the details of each user*/
if(isset($_GET['details'])){
   $id=$_GET['details'];
   
   $query="SELECT * FROM users WHERE user_id = ?";
   $con = $chat->connect();
   $stmt=$con->prepare($query);
   $stmt->bind_param("i",$id);
   $stmt->execute();
   $result=$stmt->get_result();
   $row=$result->fetch_assoc();
 
   $user_id=$row['user_id'];
   $user_name=$row['user_name'];
   $user_email=$row['user_email'];
   $user_status=$row['user_status'];
   $patient_picture = $row['user_picture'];
 }












?>
<?php

    include_once('../classes/appointement_class.php');

    $appointement = new Appointement();

    $error = array();
    
    $user_name = '';
    $user_email = '';
    
    if(isset($_POST['make_appointmet'])){
        $user_id = $_POST["user_id"];
        $user_name= $_POST["user_name"];
        $user_email= $_POST["user_email"];
        $service_type= $_POST["service_type"];
        $time= $_POST["time"];
        $message= $_POST["message"];
        $appointement_status = $_POST["appointement_status"];
        $doctor_id = $_POST["doctor_id"];

        $error = $appointement->appointement_validation($user_name,$user_email,$service_type,$time,$message,$doctor_id,$error);
           
        if(count($error) === 0){
            $appointement->make_appointement($user_id,$doctor_id,$user_name,$user_email, $service_type,$time,$message,$appointement_status);

            //sending appointement confiramation
            $_SESSION['message'] = "Your Appointement Made Successfuly <a href = 'profile.php'>check ur profile</a>";
            //empty the inputs fields after submitting
            $user_name = '';
            $user_email = '';
        }
    }

    
    /* getting the details of each appointment */
    if(isset($_GET['details'])){
        $id=$_GET['details'];
    
        $query="SELECT * FROM appointment WHERE appointment_id = ?";
        $con = $appointement->connect();
        $stmt=$con->prepare($query);
        $stmt->bind_param("i",$id);
        $stmt->execute();
        $result=$stmt->get_result();
        $row=$result->fetch_assoc();
    
        $appointment_id=$row['appointment_id'];
        $user_id=$row['user_id'];
        $doctor_id=$row['doctor_id'];
        $user_name=$row['user_name'];
        $user_email=$row['user_email'];
        $service_type=$row['service_type'];
        $time=$row['time'];
        $message=$row['message'];
        $appointement_status=$row['appointement_status'];
    }

?>
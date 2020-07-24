<?php
    
    include_once ('../classes/appointement_class.php');

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

        $error = $appointement->appointement_validation($user_name,$user_email,$service_type,$time,$message,$error);

        if(count($error) === 0){
            $appointement->make_appointement($user_id,$user_name,$user_email, $service_type,$time,$message,$appointement_status);

            //sending appointement confiramation
            $_SESSION['message'] = "your appointement made successfuly <a href = 'profile.php'>check ur profile</a>";
            //empty the inputs fields after submitting
            $user_name = '';
            $user_email = '';

        }
    }


?>
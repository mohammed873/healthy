<?php

    include_once ('../classes/patient_details_class.php');
    $chat = new Chat();
    $note = new Note();
    $profile = new Update_profile();

    $error = array();

    //replying to patient_messages
    if (isset($_POST['consult'])){
        $sender_id = $_POST['sender_id'];
        $sender_name = $_POST['sender_name'];
        $recevier_id = $_POST['recevier_id'];
        $recevier_name = $_POST['recevier_name'];
        $message = htmlspecialchars($_POST['message']);
        $message_status = $_POST['message_status'];
        
        
        $error = $chat->message_validation($message,$recevier_id,$error);

        if(count($error) === 0){
            $chat->insert_message($sender_id,$sender_name,$recevier_id,$recevier_name,$message,$message_status);
        }
    }


    /* getting the details of each user to reply for messages*/
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


    //adding new medical note
    if(isset($_POST['add_note']))
    {
        $patient_id = $_POST['patient_id'];
        $patient_name = $_POST['patient_name'];
        $note_message = htmlspecialchars($_POST['note']);

        //send notes
        $note->Enter_Note($patient_id,$patient_name,$note_message);
        //send confirmation alert
        $_SESSION['message'] = "Your note has been sent successfuly";       
    }


    // updating the patients profiles information
    if(isset($_POST['update_profile']))
    {
       $user_id=$_POST['user_id'];
       $user_name = htmlspecialchars($_POST['user_name']);
       $user_email = htmlspecialchars($_POST['user_email']);
       $user_password = $_POST['user_password'];
       $user_confpassword = $_POST['user_confpassword'];
       $user_picture=$_FILES['user_picture']['name'];
        
       //hashing the password before saving the data to the database
        $user_password = password_hash($user_password, PASSWORD_DEFAULT);
       //updating records
        $profile->Update_profile_info($user_id,$user_name,$user_email,$user_password,$user_picture);
       // save the new profile picture
        $profile->save_profile_picture();
        //send confirmation alert
        $_SESSION['message'] = "Your Profile information has been updated successfuly"; 
       
    }

    
?>
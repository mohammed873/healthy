<?php 

include '../controllers/config.php';

class Note extends DB
{
    public function Enter_Note ($patient_id,$patient_name,$note_message)
    {
        $sql = "INSERT INTO `medical_notes`(patient_id,patient_name ,note)VALUES ('$patient_id','$patient_name','$note_message')";

        $result = $this->connect()->query($sql);
        return $result;
    }
}

class Chat extends DB
{
    public function insert_message($sender_id,$sender_name,$recevier_id,$recevier_name,$message,$message_status)
    {
        $sql = "INSERT INTO `chat` ( `sender_id`,`sender_name`, `recevier_id`,`recevier_name`, `message`,`message_status`) VALUES ( '$sender_id', '$sender_name','$recevier_id', '$recevier_name', '$message','$message_status')";
        
        $result = $this->connect()->query($sql);
        return $result;
    }
    
    public function message_validation($message,$doctor_id,$error)
    {
        if (empty($message)) {
            $error['message'] = "message field must not be empty";
        }
        if (($doctor_id ) == 'chose your doctor') {
            $error['doctor_id'] = " Select a doctor";
        }

        return $error;
    }
}

class Update_profile extends DB
{
    public function Update_profile_info ($patient_id,$user_name,$user_email,$user_password,$user_picture)
    {
        $sql = "UPDATE users SET (`user_name`,`user_email`,`user_password`,`user_picture`) VALUES (`$user_name`,`$user_email`,`$user_password`,`$user_picture`) WHERE user_id = '$patient_id'";

        $result = $this->connect()->query($sql);
        return $result;
    }
}



?>
<?php
include '../controllers/config.php';

class Chat extends DB
{
    public function insert_message($patient_id,$message, $doctor_id)
    {
        $sql = "INSERT INTO `chat`('patient_id','message','doctor_id') VALUES('$patient_id','$message','$doctor_id')";
        
        $result = $this->connect()->query($sql);
        return $result;
    }

    public function message_validation($message,$error)
    {
        if (empty($message)) {
            $error['message'] = "message field must not be empty";
        }

        return $error;
    }
}








?>
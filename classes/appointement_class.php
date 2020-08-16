<?php

include '../controllers/config.php';

class Appointement extends DB
{

    public function appointement_validation($user_name,$user_email,$service_type,$time,$message,$doctor_id,$error)
    {
        if (empty($user_name)) {
            $error['user_name'] = "User name required";
        }
        if (!filter_var($user_email, FILTER_VALIDATE_EMAIL)) {
            $error['user_email'] = "Email adress is not valid";
        }
        if (empty($user_email)) {
            $error['user_email'] = "User email required";
        }
        if (($service_type) == 'Select service') {
            $error['service_type'] = " Select a service type";
        }
        if (($time ) == 'Time') {
            $error['time'] = " Select Time";
        }
        if (($doctor_id ) == 'Chose a Doctor') {
            $error['doctor_id'] = " Select a doctor";
        }
        if (empty($message)) {
            $error['message'] = "message required";
        }
        return $error;

    }

    public function make_appointement ($user_id,$doctor_id,$user_name,$user_email, $service_type,$time,$message,$appointement_status)
    {
        $sql = "INSERT INTO `appointment` (`user_id`,`doctor_id`,`user_name`,`user_email`,`service_type`,`time`,`message`,`appointement_status`)VALUES ('$user_id','$doctor_id','$user_name','$user_email','$service_type','$time','$message','$appointement_status')";

        $result = $this->connect()->query($sql);
        return $result;
    }

}


class Chat extends DB
{
    public function insert_message($patient_id,$doctor_id,$message)
    {
        $sql = "INSERT INTO `chat` ( `patient_id`, `doctor_id`, `message`) VALUES ( '$patient_id', '$doctor_id', '$message')";
        
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








?>
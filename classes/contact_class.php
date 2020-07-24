<?php
include '../controllers/config.php';

class Contact extends DB
{
    public function Contact_Message ($user_id,$firstname,$email,$comment)
    {
        $sql = "INSERT INTO `contact` (user_id, firstname, email,comment)VALUES ('$user_id','$firstname','$email','$comment')";

        $result = $this->connect()->query($sql);
        return $result;
    }

    public function contact_validation($firstname,$email,$comment,$error){
        if (empty($firstname)) {
            $error['firstname'] = "first name required";
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error['email'] = "Email adress is not valid";
        }
        if (empty($email)) {
            $error['email'] = "email required";
        }
        if (empty($comment)) {
            $error['comment'] = "comment required";
        }

        return $error;
    }
}








?>
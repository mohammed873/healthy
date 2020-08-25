<?php

include '../controllers/config.php';

class Admins extends DB
{
    public function add_new_admin($admin_name, $admin_email, $admin_password, $admin_picture, $admin_status)
    {
        $sql = "INSERT INTO `admins`(admin_name, admin_email, admin_password, admin_picture, admin_status) VALUES('$admin_name','$admin_email','$admin_password','$admin_picture','$admin_status')";
        
        $result = $this->connect()->query($sql);
        return $result;
    }

    public function admins_validation($admin_name,$admin_email,$admin_password,$admin_confpassword,$admin_picture,$admin_status,$error)
    {
        if (empty($admin_name)) {
            $error['admin_name'] = "admin name required";
        }
        if (!filter_var($admin_email, FILTER_VALIDATE_EMAIL)) {
            $error['admin_email'] = "Email adress is not valid";
        }
        if (empty($admin_email)) {
            $error['admin_email'] = "Email required";
        }
        if ($admin_password !== $admin_confpassword) {
            $error['password'] = "The two passwords don't match";
        }
        if (empty($admin_password)) {
            $error['admin_password'] = "Password required";
        }
        //picture validation
        if (($_FILES["admin_picture"]["size"] > 2000000)){
            $error['admin_picture'] = "Picture size must not acceed 2MB";
        }
        $file_extension = pathinfo($_FILES["admin_picture"]["name"], PATHINFO_EXTENSION);

        $allowed_image_extension = array(
            "png",
            "jpg",
            "jpeg"
        );
        if (! in_array($file_extension, $allowed_image_extension)){
            $error['admin_picture'] = "only png ,  jpg and jpeg are allowed";
        }
        if (! file_exists($_FILES["admin_picture"]["tmp_name"])) {
            $error['admin_picture'] = "Picture required";
        }
        if (($admin_status ) == 'choose the status of the admin') {
            $error['admin_status'] = " Select a admin status";
        }
        
        
        return $error;
    }

    public function save_profile_picture()
    {
        $admin_picture = $_FILES['admin_picture']['name'];
        $upload = "../views/uploads/" . $admin_picture;
        //storing pictures to the uploads file
        move_uploaded_file($_FILES['admin_picture']['tmp_name'], $upload);
        return $admin_picture;
    }
}

class edit_profile extends DB{
    public function update_profile_pic ($user_picture)
    {
        $sql = "UPDATE users SET user_picture ='$user_picture' WHERE user_status = 'doctor'";

        $result = $this->connect()->query($sql);
        return $result;
    }
    

}
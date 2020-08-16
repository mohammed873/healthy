<?php

include('../classes/userclass.php');

$user = new Users();
$error = array();

$user_name = '';
$user_email = '';
$user_data = '';

/***********************************************************signning up***************************************************************/
if (isset($_POST['signup'])) {
    $user_name = htmlspecialchars($_POST['user_name']);
    $user_email = htmlspecialchars($_POST['user_email']);
    $user_password = $_POST['user_password'];
    $user_confpassword = $_POST['user_confpassword'];
    $user_picture = $_FILES['user_picture'];
    $user_status = $_POST['user_status'];

    $error = $user->signupvalidation($user_name,$user_email, $user_password,$user_confpassword,$user_picture,$user_status,$error);

    $con = $user->connect();
    $emailQuery = "SELECT * FROM users WHERE user_email = ? LIMIT 1";
    $stm = $con->prepare($emailQuery);
    $stm->bind_param('s', $user_email);
    $stm->execute();
    $result = $stm->get_result();
    $usercount = $result->num_rows;
    if ($usercount > 0) {
       $error['user_email'] = "useremail already exists";
    }   
     
    if(count($error)=== 0){
        //hashing the password before saving the data to the database
        $user_password = password_hash($user_password, PASSWORD_DEFAULT);
        //saving the profile picture
        $user_picture = $user->save_profile_picture();     
        // registering a new user and sending the data to the database
        $user->sign_up($user_name, $user_email, $user_password, $user_picture, $user_status);
        //sending a register confirmation message to the user
        $_SESSION['message'] = "you have created ur account successfuly <a href = 'index.php'>log in now</a>";
    }
}


/***********************************************************logging in***************************************************************/
if (isset($_POST['login'])) {
    $user_email = htmlspecialchars($_POST['user_email']);
    $user_password = $_POST['user_password'];
    $user_status= '';
    //validation
    $error = $user->loginvalidation($user_email,$user_password,$error);

    if(count($error)===0){
        $table = 'users';
        $condition =['user_email' => $user_email];['user_status' => $user_status];
        $user_data = $user->login($table, $condition );
        if($user_data && password_verify($user_password , $user_data['user_password']) && $user_data['user_status'] == 'user'){
             //login success
             $_SESSION['user_id'] = $user_data['user_id'];
             $_SESSION['user_name'] = $user_data['user_name'];
             $_SESSION['user_email'] = $user_data['user_email'];
             $_SESSION['user_picture'] = $user_data['user_picture'];
             $_SESSION['user_status'] = $user_data['user_status'];
             header('location:home.php');
             exit();
        }
        if($user_data && password_verify($user_password , $user_data['user_password']) && $user_data['user_status'] == 'doctor'){
            //login success
            $_SESSION['user_id'] = $user_data['user_id'];
            $_SESSION['user_name'] = $user_data['user_name'];
            $_SESSION['user_email'] = $user_data['user_email'];
            $_SESSION['user_picture'] = $user_data['user_picture'];
            $_SESSION['user_status'] = $user_data['user_status'];
            header('location:../admin_zone/admin_panel.php');
            exit();
       }
        else{
        $error['login_fail'] = "wrong credition";
        }
        if($user_data && password_verify($user_password , $user_data['user_password']) && $user_data['user_status'] == 'Secertaire'){
            //login success
            $_SESSION['user_id'] = $user_data['user_id'];
            $_SESSION['user_name'] = $user_data['user_name'];
            $_SESSION['user_email'] = $user_data['user_email'];
            $_SESSION['user_picture'] = $user_data['user_picture'];
            $_SESSION['user_status'] = $user_data['user_status'];
            header('location:../admin_zone/secertaire_panel.php');
            exit();
       }
        else{
        $error['login_fail'] = "wrong credition";
        }
     }
} 

?>

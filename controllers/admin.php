<?php
include('../classes/userclass.php');

$user = new Users();
$error = array();

$user_name = '';
$user_email = '';
$user_data = '';

/***********************************************************signning up***************************************************************/
if (isset($_POST['add_admin'])) {
    $user_name = htmlspecialchars($_POST['user_name']);
    $user_email = htmlspecialchars($_POST['user_email']);
    $user_password = $_POST['user_password'];
    $user_confpassword = $_POST['user_confpassword'];
    $user_picture = $_FILES['user_picture'];
    $user_status = $_POST['user_status'];

    $error = $user->signupvalidation($user_name,$user_email, $user_password,$user_confpassword,$user_picture,$error);

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
        $_SESSION['message'] = "admin has been added successfuly <a href = '../views/index.php'>log in now</a>";
    }
}

/* deleting admins (doctors) */
if(isset($_GET['delete'])){
    $id=$_GET['delete'];
  
      $con = $user->connect();
      $query="DELETE FROM users WHERE user_id = ?";
      $stmt=$con->prepare($query);
      $stmt->bind_param("i",$id);
      $stmt->execute();
      header('location:admin_panel.php');

}

/*update the appointement status*/
if(isset($_POST['manage'])){
    $appointment_id = $_POST['appointment_id'];
    $appointement_status = $_POST['appointement-status'];

    $con = $user->connect();
    $query = "UPDATE appointment SET appointement_status = '$appointement_status' WHERE appointment_id = '$appointment_id'";
    $stmt=$con->prepare($query);
    $stmt->execute();


}
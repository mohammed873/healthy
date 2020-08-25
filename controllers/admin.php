<?php
include('../classes/admin_class.php');


$admin = new Admins();
$edit = new edit_profile();
$error = array();

$admin_name = '';
$admin_email = '';
$admin_data = '';

/***********************************************************signning up***************************************************************/
if (isset($_POST['add_admin'])) {
    $admin_name = htmlspecialchars($_POST['admin_name']);
    $admin_email = htmlspecialchars($_POST['admin_email']);
    $admin_password = $_POST['admin_password'];
    $admin_confpassword = $_POST['admin_confpassword'];
    $admin_picture = $_FILES['admin_picture'];
    $admin_status = $_POST['admin_status'];

    $error = $admin->admins_validation($admin_name,$admin_email, $admin_password,$admin_confpassword,$admin_picture,$admin_status,$error);

    $con = $admin->connect();
    $emailQuery = "SELECT * FROM admins WHERE admin_email = ? LIMIT 1";
    $stm = $con->prepare($emailQuery);
    $stm->bind_param('s', $admin_email);
    $stm->execute();
    $result = $stm->get_result();
    $admincount = $result->num_rows;
    if ($admincount > 0) {
       $error['admin_email'] = "adminemail already exists";
    }   
     
    if(count($error)=== 0){
        //hashing the password before saving the data to the database
        $admin_password = password_hash($admin_password, PASSWORD_DEFAULT);
        //saving the profile picture
        $admin_picture = $admin->save_profile_picture();     
        // registering a new admin and sending the data to the database
        $admin->add_new_admin($admin_name, $admin_email, $admin_password, $admin_picture, $admin_status);
        //sending a register confirmation message to the admin
        $_SESSION['message'] = "admin has been added successfuly check the admins table";
        //empty inputs field after submiting the form
        $admin_name = '';
        $admin_email = '';
    }
}

/* deleting admins (doctors) */
if(isset($_GET['delete'])){
    $id=$_GET['delete'];
  
      $con = $admin->connect();
      $query="DELETE FROM admins WHERE admin_id = ?";
      $stmt=$con->prepare($query);
      $stmt->bind_param("i",$id);
      $stmt->execute();
      header('location:admin_panel.php');
}


/*update the appointement status*/
if(isset($_POST['manage'])){
    $appointment_id = $_POST['appointment_id'];
    $appointement_status = $_POST['appointement-status'];

    $con = $admin->connect();
    $query = "UPDATE appointment SET appointement_status = '$appointement_status' WHERE appointment_id = '$appointment_id'";
    $stmt=$con->prepare($query);
    $stmt->execute();
    header('location:secertaire_panel.php');
}

/* getting the details of each appointment */
if(isset($_GET['details'])){
    $id=$_GET['details'];

    $query="SELECT * FROM appointment WHERE appointment_id = ?";
    $con = $admin->connect();
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

//updating doctor profile picture
if(isset($_POST['edit_pic'])){
   $user_picture = $_POST['user_picture'];

   //updating the profile picture
   $edit->update_profile_pic($user_picture);
    //sending an update confirmation message to the user
     $_SESSION['message'] = "Picture Has Changed Successfully";
}




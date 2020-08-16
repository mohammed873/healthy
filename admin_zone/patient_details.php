<?php
include_once('../controllers/conversation.php');
$conn = new Chat();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>patient_detail</title>
    <!-- Font Awesome CSS-->
	<link rel="stylesheet" href="css/font-awesome.min.css">
	 <!-- Bootstrap CSS -->
     <link rel="stylesheet" href="css/bootstrap.min.css">
     <!--bootstrap cdn link-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <!-- custom css for the patient_detail -->
    <link rel="stylesheet" href="css/patient_detail.css">
</head>
<body>
    <div class="text-center p-2 bg-primary">
        <h3 >
           <a href="admin_panel.php" class="text-white">Back To Doctor Panel</a>
        </h3>
    </div>
    <br>
    <div class="profiles">
        <div class="doctor_profile">
            <h2 class="text-danger">Doctor Profile</h2>
            <hr>
          <img src="<?php echo '../views/uploads/' . $_SESSION['user_picture']; ?>" alt="profile_picture" style="width: 195px;height: 227px;border-radius: 5%;"><br><br>
          <p> user_id : <strong><?php echo $_SESSION['user_id'];?></strong></p>
          <p> user_name : <strong><?php echo $_SESSION['user_name'];?></strong></p>
          <p> user_name : <strong><?php echo $_SESSION['user_email'];?></strong></p>
          <p> user_status  : <strong><?php echo $_SESSION['user_status'];?></strong></p>
        </div>

        <div class="patient_profile">
            <h2 class="text-danger">Patient Profile</h2>
                <hr>
            <img src="<?php echo '../views/uploads//' . $patient_picture ?>" alt="profile_pic" style="width: 195px;height: 227px;border-radius: 5%;"><br><br>
            <p> user_id : <strong><?php echo $user_id;?></strong></p>
            <p> user_name : <strong><?php echo $user_name;?></strong></p>
            <p> user_name : <strong><?php echo $user_email;?></strong></p>
            <p> user_status  : <strong><?php  echo $user_status;?></strong></p>
        </div>
    </div>

    <br><br>
    <div class="col-md-7 chat_container">
      <h2 class="text-center">Patient Chat</h2>
            <?php if(count($error) > 0): ?>
                <div class="alert alert-danger text-center">
                    <?php foreach($error as $error): ?>
                    <li style="list-style: none;"><?php echo $error; ?></li>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
            <?php if(isset($_SESSION['message'])): ?>
                <div class="alert alert-success text-center">
                    <li style="list-style: none;"><?php 
                    echo $_SESSION['message'];
                    unset($_SESSION['message']);
                    ?></li>
                </div>
            <?php endif; ?><br>
        <div id="chatbox">
            <?php  
                $patient = $_SESSION['user_id'];
                $con = $conn->connect();
                // $sql="SELECT chat.patient_id,chat.doctor_id,chat.message,chat.date,users.user_name FROM chat,users WHERE chat.patient_id =users.user_id";
                $sql="SELECT * from chat WHERE doctor_id = '$patient'";
                $stm=$con->prepare($sql);
                $stm->execute();
                $result=$stm->get_result();
            ?>
            <?php while($row=$result->fetch_assoc()){ ?>
                <ul>
                    <div id="chatbox_item">
                        <li class="text-success">medo</li>
                        <li class="text-white"><?=$row['message'];?></li>
                    </div>
                    <li class="text-warning" ><?=$row['date'];?></li>
                </ul><br>
            <?php } ?>
        </div><br>
        <form action="patient_details.php" method="POST">
            <input type="hidden" name="patient_id" value="<?php echo $user_id;?>">
            <input type="hidden" name="doctor_id" value="<?php echo $_SESSION['user_id'];?>">
            <input type="text" placeholder="Enter a message" class="form-control" name="message"><br>
            <button type="submit" class="btn-success p-2 btn-block form-control" name="consult">consult</button>
        </form>
    </div>
        
          
</body>
</html>
<?php
include_once('../controllers/patient_details_controler.php');
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
    <div class="text-center p-2 bg-dark" style="position: fixed;width: 100%; z-index:99">
        <h3 >
           <a href="admin_panel.php" class="text-white">Back To Doctor Page</a>
        </h3>
    </div>
    <br><br><br>
    <?php if(isset($_SESSION['message'])): ?>
                <div class="alert alert-success">
                    <h5 class="text-center"><?php 
                    echo $_SESSION['message'];
                    unset($_SESSION['message']);
                    ?></h5>
                </div>
    <?php endif; ?>
    <br>
    <div class="col-md-4 m-auto">
       <button type="submit" class="btn btn-block btn-success" id="add_note">
           medical notes
        </button>
        <br>
        <div class="bg-warning p-2 patient_notes" style="display:none">
            <div class="text-center">
                <img src="<?php echo '../views/uploads/' . $patient_picture; ?>" alt="user picture" style="width:45%;">
                <br><br>
                <p>User Name : 
                    <span  class="text-primary">
                        <?= $user_name; ?>
                    </span> 
                </p>
                <p>User Email : 
                    <span class="text-primary">
                        <?= $user_email; ?>
                    </span> 
                </p>
            </div>
            <div>
                <form action="" method="POST">
                    <div class="bg-white p-2" style="height:170px;overflow-y:scroll;">
                    <?php  
                        $con = $conn->connect();
                        $sql="SELECT * from medical_notes WHERE patient_id = '$user_id'";
                        $stm=$con->prepare($sql);
                        $stm->execute();
                        $result=$stm->get_result();
                    ?>
                    <?php while($row=$result->fetch_assoc()){ ?>
                        <p class="bg-dark text-white p-2 text-center">
                            <?=$row['note'];?>
                        </p>
                    <?php } ?>   
                    </div>
                    <br>
                    <input type="text" name="note" id="note" class="form-control" placeholder="Enter Note">
                    <div class="text-center text-danger">
                        <p id="error"></p>
                    </div>
                    <input type="hidden" name="patient_id" value="<?= $user_id; ?>">
                    <input type="hidden" name="patient_name" value="<?= $user_name; ?>">
                    <button type="submit" class="btn btn-block btn-success" name="add_note" id="send_note">Add Medical Note</button>
                </form>
            </div> 
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
                $con = $conn->connect();
                $sql="SELECT * from chat WHERE sender_id = '$user_id' OR recevier_id = '$user_id'";
                $stm=$con->prepare($sql);
                $stm->execute();
                $result=$stm->get_result();
            ?>
            <?php while($row=$result->fetch_assoc()){ ?>
                <ul>
                    <div id="chatbox_item">
                        <li class="text-success">
                            <?=$row['sender_name'];?>
                        </li>
                        <li class="text-white" id="last_message">
                            <?=$row['message'];?>
                        </li>
                    </div>
                    <li class="text-warning" >
                        <?=$row['date'];?>
                    </li>
                </ul>
            <?php } ?>
        </div><br>
        <form action="" method="POST">
            <input type="hidden" name="recevier_id" value="<?php echo $user_id;?>">
            <input type="hidden" name="recevier_name" value="<?php echo $user_name;?>">
            <input type="hidden" name="sender_id" value="<?php echo $_SESSION['user_id'];?>">
            <input type="hidden" name="sender_name" value="salwa">
            <input type="text" placeholder="Enter a message" class="form-control" name="message"><br>
            <input type="hidden" name="message_status" value="unread">
            <button type="submit" class="btn-success p-2 btn-block form-control" id="consult" name="consult">consult</button>
        </form>
    </div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>        
<script>
    // $(document).ready(function(){
    //     $('body').load(function(){
    //        $('#chatbox').scrollTop(40000);
    //     });
    // });
    $('#add_note').click(function(){
            $('.patient_notes').slideToggle(1500);
	});

    $('#send_note').click(function(e){
        if ($("#note").val() === '') {
            e.preventDefault();
            $('#error').html('Note fiels must not be empty');
        }
        else{
            //send data
        }
	});
</script>          
</body>
</html>
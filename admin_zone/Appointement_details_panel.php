<?php
 include_once('../controllers/admin.php');
 $conn = new Users();
?>
<!DOCTYPE html>
<head>
	<meta charset="utf-8">
	<title>Medisen Medical</title>
	<meta name="description" content="">
	<!-- Mobile Specific Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- <link rel="shortcut icon" href="img/favicon.png"> -->

	<link href='http://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet'>

	<!-- Syntax Highlighter -->
	<link rel="stylesheet" type="text/css" href="syntax-highlighter/styles/shCore.css" media="all">
	<link rel="stylesheet" type="text/css" href="syntax-highlighter/styles/shThemeDefault.css" media="all">

	<!-- Font Awesome CSS-->
	<link rel="stylesheet" href="css/font-awesome.min.css">
	 <!-- Bootstrap CSS -->
	 <link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- Normalize/Reset CSS-->
	<link rel="stylesheet" href="css/normalize.min.css">
	<!-- Main CSS-->
	<link rel="stylesheet" href="css/main.css">
	<!--  bootstrap cdn link-->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>

<body>

	<aside class="left-sidebar">
		<div class="logo" style="text-align: center; padding-left: 0 !important;">
			<h3 class="text-white">Welcome Secertaire 
				<span class="text-warning">
				    <?php echo $_SESSION['user_name'];?>
			    </span>
			</h3>
			<hr class="bg-white text-white"><br>
		</div>
		
		<div style="text-align: center;">
			<h2  style="color: wheat;">profile</h2><br>
			<img src="<?php echo '../views/uploads/' . $_SESSION['user_picture']; ?>" alt="profile_picture" style="width: 195px;height: 227px;border-radius: 5%;">
			<br><br>
			<h6 style="color: white;">name : <span style="color: blue;"><?php echo $_SESSION['user_name'];?> </h4>
			<br>
			<h6 style="color: white;">email : <span style="color: blue;"><?php echo $_SESSION['user_email'];?></span></h6>
			<br>
			<h6 style="color: white;">Status : <span style="color: blue;"><?php echo $_SESSION['user_status'];?></span></h6>
		</div>
		<div style="height: 227px;"></div>
		<div id="admin_logout_btn">
			<a href="../views/index.php">log out</a>
		</div>
	</aside>

<!-- ressponsive panel section -->
	<div style=" position: fixed;width: 100%;z-index: 1;">
		<div class="responsive_logo">
				<h3 class="text-white">Welcome Secertaire 
					<span class="text-warning">
						<?php echo $_SESSION['user_name'];?>
					</span>
				</h3>
				<hr class="bg-white text-white"><br>
		</div>
		<div class="responsive_panel">
			<br><br><br>
			<div class="responsive_doctor_profile">
				<h2  style="color: wheat;">profile</h2><br>
				<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcTreksTEerNOVl1wm7JRykQifXUI_RKimR8jjtzG-e1AcyrTajW&usqp=CAU" alt="profile_picture" style="width: 100px; height: 100px;">
				<br><br>
				<h5 style="color: white;">name : <span style="color: blue;"><?php echo $_SESSION['user_name'];?> </h5>
				<h5 style="color: white;">email : <span style="color: blue;"><?php echo $_SESSION['user_email'];?></span></h5>
				<h5 style="color: white;">Status : <span style="color: blue;"><?php echo $_SESSION['user_status'];?></span></h5>
			</div>
			<br><br>
			<div class="responsive_doctor_procceses" style="visibility: hidden;">
			</div>
			<div id="responsive_admin_logout_btn">
				<a href="../views/index.php">log out</a>
			</div>
	    </div>
	</div>

	<div class="blank-div"></div>

	<!-- the body section -->
	<div class="right_body" style="width: 82%;margin-left: 18%;">
	 <br><br>
	
        <!--getting the details of each appointment starts-->
    <div class="col-md-8 text-center p-4" style="margin: auto;background-color:#f2f6f8">
        <h3 class="text-center text-white bg-dark p-4">
            The Details of Appointment Number
            <span class="text-warning">
                <?php echo $appointment_id;?>
            </span>
        </h3>
        <br>
        <h3 class="text-dark"> Appointment Number : 
            <span class="text-primary">
               <strong>
                   <?php echo $appointment_id;?>
               </strong>
            </span> 
        </h3><hr>
        <h4 class="text-dark"> User Id : 
            <span class="text-primary">
                <strong>
                    <?php echo $user_id;?>
                <strong>
            </span> 
        </h4><hr>
        <h4 class="text-dark"> Doctor Id : 
            <span class="text-primary">
                <strong>
                    <?php echo $doctor_id;?>
                <strong>
            </span> 
        </h4><hr>
        <h4 class="text-dark"> Doctor Name : 
            <span class="text-primary">
               <strong>
                    <?php
                        $con = $conn->connect();
                        $sql="SELECT * FROM `users` WHERE user_id = '$doctor_id'";
                        $stm=$con->prepare($sql);
                        $stm->execute();
                        $result=$stm->get_result();
                    ?>
                    <?php while($row=$result->fetch_assoc()){ ?>
                        <?=$row['user_name'];?>
                    <?php } ?>
               </strong>
            </span> 
        </h4><hr>
        <h4 class="text-dark"> User Name : 
            <span class="text-primary">
                <strong>
                    <?php echo $user_name;?>
                <strong>
            </span> 
        </h4><hr>
        <h4 class="text-dark"> User Email : 
            <span class="text-primary">
                <strong>
                    <?php echo $user_email;?>
                <strong>
            </span> 
        </h4><hr>
        <h4 class="text-dark"> Service Type : 
            <span class="text-primary">
                <strong>
                    <?php echo $service_type;?>
                <strong>
            </span> 
        </h4><hr>
        <h4 class="text-dark"> Appointment Time : 
            <span class="text-primary">
                <strong>
                    <?php echo $time;?>
                <strong>
            </span> 
        </h4><hr>
        <h4 class="text-dark"> Appointment Message : 
            <span class="text-primary">
                <strong>
                    <?php echo $message;?>
                <strong>
            </span> 
        </h4><hr>
        <h4 class="text-dark"> Appointmnet Status : 
            <span class="text-primary">
                <strong>
                    <?php echo $appointement_status;?>
                <strong>
            </span> 
        </h4><hr>
        <form action="" method="POST">
            <input type="hidden" name="appointment_id" value="<?php echo $appointment_id;?>">
            <select name="appointement-status" class="bg-secondary p-2" style="width: 40%;">
                <option value="">Manage Appointment</option>
                <option value="On Hold">On Hold</option>
                <option value="Accepted">Accepted</option>
                <option value="Declined">Declined</option>
            </select>
            <button type="submit" name="manage" class="btn-danger p-2" style="width: 40%;">manage</button>
        </form>
        <br><br>
        <h4> 
            <a href="secertaire_panel.php" class="text-success">Back To Profile Page</a>
        </h4>
    </div>
    </div>
</body>	
</html>

<?php
 include_once('../controllers/admin.php');
 $data = new Admins();
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
	<!-- Font Awesome CSS-->
	<link rel="stylesheet" href="assests/css/font-awesome.min.css">
	 <!-- Bootstrap CSS -->
	 <link rel="stylesheet" href="assests/css/bootstrap.min.css">
	<!-- Normalize/Reset CSS-->
	<link rel="stylesheet" href="assests/css/normalize.min.css">
	<!-- Main CSS-->
	<link rel="stylesheet" href="assests/css/main.css">
	<!--  bootstrap cdn link-->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>

<body>

<?php
        $con = $data->connect();
		$sql="SELECT * FROM admins WHERE admin_status = 'Secertaire'";
		$stm=$con->prepare($sql);
		$stm->execute();
		$result=$stm->get_result();
	?>
	<?php while($row=$result->fetch_assoc()){ ?>
	<aside class="left-sidebar">
		<div class="logo" style="text-align: center; padding-left: 0 !important;">
			<h3 class="text-white">Welcome Secertaire 
				<span class="text-warning">
				   <?= $row['admin_name'];?>
			    </span>
			</h3>
			<hr class="bg-white text-white"><br>
		</div>
		
		<div style="text-align: center;">
		   <img src="<?php echo '../../uploads/' . $row['admin_picture']; ?>" alt="profile_picture" style="width: 150px;height: 190px;border-radius: 5%;">
			<br><br>
			<h6 style="color: white;">name : 
			   <span style="color: #f1b608;line-height: 30px;">
			       <?= $row['admin_name'];?> 
			   </span> 
		    </h6>
			<h6 style="color: white;line-height: 30px;">email : 
			   <span style="color: #f1b608;">
			        <?= $row['admin_email'];?> 
		        </span>
	        </h6>
			<h6 style="color: white;line-height: 30px;">Status : 
			    <span style="color: #f1b608;">
				    <?= $row['admin_status'];?> 
		        </span>
	        </h6>
		</div>
		<br><br><br>
		<div class="doctor_procceses2 p-2">
		    <p><a href="#appointments">appointments</a></p>
	        <p><a href="#contact_messages">contact messages</a></p>
		</div><br><br>
		<div id="admin_logout_btn2">
			<a href="../views/index.php">log out</a>
		</div>
		
	</aside>

<!-- ressponsive panel section -->
	<div style=" position: fixed;width: 100%;z-index: 1;">
		<div class="responsive_logo">
				<h3 class="text-white">Welcome Secertaire 
					<span class="text-warning">
					   <?= $row['admin_name'];?>
					</span>
				</h3>
				<hr class="bg-white text-white"><br>
		</div>
		<div class="responsive_panel">
			<br><br><br>
			<div class="responsive_doctor_profile">
			    <img src="<?php echo '../uploads/' . $row['admin_picture']; ?>" alt="profile_picture" style="width: 150px;height: 190px;border-radius: 5%;">
				<br><br>
				<h6 style="color: white;">name : 
					<span style="color:#f1b608;">
					    <?= $row['admin_name'];?>
					</span> 
			    </h6>
				<h6 style="color: white;">email : 
					<span style="color:#f1b608;">
						<?= $row['admin_email'];?>
					</span>
				</h6>
				<h6 style="color: white;">Status : 
					<span style="color:#f1b608;">
						<?= $row['admin_status'];?>
					</span>
				</h6>
			</div>
			<br><br>
			<div class="responsive_doctor_procceses">
				<div id="inner">
                    <br><br>
					<p><a href="#appointments">appointments</a></p>
					<p><a href="#contact_messages">contact messages</a></p>
				</div>
			</div>
			<div id="responsive_admin_logout_btn">
				<a href="../views/index.php">log out</a>
			</div>
		</div>
	<?php } ?>
	</div>

	<div class="blank-div"></div>

	<!-- the body section -->
	<div class="right_body" >
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
        <h4 class="text-dark"> Doctor Name : 
            <span class="text-primary">
               <strong>
                    <?php
                        $con = $data->connect();
                        $sql="SELECT * FROM `admins` WHERE admin_status = 'doctor'";
                        $stm=$con->prepare($sql);
                        $stm->execute();
                        $result=$stm->get_result();
                    ?>
                    <?php while($row=$result->fetch_assoc()){ ?>
                        <?=$row['admin_name'];?>
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
            <a href="secertaire_panel.php" class="text-success">Back To Secertaire Page</a>
        </h4>
    </div>
    </div>
</body>	
</html>

<?php
 include_once ('../controllers/admin.php');
 include_once ('../classes/userclass.php');
 $data = new Users();
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
		<br><br><br>
		<div class="doctor_procceses p-2">
		    <p><a href="#appointments">appointments</a></p>
	        <p><a href="#contact_messages">contact messages</a></p>
		</div><br><br>
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
	</div>

	<div class="blank-div"></div>

	<!-- the body section -->
	<div class="right_body" style="width: 82%;margin-left: 18%;">
	 <br><br>
	
        <!-- showing all appointement -->
        <div class="col-md-10" style="margin:auto;height:927px;overflow-y:scroll;" id="appointments">
            <?php
                $con = $data->connect();
                $sql="SELECT * FROM `appointment`";
                ;
                $stm=$con->prepare($sql);
                $stm->execute();
                $result=$stm->get_result();
            ?>
                <h4 class="text-center bg-success p-2 text-white">Appointement table</h4>
                <br>
            <table class="table mr-4 bg-warning">
                <thead class="thead-dark">
                    <tr>
                        <th>User Name</th>
                        <th>service Type</th>
                        <th>Appointement Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody class="t_body">
                <?php while($row=$result->fetch_assoc()){ ?>
                    <tr>
                        <td><?=$row['user_name'];?></td>
                        <td><?=$row['service_type'];?></td>
                        <td><?=$row['appointement_status'];?></td>
                        <td>
                            <a href="Appointement_details_panel.php?details=<?=$row['appointment_id']; ?>" class="badge badge-primary p-3">More Details</a> 
                        </td>
                    <?php } ?>
                </tbody>
            </table>
        </div><br><br><br>

        <!-- showing all Contact messages -->
        <div class="col-md-10" style="margin: auto;height:927px;overflow-y:scroll;" id="contact_messages">
            <?php
                
                $user_id = $_SESSION['user_id'];

                $con = $data->connect();
                $sql="SELECT * FROM `contact`";
                $stm=$con->prepare($sql);
                $stm->execute();
                $result=$stm->get_result();
            ?>
                <h4 class="text-center bg-success p-2 text-white">contact messages table</h4>
                <br>
            <table class="table mr-4 bg-warning">
                <thead class="thead-dark">
                    <tr>
                        <th>User Name</th>
                        <th>User Email</th>
                        <th>Message</th>
                    </tr>
                </thead>
                <tbody class="t_body">
                <?php while($row=$result->fetch_assoc()){ ?>
                    <tr>
                        <td><?=$row['firstname'];?></td>
                        <td><?=$row['email'];?></td>
                        <td><?=$row['comment'];?></td>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</body>	
</html>

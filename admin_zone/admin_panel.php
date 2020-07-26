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
			<h1>admin panel</h1>
		</div>
		<br>
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
		<br>
		<div class="doctor_procceses">
		    <p><a href="#admins">admins</a></p>
			<p><a href="#patients">patients</a></p>
			<p><a href="#">add admin</a></p>
		    <p><a href="#appointments">appointments</a></p>
	        <p><a href="#contact_messages">contact messages</a></p>
		</div>
		<div id="admin_logout_btn">
			<a href="../views/index.php">log out</a>
		</div>
	</aside>

<!-- ressponsive panel -->
	<div class="responsive_logo">
		<h1>admin panel</h1>
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
			    <p><a href="#admins">admins</a></p>
				<p><a href="#patients">patients</a></p>
				<p><a href="#">add admin</a></p>
				<p><a href="#appointments">appointments</a></p>
				<p><a href="#contact_messages">contact messages</a></p>
			</div>
		</div>
		<div id="responsive_admin_logout_btn">
			<a href="../views/index.php">log out</a>
		</div>
	</div>
	
	<!-- the body section -->
	<div class="right_body" style="width: 82%;margin-left: 18%;">
     <br><br>
		<!-- showing admins in a form of a table -->
	   <div class="col-md-6" style="margin: auto;" id="admins">
			<?php
				$con = $data->connect();
				$sql="SELECT * FROM users WHERE user_status = 'admin'";
				$stm=$con->prepare($sql);
				$stm->execute();
				$result=$stm->get_result();
			?>
			<h4 class="text-center bg-success p-2 text-white">Admins table</h4>
			<br>
		  <table class="table mr-4 bg-warning">
			<thead class="thead-dark">
				<tr>
					<th>User id</th>
					<th>User name</th>
					<th>User email</th>
					<th>User status</th>
					<th>Action</th>
					
				</tr>
			</thead>
			<tbody class="t_body">
			<?php while($row=$result->fetch_assoc()){ ?>
				<tr>
					<td><?=$row['user_id'];?></td>
					<td><?=$row['user_name'];?></td>
					<td><?=$row['user_email'];?></td>
					<td><?=$row['user_status'];?></td>
					<td>
                    <a href="admin_panel.php?delete=<?=$row['user_id']; ?>" class="badge badge-danger p-3" onclick="return confirm('Do you want to delete this admin')">delete</a>
                    </td>
					
				<?php } ?>
			</tbody>
		  </table>
	   </div>
	   <br>

	   <!-- showing users (patients) -->
		<div class="col-md-6" style="margin: auto;" id="patients">
			<?php
				$con = $data->connect();
				$sql="SELECT * FROM users WHERE user_status = 'user'";
				$stm=$con->prepare($sql);
				$stm->execute();
				$result=$stm->get_result();
			?>
			<h4 class="text-center bg-success p-2 text-white">patients table</h4>
			<br>
		  <table class="table mr-4 bg-warning">
			<thead class="thead-dark">
				<tr>
					<th>User id</th>
					<th>User name</th>
					<th>User email</th>
					<th>User status</th>
					<th>Action</th>
					
				</tr>
			</thead>
			<tbody class="t_body">
			<?php while($row=$result->fetch_assoc()){ ?>
				<tr>
					<td><?=$row['user_id'];?></td>
					<td><?=$row['user_name'];?></td>
					<td><?=$row['user_email'];?></td>
					<td><?=$row['user_status'];?></td>
					<td>
					<a href="details.php?details=<?=$row['id_reservation']; ?>" class="badge badge-primary p-3">Details</a> 
					</td>
					
				<?php } ?>
			</tbody>
		  </table>
	   </div>
	    <!-- adding an admin -->
		<div class="container big-box col-md-8" style="padding: 1%;background-color: aliceblue;box-shadow: 0px 0px 10px;">
			<h2 class="text-center h2">New admin</h2>
				<?php if(count($error) > 0): ?>
					<div class="alert alert-danger">
						<?php foreach($error as $error): ?>
						<li><?php echo $error; ?></li>
						<?php endforeach; ?>
					</div>
				<?php endif; ?>
				<?php if(isset($_SESSION['message'])): ?>
					<div class="alert alert-success">
						<li><?php 
						echo $_SESSION['message'];
						unset($_SESSION['message']);
						?></li>
					</div>
				<?php endif; ?>
				<br>
				<form action="admin_panel.php" method="post" enctype="multipart/form-data">
					<div class="row">
						<div class="form-group col-md-6">
							<label for="username">Username</label>
							<input type="text" value="<?php echo $user_name; ?>" name="user_name" class="form-control" placeholder="username" > 
						</div>
						<div class="form-group col-md-6">
							<label for="useremail">useremail</label>
							<input type="text" value="<?php echo $user_email; ?>"  name="user_email" class="form-control" placeholder="email" > 
						</div>
					</div>
					<div class="row">   
						<div class="form-group col-md-6">
							<label for="password">Password</label>
							<input type="password" name="user_password" class="form-control" placeholder="password" > 
						</div>
						<div class="form-group col-md-6">
							<label for="confpassword"> Confirm password</label>
							<input type="password" name="user_confpassword" class="form-control" placeholder="confir mpassword" > 
						</div>
					</div>
						<div class="form-group">
							<input type="file" name="user_picture" class="costum file" > 
							<input type="hidden" name="user_status" value="admin">
						</div>
					
					<div class="form-group">
					<button name="add_admin" class="btn btn-primary btn-block">add admin</button>
					<br>
					<span> you are already an admin? <a class="text-primary " href="../views/index.php">log in</a></span>
				</form>
		</div>
	</div>
	<br><br>

	<!-- showing all appointement -->
	<div class="col-md-10" style="margin: auto;" id="appointments">
        <?php
            $doctor_id = $_SESSION['user_id'];
            $con = $data->connect();
            $sql="SELECT * FROM `appointment` WHERE doctor_id = '$doctor_id'";
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
                    <th>Appointement Id</th>
                    <th>User Id</th>
					<th>User Name</th>
					<th>User Email</th>
                    <th>service Type</th>
                    <th>Appointement Time</th>
                    <th>message</th>
                    <th>Appointement Status</th>
				</tr>
			</thead>
			<tbody class="t_body">
			<?php while($row=$result->fetch_assoc()){ ?>
				<tr>
                    <td><?=$row['appointment_id'];?></td>
					<td><?=$row['user_id'];?></td>
					<td><?=$row['user_name'];?></td>
                    <td><?=$row['user_email'];?></td>
                    <td><?=$row['service_type'];?></td>
                    <td><?=$row['time'];?></td>
                    <td><?=$row['message'];?></td>
                    <td>
						<form action="admin_panel.php" method="POST">
							<input type="hidden" name="appointment_id" value="<?=$row['appointment_id'];?>">
                           <select name="appointement-status" class="bg-secondary p-1">
							   <option value="<?=$row['appointement_status'];?>"><?=$row['appointement_status'];?></option>
							   <option value="On Hold">On Hold</option>
							   <option value="Accepted">Accepted</option>
							   <option value="Declined">Declined</option>
						   </select>
						   <button type="submit" name="manage" class="btn-danger p-1">manage</button>
						</form>
					</td>
				<?php } ?>
			</tbody>
          </table>
	</div>
	<!-- showing all Contact messages -->
	<div class="col-md-10" style="margin: auto;" id="contact_messages">
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
                    <th>Message Id</th>
                    <th>User Id</th>
					<th>User Name</th>
					<th>User Email</th>
                    <th>Message</th>
				</tr>
			</thead>
			<tbody class="t_body">
			<?php while($row=$result->fetch_assoc()){ ?>
				<tr>
                    <td><?=$row['contact_id'];?></td>
					<td><?=$row['user_id'];?></td>
					<td><?=$row['firstname'];?></td>
                    <td><?=$row['email'];?></td>
                    <td><?=$row['comment'];?></td>
				<?php } ?>
			</tbody>
          </table>
</div>
		</body>
		</html>

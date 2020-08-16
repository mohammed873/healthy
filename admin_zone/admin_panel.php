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

	 <!-- Bootstrap CSS -->
	 <link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- Normalize/Reset CSS-->
	<link rel="stylesheet" href="css/normalize.min.css">
	<!-- Main CSS-->
	<link rel="stylesheet" href="css/main.css">
	<!--  bootstrap cdn link-->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
	<!-- Font Awesome CSS cdn-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>

	<aside class="left-sidebar">
		<div class="logo" style="text-align: center; padding-left: 0 !important;">
			<h3 class="text-white">Welcome Doctor 
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
		<br>
		<div class="doctor_procceses">
		<p><a href="#add_admin">add admin</a></p>
		    <p><a href="#admins">admins</a></p>
			<p><a href="#patients">patients</a></p>
	        <p><a href="#contact_messages">contact messages</a></p>
		</div>
		<div id="admin_logout_btn">
			<a href="../views/index.php">log out</a>
		</div>
	</aside>

<!-- ressponsive panel section -->
	<div style=" position: fixed;width: 100%;z-index: 1;">
		<div class="responsive_logo">
				<h3 class="text-white">Welcome Doctor 
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
				    <p><a href="#add_admin">add admin</a></p>
					<p><a href="#admins">admins</a></p>
					<p><a href="#patients">patients</a></p>
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
	 
    <!-- adding an admin -->
    <div class="container big-box col-md-8 " style="padding: 1%;background-color: #ffc107; box-shadow: 0px 0px 10px;" id="add_admin">
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
							<input type="text" name="user_name" class="form-control" placeholder="username" value="<?php echo $user_name; ?>" > 
						</div>
						<div class="form-group col-md-6">
							<label for="useremail">useremail</label>
							<input type="text"  name="user_email" class="form-control" placeholder="email" value="<?php echo $user_email; ?>"> 
						</div>
					</div>
					<div class="row">   
						<div class="form-group col-md-6">
							<label for="password">Password</label>
							<input type="password" name="user_password" class="form-control" placeholder="password" > 
						</div>
						<div class="form-group col-md-6">
							<label for="confpassword"> Confirm password</label>
							<input type="password" name="user_confpassword" class="form-control" placeholder="confir mpassword"> 
						</div>
					</div>
						<div class="form-group">
							<input type="file" name="user_picture" class="costum file" > 
						</div>
						<div class="form-group">
							<select name="user_status" class="bg-secondary p-2 text-white" style="width: 100%;">
							    <option value="choose the status of the admin">Choose The Status of The Admin</option>
								<option value="admin">DOCTOR</option>
								<option value="Secertaire">Secertaire</option>
							</select>
						</div>
					
					<div class="form-group">
					<button name="add_admin" class="btn btn-primary btn-block">add admin</button>
					<br>
					<span> you are already an admin? <a class="text-primary " href="../views/index.php">log in</a></span>
				</form>
		</div>
	</div>
	<br><br><br>

		<!-- showing admins in a form of a table -->
	   <div class="col-md-8" style="margin:auto;height:927px;overflow-y:scroll;" id="admins">
			<?php
				$con = $data->connect();
				$sql="SELECT * FROM users WHERE user_status != 'user'";
				$stm=$con->prepare($sql);
				$stm->execute();
				$result=$stm->get_result();
			?>
			<h4 class="text-center bg-success p-2 text-white">doctors table</h4>
			<br>
		  <table class="table mr-4 bg-warning">
			<thead class="thead-dark">
				<tr>
					<th>Doctor Name</th>
					<th>Doctor Email</th>
					<th>Doctor Status</th>
					<th>Action</th>
					
				</tr>
			</thead>
			<tbody class="t_body">
			<?php while($row=$result->fetch_assoc()){ ?>
				<tr>
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
	   <br><br><br>

	   <!-- showing users (patients) -->
		<div class="col-md-8" style="margin: auto;height:927px;overflow-y:scroll;" id="patients">
			<?php
				$con = $data->connect();
				$sql="SELECT * FROM users WHERE user_status = 'user'";
				$stm=$con->prepare($sql);
				$stm->execute();
				$result=$stm->get_result();
			?>
			<h4 class="text-center bg-success p-2 text-white">patients table</h4>
			<br>
		  <table class="table  bg-warning">
			<thead class="thead-dark">
				<tr>
					<th>User name</th>
					<th>User email</th>
					<th>User status</th>
					<th>Messages</th>
				</tr>
			</thead>
			<tbody class="t_body">
			<?php while($row=$result->fetch_assoc()){ ?>
				<tr>
					<td><?=$row['user_name'];?></td>
					<td><?=$row['user_email'];?></td>
					<td><?=$row['user_status'];?></td>
					<td>
					<a href="patient_details.php?details=<?=$row['user_id']; ?>" class="badge badge-primary p-3">messages</a> 
					</td>
					
				<?php } ?>
			</tbody>
		  </table>
	   </div>
	   <br><br><br>

	<!-- showing all Contact messages -->
	<div class="col-md-8" style="margin: auto;height:927px;overflow-y:scroll;" id="contact_messages">
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
</body>	
</html>

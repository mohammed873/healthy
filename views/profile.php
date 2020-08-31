<?php
   include ('../controllers/patient_details_controler.php');
   $conn = new Chat();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>profile</title>
    <link rel="icon" href="../assests/img/favicon.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../assests/css/bootstrap.min.css">
    <!-- animate CSS -->
    <link rel="stylesheet" href="../assests/css/animate.css">
    <!-- owl carousel CSS -->
    <link rel="stylesheet" href="../assests/css/owl.carousel.min.css">
    <!-- themify CSS -->
    <link rel="stylesheet" href="../assests/css/themify-icons.css">
    <!-- flaticon CSS -->
    <link rel="stylesheet" href="../assests/css/flaticon.css">
    <!-- magnific popup CSS -->
    <link rel="stylesheet" href="../assests/css/magnific-popup.css">
    <!-- nice select CSS -->
    <link rel="stylesheet" href="../assests/css/nice-select.css">
    <!-- swiper CSS -->
    <link rel="stylesheet" href="../assests/css/slick.css">
    <!-- style CSS -->
    <link rel="stylesheet" href="../assests/css/style.css">
    <link rel="stylesheet" href="../assests/css/profile.css">
    <!-- Font Awesome CSS cdn-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
     <!--::header part start::-->
     <header class="main_menu home_menu" style="background-color: #f2f6f8;position: fixed;">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <a class="navbar-brand" href="home.php"> <img src="../assests/img/logo.png" alt="logo"> </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse main-menu-item justify-content-end"
                            id="navbarSupportedContent">
                            <ul class="navbar-nav align-items-center">
                                <li class="nav-item active">
                                    <a class="nav-link" href="home.php">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="about.php">about</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="Doctor.php">Doctors</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="profile.php">profile</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="contact.php">Contact</a>
                                </li>
                                <br>
                                <li>
                                    <a class="btn btn-block bg-primary ml-4 text-white" href="index.php">log out</a>
                                </li>
                                <br>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- Header part end-->
    <!-- breadcrumb start-->
    <section class="breadcrumb breadcrumb_bg text-center" style="margin-top: 75px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb_iner">
                        <div class="breadcrumb_iner_item">
                            <h2>profile</h2>
                            <p>Home<span>/</span>profile</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb start-->
    <br>
    <?php if(isset($_SESSION['message'])): ?>
                <div class="alert alert-success">
                    <h5 class="text-center"><?php 
                    echo $_SESSION['message'];
                    unset($_SESSION['message']);
                    ?></h5>
                </div>
    <?php endif; ?>
    <br><br><br>
<!-- profile_card part start-->
    <div class="profile">
    <?php
        $patient_id = $_SESSION['user_id'];

        $con = $conn->connect();
        $sql="SELECT * FROM users WHERE user_id = '$patient_id'";
        $stm=$con->prepare($sql);
        $stm->execute();
        $result=$stm->get_result();
    ?>
        <?php while($row=$result->fetch_assoc()){ ?>
       <div class="profile_picture">
           <img src="<?= '../uploads/' . $row['user_picture']; ?>" alt="profile_pic"><br>         
           <button style="margin-top: -79px;" class="btn btn-success" id="update_profile">
              <i class="fa fa-edit"> Edit Profile information</i>
           </button>
       </div>
       <div class="bg-warning p-2 profile_update_form" style="display: none;">
          <form action="" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <input type="hidden" name="user_id" value="<?= $_SESSION['user_id'];?>">
                    <div class="form-group col-md-6">
                        <label for="username">User name</label>
                        <input type="text" name="user_name" class="form-control" placeholder="username" id="user-name" value="<?= $row['user_name'];?>"> 
                        <span id="name-error" class="text-danger"></span>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="useremail">user email</label>
                        <input type="text"  name="user_email" class="form-control" placeholder="email" id="user-email" value="<?= $row['user_email'];?>"> 
                        <span id="email-error" class="text-danger"></span>
                    </div>
                </div>
                <div class="row">   
                    <div class="form-group col-md-6">
                        <label for="password">Password</label>
                        <input type="password" name="user_password" class="form-control" placeholder="password" id="user-password" value="<?= $row['user_password'];?>">
                        <span class="password-error text-danger"></span>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="confpassword"> Confirm password</label>
                        <input type="password" name="user_confpassword" class="form-control" placeholder="confirm password" id="confirm-password" value="<?= $row['user_password'];?>"> 
                        <span class="password-error text-danger" ></span>
                    </div>
                </div>
                <div class="form-group">
                   <label for="user_picture"> Chose Picture</label>
                   <input type="file" name="user_picture" class="form-control" id="user-picture"> 
                   <span id="picture-error" class="text-danger"></span>
                </div>
                <button type="submit" name="update_profile" class="btn btn-block btn-primary" id="update-profile">Update Profile Information</button>
          </form>
       </div>
       <br><br><br>
       <h2>Name : <span style="color: blue;"><?= $row['user_name'];?></span></h2>
       <h2>Email : <span style="color: blue;"><?= $row['user_email'];?></span></h2>
       <h2>Status : <span style="color: blue;"><?= $row['user_status'];?></span></h2>
    <?php } ;?>
    </div><br><br>
<!-- profile_card part ends-->

<!-- middle extra profile details starts-->
<div class="col-md-7 chat_container">
<h2 class="text-center"> consult the doctor</h2>
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
            <?php endif; ?>
            <br>
        <div id="chatbox">
            <?php  
                $patient = $_SESSION['user_id'];
                $con = $conn->connect();
                $sql="SELECT * from chat WHERE sender_id = '$patient'OR recevier_id = '$patient'";
                $stm=$con->prepare($sql);
                $stm->execute();
                $result=$stm->get_result();
            ?>
            <?php while($row=$result->fetch_assoc()){ ?>
                <ul>
                    <div id="chatbox_item">
                        <li class="text-success" id="sender_name">
                            <?=$row['sender_name'];?>
                        </li>
                        <li class="text-white">
                            <?=$row['message'];?>
                        </li>
                    </div>
                    <li class="text-warning" >
                        <?=$row['date'];?>
                    <li>
                </ul><br>                
            <?php } ?>
        </div><br>
    <form action="profile.php" method="POST">
        <input type="hidden" name="sender_id" value="<?php echo $_SESSION['user_id'];?>">
        <input type="hidden" name="sender_name" value="<?php echo $_SESSION['user_name'];?>">
        <?php  
            $con = $conn->connect();
            $sql="SELECT * FROM admins WHERE admin_status = 'doctor'";
            $stm=$con->prepare($sql);
            $stm->execute();
            $result=$stm->get_result();
        ?>
        <?php while($row=$result->fetch_assoc()){ ?>
            <input type="hidden" name="recevier_id" value="<?=$row['admin_id'];?>">
            <input type="hidden" name="recevier_name" value="<?=$row['admin_name'];?>">
        <?php } ?>
        <input type="hidden" name="message_status" value="unread">
        <input type="text" placeholder="Enter a message" class="form-control" name="message"><br>
        <button type="submit" class="btn-success p-2 btn-block form-control" name="consult" id="consult">consult</button>
    </form>
</div>
<br><br>

<!-- showing appointement in a form of a table -->
<div class="col-md-8 m-auto" style="height: 881px;overflow-y: scroll;">
        <?php
            $user_id = $_SESSION['user_id'];
            $con = $conn->connect();
            $sql="SELECT * FROM `appointment` WHERE user_id = '$user_id' ";
            $stm=$con->prepare($sql);
            $stm->execute();
            $result=$stm->get_result();
        ?>
			<h4 class="text-center bg-primary p-2 text-white">Appointement table</h4>
			<br>
		  <table class="table mr-4 table-striped table-light">
			<thead class="thead-dark">
				<tr>
                    <th>Appointement Number</th>
					<th>User Name</th>
                    <th>service Type</th>
                    <th>Action</th>
				</tr>
			</thead>
			<tbody>
			<?php while($row=$result->fetch_assoc()){ ?>
				<tr>
                    <td><?=$row['appointment_id'];?></td>
					<td><?=$row['user_name'];?></td>
                    <td><?=$row['service_type'];?></td>
                    <td>
					 <a href="Appointement_details.php?details=<?=$row['appointment_id']; ?>" class="badge badge-primary p-3">Details</a> 
                    </td>
				<?php } ?>
			</tbody>
          </table>
</div>
 <!-- middle extra profile details ends-->   


      <!-- footer part start-->
      <footer class="footer-area">
        <div class="footer section_padding">
            <div class="container">
                <div class="row">
                    <div class="col-xl-2 col-sm-4 mb-4 mb-xl-0 single-footer-widget">
                        <h4>Services Link</h4>
                        <ul>
                            <li><a href="#">Eye treatment</a></li>
                            <li><a href="#">Skin Surgery</a></li>
                            <li><a href="#">Diagnosis clinic</a></li>
                            <li><a href="#"> Dental care</a></li>
                            <li><a href="#">Neurology service</a></li>
                            <li><a href="#">Plastic surgery</a></li>
                        </ul>
                    </div>
                    <div class="col-xl-2 col-sm-4 mb-4 mb-xl-0 single-footer-widget">
                        <h4>Quick Links</h4>
                        <ul>
                            <li><a href="#">About us</a></li>
                            <li><a href="#">Department</a></li>
                            <li><a href="#"> Online payment</a></li>
                            <li><a href="#">Careers</a></li>
                            <li><a href="#">Department</a></li>
                        </ul>
                    </div>

                    <div class="col-xl-2 col-sm-4 mb-4 mb-xl-0 single-footer-widget">
                        <h4>Explore</h4>
                        <ul>
                            <li><a href="#">In the community</a></li>
                            <li><a href="#">IU health foundation</a></li>
                            <li><a href="#">Family support </a></li>
                            <li><a href="#">Business solution</a></li>
                            <li><a href="#">Community clinic</a></li>
                        </ul>
                    </div>
                    <div class="col-xl-2 col-sm-4 mb-4 mb-xl-0 single-footer-widget">
                        <h4>Resources</h4>
                        <ul>
                            <li><a href="#">Lights were season</a></li>
                            <li><a href="#"> Their is let wherein</a></li>
                            <li><a href="#">which given over</a></li>
                            <li><a href="#">Without given She</a></li>
                            <li><a href="#">Isn two signs think</a></li>
                        </ul>
                    </div>
                    <div class="col-xl-4 col-sm-8 col-md-8 mb-4 mb-xl-0 single-footer-widget">
                        <h4>Newsletter</h4>
                        <p>Seed good winged wherein which night multiply
                            midst does not fruitful</p>
                        <div class="form-wrap" id="mc_embed_signup">
                            <form target="_blank"
                                action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01"
                                method="get" class="form-inline">
                                <input class="form-control" name="EMAIL" placeholder="Your Email Address"
                                    onfocus="this.placeholder = ''" onblur="this.placeholder = 'Your Email Address '"
                                    required="" type="email">
                                <button class="click-btn btn btn-default text-uppercase">subscribe</button>
                                <div style="position: absolute; left: -5000px;">
                                    <input name="b_36c4fd991d266f23781ded980_aefe40901a" tabindex="-1" value=""
                                        type="text">
                                </div>

                                <div class="info"></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="copyright_part">
            <div class="container">
                <div class="row align-items-center">
                    <p class="footer-text m-0 col-lg-8 col-md-12"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="ti-heart" aria-hidden="true"></i> by <a href="healthy" target="_blank">healthy</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                    <div class="col-lg-4 col-md-12 text-center text-lg-right footer-social">
                        <a href="#"><i class="ti-facebook"></i></a>
                        <a href="#"> <i class="ti-twitter"></i> </a>
                        <a href="#"><i class="ti-instagram"></i></a>
                        <a href="#"><i class="ti-skype"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- footer part end-->


    <!-- jquery cdn -->
    <script
  src="https://code.jquery.com/jquery-3.5.1.js"
  integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
  crossorigin="anonymous"></script>
  
</body> 
</html>
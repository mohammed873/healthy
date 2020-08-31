 <?php
    require_once ('../controllers/admin.php');
    $data = new Admins();
 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>profile_info</title>
     <!--  bootstrap cdn link-->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
	<!-- Font Awesome CSS cdn-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
 </head>
 <body>
    <div class="text-center p-2 bg-dark" style="position: fixed;width: 100%;z-index:99">
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
    <div class="container justify-content-center p-2  mt-3">
        <?php
            $con = $data->connect();
            $sql="SELECT * FROM admins WHERE admin_status = 'doctor' ";
            $stm=$con->prepare($sql);
            $stm->execute();
            $result=$stm->get_result();
        ?>
        <?php while($row=$result->fetch_assoc()){ ?>
        <div class="profile_picture_div text-center">
                <img src="data:image/jpeg;base64,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" alt="profile_picture" style="width: 261px;border-radius: 5%;">
        </div>
        <br>
        <div class="doctor_info p-3" style=" box-shadow: 0px 0px 0px 4px #f51423;">
            <h5 class="text-primary">Doctor Name: 
                <span style="font-weight: bold; color:black">
                    <?=$row['admin_name'];?>
                </span>
            </h5>
            <h5 class="text-primary">Doctor Email: 
                <span style="font-weight: bold; color:black">
                    <?=$row['admin_email'];?>
                </span>
            </h5>
            <h5 class="text-primary">Doctor Phone Number: 
                <span style="font-weight: bold; color:black">
                   <?=$row['doctor_phone'];?>
                </span>
            </h5>
            <h5 class="text-primary">linkdin Profile: 
                <span style="font-weight: bold; color:black">
                    <a href="<?=$row['doctor_linkdin'];?>" class="text-dark">
                        <?=$row['doctor_linkdin'];?>
                    </a>
                </span>
            </h5>
            <h5 class="text-primary">Years of Experience: 
                <span style="font-weight: bold; color:black">
                   <?=$row['years_experience'] . ' years';?>
                </span>
            </h5>
            <h5 class="text-primary">Sergeries Number: 
                <span style="font-weight: bold; color:black">
                   <?=$row['surgeries_number'] . ' times';?>
                </span>
            </h5>
            <h5 class="text-primary">Doctor Specialization: 
                <span style="font-weight: bold; color:black">
                   <?=$row['doctor_specialization'];?>
                </span>
            </h5>
            <h5 class="text-primary">More About Doctor: 
                <span style="font-weight: bold; color:black">
                   <?=$row['about_doctor'];?>
                </span>
            </h5>
        </div>
        <br>
        <div >
            <button type="submit" id="update_info" class=" btn btn-success text-center btn-block">
                <i class="fa fa-edit"> Update Profile Information</i>
            </button>
            <br>
       
        </div>
    
    </div>
    <!-- updating profile information -->
    <div class="update_info_form col-md-8 m-auto bg-warning p-3" style="box-shadow: 0px 0px 10px; display:none;display: non" >
            <h2 class="text-center h2">Update Doctor Profile</h2>
            <hr class="bg-primary">
            <form action="" method="post">
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="doctor_name">Doctor Name</label>
                        <input type="text" name="doctor_name" class="form-control" placeholder="Doctor Name" id="doctor-name"> 
                        <span id="name-error" class="text-danger"></span>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="doctor_email">Doctor Email</label>
                        <input type="text"  name="doctor_email" class="form-control" placeholder="Email" id="doctor-email">
                        <span id="email-error" class="text-danger"></span>
                    </div>
                </div>
                    <div class="row">   
                        <div class="form-group col-md-6">
                            <label for="doctor_phone">Phone Number</label>
                            <input type="tel" name="doctor_phone" class="form-control" placeholder="phone Number" id="doctor-phone"> 
                            <span id="phone-error" class="text-danger"></span>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="doctor_specialization">linkdin Profile</label>
                            <input type="url" name="doctor_linkdin" class="form-control" placeholder="linkdin profile" id="doctor-linkdin" >
                            <span id="linkdin-error" class="text-danger"></span> 
                        </div>
                    </div>
                    <div class="row">   
                        <div class="form-group col-md-6">
                            <label for="yers_experience">Years of Experience</label>
                            <input type="number" name="years_experience" class="form-control" placeholder="years of experience" id="years-experience">
                            <span id="experience-error" class="text-danger"></span> 
                        </div>
                        <div class="form-group col-md-6">
                            <label for="surgeries_number">surgeries number</label>
                            <input type="number" name="surgeries_number" class="form-control" placeholder="surgeries number" id="surgeries-number">
                            <span id="surgeries-error" class="text-danger"></span> 
                        </div>
                    </div>
                    <div class="row">   
                        <div class="form-group col-md-6">
                            <label for="password">Password</label>
                            <input type="password" name="doctor_password" class="form-control" placeholder="password" id="doctor-password" >
                            <span class="password-error text-danger"></span> 
                        </div>
                        <div class="form-group col-md-6">
                            <label for="confpassword"> Confirm password</label>
                            <input type="password" name="doctor_confpassword" class="form-control" placeholder="confirm password" id="confirm-password"> 
                            <span class="password-error text-danger"></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="doctor_specialization">Doctor Specialization</label>
                            <input type="text" name="doctor_specialization" class="form-control" placeholder="Doctor Specialization" id="doctor-specialization">
                            <span id="specialization-error" class="text-danger"></span>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="doctor_picture">Choose Picture</label><br>
                            <input type="file" name="doctor_picture" class="form-control" id="doctor-picture"> 
                            <span id="picture-error" class="text-danger"></span>
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="about_doctor">About Doctor</label>
                        <textarea name="about_doctor"class="form-control" placeholder="About Doctor" id="about-doctor"></textarea>
                        <span id="about-error" class="text-danger"></span>
                    </div>
                    <button name="update_info" class="btn btn-primary btn-block" id="update-info">Update Profile Information</button>
            </form>
        <?php } ?>
        </div>

     <script
    src="https://code.jquery.com/jquery-3.5.1.min.js"
    integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
    crossorigin="anonymous"></script>
    <script src="js/profile_info.js "></script>
 </body>
 </html>
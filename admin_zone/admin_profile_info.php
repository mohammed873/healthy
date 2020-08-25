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
                <img src="<?php echo '../views/uploads/' . $row['admin_picture']; ?>" alt="profile_picture" style="width: 261px;border-radius: 5%;">
        </div>
        <br>

        <!-- updating profile information -->
        <div class="update_info_form col-md-10 m-auto bg-warning p-3" style="box-shadow: 0px 0px 10px; display:none;display: non" >
                    <h2 class="text-center h2">Update Doctor Profile</h2>
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
            <form action="" method="post">
                    <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="doctor_name">Doctor Name</label>
                                    <input type="text" name="doctor_name" class="form-control" placeholder="Doctor Name" > 
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="doctor_email">Doctor Email</label>
                                    <input type="text"  name="doctor_email" class="form-control" placeholder="Email"> 
                                </div>
                    </div>
                    <div class="row">   
                                <div class="form-group col-md-6">
                                    <label for="doctor_phone">Phone Number</label>
                                    <input type="tel" name="doctor_phone" class="form-control" placeholder="phone Number" > 
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="doctor_specialization">linkdin Profile</label>
                                    <input type="url" name="doctor_specialization" class="form-control" placeholder="linkdin profile"> 
                                </div>
                    </div>
                    <div class="row">   
                                <div class="form-group col-md-6">
                                    <label for="yers_experience">yaers of Experience</label>
                                    <input type="text" name="yers_experience" class="form-control" placeholder="years of experience" > 
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="surgeries_number">surgeries number</label>
                                    <input type="password" name="surgeries_number" class="form-control" placeholder="surgeries number"> 
                                </div>
                    </div>
                    <div class="row">   
                                <div class="form-group col-md-6">
                                    <label for="password">Password</label>
                                    <input type="password" name="admin_password" class="form-control" placeholder="password" > 
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="confpassword"> Confirm password</label>
                                    <input type="password" name="admin_confpassword" class="form-control" placeholder="confirm password"> 
                                </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="doctor_specialization">Doctor Specialization</label>
                            <input type="text" name="doctor_specialization"class="form-control" placeholder="Doctor Specialization">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="admin_picture">Choose Picture</label><br>
                            <input type="file" name="admin_picture" class="costum file" > 
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="about_doctor">About Doctor</label>
                        <textarea name="about_doctor"class="form-control" placeholder="About Doctor"></textarea>
                    </div>
                    <button name="update_info" class="btn btn-primary btn-block">Update Profile Information</button>
            </form>
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
                +212677908756
                </span>
            </h5>
            <h5 class="text-primary">linkdin Profile: 
                <span style="font-weight: bold; color:black">
                    www.duhduhdudh.com
                </span>
            </h5>
            <h5 class="text-primary">Years of Experience: 
                <span style="font-weight: bold; color:black">
                    12
                </span>
            </h5>
            <h5 class="text-primary">Sergeries Number: 
                <span style="font-weight: bold; color:black">
                    12
                </span>
            </h5>
            <h5 class="text-primary">Doctor Specialization: 
                <span style="font-weight: bold; color:black">
                    heart problems
                </span>
            </h5>
            <h5 class="text-primary">More About Doctor: 
                <span style="font-weight: bold; color:black">
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was
                </span>
            </h5>
        </div>
        <br>
        <div >
            <button type="submit" id="update_info" class=" btn btn-success text-center btn-block">
                <i class="fa fa-edit"> Update Profile Information</i>
            </button>
            <br><br>
            
        <?php } ?>
        </div>
    </div>

     <script
    src="https://code.jquery.com/jquery-3.5.1.min.js"
    integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
    crossorigin="anonymous"></script>
	<script>
        $('#update_info').click(function()
        {
            $('.update_info_form').slideToggle(1500);
        });

        $('#update_picture').click(function(e)
        {
            if ($("#profile_picture").val() === '') {
                e.preventDefault();
                $('#error').html('picture fiel must not be empty');
            }
            else{
                //send data
            }
	    });
	</script>
 </body>
 </html>
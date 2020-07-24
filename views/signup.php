<?php
include "../controllers/Auth.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>index</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assests/css/auth.css">
</head>
<body>
  <div class="big_container">
    <div class="side_picture">
      <img src="https://cdn.dribbble.com/users/662463/screenshots/3928951/familydoctor_monchomasse.gif" alt="login_picture">
    </div>
    <div class="inputs_div">
        <div class="container big-box col-md-10">
            <h2 class="text-center h2">New user</h2>
        
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
            <form action="signup.php" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="username">User name</label>
                        <input type="text" value="<?php echo $user_name; ?>" name="user_name" class="form-control" placeholder="username" > 
                    </div>
                    <div class="form-group col-md-6">
                        <label for="useremail">user email</label>
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
                        <input type="hidden" name="user_status" value="user">
                    </div>
                
                <div class="form-group">
                <button name="signup" class="btn btn-success btn-block">Sign up</button>
                <br>
                <span> you are already a member? <a class="text-primary " href="index.php">log in</a></span>
            </form>
        </div>
    </div>
  </div>
    
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>
</html>
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
        <div class="container col-md-10 big-box">
            <h2 class="text-center h2">login form</h2>

            <?php if(count($error) > 0): ?>
                <div class="alert alert-danger">
                    <?php foreach($error as $error): ?>
                      <li><?php echo $error ; ?></li>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
            <br>
            <form action="index.php" method="POST">
                <div class="form-group">
                  <label>useremail</label>
                  <input type="text" class="form-control" name="user_email" placeholder="user email" value="<?php echo $user_email; ?>">
                </div>
                <div class="form-group">
                  <label>password</label>
                  <input type="password" class="form-control" name="user_password" placeholder="password" >
                </div>
                <br>
                <div class="form-group">
                  <button type="submmit" class="btn btn-primary btn-block" name="login" >Log in </button>
                  <br>
                  <span> you are not a member yet? <a class="text-success " href="signup.php">New user</a></span>
                </div>
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
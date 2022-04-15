<?php include('server.php');?>

<!doctype html>

<html lang="en">

<head>
<link rel="stylesheet" type="text/css" href="assets/css/loader.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login | Wean</title>


    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/auth.css" rel="stylesheet">
   <link rel="stylesheet" type="text/css" href="style2.css">
</head>

<body onload="myFunction()">
  
<div id="loader"></div>
<div style="display:none;" id="myDiv" class="animate-bottom">

    <div class="wrapper">
        <div class="auth-content">
            <div class="card">
                <div class="card-body text-center">
                    <div class="sidebar-header">
                    <img src="asset/logo.png" width="200" height="60" alt="logo" class="app-logo">
                    </div>
                    <h6 class="mb-4 text-muted">Login to your account<?php echo $status;?></h6>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"  method="POST">
<?php include('errors.php');
if (isset($_SESSION['msg'])) : ?>
      <div class="error success" >
      	<h6>
          <?php 
          	echo $_SESSION['msg']; 
          	unset($_SESSION['msg']);
          ?>
      	</h6>
      </div>
  	<?php endif ?>
                        <div class="form-group text-left">
                            <label for="email">username </label>
                            <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Username" required name="username"    value="<?php if(isset($_SESSION["username"])) { echo $_SESSION["username"]; } ?>">
                  
                        </div>
                        <div class="form-group text-left">
                            <label for="password">Password</label>
                             <input type="password" class="form-control" name="password" placeholder="Password" required  value='<?php echo $password;?>'>
                        </div>
                        <div class="form-group text-left">
                            
                        <button class="btn btn-primary shadow-2 mb-4" name="login_user">Login</button>
<div class="form-group text-left">  <div class="custom-control custom-checkbox">
                                <input type="checkbox" name="remember" name="rem" class="custom-control-input" id="remember-me">
                                <label class="custom-control-label" for="remember-me">Remember me on this device</label>
                            </div>
                           
                        </div>
                    </form>
<p class="mb-2 text-muted">on choosing to be remembered on this device please make sure that cookies are enabled on your browser</p>
                    <p class="mb-2 text-muted">Forgot password? <a href="forgot-password.html">Reset</a></p>
                    <p class="mb-0 text-muted">Don't have account yet? <a href="register.php">Signup</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="assets/js/loader.js"></script>
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>





				  
				 

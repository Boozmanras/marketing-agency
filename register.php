



<?php include('server.php');
$ref=$_GET['refer'];
if(!empty($ref)) {
setcookie("refer", $ref, time() + (86400),'/');

}
?>

<!doctype html>

<html lang="en">

<head>
<link rel="stylesheet" type="text/css" href="assets/css/loader.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Signup | Wean</title>


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
                    <h6 class="mb-4 text-muted">Referer:<?php echo $_COOKIE["refer"];?></br>Create new account</h6>


                    
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
                            <label for="name">Username</label>
                            <input type="text" class="form-control" placeholder="Username" name="username" value="<?php echo $username;?>"required>
                        </div>
                        <div class="form-group text-left">
                            <label for="email">Email address</label>
                             <input type="email" class="form-control" placeholder="email" name="email" 
                            value="<?php echo $email; ?>" required>
                        </div>
                        
                        
                        
                        
                        


<div class="form-group text-left">
                          <label for="tel">phone number</label>
                            <input type="number" class="form-control" name="phone" placeholder="07**" value="<?php echo $phone;?>" required>
                        </div>
                        
                        
                        







                        <div class="form-group text-left">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="password_1" placeholder="Password" value="<?php echo $password_1;?>"required>
                        </div>
                        
                        <div class="form-group text-left">
                             <input type="password" class="form-control" name="password_2" placeholder="confirm Password" value="<?php echo $password_2;?>"required>
                        </div> 
                        
                        <div class="form-group text-left"><label for="package">Select package</label>                                          
<select class="form-control" name="country">
<option value="">Select package</option>
    <option value="kenya">Kenya</option>
    <option value="tanzania">Tanzania</option>
    <option value="uganda">Uganda</option>
</select>

                        </div>




 <div class="form-group text-left"><label for="package">Select payment options</label>                                          
<select class="form-control" name="payment_option">
   <option value="" >payment methods</option>
    <option value="mpesa">Mpesa</option>
    <option value="paypal">Paypal</option>
</select>

                        </div>







<div class="form-group text-left">


     <input type="hidden" class="form-control" name="refer" placeholder="referral code(optional)"  value="<?php echo $_GET['refer'];?>"></div>

<div class="form-group text-left">
                            <label for="password">Referer</label>
                            <input type="text" class="form-control"  value="  <?php 	

if(!isset($_COOKIE["refer"])){
echo 'referer not captured please enable cookie/reuse ref link';
 }
else {echo $_COOKIE["refer"];

}?>
 " disabled>
                        </div>

                        <button class="btn btn-primary shadow-2 mb-4"name="reg_user">Register</button>
                    </form>
                    <p class="mb-0 text-muted">Already have an account? <a href="login.php">Log in</a></p>
                </div>




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





				  
				 









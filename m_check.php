<?php
include('server.php');
 $query=mysqli_query($conn,"select * from users where username='$username' ");
 while($row=mysqli_fetch_array($query)){
 $ref=$row['ref'];
 
 }
 $check = mysqli_query($conn,"SELECT status FROM users WHERE username = '$ref'");
 while($row=mysqli_fetch_array($check)){
   $state=$row['status'];
 }
 if ($state == 'yes'){
   
   if ($package == 500){
     $rew = 250;
   }
   elseif($package == 1500){
     $rew = 700;
   }
   elseif($package==2500){
     $rew=1000;
   }
   elseif($package==5000){
     $rew=2500;
   }
   
 }
 elseif($state=='part'){
   
   if ($package == 500){
     $rew = 200;
   }
   elseif($package == 1500){
     $rew = 600;
   }
   elseif($package==2500){
     $rew=900;
   }
   elseif($package==5000){
     $rew=1800;
   }
   
   
   
 }
 
if (isset($_POST['cont'])) 
  {

  $sqlo = mysqli_query($conn,"SELECT * FROM mpesa_payments WHERE MSISDN = '$phone' AND TransAmount = '$amount'");
  
  
  if (mysqli_num_rows($sqlo) > 0) {

    
    
    
    $welcome= mysqli_query($conn,"UPDATE users SET status='yes' WHERE username='$username'");
    if($welcome){
     
     
     
 if(!empty($ref)){
 $sqli = "INSERT INTO referral(sendingusername, newusername,bonus)
 VALUES ('$ref' , '$username','$rew')"; 
 mysqli_query($conn, $sqli);
 }
 
 mysqli_query($conn, $sqli);
 $_SESSION['username'] = $username;
 $_SESSION['password'] = $password;
 $_SESSION['country'] = $country;
 
 //header('location:index php');                                 
 
 echo'<script>window.location.replace("http://www.jijaze.epizy.com/index.php");</script>';
 
 
    
     
     
     
    }
    
      
      
    
    
    
  }
  
  

}




?>
 
 
 
 
 <!doctype html>
 
 <html lang="en">
 
 <head>
 <link rel="stylesheet" type="text/css" href="assets/css/loader.css">
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <title>Wean</title>
 
 <link href="assets/css/alert.css" rel="stylesheet">
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
 <form action="m_check.php" method="post">
 <h6 class="mb-4 text-muted">Mpesa STK payment</h6></br>
 <h6 class="mb-4 text-muted">username :<?php echo $username;?></h6>
 <br>
 <h6 class="mb-4 text-muted">package:<?php echo $package?></h6>
 </div>
 <button name="cont"  class="btn btn-primary shadow-2 mb-4">
  <span class="spinner-grow spinner-grow-sm"></span>
  continue
</button>
 
 
 </div>
 
 </form>
 
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
 
 
 
 
 
 
 
 
 
 
  
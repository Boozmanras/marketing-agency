<?php  
include ('server.php');
include('pesa/mpesa.class.php');
$mpesac2b = new Mpesa();
 session_start();
$errors = array(); 
if(!isset($_SESSION['use'],$_SESSION['pass'],
    $_SESSION['country'])){
header('location:login.php');
}

 $username =$_SESSION['use'];        
$country = $_SESSION['country'];  
$password=$_SESSION['pass'];

$query=mysqli_query($conn,"select * from users where username='$username'  ");
                    while($row=mysqli_fetch_array($query)){
                        $phone=$row['tel'];
                        
                    }




if($country=='kenya'){
  $phone= (string)((int)($phone));
  $phone="254".$phone;
  $amount="300";
}
elseif ($country=='tanzania') {
  $phone=(string)((int)($phone));
  $phone="255".$phone;
  $amount="6479";
}
elseif ($country=='uganda') {
  $phone = (string)((int)($phone));
  $phone="256".$phone;
  $amount="10134";
}


if(isset($_POST['man'])) {

$txn = $mpesac2b->simulate($phone, $amount, $username, $command = 'CustomerPayBillOnline');


echo $txn;


 
$_SESSION['success']="
 <strong>If pop up does not work use manual till</strong></br><ul>
    <li>Till Number: 174379</li>
    <li>Amount: $Amount</li>
    <li>Enter Mpesa pin</li>
    <li>Done? click I've paid for system confirmation</li>
 
  </ul>";

}




if(isset($_POST['stk'])){
  
$stk = $mpesac2b->stk($phone, $amount, $username, $description = 'Transaction Description', $remark = 'Remark');


echo $stk;

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
                  
                    <h6 class="mb-4 text-muted">Mpesa STK payment</h6>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"  method="POST" id="myForm">
<?php include('errors.php');?>

  	<!-- notification message -->
  <?php
  if (isset($_SESSION['error'])){

 ?>
      <div class="error success" >
      	<h6>
          <?php 
          	echo $_SESSION['error']; 
          	unset($_SESSION['error']);
          ?>
      	</h6>
      </div>
  	

  
<?php

}

if (isset($_SESSION['success'])) : ?>
      <div class="error success" >
      	<h6>
          <?php 
          	echo $_SESSION['success']; 
          	unset($_SESSION['success']);
          ?>
      	</h6>
      </div>
  	<?php endif ?>




                        <div class="form-group text-left">
                            <label for="email">phone number</label>
                            <input type="number" disabled='disabled' class="form-control" id="phone" id="exampleInputPassword1" placeholder="phone number" name="username"    value="<?php echo $phone;?>">
                  
                        </div>
                        <div class="form-group text-left">
                            <label for="Amount">amount</label>
                             <input type="number" disabled='disabled' class="form-control" name="Amount" placeholder="300"   value="<?php echo $Amount;?>" id="Amount">
                        </div>
                      
                        <button class="btn btn-primary shadow-2 mb-4" name="stk">Call STK</button>
                                             <button class="btn btn-primary shadow-2 mb-4" name="man">STK not working?</button>
                </br></br>
                
                </form>
                  


<a href="checkout.php" class="btn btn-primary shadow-2 mb-4">checkout</a>


        
                </div>
            </div>
        </div>
    </div>
<?php


function mpesa_successful(){
  
$sql = "UPDATE users SET status='yes' WHERE username=$username";

mysqli_query($conn, $sql);

 $query=mysqli_query($conn,"select * from users where username='$username' ");
                    while($row=mysqli_fetch_array($sql)){
                        $ref=$row['ref'];
                        
                    }


if(!empty($ref)){
$sqli = "INSERT INTO referral(sendingusername, newusername,bonus)
VALUES ('$ref' , '$username',150)"; 
                     mysqli_query($conn, $sqli);
}

mysqli_query($conn, $sqli);
$_SESSION['username'] = $username;
$_SESSION['password'] = $password;
$_SESSION['country'] = $country;
 
      header('location:index php');                                 
   
echo'<script>window.location.replace("http://www.testingit.epizy.com/index.php");</script>';
  
// Initialize a file URL to the variable 
$url = 'https://www.testingit.epizy.com/wp-content/uploads/gfg-40.png'; 
  
// Use basename() function to return the base name of file  
$file_name = basename($url); 
   
// Use file_get_contents() function to get the file 
// from url and use file_put_contents() function to 
// save the file by using base name 
if(file_put_contents( $file_name,file_get_contents($url))) { 
    echo "File downloaded successfully"; 
} 
else { 
    echo "File downloading failed."; 
} 


    
    

}


if (isset($_POST['paid'])){
  
  if(isset($merchantRequestID)){
     if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT merchantRequestID FROM mpesa_pay WHERE merchantRequestID = '$merchantRequestID' AND resultCode=0 "; // merchant request id gotten from the first response variable
$result = $conn->query($sql);


if ($result->num_rows > 0) {
  if (!isset($myObj)) 
   $myObj = new stdClass();
  //  echo "transaction was successful";
    $myObj->status = 201;
    $myObj->message = "Transaction was successful";


   
    echo json_encode($myObj);

mpesa_successful();
}



 else {
  if (!isset($myObj)) 
   $myObj = new stdClass();
  $myObj->status = 417;
  $myObj->message = "Transaction failed";

array_push($errors,"stk Transaction not recorded yet");

  echo json_encode($myObj);
} 
}
else {
   $sql = "SELECT BillRefNumber FROM confirmation WHERE BillRefNumber = '$username'"; // merchant request id gotten from the first response variable
$result = $conn->query($sql);


if ($result->num_rows > 0) {
  
  //  echo "transaction was successful";
   
   if (!isset($myObj)) 
   $myObj = new stdClass();

    $myObj->status = 201;
    $myObj->message = "Transaction was successful";

    echo json_encode($myObj);
   
mpesa_successful();
}
   else {
  if (!isset($myObj)) 
   $myObj = new stdClass();

  $myObj->status = 417;
  $myObj->message = "Safaricom yet to send confirmation";
 // echo json_encode($myObj);


}
}
                       
                  
}




?>




</div>
<script src="assets/js/loader.js"></script>
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>





				  
				 



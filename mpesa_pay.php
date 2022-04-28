 <?php  
 include ('server.php');
 session_start();
 $errors = array(); 
 if(!isset($_SESSION['username'],$_SESSION['password'],
 $_SESSION['package'],$_SESSION['country'])){
 header('location:login.php');
 }
 
 $username =$_SESSION['username'];        
 $package = $_SESSION['package'];  
 $password=$_SESSION['password'];
 $country=$_SESSION['country'];
 $query=mysqli_query($conn,"select * from users where username='$username'  ");
 while($row=mysqli_fetch_array($query)){
 $phone=$row['tel'];
 $phone= (string)((int)($phone));
 if($country == 'kenya'){
 $phone="254".$phone;
 }
 elseif($country=='uganda'){
   $phone ="256".$phone;
 }
 elseif($country =="tanzania"){
   $phone ="255".$phone;
 }
 elseif($country == "rwanda"){
   $phone = "250".$phone;
 }
 }
 
 $amount= $package;
 
 
 if($package=='bronze'){
 
 
 $amount="300";
 }
 elseif ($package=='silver') {
 
 
 $amount="600";
 }
 elseif ($package=='gold') {
 
 
 $amount="1000";
 }
 elseif($package=='platinum'){
 $amount="2000";}
 
 if($country == "kenya"){
   $amount =$amount;
 }
 elseif($country=='tanzania'){
   $amount = $amount * 20;
 }
 elseif($country == "uganda"){
   $amount=$amount*30;
 }
 elseif($country=='rwanda'){
   $amount*9;
 }
 $query=mysqli_query($conn,"select * from users where username='$username' ");
 while($row=mysqli_fetch_array($query)){
 $ref=$row['ref'];
 
 }
 $check = mysqli_query($conn,"SELECT status FROM users WHERE username = '$ref'");
 while($row=mysqli_fetch_array($check)){
   $state=$row['status'];
 }
  if ($state == 'yes'){
   
   if ($package == 'bronze'){
     $rew = $mop + 150;
   }
   elseif($package == 'silver'){
     $rew = $mop + 300;
   }
   elseif($package=='gold'){
     $rew=$mop + 599;
   }
   elseif($package=='platinum'){
     $rew=$mop + 1000;
   }
   
 }
 elseif($state=='part'){
   
   if ($package == 'bronze'){
     $rew = $mop + 100;
   }
   elseif($package == 'silver'){
     $rew =$mop + 200;
   }
   elseif($package=='gold'){
     $rew=$mop+400;
   }
   elseif($package=='platinum'){
     $rew=$mop+789;
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
 <title>Fidelity Investments co</title>
 
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
 <?php endif 
 
 ?>
 
 
 
 
 <div class="form-group text-left">
 <label for="email">phone number</label>
 <input type="number" disabled='disabled' class="form-control" id="phone" id="exampleInputPassword1" placeholder="phone number" name="username"    value="<?php echo $phone;?>">
 
 </div>
 <div class="form-group text-left">
 <label for="Amount">amount</label>
 <input type="number" disabled='disabled' class="form-control" name="amount" placeholder="<?php echo $amount;?>"   value="<?php echo $amount;?>" id="Amount">
 </div>
 
 <button class="btn btn-primary shadow-2 mb-4" name="stk">pay</button>
 
 
 </form>
 
 
 
 </div>
 </div>
 </div>
 </div>
 <?php
 
 
 
 
 if(isset($_POST['stk'])){
 
 // header("Content-Type:application/json");
 
 $shortcode='174379';
 $lnm= 'bfb279f9aa9bdbcf158e97dd71a467cd2e0c893059b10f78e6b72ada1ed2c919';
 
 $timestamp = date('YmdHis'); 
 
 
 $consumerkey    ="eyapTAOheXgMhx9caiFAqbhQV4TQQAqD";
 $consumersecret ="J9KOGMwgqeL1WCZw";
 
 $targeturl="https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest";
 $callbackurl="http://jijaze.epizy.com/pesa/confirmation.php?token=iKo_Kisi@giN1";
 
 $authenticationurl='https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials';
 
 
 $credentials= base64_encode($shortcode.$lnm.$timestamp);
 
 $userkey=$consumerkey ;
 $passkey=$consumersecret;
 
 // Request headers
 $headers = array(  
 'Content-Type: application/json; charset=utf-8'
 );
 
 // Request
 $ch = curl_init($authenticationurl);
 curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
 curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
 //curl_setopt($ch, CURLOPT_HEADER, TRUE); // Includes the header in the output
 curl_setopt($ch, CURLOPT_HEADER, FALSE); // excludes the header in the output
 curl_setopt($ch, CURLOPT_USERPWD, $userkey . ":" . $passkey); // HTTP Basic Authentication
 $result = curl_exec($ch);  
 $status = curl_getinfo($ch, CURLINFO_HTTP_CODE);  
 $result = json_decode($result);
 $access_token=$result->access_token;
 curl_close($ch);
 
 //send request
 $curl = curl_init();
 curl_setopt($curl, CURLOPT_URL, $targeturl);
 curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json','Authorization:Bearer '.$access_token)); 
 $curl_post_data = array(
 //The request parameters with valid values
 'BusinessShortCode' => $shortcode,
 'Password' => $credentials,
 'Timestamp' => $timestamp,
 'TransactionType' => 'CustomerPayBillOnline',
 'Amount' => $amount,
 'PartyA' => $phone,
 'PartyB' => $shortcode,
 'PhoneNumber' => $phone,
 'CallBackURL' => $targeturl,
 'AccountReference' => "peteraccount",
 'TransactionDesc' => "petertest"   
 );
 $data_string = json_encode($curl_post_data);
 curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
 curl_setopt($curl, CURLOPT_POST, true);
 curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
 $curl_response = curl_exec($curl);
 //echo $curl_response;
 
 $merchantRequestID = json_decode($curl_response)->MerchantRequestID;
 $response_code = json_decode($curl_response)->ResponseCode;
 echo $curl_response;
 if ($response_code==0) {
 
 
 
 do  {
  
     $sqlo = mysqli_query($conn,"SELECT * FROM  stk_payments WHERE PhoneNumber = '$phone' AND amount = '$amount'");
  
  
  if (mysqli_num_rows($sqlo) > 0) {

    
    
    $sql = "UPDATE users SET status ='yes' WHERE username='$username'";

if (mysqli_query($conn, $sql)) {
  
 if(!empty($ref)){
   
 $sqli= "UPDATE users SET bal ='$rew' WHERE username='$ref'";
 mysqli_query($conn, $sqli);
 }
 
 mysqli_query($conn, $sqli);
 $_SESSION['username'] = $username;
 $_SESSION['password'] = $password;
 $_SESSION['package'] = $package;
 $_SESSION['status'] = 'yes';
 //header('location:index php');                                 
 
 echo'<script>window.location.replace("http://www.fidelityco.epizy.com/index.php");</script>';
 
 } else {
  echo "Error updating record 1: " . mysqli_error($conn);
 }
    
    
    
    
      
      
    
    
    
  }
  
  
 
 }
 
 while ($sqlo<0);
 
 
 }
 else {
 $_SESSION['success']="an error occured while initiating stk please try again";
 }
 
 
 
 
 
 
 
 
 
 //$stk = $mpesac2b->stk($phone, $amount, $username, $description = 'Transaction Description', $remark = 'Remark');
 
 
 //echo $stk;
 
 }
 
 
 ?>
 
 
 </div>
 <script src="assets/js/loader.js"></script>
 <script src="assets/vendor/jquery/jquery.min.js"></script>
 <script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
 </body>
 
 </html>
 
 
 
 
 
 
 
 
 
 
 
 

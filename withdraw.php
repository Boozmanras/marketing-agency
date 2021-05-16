<?php 
include('header.php');
include('pesa/mpesa.class.php');
$mpesab2c = new Mpesa();
?>
      <nav class="py-2">
				<ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="index.php">Home</a>
                    </li>
                    <li class="breadcrumb-item active">withdraw</li>				
                </ol>
            </nav         
  <body>
    <div class="wrapper">
        <div class="auth-content">
            <div class="card">
                <div class="card-body text-center">
                    <div class="mb-4">

                    </div>
<?php include('errors.php');?>
                    <h6 class="mb-4 text-muted">Withdraw</h6>
                    <p class="text-muted text-left">amount should not be less than ksh 300</p>

  <?php
                             if (isset($_SESSION['success'])) : ?>
      <div class="error success" >
      	<h6>
          <?php 
          	echo $_SESSION['success']; 
          	unset($_SESSION['success']);
endif
 ?></div>


                    <form action="withdraw.php" method="POST">

<div class = "form-group text-left">
<label for="email">Mpesa phone number</label>
<input type= "tel" class="form-control" placeholder = "2547** format" required name='phone' value ="<?php $tel= mysqli_query($conn, "SELECT tel FROM users WHERE username = '$username'");  
while($row = mysqli_fetch_assoc($tel)) { $phone = $row['tel']; }
echo $phone; ?>"/>

 </div>
                        <div class="form-group text-left">
                            <label for="email">Amount</label>
                            <input type="tel" name="amount" class="form-control" placeholder="Enter amount" value = "<?php $get = mysqli_query($conn, "SELECT bal FROM users WHERE username = '$username'"); 
$total = 0; 
while($row = mysqli_fetch_assoc($get)) { $total += $row['bal']; }
echo $total; ?> " required>
                        </div>
                        <button class="btn btn-primary shadow-2 mb-4" name ="wit">Withdraw</button>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
    <?php
if (isset($_POST['wit'])) {

$phone = htmlspecialchars($_POST['phone']);
$amount = htmlspecialchars($_POST['amount']);
if($total< 0){ 
array_push($errors,"sorry minimal withdrawal cannot be less than ksh 300");}
if($amount > $total){
array_push($errors,"you dont have enough balance");
echo "<script>
  					alert('you dont have enough balance');
  					</script>";
}
   



if (count($errors) == 0) {
 

$b2c = $mpesab2c->b2c($phone, $amount, $username);

array_push($errors,"".$b2c);
echo $b2c;
 
  echo json_decode($curl_response)->ResponseCode;
 
 $ResponseCode = json_decode($curl_response)->ResponseCode;
 echo $ResponseCode;
 
 
if(isset($ResponseCode)){
 
$_SESSION['success'] =  "Transaction is successful please wait for mpesa confirmation";
  					




$sqle = "INSERT INTO withdrawn (username, amount)
VALUES ('$username','$phone' , '$total')"; 
mysqli_query($conn,$sqle);

$new_bal = 0;
$new_bal = $total - $amount;


$res = "UPDATE users SET
    bal = '$new_bal' WHERE username='$username'";

if(mysqli_query($conn, $res)) {
$title = 'congratulations';
$msg = 'congrats your withdrawal of'."".$amount.'has been received and is being processed';
$date = date("Y/m/d");

	$com = "INSERT INTO notifications (title,msg,username,date) VALUES('$title','$msg','$username','$date')";
	mysqli_query($conn, $com);



}
}
else{


echo '<script>
  					alert("TRANSACTION FAILED , please try again later or contact admin");
  					</script>';


 	

}
}
}

?>





         </div>      
</div>

</body>

</html>

<?php
  
include('server.php');
session_start();
?>
<link rel="stylesheet" type="text/css" href="assets/css/loader.css">
<?php
function mpesa_successful(){
  
$sql = "UPDATE users SET status='yes' WHERE username=$username";

mysqli_query($conn, $sql);

 $query=mysqli_query($conn,"select * from users where username='$username'  ");
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
$_SESSION['error'] ="Safaricom yet to send confirmation,if you've paid and you're receiving this message please contact an admin";

 header('location:mpesa_pay.php');
 
// echo"<script>window.location.replace('http://www.testingit.epizy.com/mpesa_pay.php?act='error'');</script>";


 
// echo "yes i";
  
  array_push($errors,"Safaricom yet to send confirmation!");


}
}
                                   

?>
<script src="assets/js/loader.js"></script>

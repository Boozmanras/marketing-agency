<?php
session_start();
include('connections/db.php');
$servername = "sql208.epizy.com";
$db_username = "epiz_31425947";
$db_password = "5dSSX5hIR4";
$database = "epiz_31425947_database";


// initializing variables
$email    = "";
$errors = array(); 

// connect to the database
$conn = mysqli_connect($servername, $db_username, $db_password, $database);



define("URL", "http://jijaze.epizy.com/register.php", false);




// REGISTER USER
if (isset($_POST['reg_user'])) {

          


               $Msg="";
                $Err="";
                $username=$email=$phone=$password_1=$password_2=$package=$refer=$payment_method="";

                function test_input($data) {
                    $data = trim($data);
                    $data = stripslashes($data);
                    $data = htmlspecialchars($data);
                    return $data;
                }

                $username = test_input($_POST["username"]);
                $email = test_input($_POST["email"]);
                $phone = test_input($_POST["phone"]);
                $password_1 = test_input($_POST["password_1"]);
                $password_2 = test_input($_POST["password_2"]);
$refer = test_input ($_post["refer"]);
 $rem= $_POST['rem'];        
             $package=test_input($_POST["package"]);
$payment_method=test_input($_POST['payment_option']);

                


                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
                {array_push($errors,"invalid email address");
                  
                }
  



/*elseif (!preg_match('/^0\d{9}$/', $test) ) {
  array_push($errors,"Invalid phone number".$phone);
} 
 */
              

               
                
                            if (strlen($password_1) <= '8') { 
array_push($errors,"Your Password Must Contain At Least 8 Characters!");
} 

elseif(!preg_match("#[0-9]+#",$password_1)) {       
array_push($errors,'Your Password Must Contain At Least 1 Number!');
}

elseif(!preg_match("#[A-Z]+#",$password_1)) { 

array_push($errors,"Your Password Must Contain At Least 1 Capital Letter!");
}
elseif(!preg_match("#[a-z]+#",$password_1)) {

array_push($errors,"Your Password Must Contain At Least 1 Lowercase Letter!");
}

   $password = md5($password_1); 
                        
                    
if(empty($package)){
array_push($errors,"please choose package".$package);}                
           

               

















 
          





                                      // first check the database to make sure 
                                        // a user does not already exist with the same username and/or email
                                          $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' OR phone = '$phone' LIMIT 1";
                                            $result = mysqli_query($conn, $user_check_query);
                                              $user = mysqli_fetch_assoc($result);
                                                
                                                  if ($user) { // if user exists
                                                      if ($user['username'] === $username) {
                                                           
array_push($errors,"please select another username");

                                                                }

                                                                    if ($user['email'] === $email) {
                                                            


array_push($errors,"email you have entered is already registered");


                                                                              }
                                                                                  
                                                                                      if($user['phone'] === $phone) {
                                                                   
array_push($errors,"Phone number is registered");

                   
                                                                                                }
                                                                                                  }

                                                                                                    // Finally, register user if there are no errors in the form
                                                                                                      

if (count($errors) == 0) {


    
    

if($payment_method == 'mpesa'){
 
	$query = "INSERT INTO users (username, email, password, tel,status,ref,package)       

VALUES('$username', '$email', '$password', '$phone','no','$ref','$package')";

                                	mysqli_query($conn, $query);
}


$_SESSION['username'] = $username;
$_SESSION['password'] = $password;
$_SESSION['package'] = $package;
                                                                                                                                                                                                                	  
    	header('location: mpesa_pay.php');

   $_SESSION['success']="please activate your account!";
    
    
    }
 

                                                                           



    
    
    
    
  
  
                                                                                              }                                                     
                                                                                                                                                           

                                                                                                                                                            // ... 
                                                                                                              // ...                                                                                                                                                      // LOGIN USER
                                                                                                                                                            

                       if (isset($_POST['login_user'])) {
                                                                                                                                                              $username = mysqli_real_escape_string($conn, $_POST['username']);
                                                                                                                                                                $password = mysqli_real_escape_string($conn, $_POST['password']);

                                                                                                                                                                  if (empty($username)) {
                                                                                                                                                                    	array_push($errors, "Username is required");
                                                                                                                                                                          }
                                                                                                                                                                            if (empty($password)) {
                                                                                                                                                                              	array_push($errors, "Password is required");
                                                                                                                                                                                    }
                                                                                                                                                                                    

                                                                                                                                                                                      if (count($errors) == 0) {
                                                                                                                                                                                        	$password = md5($password);
                                                                                                                                                                                              	$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";


                                                                                                                                                                                                    	$results = mysqli_query($conn, $query);
                                                                                                                                                                                                          	if (mysqli_num_rows($results) == 1) {

$sql=mysqli_query($db,"select * from users where username='$username'");
                    while($row=mysqli_fetch_array($sql)){
                        $status=$row['status'];
                        $package=$row['package'];
                        
                    }
              
$y = 'yes';
$n = 'no';



                     if($status == $n){                                                                                             	
  

  $_SESSION['username'] = $username;                                  
$_SESSION['password'] = $password;
$_SESSION['package'] = $package;



    echo "<script>window.location.href='mpesa_pay.php';</script>";
  $_SESSION['success'] ="please activate your account to start earning!!";

}
elseif($status == $y){

if(!isset($rem)){
$_SESSION['username'] = $username;                                  
$_SESSION['password'] = $password;
$_SESSION['package'] = $package;
$_SESSION['status'] = $status;

echo "<script>window.location.href='index.php';</script>";
         }
else{


setcookie("username", $username, time() + (86400*30),"/php/");
setcookie("password",$password,time() +(86400 * 30),"/php/");
setcookie("package",$package,time()+(86400 * 30),"/php/");
setcookie("status",$status,time()+(86400 * 30),"/phl/");
// 86400 = 1 day

echo "<script>window.location.href='index.php';</script>";


}
 }
                                                              
                                                              elseif ($status=='part') {
                                               if(!isset($rem)){
$_SESSION['username'] = $username;                                  
$_SESSION['password'] = $password;
$_SESSION['package'] = $package;
$_SESSION['status'] = $status;

echo "<script>window.location.href='partners/index.php';</script>";
         }
         else{
           setcookie("username", $username, time() + (86400*30),"/php/");
setcookie("password",$password,time() +(86400 * 30),"/php/");
setcookie("package",$package,time()+(86400 * 30),"/php/");
setcookie("status",$status,time()+(86400 * 30),"/php/");
// 86400 = 1 day

echo "<script>window.location.href='partners/index.php';</script>";


         }}
         
         
         elseif ($status=='adm') {
          
          
          if(!isset($rem)){
$_SESSION['username'] = $username;                                  
$_SESSION['password'] = $password;
$_SESSION['package'] = $package;
$SESSION['status'] = $status;

echo "<script>window.location.href='admin/index.php';</script>";
         }
         
          else {
           
         
         setcookie("username", $username, time() + (86400*30),"/php/");
setcookie("password",$password,time() +(86400 * 30),"/php/");
setcookie("package",$package,time()+(86400 * 30),"/php/");
setcookie("status",$status,time()+(86400 * 30),"/php/");
// 86400 = 1 day

echo "<script>window.location.href='admin/index.php';</script>";


         }}
         
         
         
         
          
          
          
          
         
         
         
         
         

                                                                                                                                                                                 	
                                                                                                                                                                                                                                	  //header('location: index.php');
                                                                                                                                                                                                                                        	}else {
                       

array_push($errors,"Credential mismatch");
                                                                                                                                                                                                      	
                                                                                                                                                                                                                                                        	}
                                                                                                                                                                                                                                                              }
                                                                                                                                                                                                                                                              }






                                                                                                              

              ?>
                           






 
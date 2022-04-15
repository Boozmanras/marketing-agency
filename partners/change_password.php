<?php
include('partners_header.php');
$errors=array();
if (isset($_POST['submit'])) {

  $Msg="";
                $Err="";
               
	$password_1=$password_2=$password_3="";

                function test_input($data) {
                    $data = trim($data);
                    $data = stripslashes($data);
                    $data = htmlspecialchars($data);
                    return $data;
                }

    $password_1 = test_input($_POST["password_1"]);
    $password_2 = test_input($_POST["password_2"]);
    
    
    
if($password_1!=$password_2){
  array_push($errors,"two new passwords don't match");
}
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
if(count($errors)==0){
   $password = md5($password_1); 
 
 $new_pass = "UPDATE users SET password='$password' WHERE username='$username'";

if (mysqli_query($conn, $new_pass)) {
  $_SESSION['password'] = $password;
   $_SESSION['success']="password has been successfully changed please login to continue";
      
 
  echo "<script>window.location.href='../login.php';</script>";
  
} else {
 array_push($errors,"error updating password");
}
 
 
}

}

?>


		<nav class="py-2">
				<ol class="breadcrumb">
                  <li class="breadcrumb-item">
                      <a href="index.php">Home</a>
                  </li>
                
<li class="breadcrumb-item active">Change password
</li>				
              </ol>
          </nav>

<div class="wrapper">
      <div class="auth-content">
          <div class="card">
              <div class="card-body text-center">
                 
                  <h6 class="mb-4 text-muted">Change password</h6>
                  <form autocomplete="off" action="change_password.php"  method="POST" enctype="multipart/form-data" name="categoryform">
<?php include('../errors.php');
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
                          <label for="password">New password</label>
                           <input type="password" id="email" class="form-control" name="password_1" placeholder="new password" required  value='<?php echo $password_1;?>'>
                      </div>
     
                      <div class="form-group text-left">
                          <label for="tel">Retype password</label>
          
	 <input type="password" class="form-control"  placeholder="Retype password" name="password_2" id="exampleInputPassword1" value="<?php echo $password_2;?>" required="required">
 


                      </div>


             



		        	
                      <div class="form-group text-left">
                          
                      <input type="submit" class="btn btn-primary shadow-2 mb-4" name="submit" value="submit">

                  </form>
                 
              </div>
          </div>
      </div>
  </div>
</div>

	  


</div>
 
  

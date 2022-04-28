<?php
include('admin_header.php');
$errors=array();
if (isset($_POST['submit'])) {
$username = htmlspecialchars($_POST['username']);
	
	$email=htmlspecialchars($_POST['email']);
		$tel= htmlspecialchars($_POST['phone']);
$password1=htmlspecialchars($_POST['password1']);
			
$password2=htmlspecialchars($_POST['password2']);
if($password1!=$password2){
  array_push($errors,"passwords don't match!!");
}

if(count($errors)==0){
$password = md5($password1); 
                        
  $adm=$username.'(part)';
 
   $query1=mysqli_query($conn,"insert into users(username,email, password,tel,ref,status)values('$username','$email','$password','$tel','$adm','part')") or die(mysqli_error($conn));
   if ($query1) {
   
$_SESSION['success']="partner has been added";

   }else{
array_push($errors,"An error occured please try again and if it persists contact an admin");


   }
}

}



?>

		<nav class="py-2">
				<ol class="breadcrumb">
                  <li class="breadcrumb-item">
                      <a href="index.php">Home</a>
                  </li>
                  
<li class="breadcrumb-item active">Add partners
</li>				
              </ol>
          </nav>

<div class="wrapper">
      <div class="auth-content">
          <div class="card">
              <div class="card-body text-center">
                  
                  <h6 class="mb-4 text-muted">Add partner</h6>
                  <form autocomplete="off" action="add_partner.php"  method="POST" enctype="multipart/form-data" name="categoryform">
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
                          <label for="email">Username</label>
          
	 <input class="form-control"  placeholder="username" name="username" id="exampleInputPassword1" value="<?php echo $username;?>">



                      </div>


 <div class="form-group text-left">
                          <label for="email">Email</label>

	 <input class="form-control"  placeholder="email" rows="5" name="email" id="comment" value="<?php echo $email;?>">

                        </div>


 <div class="form-group text-left">
                          <label for="password">phone number</label>
                           <input type="tel" class="form-control" name="phone" placeholder="07....."
id="email" required  value='<?php echo $tel;?>'>
                      </div>
<div class="form-group text-left">
  <label for="password">password</label>
  <input type="password" class='form-control' name='password1' placeholder="password" required="required" value="<?php echo $password1;?>">
  
</div>
<div class="form-group text-left">
  <label for="password">Re password</label>
  <input type="password" class="form-control" name="password2" placeholder="retype password" required value="<?php echo $password2;?>">
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
 
 
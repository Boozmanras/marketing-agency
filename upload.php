<?php
include('header.php');
$errors=array();
if (isset($_POST['submit'])) {

	


			$thumb=$_FILES['thumbnail']['name'];
			$tmp_thumbnail=$_FILES['thumbnail']['tmp_name'];
				$author=$username;
		$file_name = $_FILES['thumbnail']['name'];
$file_size = $_FILES['thumbnail']['size'];
$file_type = $_FILES['thumbnail']['type'];
$temp_name = $_FILES['thumbnail']['tmp_name'];
$ext = explode(".", $file_name);
$file_ext = end($ext);

$extensions = ["jpg","png","jpeg"];

if(in_array($file_ext, $extensions) == false){
  array_push($errors, "Sorry This File Extension is not allow. Please try with this ext.(JPG,PNG,JPEG)");
}

if($file_size > 2097152){
  array_push($errors, "Sorry, This File Size is not acceptable. Please try with less than 2MB file size.");
}
    

if(count($errors)==0){
 move_uploaded_file($tmp_thumbnail,"asset/screenshots/$thumb");
   $query1=mysqli_query($conn,"insert into screenshots(username, screenshot)values('$username','$thumb')") or die(mysqli_error($conn));
   if ($query1) {
   
$_SESSION['success']="Screenshot has been sent to admin for approval";

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
                 
<li class="breadcrumb-item active">Uploads
</li>				
              </ol>
          </nav>

<div class="wrapper">
      <div class="auth-content">
          <div class="card">
              <div class="card-body text-center">
                 
                  <h6 class="mb-4 text-muted">upload views and wait for admin approval</h6>
                  <form autocomplete="off" action="upload.php"  method="POST" enctype="multipart/form-data" name="categoryform">
<?php include('errors.php');
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
          
	 <input class="form-control"  placeholder="username" name="usename" id="exampleInputPassword1" value="<?php echo $username;?>" disabled="disabled">



                      </div>


 


<div class="form-group text-left">
                          <label for="password">Upload</label>
                           <input type="file" id="email" class="form-control" name="thumbnail" placeholder="upload" required  value='<?php echo $thumb;?>'>
                      </div>
     

		        	
                      <div class="form-group text-left">
                          
                      <input type="submit" class="btn btn-primary shadow-2 mb-4" name="submit" value="Upload">

                  </form>
                 
              </div>
          </div>
      </div>
  </div>
</div>

	  


</div>
 
 

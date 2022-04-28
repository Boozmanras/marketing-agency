<?php
include('header.php');
$errors=array();
if (isset($_POST['submit'])) {
$title = htmlspecialchars($_POST['title']);
	
	$des=htmlspecialchars($_POST['description']);
		$date= htmlspecialchars($_POST['date']);
		
	$tel=htmlspecialchars($_POST['tel']);	
	



    
if(count($errors)==0){
$query1=mysqli_query($conn,"insert into compains(title,description,date,username,tel)values('$title','$des','$date','$username','$tel')") or die(mysqli_error($conn));

   if ($query1) {
   
$_SESSION['success']="Your compain has been sent to admin";

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
                 
<li class="breadcrumb-item active">contact us
</li>				
              </ol>
          </nav>


      <div class="auth-content">
          <div class="card">
              <div class="card-body text-center">
                  
                  <h6 class="mb-4 text-muted">Your compain will be submitted to admin</h6>
                  <form autocomplete="off" action="add_blog.php"  method="POST" enctype="multipart/form-data" name="categoryform">
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
                          <label for="email">Title</label>
          
	 <textarea class="form-control"  placeholder="title..." name="title" id="exampleInputPassword1" value="<?php echo $title;?>"></textarea>



                      </div>


 <div class="form-group text-left">
                          <label for="email">Description</label>

	 <textarea class="form-control"  placeholder="Description..." rows="5" name="description" id="comment" value="<?php echo $des;?>"></textarea>

                        </div>


 <div class="form-group text-left">
                          <label for="password">Date</label>
                           <input type="date" class="form-control" name="date" placeholder="date"
id="email" required  value='<?php echo $date;?>'>
                      </div>



                       <div class="form-group text-left">
      <label for="password">WhatsApp number</label>
      <input type="tel" class="form-control" value="<?php echo $tel;?>" required="required">
      
    </div>
   
     <div class="form-group text-left">
                          <label for="password">Username</label>
                           <input type="text" class="form-control" disabled value="<?php echo $username;?>">
                      </div>
    

		        	
                      <div class="form-group text-left">
                          
                      <input type="submit" class="btn btn-primary shadow-2 mb-4" name="submit" value="Submit">

                  </form>
                 
              </div>
          </div>
      </div>
  </div>
</div>

	  



 

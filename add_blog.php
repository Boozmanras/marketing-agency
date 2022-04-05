  <?php
include('header.php');
$errors=array();
if (isset($_POST['submit'])) {
$title = htmlspecialchars($_POST['title']);
	
	$des=htmlspecialchars($_POST['description']);
		$date= htmlspecialchars($_POST['date']);

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
      if (strlen($des) <= '100') { 
array_push($errors,"blog character must not be less than 100 characters");
} 


if(count($errors)==0){
   move_uploaded_file($tmp_thumbnail,"images/thumbnail/$thumb");
     $query1=mysqli_query($conn,"insert into blogs(date,title,des,thumbnail,author)values('$date','$title','$des','$thumb','$author')") or die(mysqli_error($conn));
     if ($query1) {
     
$_SESSION['success']="blog has been successful sent to admin please await for approval";
  
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
                    <li class="breadcrumb-item">
                        <a href="blog.php">my blogs</a></li>				
<li class="breadcrumb-item active">write blogs
</li>				
                </ol>
            </nav>

<div class="wrapper">
        <div class="auth-content">
            <div class="card">
                <div class="card-body text-center">
                    
                    <h6 class="mb-4 text-muted">write blog them send to admin for approval</h6>
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
                            <label for="password">Thumbnail</label>
                             <input type="file" id="email" class="form-control" name="thumbnail" placeholder="Password" required  value='<?php echo $thumb;?>'>
                        </div>
       <div class="form-group text-left">
                            <label for="password">Author</label>
                             <input type="text" class="form-control" disabled value="<?php echo $username;?>">
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
 
 

<?php 
  include('admin_header.php');
include("../connections/db.php");


  $id=$_GET['id']; 
  

  $query= mysqli_query($db,"SELECT * FROM blogs WHERE id= '$id'") or die(mysql_error());
                                      
  while ($row=mysqli_fetch_array($query)) {
    $id=$row['id'];
    $title=$row['title'];
    $des=$row['des'];
    $date=$row['date'];
    $thumbnail=$row['thumbnail'];
    $author = $row['author'];
    
  }
?>
  <nav class="py-2">
				<ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="index.php">Home</a>
                    </li>
<li class="breadcrumb-item"><a href="blog.php">admin blogs management</a></li>
                    <li class="breadcrumb-item active">update blog</li>				
                </ol>
            </nav>
<div style="margin-left: 20%; margin-top: 2%; width:70%; ">
  <form action="edit_post.php" method="post" name="newsform" enctype="multipart/form-data" onsubmit="return validateForm();" >
    <h3>Update blogs</h1><hr>
    <div class="form-group">
      <label for="exampleInputEmail1">Title :</label>
      <input type="text" name="title" class="form-control" placeholder="Enter Title" value="<?php echo $title;?>">
      
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Description :</label>
      <textarea class="form-control rounded-0" name="des" rows="6" placeholder="Enter Description..."><?php echo $des;?></textarea> 
    </div>

    <div class="form-group">
            <input type="hidden" name="date" class="form-control" value="<?php echo $date; ?>">
    </div>
<div class="form-group">
  <label for="exampleInputPassword1">Author</label><input type="text" value="<?php echo $author;?>" disabled="disabled">
</div>
    <div class="form-group">
      <label for="exampleInputPassword1">Choose Thumbnail :</label>
      <input type="file" name="thumbnail" class="form-control" value="<?php echo $thumbnail;?>"><br/>
      <img src="../images/thumbnail/<?php echo $thumbnail?>" class="img img-thumbnail" style="height: 200px; width:250px;">

    </div>

    <div class="form-group">
     
        
       
       

      
     
    <input type="hidden" name="id" value="<?php echo $_GET['edit'];?>  ">

    <button type="submit" name="update_news_btn" class="btn btn-primary">Update</button>
  </form>

  <script type="text/javascript">
    function validateForm(){
      //news form validations
      var x=document.forms['newsform']['title'].value;
      var y=document.forms['newsform']['des'].value;
      var z=document.forms['newsform']['date'].value;
     
      if(x==""){
      alert('Title must be filled out.');
      return false;
      }
       if(y==""){
      alert('Description must be filled out.');
      return false;
      }
       if(y.length<100){
      alert('Description atleast 20 charecters');
      return false;
      }
       if(z==""){
      alert('Date must be filled out.');
      return false;
      }
       
    }
</script>

<?php
  
  
  if(isset($_POST['update_news_btn'])) {
    $id1=$_POST['id'];//echo "<script>alert('$newsid');</script>";
    $title1=$_POST['title'];
    $des1=$_POST['des'];
    $date1=$_POST['date'];
    $thumb1=$_FILES['thumbnail']['name'];


    $tmp_thumb1=$_FILES['']['tmp_name'];
 $file_name = $_FILES['thumbnail']['name'];
    $file_size = $_FILES['thumbnail']['size'];
    $file_type = $_FILES['thumbnail']['type'];
    $temp_name = $_FILES['thumbnail']['tmp_name'];
    $ext = explode(".", $file_name);
    $file_ext = end($ext);

    $extension = ['jpg','png','jpeg'];
    if(in_array($file_ext, $extension) == false){
      array_push($errors, "This Extension is not Exeptable, Please try with this ext.(jpg,png,jpeg).");
    }

    if($file_size > 2097152){
      array_push($errors, "This File Size is not Exeptable, please try with less than 2MB file size.");
    }

    if($errors==0){

    //upload files
    move_uploaded_file($file_name, "images/thumbnail/$thumb1");


$sql = "UPDATE blogs SET title='$title1',des='$des1',date='$date',thumbnail='$thumb1' where id='$id1";

if ($db->query($sql) === TRUE) {
echo "<script>alert('blog has been successfully updated!');</script>";

$_SESSION['success']="blog has been successfully disabled";
  
  echo
 '<script>window.location.replace("ablog.php")</script>';
   
} else {
echo "<script>alert('sorry an error occured');</script>";
  
}
}

$db->close();





    


 
  }
?>

</div>




</div>
</div>


<?php 
include("admin_header.php"); 

$id=$_GET['id'];
 
 
 $sql2= mysqli_query($conn,"SELECT * from users WHERE id='$id'");
while($row=mysqli_fetch_assoc($sql2)){
  
  
}
 
date_default_timezone_set("Africa/Nairobi");

  $time= date("h:i:sa");
  $date=date("Y-m-d");
  $dt = $time.$date;
  
 $sql = mysqli_query($conn,"UPDATE users SET status='yes' WHERE id='$id'");
 
   if ($sql){

 echo "<script>alert('user appoved!!');</script>";

  $_SESSION['success']="user has been successfully approved!!";
  
 echo
'<script>window.location.replace("users.php")</script>';
  



}

 else {
echo "<script>alert('sorry an error occured');</script>";

}
?>  
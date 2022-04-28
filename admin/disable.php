<?php 
include("admin_header.php"); 

$id=$_GET['id'];
 
 
 $sql2= mysqli_query($conn,"SELECT * from blogs WHERE id='$id'");
while($row=mysqli_fetch_assoc($sql2)){
  $use=$row['author'];
  
}
 
date_default_timezone_set("Africa/Nairobi");

  $time= date("h:i:sa");
  $date=date("Y-m-d");
  $dt = $time.$date;
  
 $sql = mysqli_query($conn,"UPDATE blogs SET status='no' WHERE id='$id'");
 
   if ($sql){

 echo "<script>alert('blog disabled');</script>";

  $_SESSION['success']="blog has been successfully disabled";
  
  echo
'<script>window.location.replace("ablog.php")</script>';
  
 

$sql3 = mysqli_query($conn,"insert into notification(title,msg,username,date)values('blog disabled','your blog has been disabled due to inconvent reasons please contact an admin if it was done by mistake','$use','$dt'"); 
if($sql3){
  echo "<script>alert('blog disabled');</script>";

  $_SESSION['success']="blog has been successfully disabled";
  
 echo
'<script>window.location.replace("ablog.php")</script>';
  
     }else{
array_push($errors,"An error occured please try again and if it persists contact an admin");


     }
}

 else {
echo "<script>alert('sorry an error occured');</script>";

}
?>  
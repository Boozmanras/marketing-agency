<?php
 include("server.php");

 $id=$_GET['del'];

 $query=mysqli_query($conn, "delete from blogs where id='$id'");
 if ($query) {
 	echo "<script>alert('News Deleted');</script>";
 	echo("<script> location.href = 'blog.php'; </script>");
 }
 else
 {
 	echo "<script>alert('Try again');</script>";
 }
?>

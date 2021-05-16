<?php
 include("connections/db.php");

 $id=$_GET['del'];

$sql = "DELETE FROM blogs WHERE id='$id'";

if ($db->query($sql) === TRUE) {
  $_SESSION['success'] = "News Deleted";
header('location:blog.php');
} else {
  echo "Error deleting record: " . $db->error;
//echo "<script>alert('Try again');</script>";
}


?>

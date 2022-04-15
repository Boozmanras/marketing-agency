<?php
include('admin_header.php');
 include("../connections/db.php");

  $id=$_GET['id'];

  $sql = "DELETE FROM blogs WHERE id='$id'";

  if ($db->query($sql) === TRUE) {
    $_SESSION['success'] = "blog deleted";
      echo
       '<script>window.location.replace("ablog.php")</script>';
          
          } else {
            echo "Error deleting record: "//echo "<script>alert('Try again');</script>";
            }


            ?>
            
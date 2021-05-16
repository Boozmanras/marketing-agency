<?php
include('header.php');
$id = $_GET['id'];

    

    $check = mysqli_query($db,"SELECT * FROM likes WHERE blogid = '$id' AND username='$username'");
    $check_count = mysqli_num_rows($check);
    if ($check_count == 1) {
      $query = mysqli_query($conn,"DELETE FROM likes WHERE blogid = '$id' AND username = '$username'");
      if ($query) {
        echo
'<script>window.location.replace("blog_view.php")</script>';
      }
    }else{
      echo "how did you get on this page?";
    }
?>

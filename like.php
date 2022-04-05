<?php
include('header.php');

$id = htmlspecialchars($_GET['id']);

 


    $query = mysqli_query($conn,"SELECT * FROM blogs WHERE id = $id");
    $count = mysqli_num_rows($query);
    if ($count == 1) {
      
     

 $blog_check_query = "SELECT * FROM likes WHERE username='$username' OR blogid='$id' LIMIT 1";
                                            $result = mysqli_query($conn, $blog_check_query);
                                              $ngapi = mysqli_fetch_assoc($result);
                                                
                                                  if ($ngapi) { // if user exists

echo '<script>window.location.replace("blog_view.php")</script>';


      }else{
        $insert = mysqli_query($conn,"INSERT INTO likes(username,blogid) VALUES('$username','$id')");
         if ($insert) {
$pesa = mysqli_query($db,"SELECT bal from users WHERE username = '$username'")

  $amount = 0;  

while($row = mysqli_fetch_assoc($pesa)) { $amount += $row['bal']; }  


$victor = mysqli_query($db,"UPDATE users SET bal='$amount' WHERE username=$username";

while($victor)(
    
echo
'<script>window.location.replace("blog_view.php")</script>';

)
         }else{
           echo "Error liking";
         }
      }
    }else{
      echo "there is no post corresponds to the id";
    }

 ?>

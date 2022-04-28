<?php 
include('header.php'); ?>
<nav class="py-2">
				<ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="index.php">Home</a></li>
 <li class="breadcrumb-item active">trivia</li>				
                </ol>
            </nav>

               <body>
    <div class="wrapper">
        <div class="auth-content">
            <div class="card">
                <div class="card-body text-center">
                    </br>
                    <h6 class="mb-4 text-muted">answer simple quizes and earn</h6>
                    
                    <form action="trivia.php" method="POST">
                        <div class="form-group text-left">
                            <label for="email"></label>
                           


<?php

$jah = mysqli_query($conn, "SELECT bal FROM users where username='$username'"); 
 while 
($row=mysqli_fetch_array($jah)){   
$bal = $row['bal'];
}


$show = mysqli_query($conn, "SELECT * FROM trivia order by RAND() LIMIT 1");                     
 while 
($row=mysqli_fetch_array($show)){

$id= $row['id'];
$quiz=$row['quiz'];
$ans=$row['ans'];

 echo '<b>'.$quiz.'</b></br></br></br>';



   
   
   $check=mysqli_query($conn,"select * from trivia2 where quiz='$id' and username='$username'");
    $checkrows=mysqli_num_rows($check);

   if($checkrows>0) {
      
      
?>
<div class="error success" >
      	<h6>congrats you've answered all questions more questions are coming up soon</h6>
          	
</div>
    
       <input class="form-control" name="ch2" type="text" disabled="disabled" />

<?php
      
      
      
   } else {  
    //insert results from the form input
     ?>
        <input class="form-control" name="tr" type="text" required />
  <?php

      
    }
    
    };
  ?>
   
   
          
   
            


        
        
 


                        </div>
                        <button class="btn btn-primary shadow-2 mb-4" name="btn">submit</button>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
   








         </div>      




<?php
if(isset($_POST['btn'])){
$trial=htmlspecialchars($_POST['tr']);

if($trial==$ans){

$rewa=mysqli_query($conn,"insert into trivia2(quiz,ans,username,bonus) values('$id','$trial','$username','5')");

$new_bal = $bal + 5;

$query = mysqli_query($conn,"UPDATE users SET bal='$new_bal' WHERE username='$username'");


echo "<script>alert('you've been awarded ksh 5');</script>";
}
else {

echo "<script>alert('Wrong answer try again!');</script>";

}
}
?>







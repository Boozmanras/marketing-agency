<?php 
include('game_header.php'); 
if($package=='bronze'){
  $rew1=20;
}
elseif ($package=='silver') {
  $rew1= 70;
}
elseif($package=='gold'){
  $rew1=125;
}
elseif($package=='platinum'){
  $rew1=159;
}
else{
  $rew1=0;
}
?>
<nav class="py-2">
				<ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="../index.php">Home</a></li>
<li class="breadcrumb-item"><a href"index.php">Gaming dashboard</a></li><li class="breadcrumb-item active">lucky guess</li>				
                </ol>
            </nav>

               <body>
    
        <div class="auth-content">
            <div class="card">
                <div class="card-body text-center">
                    </br>
                    <h6 class="mb-4 text-muted">guess your lucky number between 1-20</h6>
                    
                    <form action="bonus.php" method="POST">
                        <div class="form-group text-left">
                            <label for="email"></label>
                           


<?php

$jah = mysqli_query($conn, "SELECT bal FROM users where username='$username'"); 
 while 
($row=mysqli_fetch_array($jah)){   
$bal = $row['bal'];}

$show = mysqli_query($conn, "SELECT * FROM luckyno order by RAND() LIMIT 1");                     
 while 
($row=mysqli_fetch_array($show)){

$no= $row['lucky'];

}
if(isset($_POST['btn'])){
$trial=htmlspecialchars($_POST['tr']);

if($trial==$no){
 
$rewa=mysqli_query($conn,"insert into trivia2(username,num) values('$username','$trial')");

$new_bal = $bal + $rew1;

$query = mysqli_query($conn,"UPDATE users SET bal='$new_bal' WHERE username='$username'");


echo "<script>alert('you've been awarded ksh 20');</script>";
}
else {
  
echo "<script>alert('Wrong but close guess');</script>";

  ?>
  <div class="error success" >
      	<h6>lucky number is <?php echo $no;?> but your lucky number is <?php echo $trial;?></h6>
          	<?php

}
$npoints = $points - 2;

$yuko= mysqli_query($conn,"UPDATE users SET gpoints = '$npoints' WHERE username='$username'");


}

if($points<2) {
      
?>



<div class="error success" >
      	<h6>you don't have enough points</h6>
          	
</div>
    
       <input class="form-control" name="ch2" type="text" disabled="disabled" />
       </br></br>
       <a href="buy_points.php" class="btn btn-primary shadow-2 mb-4">buy points</a>

<?php
      
      
      
   } else {  
     
     
    //insert results from the form input
     ?>
        <input class="form-control" name="tr" type="tel" required />
  
      
    
   
   
          
   
            


        
        
 


                        </div>
                        <input class="btn btn-primary shadow-2 mb-4" name="btn" type="submit"><?php
   }?>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
   








       






   

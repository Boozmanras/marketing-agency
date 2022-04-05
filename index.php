
<?php include('header.php');
?>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<style>
.mySlides {display:none;}
</style>

  <nav class="py-2">
				<ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="#">Home</a>
                    </li>
                    <li class="breadcrumb-item active">Dashboard</li>				
                </ol>
            </nav>
  

            <div class="content">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 page-header">
  <div>   <?php
                             if (isset($_SESSION['success'])) : ?>
      <div class="error success" >
      	<h6>
          <?php 
          	echo $_SESSION['success']; 
          	unset($_SESSION['success']);
endif
              
?></div>


<div class="page-pretitle">Overview</div>
                            <h2 class="page-title">Dashboard</h2>
                        </div>
                    </div></br></br>

<?php 
$select = mysqli_query($db,"SELECT * from news ORDER BY id desc LIMIT 5");
while($row=mysqli_fetch_array($select)){
  $news_msg=$row['msg'];
  $news_img=$row['img'];
}

?>

<div class="w3-content w3-display-container">



<div class="w3-display-container mySlides">
 <img src="assets/news/<?php echo $news_img;?>" style="width:100%">
  <div class="w3-display-topleft w3-large w3-container w3-padding-16 w3-black">
    <?php 
    echo $news_msg;
    ?>
  </div>
</div>





<button class="w3-button w3-display-left w3-black" onclick="plusDivs(-1)">&#10094;</button>
<button class="w3-button w3-display-right w3-black" onclick="plusDivs(1)">&#10095;</button>

</div>








</br></br>

                            
                    <div class="row">
                        <div class="col-sm-6 col-md-6 col-lg-3 mt-3">
                            <div class="card">
                                <div class="content">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="icon-big text-center">
<img src="asset/user.jpeg" width ="150" height = "150" />
                                   
                         
                                                          </div>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="detail">
                                                <p class="detail-subtitle">Hello</p>
                                                <span class="number"><?php echo $username; ?></span>
                                            </div>
                                        </div>
                                    </div>
                            
                                        <hr />
                                        
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-3 mt-3">
                            <div class="card">
                                <div class="content">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="icon-big text-center"><img src="asset/pesa.gif" width="150" height="150"/>
                                               
                                            </div>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="detail">
                                                <p class="detail-subtitle">Your total earning is :</p>
                                                <span class="number"><?php
$ras = mysqli_query($conn, "SELECT bal FROM users WHERE username = '$username'"); 

while ($row=mysqli_fetch_array($ras)){   
$money = $row['bal'];
}


echo "ksh"."".$money;





?></span>
                                            </div>
                                        </div>
                                    </div>
                             
                                        <hr />
                                     
                                  
                                </div>
                            </div>
                        </div>



                   <div class="col-sm-6 col-md-6 col-lg-3 mt-3">
                            <div class="card">
                                <div class="content">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="icon-big text-center">
                                                <img src="asset/money.gif" width ="150" height = "150" />                
                                            </div>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="detail">
                                                <p class="detail-subtitle">You've withdrawn:</p>
                                                                                                                                                                                                                                         <span class="number"> <?php    $count = mysqli_query($conn, "SELECT amount FROM withdrawn WHERE username = '$username'");
  $wit = 0;  while($row = mysqli_fetch_assoc($count)) { $wit += $row['amount']; }  echo $wit;  ?></span>                   







                                            </div>
                                        </div>
                                    </div>
                                    
                                        <hr />
                                        
                                </div>
                            </div>
                        </div>           
                            



                        <div class="col-sm-6 col-md-6 col-lg-3 mt-3">
                            <div class="card">
                                <div class="content">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="icon-big text-center">
                                               <img src="asset/good_job.gif" width="150" height="150"/>
                                            </div>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="detail">
                                                <p class="detail-subtitle">You've invited:</p>
                                                <span class="number"><?php
$ref = mysqli_query($conn,"SELECT * FROM referrals WHERE sendingusername='$username'") or die(mysqli_error());
echo mysqli_num_rows($ref);

?></span>
                                            </div>
                                        </div>
                                    </div>
                                    
                                        <hr />
                                        
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-3 mt-3">
                            <div class="card">
                                <div class="content">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="icon-big text-center">
                                                <img src="asset/ref.gif" width ="150" height = "150" />    
                                            </div>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="detail">
                                                <p class="detail-subtitle">Your referral link is:</p>
                                                <span class="number"><?php

 

                                        $extract = mysqli_query($conn,"SELECT * FROM users WHERE username= '$username' AND password='$password'") or die(mysql_error());
                                        while($row = mysqli_fetch_assoc($extract))
                                        {
                                        	$x = $row['username'];
                                            }
                            
                            
                    
                                            ?>
                                            <a href="<?php echo URL.'?refer='.$username; ?>"><?php echo URL.'?refer='.$username; ?></a></span>
                                            </div>
                                        </div>
                                    </div>
                                  
                                        <hr />
                                        
                                </div>
                            </div>
                        </div>
                    </div>
                     
<?php
include('view.php');
?>
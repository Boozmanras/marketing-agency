
<?php include('admin_header.php');
?>


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
                    </div>






</div>


                            
                    <div class="row">
                        <div class="col-sm-6 col-md-6 col-lg-3 mt-3">
                            <div class="card">
                                <div class="content">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="icon-big text-center">
<img src="../asset/admin.gif" width ="150" height = "150" />
                                   
                         
                                                          </div>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="detail">
                                                <p class="detail-subtitle">Hello admin</p>
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
                                            <div class="icon-big text-center"><img src="../asset/admin_pesa.gif" width="150" height="150"/>
                                               
                                            </div>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="detail">
                                                <p class="detail-subtitle">Your total  users earning:</p>
                                                <span class="number"><?php
                                                
                                                
                 $ras= mysqli_query($conn, 'SELECT SUM(bal) AS value_sum FROM users');  
$row = mysqli_fetch_assoc($ras); 
$sum = $row['value_sum'];                               
                                             


echo "ksh"."".$sum;



 

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
                                                <img src="../asset/money.gif" width ="150" height = "150" />                
                                            </div>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="detail">
                                                <p class="detail-subtitle">total withdrawn:</p>
                                                                                                                                                                                                                                         <span class="number"> <?php    $count = mysqli_query($conn, "SELECT amount FROM withdrawn");
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
                                               <img src="../asset/good_job.gif" width="150" height="150"/>
                                            </div>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="detail">
                                                <p class="detail-subtitle">total users:</p>
                                                <span class="number"><?php



$ref = mysqli_query($conn,"SELECT * FROM users") or die(mysqli_error());
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
                                               <img src="../asset/good_job.gif" width="150" height="150"/>
                                            </div>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="detail">
                                                <p class="detail-subtitle">Active users:</p>
                                                <span class="number"><?php



$result = mysqli_query($conn,"SELECT * FROM users WHERE status='yes'");
$rows = mysqli_num_rows($result);
echo $rows;?></span>          


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
                                               <img src="../asset/good_job.gif" width="150" height="150"/>
                                            </div>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="detail">
                                                <p class="detail-subtitle">Inactive users:</p>
                                                <span class="number"><?php


$result = mysqli_query($conn,"SELECT * FROM users WHERE status='no'");
$rows = mysqli_num_rows($result);
echo $rows;?></span>          



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
                                               <img src="../asset/good_job.gif" width="150" height="150"/>
                                            </div>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="detail">
                                                <p class="detail-subtitle">total partners:</p>
                                                <span class="number"><?php



$result = mysqli_query($conn,"SELECT * FROM users WHERE status='part'");
$rows = mysqli_num_rows($result);
echo $rows;?></span>          


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
                                               <img src="../asset/good_job.gif" width="150" height="150"/>
                                            </div>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="detail">
                                                <p class="detail-subtitle">total admin:</p>
                                                <span class="number"><?php



$result = mysqli_query($conn,"SELECT * FROM users WHERE status='adm'");
$rows = mysqli_num_rows($result);
echo $rows;?></span>          



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
                                                <img src="../asset/ref.gif" width ="150" height = "150" />    
                                            </div>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="detail">
                                                <p class="detail-subtitle">Your referral link is:</p>
                                                <span class="number"><?php

 

                                        $extract = mysqli_query($conn,"SELECT * FROM users WHERE username= '$username' AND password='$password'") or die(mysqli_error());
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
                     

                     

</a></span>
                                            </div>
                                        </div>
                                    </div>
                                  
                                        <hr />
                                        
                                </div>
                            </div>
                        </div>
                    </div>
                     

</div>
                     

   </div>
                    </div>
                  
<?php 
include('header.php');
?>
<nav class="py-2">
 	<ol class="breadcrumb">
        <li class="breadcrumb-item">
             <a href="index.php">Home</a>
                         </li>
                                 <li class="breadcrumb-item active">Tick tock videos</li>				
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


                                                                                                                                                                                                                                    <div class="page-pretitle">ads</div>
                                                                                                                                                                                                                                                                <h2 class="page-title">tick tock videos</h2>
                                                                                                                                                                                                                                                                                        </div>
                                                                                                                                                                                                                                                                                                            </div></br></br>

                                                                                                                                                                                                                                                                                                            <?php 

                                                                                                                                                                                                                                                                                                            $select = mysqli_query($db,"SELECT * from ads WHERE  type ='tick_tock' AND status='yes' ORDER BY id desc LIMIT 1");

                                                                                                                                                                                                                                                                                                            while($row=mysqli_fetch_array($select)){
                                                                                                                                                                                                                                                                                                              $img=$row['img'];
                                                                                                                                                                                                                                                                                                                $min=$row['min'];
                                                                                                                                                                                                                                                                                                                  if ($package=='bronze'){
                                                                                                                                                                                                                                                                                                                      $min = $min * 4;
                                                                                                                                                                                                                                                                                                                        }
                                                                                                                                                                                                                                                                                                                          elseif ($package=='silver') {
                                                                                                                                                                                                                                                                                                                              $min = $min*3;
                                                                                                                                                                                                                                                                                                                                }
                                                                                                                                                                                                                                                                                                                                  elseif($package=='gold'){
                                                                                                                                                                                                                                                                                                                                      $min == $min*2;
                                                                                                                                                                                                                                                                                                                                        }
                                                                                                                                                                                                                                                                                                                                          
                                                                                                                                                                                                                                                                                                                                          }
                                                                                                                                                                                                                                                                                                                                            if (mysqli_num_rows($select) == 0) {
                                                                                                                                                                                                                                                                                                                                                echo "no videos available for now please check later";
                                                                                                                                                                                                                                                                                                                                                    
                                                                                                                                                                                                                                                                                                                                                        
                                                                                                                                                                                                                                                                                                                                                          }
                                                                                                                                                                                                                                                                                                                                                            else
                                                                                                                                                                                                                                                                                                                                                              {

                                                                                                                                                                                                                                                                                                                                                                


                                                                                                                                                                                                                                                                                                                                                                ?>



                                                                                                                                                                                                                                                                                                                                                                </br></br>

                                                                                                                                                                                                                                                                                                                                                                    <div class="row">
                                                                                                                                                                                                                                                                                                                                                                        <div class="col-sm-6 col-md-6 col-lg-3 mt-3">
                                                                                                                                                                                                                                                                                                                                                                              <div class="card">
                                                                                                                                                                                                                                                                                                                                                                                <div class="content">
                                                                                                                                                                                                                                                                                                                                                                                  <div class="row">
                                                                                                                                                                                                                                                                                                                                                                                    <div class="col-sm-4">
                                                                                                                                                                                                                                                                                                                                                                                      <div class="icon-big text-center">
                                                                                                                                                                                                                                                                                                                                                                                      <img src="asset/ads/<?php echo $img;?>" width ="150" height = "150" />
                                                                                                                                                                                                                                                                                                                                                                                                                         
                                                                                                                                                                                                                                                                                                                                                                                                                                                  
                                                                                                                                                                                                                                                                                                                                                                                                                                                   </div>
                                                                                                                                                                                                                                                                                                                                                                                                                                                        </div>
                                                                                                                                                                                                                                                                                                                                                                                                                                                             <div class="col-sm-8">
                                                                                                                                                                                                                                                                                                                                                                                                                                                               <div class="detail">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                    <p class="detail-subtitle">minimum views</p>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                       <span class="number"><?php echo $min; ?></span>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                             </div>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   </div>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                           </div>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               <hr />
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       </div>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   </div>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                           </div>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                             <?php 
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               }
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                 ?>
 <?php 
include('game_header.php'); ?>


<style>
.mySlides {display:none;}
</style>

   <nav class="py-2">
				<ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="../index.php">Home</a>
                    </li>
                    <li class="breadcrumb-item active">Games</li>				
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
  

?>

<div class="w3-content w3-display-container">



<div class="w3-display-container mySlides">
 <img src="assets/news/<?php echo $row['img'];?>" style="width:100%">
  <div class="w3-display-topleft w3-large w3-container w3-padding-16 w3-black">
    <?php 
    echo $row['msg'];
    ?>
  </div>
</div>





<button class="w3-button w3-display-left w3-black" onclick="plusDivs(-1)">&#10094;</button>
<button class="w3-button w3-display-right w3-black" onclick="plusDivs(1)">&#10095;</button>

</div>


<?php 
}
?>





</br></br>

                            
                    <div class="row">
                        <div class="col-sm-6 col-md-6 col-lg-3 mt-3">
                            <div class="card">
                                <div class="content">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="icon-big text-center">
<img src="assets/img/wheel.jpeg"" width ="150" height = "150" />
                                   
                         
                                                          </div>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="detail">
                                                <p class="detail-subtitle"><a href="../spin.php">spin the wheel</a></p>
                                                <span class="number"></span>
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
                                            <div class="icon-big text-center"><img src="assets/img/guess.jpeg" width="150" height="150"/>
                                               
                                            </div>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="detail">
                                                <p class="detail-subtitle"><a href = "../bonus.php">Lucky guess</a></p>
                                                <span class="number"></span>
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
                                                <img src="assets/img/coming_soon.gif" width ="150" height = "150" />                
                                            </div>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="detail">
                                                <p class="detail-subtitle">coming soon</p>
                                                                                                                                                                                                                                         <span class="number"></span>                   







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
                                               <img src="assets/img/coming_soon.gif" width="150" height="150"/>
                                            </div>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="detail">
                                                <p class="detail-subtitle">coming soon</p>
                                                <span class="number"></span>
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
                                                <img src="assets/img/coming_soon.gif" width ="150" height = "150" />    
                                            </div>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="detail">
                                                <p class="detail-subtitle">coming soon</p>
                                                <span class="number">      </span>
                                            </div>
                                        </div>
                                    </div>
                              
                                        <hr />
                                        
                                </div>
                            </div>
                        </div>
                    </div>
                     
<?php
include('../view.php');
?>


            








  

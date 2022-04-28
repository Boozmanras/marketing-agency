<?php include 'admin_header.php'; ?>
<div class="post">
 <div class="p_sec1">


   <h2>ADMIN ADS MANAGEMENT</h2>

 </div>
 <?php
$per_page_record = 5;  
       
    
       if (isset($_GET["page"])) {    
           $page  = $_GET["page"];    
       }    
       else {    
         $page=1;    
       }    
   
       $start_from = ($page-1) * $per_page_record;     
      $query = "SELECT * FROM ads ORDER BY id desc LIMIT $start_from, $per_page_record";     
       $rs_result = mysqli_query ($conn, $query);    



    if(mysqli_num_rows($rs_result) > 0){ ?>
<nav class="py-2">
				<ol class="breadcrumb">
                   <li class="breadcrumb-item">
                       <a href="index.php">Home</a>
                   </li>
                   <li class="breadcrumb-item active">Admin ads management</li>				
               </ol>
           </nav>


           
<?php
                            if (isset($_SESSION['success'])) : ?>
     <div class="error success" >
     	<h6>
         <?php 
         	echo $_SESSION['success']; 
         	unset($_SESSION['success']);
endif
             
?></div>
                               <div class="card-body">
                                  
                                   <div class="table-responsive">
                                       <table class="table table-bordered">
                                  

<tr>
<th scope="col">ID</th>
       <th scope="col">IMG</th>
       
       <th scope="col">MIN</th>
     <th scope="col">TYPE</th>
       <th scope="col">STATUS</th>
      
      
       
     </tr>



        
   <tbody>
     <?php
        $series = $offset + 1;
        while($row = mysqli_fetch_assoc($rs_result)){
     ?>
     <tr>
       <td><?php echo $series; ?></td>
      
        
        <td><img src="../asset/ads/<?php echo $row['img'];?>" class="img img-thumbnail" alt="ad" style="width:150px;height:100px;"></td> 
        

       <td><?php echo $row['min']; ?></td>
       <td><?php echo $row['type'];?></td>
       <td>
         <?php 
       $status=  $row['status'];
       
         if ($status=='yes') {
          
          ?>
            <span class="table-remove"><button type="button" class="btn btn-primary btn-rounded btn-sm my-0"disabled="disabled">Active</button></span>
            </br></br>
            <span class="table-remove">
              <button type="button" class="btn btn-danger btn-rounded btn-sm my-0"><a href="disable_ad.php?id=<?php echo $row['id'];?>">Disable</a></button>
              
            </span>
           
      <?php
         }
         elseif ($status=='no') {
           ?>
           <a href="Activate_ad.php?id=<?php echo $row['id'];?>" class="btn btn-primary btn-rounded btn-sm my-0">Activate</a>
           </br></br>
            <span class="table-remove"><button type="button" class="btn btn-danger btn-rounded btn-sm my-0" disabled="disabled">Disabled</button></span>
            
           
           <?php
           
         }
         else{
           echo'status absent';
         }
         
         ?>
         
       </td>
      
     </tr>
   <?php
       $series++;
       }
   ?>
   </tbody>
 </table>
 <?php }else{
          echo "<a href='ads.php' class='btn btn-primary shadow-2 mb-4'>Post ad</a>";
          die();
        }
 ?>
 



<div class="pagination">    
     <?php  
       $query = "SELECT COUNT(*) FROM ads";     
       $rs_result = mysqli_query($conn, $query);     
       $row = mysqli_fetch_row($rs_result);     
       $total_records = $row[0];     
         
   echo "</br>";     
       // Number of pages required.   
       $total_pages = ceil($total_records / $per_page_record);     
       $pagLink = "";       
     
       if($page>=2){   
           echo "<a href='ads_management.php?page=".($page-1)."'>  Prev </a>";   
       }       
                  
       for ($i=1; $i<=$total_pages; $i++) {   
         if ($i == $page) {   
             $pagLink .= "<a class = 'active' href='ads_management.php?page="  
                                               .$i."'>".$i." </a>";   
         }               
         else  {   
             $pagLink .= "<a href='ads_management.php?page=".$i."'>   
                                               ".$i." </a>";     
         }   
       };     
       echo $pagLink;   
 
       if($page<$total_pages){   
           echo "<a href='ads_management.php?page=".($page+1)."'>  Next </a>";   
       }   
 
     ?>    
   
 </div>
</div>

</br></br>
<a href="ads.php" class="btn btn-primary shadow-2 mb-4">POST ADS</a>
 
<?php include 'admin_header.php'; ?>
<div class="post">
 <div class="p_sec1">


   <h2>ADMIN USERS MANAGEMENT</h2>

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
      $query = "SELECT * FROM users ORDER BY id desc LIMIT $start_from, $per_page_record";     
       $rs_result = mysqli_query ($conn, $query);    



    if(mysqli_num_rows($rs_result) > 0){ ?>
<nav class="py-2">
				<ol class="breadcrumb">
                   <li class="breadcrumb-item">
                       <a href="index.php">Home</a>
                   </li>
                   <li class="breadcrumb-item active">Admin users management</li>				
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
       <th scope="col">USERNAME</th>
       <th scope="col">EMAIL</th>
       <th sco pe="col">TEL</th>
     <th scope="col"> REF</th>
       <th scope="col">RESPOSIBILITY</th>
      <th scope="col">G-POINTS</th>
      <th scope="col">BAL</th>
      <th scope="col">PACKAGE</th>
       
      
       
     </tr>



        
   <tbody>
     <?php
        $series = $offset + 1;
        while($row = mysqli_fetch_assoc($rs_result)){
     ?>
     <tr>
       <td><?php echo $series; ?></td>
       <td class="td"><?php echo $row['username']; ?></td>

       <td><?php echo $row['email']; ?></td>
       <td><?php echo $row['tel']; ?></td>
        
        <td>
<?php echo $row['ref'];?>
       

</td> 
        

       <td>
         
         <?php
    $status=  $row['status'];
       
         if ($status=='yes') {
          
          ?>
            <span class="table-remove"><button type="button" class="btn btn-primary btn-rounded btn-sm my-0"disabled="disabled">Approved</button></span>
            </br></br>
            <span class="table-remove">
              <button type="button" class="btn btn-danger btn-rounded btn-sm my-0"><a href="udisable.php?id=<?php echo $row['id'];?>">Disable</a></button>
              
            </span>
           
      <?php
         }
         elseif ($status=='no') {
           ?>
           <a href="uapprove.php?id=<?php echo $row['id'];?>" class="btn btn-primary btn-rounded btn-sm my-0">APPROVE</a>
           </br></br>
            <span class="table-remove"><button type="button" class="btn btn-danger btn-rounded btn-sm my-0" disabled="disabled">Unapproved</button></span>
            
           
           <?php
           
         }
         else{
           echo $status;
         }
         
         ?>
         
       </td>
       
         
   
  <td><?php echo $row['gpoints']; ?></td>
       <td><?php echo $row['bal']; ?></td>
       <td><?php echo $row['package'];?></td>
     </tr>
   <?php
       $series++;
       }
   ?>
   </tbody>
 </table>
 <?php }else{
          echo "<a href='#' class='btn btn-primary shadow-2 mb-4'>NO USER</a>";
          die();
        }
 ?>
 



<div class="pagination">    
     <?php  
       $query = "SELECT COUNT(*) FROM users";     
       $rs_result = mysqli_query($conn, $query);     
       $row = mysqli_fetch_row($rs_result);     
       $total_records = $row[0];     
         
   echo "</br>";     
       // Number of pages required.   
       $total_pages = ceil($total_records / $per_page_record);     
       $pagLink = "";       
     
       if($page>=2){   
           echo "<a href='users.php?page=".($page-1)."'>  Prev </a>";   
       }       
                  
       for ($i=1; $i<=$total_pages; $i++) {   
         if ($i == $page) {   
             $pagLink .= "<a class = 'active' href='users.php?page="  
                                               .$i."'>".$i." </a>";   
         }               
         else  {   
             $pagLink .= "<a href='users.php?page=".$i."'>   
                                               ".$i." </a>";     
         }   
       };     
       echo $pagLink;   
 
       if($page<$total_pages){   
           echo "<a href='users.php?page=".($page+1)."'>  Next </a>";   
       }   
 
     ?>    
   
 </div>
</div>

</br></br>

  
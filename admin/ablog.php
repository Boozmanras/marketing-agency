<?php include 'admin_header.php'; ?>
<div class="post">
 <div class="p_sec1">


   <h2>ADMIN BLOGS MANAGEMENT</h2>

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
      $query = "SELECT * FROM blogs ORDER BY id desc LIMIT $start_from, $per_page_record";     
       $rs_result = mysqli_query ($conn, $query);    



    if(mysqli_num_rows($rs_result) > 0){ ?>
<nav class="py-2">
				<ol class="breadcrumb">
                   <li class="breadcrumb-item">
                       <a href="index.php">Home</a>
                   </li>
                   <li class="breadcrumb-item active">Admin blog management</li>				
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
       <th scope="col">TITLE</th>
       <th scope="col">DES</th>
       <th scope="col">DATE</th>
     <th scope="col"> Thumb</th>
       <th scope="col">AUTHOR</th>
      <th scope="col">ACTION</th>
      <th scope="col">EDIT</th>
      <th scope="col">DELETE</th>
       
      
       
     </tr>



        
   <tbody>
     <?php
        $series = $offset + 1;
        while($row = mysqli_fetch_assoc($rs_result)){
     ?>
     <tr>
       <td><?php echo $series; ?></td>
       <td class="td"><?php echo $row['title']; ?></td>

       <td><?php echo substr($row['des'],0,60); ?></td>
       <td><?php echo $row['date']; ?></td>
        
        <td><img src="../images/thumbnail/<?php echo $row['thumbnail'];?>" class="img img-thumbnail" alt="news image" style="width: 150px;height: 100px;"></td> 
        

       <td><?php echo $row['author']; ?></td>
       <td>
         <?php 
       $status=  $row['status'];
       
         if ($status=='yes') {
          
          ?>
            <span class="table-remove"><button type="button" class="btn btn-primary btn-rounded btn-sm my-0"disabled="disabled">Approved</button></span>
            </br></br>
            <span class="table-remove">
              <button type="button" class="btn btn-danger btn-rounded btn-sm my-0"><a href="disable.php?id=<?php echo $row['id'];?>">Disable</a></button>
              
            </span>
           
      <?php
         }
         elseif ($status=='no') {
           ?>
           <a href="approve.php?id=<?php echo $row['id'];?>" class="btn btn-primary btn-rounded btn-sm my-0">APPROVE</a>
           </br></br>
            <span class="table-remove"><button type="button" class="btn btn-danger btn-rounded btn-sm my-0" disabled="disabled">Unapproved</button></span>
            
           
           <?php
           
         }
         else{
           echo'status absent';
         }
         
         ?>
         
       </td>
       <td><a href="edit_post.php?id=<?php echo $row['id']; ?>" class="btn btn-warning"><i class="fas fa-edit"></i></i></a></td>
       <td><a href="delete_post.php?del=<?php echo $row['id']; ?>" class="btn btn-danger"><i class="fas fa-trash"></i></a></td>
     </tr>
   <?php
       $series++;
       }
   ?>
   </tbody>
 </table>
 <?php }else{
          echo "<a href='add_blog.php' class='btn btn-primary shadow-2 mb-4'>WRITE BLOG</a>";
          die();
        }
 ?>
 



<div class="pagination">    
     <?php  
       $query = "SELECT COUNT(*) FROM blogs";     
       $rs_result = mysqli_query($conn, $query);     
       $row = mysqli_fetch_row($rs_result);     
       $total_records = $row[0];     
         
   echo "</br>";     
       // Number of pages required.   
       $total_pages = ceil($total_records / $per_page_record);     
       $pagLink = "";       
     
       if($page>=2){   
           echo "<a href='ablog.php?page=".($page-1)."'>  Prev </a>";   
       }       
                  
       for ($i=1; $i<=$total_pages; $i++) {   
         if ($i == $page) {   
             $pagLink .= "<a class = 'active' href='ablog.php?page="  
                                               .$i."'>".$i." </a>";   
         }               
         else  {   
             $pagLink .= "<a href='ablog.php?page=".$i."'>   
                                               ".$i." </a>";     
         }   
       };     
       echo $pagLink;   
 
       if($page<$total_pages){   
           echo "<a href='ablog.php?page=".($page+1)."'>  Next </a>";   
       }   
 
     ?>    
   
 </div>
</div>

</br></br>
<a href="admin_blog.php" class="btn btn-primary shadow-2 mb-4">WRITE BLOG</a>
 

<?php include 'header.php'; ?>
<div class="post">
  <div class="p_sec1">


    <h2>WITHDRAWAL HISTORY</h2>

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
       $query = "SELECT * FROM withdrawn WHERE username='$username' ORDER BY id desc LIMIT $start_from, $per_page_record";     
        $rs_result = mysqli_query ($conn, $query);    



     if(mysqli_num_rows($rs_result) > 0){ ?>
<nav class="py-2">
				<ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="index.php">Home</a>
                    </li>
                    <li class="breadcrumb-item active">WITHDRAWAL HISTORY</li>				
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
        <th scope="col">PHONE NUMBER</th>
        <th scope="col">AMOUNT</th>
        <th scope="col">STATUS</th>
     
        
        
      </tr>



         
    <tbody>
      <?php
         $series = $offset + 1;
         while($row = mysqli_fetch_assoc($rs_result)){
      ?>
      <tr>
        <td><?php echo $series; ?></td>
        <td class="td"><?php echo $row['username']; ?></td>

        <td><?php echo $row['phone']; ?></td>
        <td><?php echo $row['amount']; ?></td>
       
         

        <td>
         
            <span class="table-remove"><button type="button" class="btn btn-primary btn-rounded btn-sm my-0"disabled="disabled">paid</button></span>
           
          
        </td>
       
      </tr>
    <?php
        $series++;
        }
    ?>
    </tbody>
  </table>
  <?php }else{
           echo "You currently haven't withdrawn any cash";
           die();
         }
  ?>
  



 <div class="pagination">    
      <?php  
        $query = "SELECT COUNT(*) FROM withdrawn WHERE username ='$username'";     
        $rs_result = mysqli_query($conn, $query);     
        $row = mysqli_fetch_row($rs_result);     
        $total_records = $row[0];     
          
    echo "</br>";     
        // Number of pages required.   
        $total_pages = ceil($total_records / $per_page_record);     
        $pagLink = "";       
      
        if($page>=2){   
            echo "<a href='withdraw_history.php?page=".($page-1)."'>  Prev </a>";   
        }       
                   
        for ($i=1; $i<=$total_pages; $i++) {   
          if ($i == $page) {   
              $pagLink .= "<a class = 'active' href='withdraw_history.php?page="  
                                                .$i."'>".$i." </a>";   
          }               
          else  {   
              $pagLink .= "<a href='withdraw_history.php?page=".$i."'>   
                                                ".$i." </a>";     
          }   
        };     
        echo $pagLink;   
  
        if($page<$total_pages){   
            echo "<a href='withdraw_history.php?page=".($page+1)."'>  Next </a>";   
        }   
  
      ?>    
    
  </div>
</div>

 
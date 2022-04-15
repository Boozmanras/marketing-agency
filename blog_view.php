
<?php 
include('header.php');
$per_page_record = 5;  
        
     
        if (isset($_GET["page"])) {    
            $page  = $_GET["page"];    
        }    
        else {    
          $page=1;    
        }    
    
        $start_from = ($page-1) * $per_page_record;     
    
        



?>

<html>
<head>
    <title>wean|blogs</title>
   
  
</head>
<body>

<div class="content">
                <div class="container">

<form action="search_result.php" method="get">
  <input type="search" name="search" placeholder="Search..">
</form>
</div>
</br></br>
    <?php

        $query = "SELECT * FROM blogs WHERE status='yes' ORDER BY id desc LIMIT $start_from, $per_page_record";     
        $rs_result = mysqli_query ($conn, $query);    


       

      

while ($row = mysqli_fetch_array($rs_result)) {   
            
          $date=$row['date'];
          $title=$row['title'];
          $des=$row['des'];
          $thumb=$row['thumbnail'];
          $author=$row['author'];
       
          

      ?>





<div class="content">
                <div class="container">


      <div class="blog-post">
        <h4 class="blog-post-title"><div class="tit"><?php echo $title;?></div></h4>
       
       <p> <a href="single_page.php?single=<?php echo $id;?>"><img src="images/thumbnail/<?php echo $thumb; ?>" class="img img-thumbnail" style="height:200px;"></a></p>
        </hr>
                   <i class="fas fa-user-edit"></i><?php echo $author; ?></a>
            <p><i class="fas fa-calendar-alt"></i><?php echo $row['date']; ?></p>
            </hr>
       <p> <i><?php echo substr($row['des'],0,300);?></i><a href="single_page.php?single=<?php echo $row['id'];?>">&nbsp;<b>Continue Reading..</b></a>
            

          </div>
</div>
</div>
        <hr>
      
      <?php }?>

 

 <div class="pagination">    
      <?php  
        $query = "SELECT COUNT(*) FROM blogs WHERE status='yes'";     
        $rs_result = mysqli_query($conn, $query);     
        $row = mysqli_fetch_row($rs_result);     
        $total_records = $row[0];     
          
    echo "</br>";     
        // Number of pages required.   
        $total_pages = ceil($total_records / $per_page_record);     
        $pagLink = "";       
      
        if($page>=2){   
            echo "<a href='blog_view.php?page=".($page-1)."'>  Prev </a>";   
        }       
                   
        for ($i=1; $i<=$total_pages; $i++) {   
          if ($i == $page) {   
              $pagLink .= "<a class = 'active' href='blog_view.php?page="  
                                                .$i."'>".$i." </a>";   
          }               
          else  {   
              $pagLink .= "<a href='blog_view.php?page=".$i."'>   
                                                ".$i." </a>";     
          }   
        };     
        echo $pagLink;   
  
        if($page<$total_pages){   
            echo "<a href='blog_view.php?page=".($page+1)."'>  Next </a>";   
        }   
  
      ?>    
  


</body>
</html>
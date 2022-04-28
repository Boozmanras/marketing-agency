
<?php 

$per_page_record = 10;  
        
     
        if (isset($_GET["page"])) {    
            $page  = $_GET["page"];    
        }    
        else {    
          $page=1;    
        }    
    
        $start_from = ($page-1) * $per_page_record;     
    
        


include('header.php');
 include_once 'connections/db.php';
         if(isset($_GET['search'])){

$search = htmlspecialchars($_GET['search']);

           $search_query =mysqli_real_escape_string($db,$search);
         }
       ?>

      <h2 id="search"><span>Search result:</span> <?php echo
mysqli_real_escape_string($db, htmlspecialchars($_GET['search']));


  ?></h2>
      <hr class="b-search">

<div class="content">
                <div class="container">


      <?php
         
         $sql = "SELECT * from blogs
                 WHERE title LIKE '%{$search_query}%' or des LIKE '%{$search_query}%' or author LIKE '%{$search_query}%'
                 ORDER BY id DESC
                 LIMIT $start_from, $per_page_record";     

         $squery = mysqli_query($db, $sql) or die("Error in Query : select");
         if(mysqli_num_rows($squery) > 0){
           while($row = mysqli_fetch_assoc($squery)){
             
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
            <p><i class="far fa-calendar-alt"></i><?php echo $row['date']; ?></p>
            </hr>
       <p> <i><?php echo substr($row['des'],0,300);?></i><a href="single_page.php?single=<?php echo $row['id'];?>">&nbsp;<b>Continue Reading..</b></a>
            

          </div>
</div>
</div>
        <hr>
      
      <?php }?>

 


  
<div class="pagination">    
      <?php  
        $query = "SELECT COUNT(*) FROM blogs";     
        $rs_result = mysqli_query($db, $query);     
        $row = mysqli_fetch_row($rs_result);     
        $total_records = $row[0];     
          
    echo "</br>";     
        // Number of pages required.   
        $total_pages = ceil($total_records / $per_page_record);     
        $pagLink = "";       
      
        if($page>=2){   
            echo "<a href='search_result.php?page=".($page-1)."'>  Prev </a>";   
        }       
                   
        for ($i=1; $i<=$total_pages; $i++) {   
          if ($i == $page) {   
              $pagLink .= "<a class = 'active' href='search_result.php?page="  
                                                .$i."'>".$i." </a>";   
          }               
          else  {   
              $pagLink .= "<a href='search_result.php?page=".$i."'>   
                                                ".$i." </a>";     
          }   
        };     
        echo $pagLink;   
  
        if($page<$total_pages){   
            echo "<a href='search_result.php?page=".($page+1)."'>  Next </a>";   
        }   
  
      ?>    


             
             
             
             
             
      
      <?php
           }
         else{
           echo "Record Not Found!";
         }
      ?>
      <hr>



<div class="content">
                <div class="container">

<form action="search_result.php" method="get">
  <input type="search" name="search" placeholder="Search..">
</form>
</div>



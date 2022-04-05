     <div class="main2">
      <div class="m2_section1">



<form action="search_result.php" method="get">
  <input type="search" name="search" placeholder="Search..">
</form>


      
     



      </div>

<h3 class="pb-4 mb-2 font-italic"><b style="color:green">RECENT BLOGS</b>
<img src="images/gif/new2.gif" style="width: 60px;"></h3></br></br>

      <nav class="blog-pagination">
        <a class="btn btn-outline-primary" href="#" aria-disabled="true">Newer</a>
        <a class="btn btn-outline-secondary disabled" href="#" tabindex="-1">Older</a>
      </nav>
  

<main role="main" class="container">
  <div class="row">
    <div class="col-md-8 blog-main">
      <h3 class="pb-4 mb-4 font-italic border-bottom">
    
      </h3>

      <?php


       
$query2 = mysqli_query($conn,"SELECT * FROM blogs ORDER BY id desc LIMIT 5"); 


        while ($row=mysqli_fetch_array($query2)) {
          $date=$row['date'];
          $title=$row['title'];
          $des=$row['des'];
          $thumb=$row['thumbnail'];

       
          

      ?>






      <div class="blog-post">
        <h4 class="blog-post-title"><div class="tit"><?php echo $title;?></div></h4>
       

       <p> <a href="single_page.php?single=<?php echo $id;?>"><img src="images/thumbnail/<?php echo $row['thumbnail']

; ?>" class="img img-thumbnail" style="height:400px;"></a></p>
        </hr>
                    <a href="author.php?author=<?php echo $row['id']; ?>"><i class="fas fa-user-edit"></i><?php echo $author; ?></a>
            <p><i class="far fa-calendar-alt"></i><?php echo $row['date']; ?></p>
            </hr>
       <p> <i><?php echo substr($row['des'],0,300);?></i><a href="single_page.php?single=<?php echo $row['id'];?>">&nbsp;<b>Continue Reading..</b></a><div class="mb-1 text-muted"> <div class="content">
            

          </div>
        <hr>
      
      <?php }?>

      

<a href="blog_view.php" class="btn btn-primary shadow-2 mb-4">more</a>


  
        
      
  
    </div>

 
      
        
        

      



          </div>     

<?php
include('footer.php');
?>

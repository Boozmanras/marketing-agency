
 <?php 
include('header.php');
$user_ip=$_SERVER['REMOTE_ADDR'];

?>
<style>
@import url(https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css);

i {
  color: grey;
  margin: 2px;
  padding: 6px;
}

.fa-thumbs-down {
  padding-left: 14px;
}
/*
.container {
  display: flex;
  flex-wrap: wrap;
  width: 101px;
}

.status {
    content: '';
    position: absolute;
    width: 96px;
    top: 55px;
    left: 8px;
    height: 4px;
    background: #2196F3;
    transition: all .5s;
    border-radius:15px;
}*/

.like {
  width: 43px;
  left: 8px;
  float: left;
  background-color: #4CAF50;
}

.unlike {
  width: 43px;
  left: 61px;
  background-color: #C62828;
}

.selected {
  color: #EEEEEE;
}

.unselected {
  color: #616161;

}
</style>
<main role="main" class="container">
  <div class="row">
    <div class="col-md-8 blog-main">
      <hr>
      <?php

       



         $id=$_GET['single'];

        $query=mysqli_query($conn,"select * from blogs where id='$id'");

        if ($row=mysqli_fetch_array($query)) {
          

      ?>
      <div class="blog-post">
        <h2 class="blog-post-title"><?php echo $row['title'];?></h2>
        <p class="blog-post-meta"><i class="fas fa-calendar-alt"></i> <?php echo $row['date'];?><a href="#">&nbsp;<i class="fas fa-user-edit"></i><?php echo $row['author'];?></a></p>

        <p><a href="#"><img src="images/thumbnail/<?php echo $row['thumbnail']; ?>" class="img img-thumbnail" style="width: 700px; height: 490px;"></a></p>
        <hr>
<div>

				<div class="post">
				<?php echo $row['des']; ?><br>



<?php


$name=$row['author'];
 
$check_ip = mysqli_query($conn, "select viewer from pageview where page='$id'");}



$check = mysqli_num_rows($check_ip);



if($check==0)
{
  

$insertview = mysqli_query($conn, "insert into pageview values('','$id','$user_ip','$name','$username','10')"); 



 } else { 
echo  "<b>thanks for revisiting story</b>" ; 




}
 ?>
 
 

  
<p><b><?php 

$show = mysqli_query($conn,"SELECT * FROM pageview WHERE page='$id'") or die(mysqli_error());
$no=mysqli_num_rows($show);
$no = $no/ 4;

echo(round($no,0));?> </br> special views


</p>



				<div>
       
        
        <p>




</p>
        <!--a href="single_page.php">Continue Reading..</a-->
      </div><!-- /.blog-post -->
        
     			

    </div><!-- /.blog-main -->

 
            
        
        
        </ol>
      </div>

    </aside><!-- /.blog-sidebar -->

  </div><!-- /.row -->

</main><!-- /.container -->



					
		
					</span>
					<hr>
				</div>
				</div>
			
</div>


   </br></br>
 <div class="w3-container">
                <hr>
<div class="container">
  
  


                  <?php
                  $like_query = mysqli_query($conn,"SELECT * FROM likes WHERE blogid = '$id' AND username = '$username' AND state='yes'");
                  $count = mysqli_num_rows($like_query);

                  $like_count = mysqli_query($conn,"SELECT * FROM likes WHERE blogid = '$id' AND state = 'yes'");
                  $count_likes = mysqli_num_rows($like_count);
                  if ($count == 1) {
                  echo "<h6><a href='unlike.php?id=$id'><i class='fa fa-thumbs-down fa-2x'></i></a> ($count_likes)</h6>";
                }else{
                  echo "<h6><a href='like.php?id=$id'><i class='fa fa-thumbs-up fa-2x'></i></a> ($count_likes)</h6>";
                }
                   ?>

              </div>
             

                        </div>

<script>
var thumbsUp = document.querySelector(".fa-thumbs-up");

var thumbsDown = document.querySelector(".fa-thumbs-down");

var status = document.querySelector(".status");

thumbsUp.addEventListener("click", function() {
  var status = document.querySelector(".status");
  
  if(status.classList.contains("unlike")) {
    status.classList.toggle("unlike");
    setTimeout( function() { status.classList.toggle("like"); 
    }, 500);
  } else {
    status.classList.toggle("like");
  }
});

thumbsDown.addEventListener("click", function() {
  var status = document.querySelector(".status");

  if(status.classList.contains("like")) {
    status.classList.toggle("like");
    setTimeout( function() {
      status.classList.toggle("unlike"); 
    }, 500);
  } else {
    status.classList.toggle("unlike");  
  }
});

</script>

 <?php 
//include('view.php');
?>

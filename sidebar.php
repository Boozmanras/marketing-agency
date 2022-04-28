<?php
   include 'server.php';
   $limit = 3;
   $sql = "SELECT blogs.id,blogs.title,blogs.des,blogs.date,blogs.thumbnail,
           
           ORDER BY blogs.id DESC LIMIT {$limit}";
   $squery = mysqli_query($conn, $sql) or die("Error in Query : select");
   if(mysqli_num_rows($squery) > 0){
     while($row = mysqli_fetch_assoc($squery)){
?>
<div class="m1_section1">
  <div class="sec1">
    <a href="single.php?id=<?php echo $row['post_id']; ?>"><img src="admin/images/<?php echo $row['images']; ?>"></a>
  </div>
  <div class="sec2">
    <a class="tital" href="single.php?id=<?php echo $row['post_id']; ?>"><?php echo $row['tital']; ?></a>
    <div class="content">
      <a href="category.php?category=<?php echo $row['category_id']; ?>"><i class="fas fa-tags"></i><?php echo $row['category_name']; ?></a>
      <p><i class="far fa-calendar-alt"></i><?php echo $row['post_date']; ?></p>
    </div>
    <button onclick="window.location.href='single.php?id=<?php echo $row['post_id']; ?>'">Read More</button>
  </div>
</div>
<hr>
<?php
     }
   }
?>

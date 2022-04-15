=<?php include 'header.php'; ?>
<div class="post">
  <div class="p_sec1">
    <h2>All Post's</h2>
    <a href="add_blog.php">ADD POST</a>
  </div>
  <?php
     if(isset($_GET['page'])){
       $page = mysqli_real_escape_string($conn, $_GET['page']);
     }else{
       $page = 1;
     }
     $limit = 5;
     $offset = ($page-1)*$limit;


$sql = "SELECT * FROM blogs WHERE author='$k'
               ORDER BY id
               LIMIT {$offset}, {$limit}";
    
     
     $squery = mysqli_query($conn, $sql) or die("Error in Query : select1");

     if(mysqli_num_rows($squery) > 0){
  ?>
            <div class="card">
                                <div class="card-header">manage your blogs</div>
                                <div class="card-body">
                                   
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                   

<tr>
<th scope="col">ID</th>
        <th scope="col">TITLE</th>
        <th scope="col">DES</th>
        <th scope="col">DATE</th>
        <th scope="col">AUTHOR</th>
        <th scope="col">EDIT</th>
        <th scope="col">DELETE</th>
      </tr>



         
    <tbody>
      <?php
         $series = $offset + 1;
         while($row = mysqli_fetch_assoc($squery)){
      ?>
      <tr>
        <td><?php echo $series; ?></td>
        <td class="td"><?php echo $row['title']; ?></td>
        <td><?php echo $row['des']; ?></td>
        <td><?php echo $row['date']; ?></td>
        <td><?php echo $row['author']; ?></td>
        <td><a href="edit_post.php?id=<?php echo $row['id']; ?>"><i class="fas fa-edit"></i></i></a></td>
        <td><a href="delete_post.php?cid=<?php echo $row['id']; ?>&id=<?php echo $row['id']; ?>"><i class="fas fa-trash"></i></a></td>
      </tr>
    <?php
        $series++;
        }
    ?>
    </tbody>
  </table>
  <?php }else{
           echo "blogs are empty!.";
           die();
         }
  ?>
  <div id="pagination">
    <ul>
      <?php
     
          $sql1 = "SELECT * FROM blogs WHERE author = '$k'";
        
        $squery1 = mysqli_query($conn, $sql1) or die("Error in Query : select2");
        $total_record = mysqli_num_rows($squery1);
        $total_page = ceil($total_record/$limit);
        if($page > 1){
          echo '<li><a href="blogs.php?page='.($page - 1).'">Prev</a></li>';
        }
        for($i = 1; $i <= $total_page; $i++){
          if($page == $i){
            $active = "active";
          }else{
            $active = "a";
          }
          echo '<li><a class='.$active.' href="blogs.php?page='.$i.'">'.$i.'</a></li>';
        }
        if($page < $total_page){
          echo '<li><a href="blogs.php?page='.($page + 1).'">Next</a></li>';
        }
      ?>
    </ul>
  </div>
</div>

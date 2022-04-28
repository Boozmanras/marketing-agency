                                        <?php 
                                        include("admin_header.php"); 
                                        
                                        $id=$_GET['id'];
                                        $money= $_GET['reward'];
                                        if(empty($money))
                                        {
                                        $_SESSION['success']="prize money empty";
                                        echo
                                        '<script>window.location.replace("ads_approval.php")</script>';
                                        
                                        }
                                        else{
                                        
                                        $sql2= mysqli_query($conn,"SELECT * from screenshots WHERE id='$id'");
                                        while($row=mysqli_fetch_assoc($sql2)){
                                        $use=$row['username'];
                                        
                                        }
                                        $reward= mysqli_query($conn,"SELECT bal FROM users WHERE username='$use'");
                                        while($row = mysqli_fetch_assoc($reward)){
                                        $bal = 0;
                                        $bal = $row['bal'];
                                        $nbal= $bal + $money;
                                        }
                                        
                                        $udate = "UPDATE users SET bal='$nbal' WHERE username='$use'";
                                        
                                        if (mysqli_query($conn, $udate)) {
                                        
                                        
                                        $sql = "UPDATE screenshots SET status='yes' AND amount='$money' WHERE id='$id'";
                                        
                                        if (mysqli_query($conn, $sql)) {
                                        
                                        
                                      
                                        
                                        
                                       $_SESSION['success']="views accepted successfully";
                                       
                                        echo '<script>window.location.replace("ads_approval.php")</script>';
                                        
                                        
                                        }
                                        else {
                                        $_SESSION['success']="error occurred while changing status";
                                        
                                        echo
                                        '<script>window.location.replace("ads_approval.php")</script>';
                                        
                                        }
                                        }
                                        
                                        else {
                                        $_SESSION['success']="error occurred while updating balance";
                                        
                                        echo
                                        '<script>window.location.replace("ads_approval.php")</script>';
                                        
                                        }
                                        }
                                        
                                        
                                        ?>   
<?php
 session_start();
 $errors = array(); 
include('../server.php');
if(isset($_SESSION['username'], $_SESSION['password'],$_SESSION['package'])){                                                                                 $username =   $_SESSION['username']    ;    
                                             $password=$_SESSION['password'];
$package= $_SESSION['package'];
}

elseif(isset($_COOKIE["username"],$_COOKIE['password'],$_COOKIE['package'])){

$username=$_COOKIE['username'];
$password=$_COOKIE['password'];
$package=$_COOKIE['package'];
}
else{


header('location:./login.php');
$_SESSION['msg']="You have been logged out because  you were inactive";
}






                   if (isset($_GET['logout'])) {
if(isset($_cookie['user'])){
$_SESSION['msg'] = "you have successfuly logged out";
setcookie("username", time() - 3600);
setcookie("password", time() - 3600);
header('location:../login.php');
}
else{

                     	session_destroy();
                           	unset($_SESSION['username']);
                                 	header("location: ../login.php");
}
                                       }

 


                                                                                                                                                                                                                 	 $data= mysqli_query($conn,"SELECT * FROM users WHERE username= '$username' AND password='$password'") or die(mysql_error());
                                                                                                                                                                                                                                                            
                                                                                                                                                                                                                                                              while ($row=mysqli_fetch_array($data)) {
                                                                                                                                                                                                                                                                  $status=$row['status'];
                                                                                                                                                                                                                                                                    
                                                                                                                                                                                                                                                                        
                                                                                                                                                                                                                                                                          }


                                                                                                                                                                                                                                                                          if ($status != 'yes') {
                                                                                                                                                                                                                                                                            
                                                                                                                                                                                                                                                                              header('location:login.php');
                                                                                                                                                                                                                                                                              $_SESSION['msg']="sorry an error occured please login!!";
                                                                                                                                                                                                                                                                              }


                                                                                                                                                                                                                                                                               
                                                                                                                                                                                                                                                                                  
	 
$path = $_SERVER['DOCUMENT_ROOT'];
  $path .= "/connections/db.php";
  include_once($path);



$status_query = "SELECT * FROM notifications WHERE active=0";
$result_query = mysqli_query($db, $status_query);
$count = mysqli_num_rows($result_query);

$g = mysqli_query($conn, "SELECT gpoints FROM users WHERE username = '$username'"); 
$points=0;
while ($row=mysqli_fetch_array($g)){   
$points = $row['gpoints'];
}

                                       ?>

<!doctype html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <title>Wearn</title>
   <link rel="icon" type="image/x-icon" href="../asset/favicon.png">
   <link href="../assets/vendor/fontawesome/css/fontawesome.min.css" rel="stylesheet">

   <link rel="stylesheet" type="text/css" href="../loader.css">
<link href="../assets/vendor/fontawesome/css/solid.min.css" rel="stylesheet">
   <link href="../assets/vendor/fontawesome/css/brands.min.css" rel="stylesheet">
   <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
   <link href="../assets/css/master.css" rel="stylesheet">
   <link href="../assets/vendor/chartsjs/Chart.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="../style2.css">
<link href="../assets/css/blogs.css" rel="stylesheet"/>
<link href="../search.css" rel="stylesheet"/>
   <link href="../assets/vendor/flagiconcss/css/flag-icon.min.css" rel="stylesheet">
 
     <link rel="stylesheet" href="../assets/css/breadcrumb.css">

<link href="../assets/css/alert.css" rel="stylesheet">


<link href="../assets/css/like_system.css" type="text/css" rel="stylesheet" />
       <script src="../assets/vendor/jquery/jquery-3.3.1.js" type="text/javascript"></script>

       <script src="../assets/js/like_system.js" type="text/javascript"></script>



 <style>
   .pagination {   
       display: inline-block;   
   }   
   .pagination a {   
       font-weight:bold;   
       font-size:18px;   
       color: black;   
       float: left;   
       padding: 8px 16px;   
       text-decoration: none;   
       border:1px solid black;   
   }   
   .pagination a.active {   
           background-color: pink;   
   }   
   .pagination a:hover:not(.active) {   
       background-color: skyblue;   
   }   
      



input[type=search] {
 width: 130px;
 box-sizing: border-box;
 border: 2px solid #ccc;
 border-radius: 4px;
 font-size: 16px;
 background-color: white;
 background-image: url('asset/searchicon.png');
 background-position: 10px 10px; 
 background-repeat: no-repeat;
 padding: 12px 20px 12px 40px;
 -webkit-transition: width 0.4s ease-in-out;
 transition: width 0.4s ease-in-out;
}

input[type=search]:focus {
 width: 100%;
}

    
  .notification {
 background-color: inherit;
 color: inherit;
 text-decoration: none;
 padding: 15px 26px;
 position: relative;
 display: inline-block;
 border-radius: 2px;
}

.notification:hover {
 background: inherit;
}
/*
.badge {
 position: absolute;
 top: -10px;
 right: -10px;
 padding: 5px 5px;
 border-radius: 50%;
 background: red;
 color: white;
}*/

/* The Modal (background) */
.modal {
 display: none; /* Hidden by default */
 position: fixed; /* Stay in place */
 z-index: 1; /* Sit on top */
 left: 0;
 top: 0;
 width: 100%; /* Full width */
 height: 100%; /* Full height */
 overflow: auto; /* Enable scroll if needed */
background-color: rgb(0,0,0); /* Fallback color */
 background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

.modal-content {
 background-color: #f1f1f1;
 margin: 15% auto;  15% from the top and centered 
 padding: 20px;
 border: 1px solid #f1f1f1;
 width: 80%; /* Could be more or less, depending on screen size */
}

/* The Close Button */
.close {
 color: #aaa;
 float: right;
 font-size: 28px;
 font-weight: bold;
}

.close:hover,
.close:focus {
 color: black;
 text-decoration: none;
 cursor: pointer;
}
.breadcrumb {
 background-color: #d8dfe7;
}
 

</style>





 




     


                                             
                                           
   
</head>
<body onload="myFunction()">
<div id="loader"></div>
<div style="display:none;" id="myDiv" class="animate-bottom">


   
   <div class="wrapper">
       <nav id="sidebar" class="active">
           <div class="sidebar-header">
           <img src="../asset/logo.png" width='150' height='50' alt="logo" class="app-logo">
           
           
              
           </div>
           <ul class="list-unstyled components text-secondary">
               <li>
                   <a href="../index.php"><i class="fas fa-home"></i> Dashboard</a>
               </li>


            
               
               <li>
                   <a href="#uielementsmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle no-caret-down"><i class="fas fa-layer-group"></i>Products</a>
                   <ul class="collapse list-unstyled" id="uielementsmenu">
                       <li>
                           <a href="../blog.php"><i class="fas fa-angle-right"></i>Blogging</a>
                       </li>
                       <li>
                           <a href="../games"><i class="fas fa-angle-right"></i>games</a>
                       </li>
                      
                       <li>
                           <a href="../trivia.php"><i class="fas fa-angle-right"></i>Trivia</a>
                       </li>
                       <li><a href="../whatsapp_ads.php"><i class="fas fa-angle-right"></i>Whatsapp ads</a></li>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                             <li><a href="../googles_ads.php"><i class="fas fa-angle-right"></i>Google ads </a></li>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                             <li><a href="../youtube.php"><i class="fas fa-angle-right"></i>Youtube videos </a></li>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                             <li><a href="../upload.php"><i class="fas fa-angle-right"></i>Upload views </a></li>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                             
                   </ul>
               </li>

  <li>
                   <a href="../withdraw.php"><i class="fas fa-money-bill-wave"></i>withdraw</a>
               </li>
      <?php 
/*   
             
 <li>
                   <a href="#authmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle no-caret-down"><i class="fas fa-money-bill-alt"></i>Balances</a>
                   <ul class="collapse list-unstyled" id="authmenu">
                       <li>
                           <a href="../bloge.php"><i class="fas fa-angle-right"></i>Blogs earning </a>
                       </li>
                       <li>
                           <a href="../gamee.php"><i class="fas fa-angle-right"></i>Gaming points </a>
                       </li>
                       <li>
                           <a href="../bonuse.php"><i class="fas fa-angle-right"></i>Bonuses</a>
                       </li>
                       <li>
                        <a href="../triviae.php"><i class="fas fa-angle-right"></i>Trivia earning</a>
                         
                       </li>

                   </ul>
               </li>
               <li>
                   <a href="#pagesmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle no-caret-down"><i class="fas fa-copy"></i>Withdraw</a>
                   <ul class="collapse list-unstyled" id="pagesmenu">
<li>
<a href="../refw.php"><i class="fas fa-angle-right"></i>Withdraw from referrals</a></li>
                       <li>
                           <a href="../blogw.php"><i class="fas fa-angle-right"></i>Withdraw from blogs</a>
                       </li>
                       <li>
                           <a href="../gamew.php"><i class="fas fa-angle-right"></i>Withdraw gaming points</a>
                       </li>
                       <li>
                           <a href="../bonusw.php"><i class="fas fa-angle-right"></i>Withdraw bonuses</a>
                       </li>
                       <li>
                         <a href="../triviaw.php"><i class="fas fa-angle-right"></i>Withdraw from Trivia</a>
                       </li>
                   </ul>
               </li>
*/
?>


<li>
                   <a href="../contact.php"><i class="fas fa-address-card"></i>contact us</a>
               </li>


      
               
           </ul>
       



       </nav>

<?php

$status_query = "SELECT * FROM notifications WHERE active=0";

$output = mysqli_query($db, $status_query);


   
  ?>


<div id="body" class="active">
           <nav class="navbar navbar-expand-lg navbar-white bg-white">
               <button type="button" id="sidebarCollapse" class="btn btn-light"><i class="fas fa-bars"></i><span></span></button>
               <div class="collapse navbar-collapse" id="navbarSupportedContent">
                   <ul class="nav navbar-nav ml-auto">
                       <li class="nav-item dropdown">
                           <div class="nav-dropdown">

<a href="#" class="notification" id="myBtn">
 <span><i class="fas fa-bell"></i></span>
 <span class="count badge badge-danger"><?php echo $count;?></span>
</a></li>
     

<!-- The Modal -->
<div id="myModal" class="modal">

 <!-- Modal content -->
 <div class="modal-content">
   <span class="close">&times;</span>
<?php


$query = "SELECT * FROM notifications WHERE username='$username' ORDER BY id DESC LIMIT 5";
$result = mysqli_query($db, $query);
$output = '';
if(mysqli_num_rows($result) > 0)
{
while($row = mysqli_fetch_array($result))
{
echo "<b>".$row['title']."</b>".$row['msg']."</br>".$row['date']."</hr>";}}?>
 </div>

</div> 



                               
                       <li class="nav-item dropdown">
                           <div class="nav-dropdown">
                               <a href="" class="nav-item nav-link dropdown-toggle text-secondary" data-toggle="dropdown"><i class="fas fa-user"></i> <span><?php echo $username;?></span> <i style="font-size: .8em;" class="fas fa-caret-down"></i></a>
                               <div class="dropdown-menu dropdown-menu-right nav-link-menu">
                                   <ul class="nav-list">
                                       <li><a href="" class="dropdown-item"><i class="fas fa-address-card"></i><?php echo "you have".$points."gaming points";?></a></li>
                                       <li><a href="" class="dropdown-item"><i class="fas fa-envelope"></i> Messages</a></li>
                                       <li><a href="" class="dropdown-item"><i class="fas fa-cog"></i> Settings</a></li>
                                       <div class="dropdown-divider"></div>
                                       <li><a href="../index.php?logout='1'" class="dropdown-item"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
                                   </ul>
                               </div>
                           </div>
                       </li>
                   </ul>
               </div>
           </nav>





























       

<script>



// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on the button, open the modal
btn.onclick = function() {
 modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
 modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
 if (event.target == modal) {
   modal.style.display = "none";
 }
}




                                                                                                                             
                                                                                                                                                 
             
                                                                                                                                                                                                                                                                                </script>


<script src = "../assets/js/slider.js"></script>
<script src="../assets/js/loader.js"></script>

   <script src="../assets/vendor/jquery/jquery.min.js"></script>
   <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
   <script src="../assets/vendor/chartsjs/Chart.min.js"></script>
   <script src="../assets/js/dashboard-charts.js"></script>
   <script src="../assets/js/script.js"></script>


 
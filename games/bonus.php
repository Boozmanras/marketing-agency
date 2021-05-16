 <?php 
include('header.php');

$bal = mysqli_query($conn, "SELECT bal FROM users where username='$username'");    

?>
           
<nav class="py-2">
				<ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="index.php">Home</a></li>
<li class="breadcrumb-item"> <a href="games/index.php">gaming dashboard</a>
</li>    <li class="breadcrumb-item active">bonus</li>				
                </ol>
            </nav>


               <body>
    <div class="wrapper">
        <div class="auth-content">
            <div class="card">
                <div class="card-body text-center">
                    </br>
                    <h6 class="mb-4 text-muted">guess a lucky number between 1-100 and win amazing prizes</h6>
                   
                    <form action="bonus.php" method="POST">
                        
                         
                             


<?php
$ref = mysqli_query($conn,"SELECT * FROM gaming_points WHERE username='$username'") or die(mysqli_error());
                             
    // use a real conditional, I'm just duplicating you for simplicity
    if (mysqli_num_rows($ref)>=1) {
?>
<div class="form-group text-left">
 <label for="email">Lucky guess</label>
</br>

    <input name="ch1" type="text"  required/>
</div>
<?php
    } else {
      
?>
<div class="error success" >
      	<h6>
          sorry you don't have enough points</h6>
          	
</div>
<div class="form-group text-left">
 <label for="email">Lucky guess</label>
</br>
    <input name="ch2" type="text" disabled="disabled" />
<?php
    }?>


                        </div>
                        <button class="btn btn-primary shadow-2 mb-4">guess</button>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
    
    </br></br>


<?php
    $chiffre = $_POST['ch1'];
    $chiffreGagnante = rand(0, 100);
    
if (empty($chiffre)) { array_push($errors, "Lucky guess cannot be empty"); }

else
{

    

    echo 'Your lucky number is: ' . $chiffre . '<br><br>';
    echo 'The lucky number is: ' . $chiffreGagnante . '<br><br>';

    $bravo = 0;
    $sorry = 0;

    if ($chiffre == $chiffreGagnante) {

 $query3=mysqli_query($conn,"insert into bonus(username,bonus) values('$k','20')");
 
$bonus = $bal + 20;

$sql1 =mysqli_query($conn,"UPDATE users SET bal='$bonus' WHERE username='$username'");
   




$_SESSION['success'] = "Bravo! you've been awarded ksh 20 <br><br>";
        
    header("location:bonus.php");    

        if (!isset($_SESSION['Bravo'])) {
            $_SESSION['Bravo'] = 0;
        }
        else {
            $_SESSION['Bravo']++;
        }
        $bravo = $_SESSION['Bravo'];
    }

    else {
        echo 'Sorry! <br><br>';
        
        session_start();

        if (!isset($_SESSION['Sorry'])) {
            $_SESSION['Sorry'] = 0;
        }
        else {
            $_SESSION['Sorry']++;
        }
        $sorry = $_SESSION['Sorry'];
    }

    echo "You guessed the number " . $bravo . " times <br>";
    echo "You've guessed " . $sorry . "times <br>" ;

$ref = $ref - 1;

$sql = "UPDATE gaming_points SET points='$ref' WHERE username='$username'";

if ($conn->query($sql) === TRUE) {
 // echo "Record updated successfully";
} else {
  echo "Error updating record";
}
    
}
    
?>









         </div>      
</div>

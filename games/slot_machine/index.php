<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Project/PHP/PHPProject.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Slot Machine</title>
            <h1> Welcome to Slot Machine Simulator!!! </h1>
        <style>
            h1{
                text-align: center;
                color: red;
            }
            
            body{
                background-color: wheat;
            }
            
            h2{
                
                display: flex;
                align-items: center;
                justify-content: center;
                height: 100%;
                overflow: hidden;
                margin: 30px;
                
            }
              
        </style>
    </head>
    <body>
                 
        <?php
       
    
    $slot1 = rand(1, 7);
    $slot2 = rand(1, 7);
    $slot3 = rand(1, 7);

    $result = $slot1.' | '.$slot2.' | '.$slot3;

    // Read points from file
    $filename = 'points.txt';
    $handle = fopen($filename, 'r');
    $current = fread($handle, filesize($filename));
    fclose($handle);

    if ($slot1 == $slot2 && $slot2 == $slot3) {
        
     $status = '<big>Congratulation, You are a winner!</big>';
     
        $add_points = $current + 10;

    // Add points to file
    $handle = fopen($filename, 'w');
    $points = fwrite($handle, $add_points);
    fclose($handle);

    } else {
    $status = 'Sorry, press reload page to try again!';
    }
    
        ?>
        
<div>
    <h2><big><?= $result; ?></big></h2>

    <h2><big><?= $status; ?></big></h2>

    <h2><big><?= 'You have <strong>'.$current.'</strong> points!'; ?></big></h2>
</div>

</body>
</html>
   
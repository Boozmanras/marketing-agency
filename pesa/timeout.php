<?php
header("Content-Type: application/json");

$mpesaResponse = file_get_contents('php://input');

/******* log the response**********/
$logFile = "Timeout.txt";
// write the M-PESA Response to file
$log = fopen($logFile, "a");
fwrite($log, $mpesaResponse);
fclose($log);
                $callbackData=json_decode($mpesaResponse);
                        $type=$callbackData->TransactionType;
                                    
                                                $amount=$callbackData->TransAmount;

$phone=$callbackData->MSISDN;

$timeout = mysqli_query($conn,"INSERT
INTO timeout(amount,phone,type)VALUES('$type','$amount','$phone')");


?>

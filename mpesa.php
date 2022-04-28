                                                       
                                                       <?php
                                                       
                                                       /* Urls */
                                                       $access_token_url = 'https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials';
                                                       $b2c_url = 'https://sandbox.safaricom.co.ke/mpesa/b2c/v1/paymentrequest';
                                                       
                                                       
                                                       /* Required Variables */
                                                       $consumerKey = 'GGHr9yYvkwnQY0AtMl5kay0w7LEzGLhu';        # Fill with your app Consumer Key
                                                       $consumerSecret = 'T72wcZHAYzZLhdGE';     # Fill with your app Secret
                                                       $headers = ['Content-Type:application/json; charset=utf8'];
                                                       
                                                       /* from the test credentials provided on you developers account */
                                                       $InitiatorName = 'fidelity investments co';      # Initiator
                                                       $SecurityCredential = 'UVzdiL7xrAeE2D2U0O2z8rNwkRVTFAYINAX2Eq/+Ra5T7Xoddtx2x1M+S+zf4rnt/L2vHYlEd8SOPSVWCZZLXkO9zXRUw6pA/Y9GJrnOfIYM3bj/hMYjdSQy3BZx9iomu04nyLpVz57Aiyp/eZKnye8iS6Tkdxj7Cj/RSDIUBSAX65zedbAeEPXQ9gw4pi3s33fcRqO1V97k506iVBE57Xv9toz/9/xGytWWJeUpnxHJukR8sDGdNfxDzkC7EnUuBl0Bhuh3MS5HGBIbsBbAuKRN9TA7fQq/UC45/mdRfUGIRVmTllCLFl5FgCvTi1yRA3aAGFjmo4LtoXVoRwwwcA=='; 
                                                       $CommandID = 'BusinessPayment';          # choose between SalaryPayment, BusinessPayment, PromotionPayment 
                                                       $Amount = '10';
                                                       $PartyA = '174379';             # shortcode 1
                                                       $PartyB = '254794988992';             # Phone number you're sending money to
                                                       $Remarks = 'Salary';      # Remarks ** can not be empty
                                                       $QueueTimeOutURL = 'http://jijaze.epizy.com/pesa/confirmation.php?token=iKo_Kisi@giN1';    # your QueueTimeOutURL
                                                       $ResultURL = 'http://jijaze.epizy.com/pesa/confirmation.php?token=iKo_Kisi@giN1';          # your ResultURL
                                                       $Occasion = 'chrismas';           # Occasion
                                                       
                                                       /* Obtain Access Token */
                                                       $curl = curl_init($access_token_url);
                                                       curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
                                                       curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
                                                       curl_setopt($curl, CURLOPT_HEADER, FALSE);
                                                       curl_setopt($curl, CURLOPT_USERPWD, $consumerKey.':'.$consumerSecret);
                                                       $result = curl_exec($curl);
                                                       $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
                                                       $result = json_decode($result);
                                                       $access_token = $result->access_token;
                                                       curl_close($curl);
                                                       
                                                       /* Main B2C Request to the API */
                                                       $b2cHeader = ['Content-Type:application/json','Authorization:Bearer '.$access_token];
                                                       $curl = curl_init();
                                                       curl_setopt($curl, CURLOPT_URL, $b2c_url);
                                                       curl_setopt($curl, CURLOPT_HTTPHEADER, $b2cHeader); //setting custom header
                                                       
                                                       $curl_post_data = array(
                                                       //Fill in the request parameters with valid values
                                                       'InitiatorName' => $InitiatorName,
                                                       'SecurityCredential' => $SecurityCredential,
                                                       'CommandID' => $CommandID,
                                                       'Amount' => $Amount,
                                                       'PartyA' => $PartyA,
                                                       'PartyB' => $PartyB,
                                                       'Remarks' => $Remarks,
                                                       'QueueTimeOutURL' => $QueueTimeOutURL,
                                                       'ResultURL' => $ResultURL,
                                                       'Occasion' => $Occasion
                                                       );
                                                       
                                                       $data_string = json_encode($curl_post_data);
                                                       curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                                                       curl_setopt($curl, CURLOPT_POST, true);
                                                       curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
                                                       $curl_response = curl_exec($curl);
                                                       print_r($curl_response);
                                                       echo $curl_response;
                                                       ?>
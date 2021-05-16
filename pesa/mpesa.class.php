<?php

$servername = "sql102.epizy.com";
$db_username = "epiz_28354383";
$db_password = "ZflJogxxbEFlM";
$database = "epiz_28354383_gloom";


// initializing variables
$email    = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect($servername, $db_username, $db_password, $database);


class Mpesa {
    public $config;
	
	function __construct(array $configs = [])
	{
$defaults = array(
			'env'               => 'sandbox',
			'type'              => 4,
			'shortcode'         => '174379',
			'headoffice'        => '174379',
		    'key'               => 'OA0G84ASumFsRYu6XCr3nustb8ZYD6Y9',
			'secret'            => 'BuFWbdzSp9xuTwVD',
			'username'          => 'apitest',
			'passkey'           => 'bfb279f9aa9bdbcf158e97dd71a467cd2e0c893059b10f78e6b72ada1ed2c',
			'validation_url'    => 'http://www.testingit.epizy.com/pesa/mpesa.class.php/validate',
			'confirmation_url'  => 'http://www.testingit.epizy.com/pesa/mpesa.class.php/confirm',
			'callback_url'      => 'http://www.testingit.epizy.com/pesa/mpesa.class.php/reconcile',
			'timeout_url'       => 'http://www.testingit.epizy.com/pesa/mpesa.class.php/timeout.php',
			'results_url'       => 'http://www.testingit.epizy.com/pesa/mpesa.class.php/results',
			  'SecurityCredential' => 'Cxmnf4N5ZIQZSfcrubYP38wvvtI+vdkjZrgzQOQVDlHJpIF+9VCmbw6isY8yQcHV/4BP/9pPrqnjxrzi9zwlW9oTzSaRiHR6M8UAcvRySGJ9myxeewz9PuSAwHYBGOK4iVMNpbQCIc2Ex0mw8vqAfquVFqIHtg2uMinvVklZdfbxA8c3Y0N1ffieecm7PIyFToj8QIUWG2cV8+j0VsuTPeGCCHoX+ZU7kAJ+H5ICW07zJHbGFqY4LBj1UsjJl+Wdcvc3CbX4p9FYP6yaavkWfqJW/iWBLVVysHREUlZawQUhNu0wHAW0UbHEDYbDq2Vmma65k+kSWlYrn/G8uQqyjQ==',
			  'b2cremark' => 'congratulations',
			  );


		if(!isset($configs['headoffice']) || empty($configs['headoffice'])){
			$defaults['headoffice'] = $configs['shortcode'];
		}

		$parsed = array_merge($defaults, $configs);

		$this->config 	= (object)$parsed;
	}

	/**
	 * @return string Access token
	 */

public function results($db){

//sample result url file.

header("Content-Type: application/json");
// Save the M-PESA input stream.
$mpesaResponse = file_get_contents('php://input');

/******* log the response**********/
$logFile = "Result.txt";
// write the M-PESA Response to file
$log = fopen($logFile, "a");
fwrite($log, $mpesaResponse);
fclose($log);



$callbackData=json_decode($mpesaResponse);
                      
                                $trans=$callbackData->TransID;
                                        $time=$callbackData->TransTime;
$phone=$callbackData->MSISDN;
                                                $amount=$callbackData->TransAmount;

                             $query = "INSERT INTO b2c_results (phone, transid, time,amount)       

VALUES('$phone', '$trans', '$time', '$amount','$country')";

                                	mysqli_query($db, $query);
}                           
                                                            





	public function token()
	{
		$endpoint = ($this->config->env == 'live') 
			? 'https://api.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials' 
			: 'https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials';

		$credentials = base64_encode($this->config->key.':'.$this->config->secret);
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL, $endpoint);
		curl_setopt($curl, CURLOPT_HTTPHEADER, array('Authorization: Basic '.$credentials));
		curl_setopt($curl, CURLOPT_HEADER, false);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		$curl_response = curl_exec($curl);
		$result = json_decode($curl_response);

		return isset($result->access_token) ? $result->access_token : '';
	}
	
	
	/**
	 * @param callable $callback Defined function or closure to process data and return true/false
	 * 
	 * @return array
	 */
public function reconcile($db){


        $callbackJSONData=file_get_contents('php://input');
                $callbackData=json_decode($callbackJSONData);
                        $TransactionType=$callbackData->TransactionType;
                                $TransID=$callbackData->TransID;
                                        $TransTime=$callbackData->TransTime;
                                                $TransAmount=$callbackData->TransAmount;

                                                        $BusinessShortCode=$callbackData->BusinessShortCode;
                                                                $BillRefNumber=$callbackData->BillRefNumber;
                                                                        $InvoiceNumber=$callbackData->InvoiceNumber;
                                                                                $OrgAccountBalance=$callbackData->OrgAccountBalance;
                                                                                        $ThirdPartyTransID=$callbackData->ThirdPartyTransID;
                                                                                                $MSISDN=$callbackData->MSISDN;
                                                                                                        $FirstName=$callbackData->FirstName;
                                                                                                                $MiddleName=$callbackData->MiddleName;
                                                                                                                        $LastName=$callbackData->LastName;
                                                  
                                                                                                                                                                                                                                                                                                                                                                                                                                                             // Attempt insert query execution
                                                                                                                                                                                                                                                 $sql = "INSERT INTO confirmation (
                                                                                                                                                                                                                                                 TransactionType,
                                                                                                                                                                                                                                                 TransID,
                                                                                                                                                                                                                                                 TransTime,
                                                                                                                                                                                                                                                 TransAmount,
                                                                                                                                                                                                                                                 BusinessShortCode,
                                                                                                                                                                                                                                                 BillRefNumber,
                                                                                                                                                                                                                                                 InvoiceNumber,
                                                                                                                                                                                                                                                 OrgAccountBalance,
                                                                                                                                                                                                                                                 ThirdPartyTransID,
                                                                                                                                                                                                                                                 MSISDN,
                                                                                                                                                                                                                                                 FirstName,
                                                                                                                                                                                                                                                 MiddleName,
                                                                                                                                                                                                                                                 LastName
                                                                                                                                                                                                                                                 ) VALUES ('$TransactionType',
                                                                                                                                                                                                                                                 '$TransID',
                                                                                                                                                                                                                                                 '$TransTime',
                                                                                                                                                                                                                                                 '$TransAmount',
                                                                                                                                                                                                                                                 '$BusinessShortCode',
                                                                                                                                                                                                                                                 '$BillRefNumber',
                                                                                                                                                                                                                                                 '$InvoiceNumber',
                                                                                                                                                                                                                                                 '$OrgAccountBalance',
                                                                                                                                                                                                                                                 '$ThirdPartyTransID',
                                                                                                                                                                                                                                                 '$MSISDN',
                                                                                                                                                                                                                                                 '$FirstName',
                                                                                                                                                                                                                                                 '$MiddleName',
                                                                                                                                                                                                                                                 '$LastName' )";
                                                                                                                                                                                                                                                 if(mysqli_query($db, $sql)){
                                                                                                                                                                                                                                                     echo "Records inserted successfully.";
                                                                                                                                                                                                                                                     } else{
                                                                                                                                                                                                                                                         echo "ERROR: Could not able to execute";
                                                                                                                                                                                                                                                         }
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      

}


	public static function validate($callback = null)
	{
		$data = json_decode(file_get_contents('php://input'), true);

		if(is_null($callback)){
			return array('ResultCode' => 0, 'ResultDesc' => 'Success');
		} else {
			return call_user_func_array($callback, array($data)) 
			? array('ResultCode' => 0, 'ResultDesc' => 'Success') 
			: array('ResultCode' => 1, 'ResultDesc' => 'Failed');
		}
	}
	
	/**
	 * @param callable $callback Defined function or closure to process data and return true/false
	 * 
	 * @return array
	 */
	public function confirm($callback = null)
	{
		$data = json_decode(file_get_contents('php://input'), true);
		if(is_null($callback)){
			return array('ResultCode' => 0, 'ResultDesc' => 'Success');
		} else {

			return call_user_func_array($callback, array($data)) 
			? array('ResultCode' => 0, 'ResultDesc' => 'Success') 
			: array('ResultCode' => 1, 'ResultDesc' => 'Failed');
		}
	}
	
	public function register($callback = null)
	{
		$token      = $this->token();
		$endpoint   = ($this->config->env == 'live') ? 
		'https://api.safaricom.co.ke/mpesa/c2b/v1/registerurl' : 
		'https://sandbox.safaricom.co.ke/mpesa/c2b/v1/registerurl';
		$curl       = curl_init();
		curl_setopt($curl, CURLOPT_URL, $endpoint);
		curl_setopt(
			$curl, 
			CURLOPT_HTTPHEADER, 
			array(
				'Content-Type:application/json',
				'Authorization:Bearer '.$token
			)
		);

		$curl_post_data = array(
			'ShortCode' 		=> $this->config->shortcode,
			'ResultType' 		=> 'Cancelled',
			'ConfirmationURL' 	=> $this->config->confirmation_url,
			'ValidationURL' 	=> $this->config->validation_url
		);
		$data_string = json_encode($curl_post_data);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_POST, true);
		curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
		curl_setopt($curl, CURLOPT_HEADER, false);
		$response   = curl_exec($curl);
		$content    = json_decode($response, true);

		if(is_null($callback)){
			if ($response) {
				if(isset($content['ResultDescription'])){
					$status = $content['ResultDescription'];
				} elseif(isset($content['errorMessage'])){
					$status = $content['errorMessage'];
				} else {
					$status = 'Sorry could not connect to Daraja. Check your connection/configuration and try again.';
				}
			}
			
			return array('Registration status' => $status);
		} else {
			return \call_user_func_array($callback, $content);
		}
	}



	public function simulate($phone, $amount, $username, $command = 'CustomerPayBillOnline')
	{
		$token = $this->token();
/*		$phone = (substr($phone, 0,1) == '+') ? str_replace('+', '', $phone) : $phone;
		$phone = (substr($phone, 0,1) == '0') ? preg_replace('/^0/', '254', $phone) : $phone;
*/
		$endpoint = ($this->config->env == 'live') 
		? 'https://api.safaricom.co.ke/mpesa/c2b/v1/simulate' 
		: 'https://sandbox.safaricom.co.ke/mpesa/c2b/v1/simulate';

		$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL, $endpoint);
		curl_setopt(
			$curl, 
			CURLOPT_HTTPHEADER, 
			array(
				'Content-Type:application/json',
				'Authorization:Bearer '.$token
			)
		);
		$curl_post_data     = array(
			'ShortCode'     => $this->config->shortcode,
			'CommandID'     => $command,
			'Amount'        =>  $amount,
			'Msisdn'        => $phone,
			'BillRefNumber' => $username
		);
		$data_string        = json_encode($curl_post_data);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_POST, true);
		curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
		curl_setopt($curl, CURLOPT_HEADER, false);
		$curl_response = curl_exec($curl);
		$response = curl_exec($curl);
echo $response;
		return json_decode($response, true);

	}

    
    public function stk($phone, $amount, $username, $description = 'Transaction Description', $remark = 'Remark')
    {
        $token      = $this->token();
        
		/*$phone      = (substr($phone, 0,1) == '+') ? str_replace('+', '', $phone) : $phone;
		$phone      = (substr($phone, 0,1) == '0') ? preg_replace('/^0/', '254', $phone) : $phone;*/

		$timestamp  = date('YmdHis');
        $password   = base64_encode($this->config->shortcode.$this->config->passkey.$timestamp);
        
		$endpoint   = ($this->config->env == 'live')
            ? 'https://api.safaricom.co.ke/mpesa/stkpush/v1/processrequest' 
            : 'https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest';

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $endpoint);
        curl_setopt(
            $curl, 
            CURLOPT_HTTPHEADER, 
            array(
                'Content-Type:application/json', 
                'Authorization:Bearer '.$token
            )
        );
        $curl_post_data = array(
            'BusinessShortCode' => $this->config->headoffice,
            'Password' 			=> $password,
            'Timestamp' 		=> $timestamp,
            'TransactionType' 	=> ($this->config->type == 4) ? 'CustomerPayBillOnline' : 'CustomerBuyGoodsOnline',
            'Amount' 			=> $amount,
            'PartyA' 			=> $phone,
            'PartyB' 			=> $this->config->shortcode,
            'PhoneNumber' 		=> $phone,
            'CallBackURL' 		=> $this->config->callback_url,
            'AccountReference' 	=> $username,
            'TransactionDesc' 	=> $description,
            'Remark'			=> $remark
        );
        $data_string = json_encode($curl_post_data);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
        curl_setopt($curl, CURLOPT_HEADER, false);
        $response = curl_exec($curl);
echo $response;
		
		return json_decode($response, true);
  $merchantRequestID = json_decode($response)->MerchantRequestID;
 

//  echo $merchantRequestID;
  
 if(!isset($merchantRequestID)){

array_push($errors,"".$response);
                                
    }
    }



public function b2c($phone,$amount,$username){
  
  $token      = $this->token();
       $b2curl= 'https://sandbox.safaricom.co.ke/mpesa/b2c/v1/paymentrequest';

$curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $b2curl);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json', 'Authorization:Bearer '.$token)); //setting custom header


        $curl_post_data = array(
            //Fill in the request parameters with valid values
            'InitiatorName' => $username,//This is the credential/username used to authenticate the transaction request.
            'SecurityCredential' =>$this->config->SecurityCredential,
            'CommandID' => 'BusinessPayment',//Unique command for each transaction type
            'Amount' => $amount,//The amount being transacted
            'PartyA' => $this->config->shortcode,//Organization’s shortcode initiating the transaction.
            'PartyB' => $phone,//Phone number receiving the transaction
            'Remarks' => $this->config->b2cremark,//Comments that are sent along with the transaction.
            'QueueTimeOutURL' => 	$this->config->timeout_url,//The timeout end-point that receives a timeout response.
            'ResultURL' => $this->config->results_url,//The end-point that receives the response of the transaction
            // 'Occasion' => 'payment'//optional
        );



        $data_string = json_encode($curl_post_data);

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);

        $curl_response = curl_exec($curl);
        print_r($curl_response);

        return $curl_response;
    }


    
    
    

}



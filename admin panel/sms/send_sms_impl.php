<?php

require('dto/token_response.php');
require('dto/send_text_response.php');
require('dto/transaction_response.php');
require('dto/token_body.php');
require('dto/send_text_body.php');
require('dto/transaction_body.php');
require('send_sms.php');

class SendSMSImpl implements SendSMS{

	public function getToken($body) {

		$url = 'https://esms.dialog.lk/api/v1/login';
		$data = json_encode($body);

		// use key 'http' even if you send the request to https://...
		$options = array(
			'http' => array(
				'header'  => "Content-type: application/json\r\n",
        		'method'  => 'POST',
        		'content' => $data,
        		'ignore_errors' => true
    		)
		);
		$context  = stream_context_create($options);
		$result = file_get_contents($url, false, $context);

		$data = json_decode($result, true);

		$class = new TokenResponse();
		$class->set($data);

		return $class;
	}

	public function sendText($body, $token) {

		$url = 'https://esms.dialog.lk/api/v1/sms';
		$data = json_encode($body);

		$headers = array(
   			"Authorization: Bearer ".$token,
   			"Content-Type: application/json",
		);

		// use key 'http' even if you send the request to https://...
		$options = array(
			'http' => array(
				'header'  => $headers,
	        	'method'  => 'POST',
	        	'content' => $data,
	        	'ignore_errors' => true
	    	)
		);
		$context  = stream_context_create($options);
		$result = file_get_contents($url, false, $context);

		$data = json_decode($result, true);

		$class = new SendTextResponse();
		$class->set($data);

		return $class;
	}

	public function getTransactionIDStatus($body, $token) {

		$url = 'https://esms.dialog.lk/api/v1/sms/check-transaction';
		$data = json_encode($body);

		$headers = array(
   			"Authorization: Bearer ".$token,
   			"Content-Type: application/json",
		);

		// use key 'http' even if you send the request to https://...
		$options = array(
			'http' => array(
				'header'  => $headers,
	        	'method'  => 'POST',
	        	'content' => $data,
	        	'ignore_errors' => true
	    	)
		);
		$context  = stream_context_create($options);
		$result = file_get_contents($url, false, $context);

		$data = json_decode($result, true);

		$class = new TransactionResponse();
		$class->set($data);

		return $class;
	}

	public function setMsisdns($mobiles) {

		$msisdns = array();

		foreach ($mobiles as $mobile) {
  			array_push($msisdns, new Msisdn($mobile));
		}

		return  $msisdns;
	}

}

?>
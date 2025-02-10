<?php 

interface SendSMS {

	public function getToken($body);
	public function sendText($body, $token);
	public function getTransactionIDStatus($body, $token);

}

?>
<?php
class SendTextBody implements \JsonSerializable
{
    private $transaction_id;

    private $message;

    private $sourceAddress;

    private $msisdn;

    public function jsonSerialize()
    {
        $vars = get_object_vars($this);

        return $vars;
    }


    public function setTransactionId($transaction_id){
         $this->transaction_id = $transaction_id;
    }
    public function getTransactionId(){
         return $this->transaction_id;
    }

    public function setMessage($message){
         $this->message = $message;
    }
    public function getMessage(){
         return $this->message;
    }

    public function setSourceAddress($sourceAddress){
         $this->sourceAddress = $sourceAddress;
    }
    public function getSourceAddress(){
         return $this->sourceAddress;
    }

    public function setMsisdn($msisdn){
         $this->msisdn = $msisdn;
    }
    public function getMsisdn(){
         return $this->msisdn;
    }
}

class Msisdn implements \JsonSerializable
{

    private $mobile;

    function __construct($mobile) {
        $this->mobile = $mobile;
    }

    public function jsonSerialize()
    {
        $vars = get_object_vars($this);

        return $vars;
    }

    public function setMobile($mobile){
         $this->mobile = $mobile;
    }
    public function getMobile(){
         return $this->mobile;
    }
}
?>
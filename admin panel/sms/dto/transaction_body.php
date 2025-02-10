<?php
class TransactionBody implements \JsonSerializable
{
    private $transaction_id;

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

}
?>
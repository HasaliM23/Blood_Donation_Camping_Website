<?php
class TransactionResponse
{
    private $transaction_id;

    private $errCode;

    private $data;

    private $comment;

    private $status;

    public function set($data) {
        foreach ($data AS $key => $value) $this->{$key} = $value;
        if(!is_null($this->data)) {
            $tempData = $this->data;
            $this->data = new DataTransaction();
            $this->data->set($tempData);
        }
    }


    public function setTransactionId($transaction_id){
         $this->transaction_id = $transaction_id;
    }
    public function getTransactionId(){
         return $this->transaction_id;
    }

    public function setErrCode($errCode){
         $this->errCode = $errCode;
    }
    public function getErrCode(){
         return $this->errCode;
    }

    public function setData($data){
         $this->data = $data;
    }
    public function getData(){
         return $this->data;
    }

    public function setComment($comment){
         $this->comment = $comment;
    }
    public function getComment(){
         return $this->comment;
    }

    public function setStatus($status){
         $this->status = $status;
    }
    public function getStatus(){
         return $this->status;
    }
}

class DataTransaction
{
    private $campaign_status;

    public function set($data) {
        foreach ($data AS $key => $value){
            if($key == 'campaign status'){
                $this->campaign_status = $value;
            }else{
                $this->{$key} = $value;
            }
        }
    }


    public function setCampaignStatus($campaign_status){
         $this->campaign_status = $campaign_status;
    }
    public function getCampaignStatus(){
         return $this->campaign_status;
    }

}
?>
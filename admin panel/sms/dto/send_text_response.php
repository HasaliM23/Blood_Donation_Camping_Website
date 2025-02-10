<?php
class SendTextResponse
{
    private $errCode;

    private $data;

    private $comment;

    private $status;

    public function set($data) {
        foreach ($data AS $key => $value) $this->{$key} = $value;
        if(!is_null($this->data)) {
            $tempData = $this->data;
            $this->data = new Data();
            $this->data->set($tempData);
        }
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

class Data
{
    private $invalidNumbers;

    private $duplicatesRemoved;

    private $userId;

    private $userMobile;

    private $walletBalance;

    private $campaignCost;

    private $campaignId;

    public function set($data) {
        foreach ($data AS $key => $value) $this->{$key} = $value;
    }


    public function setInvalidNumbers($invalidNumbers){
         $this->invalidNumbers = $invalidNumbers;
    }
    public function getInvalidNumbers(){
         return $this->invalidNumbers;
    }

    public function setDuplicatesRemoved($duplicatesRemoved){
         $this->duplicatesRemoved = $duplicatesRemoved;
    }
    public function getDuplicatesRemoved(){
         return $this->duplicatesRemoved;
    }

    public function setUserId($userId){
         $this->userId = $userId;
    }
    public function getUserId(){
         return $this->userId;
    }

    public function setUserMobile($userMobile){
         $this->userMobile = $userMobile;
    }
    public function getUserMobile(){
         return $this->userMobile;
    }

    public function setWalletBalance($walletBalance){
         $this->walletBalance = $walletBalance;
    }
    public function getWalletBalance(){
         return $this->walletBalance;
    }

    public function setCampaignCost($campaignCost){
         $this->campaignCost = $campaignCost;
    }
    public function getCampaignCost(){
         return $this->campaignCost;
    }

    public function setCampaignId($campaignId){
         $this->campaignId = $campaignId;
    }
    public function getCampaignId(){
         return $this->campaignId;
    }
}
?>
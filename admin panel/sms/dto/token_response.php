<?php
class TokenResponse
{

    private $errCode;

    private $userData;

    private $refreshExpiration;

    private $refreshToken;

    private $expiration;

    private $remainingCount;

    private $token;

    private $comment;

    private $status;

    public function set($data) {
        foreach ($data AS $key => $value) $this->{$key} = $value;
        if(!is_null($this->userData)) {
            $tempUserData = $this->userData;
            $this->userData = new UserData();
            $this->userData->set($tempUserData);
        }
    }

    public function setErrCode($errCode){
         $this->errCode = $errCode;
    }
    public function getErrCode(){
         return $this->errCode;
    }

    public function setUserData($userData){
         $this->userData = $userData;
    }
    public function getUserData(){
         return $this->userData;
    }

    public function setRefreshExpiration($refreshExpiration){
         $this->refreshExpiration = $refreshExpiration;
    }
    public function getRefreshExpiration(){
         return $this->refreshExpiration;
    }

    public function setRefreshToken($refreshToken){
         $this->refreshToken = $refreshToken;
    }
    public function getRefreshToken(){
         return $this->refreshToken;
    }

    public function setExpiration($expiration){
         $this->expiration = $expiration;
    }
    public function getExpiration(){
         return $this->expiration;
    }

    public function setRemainingCount($remainingCount){
         $this->remainingCount = $remainingCount;
    }
    public function getRemainingCount(){
         return $this->remainingCount;
    }

    public function setToken($token){
         $this->token = $token;
    }
    public function getToken(){
         return $this->token;
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

class UserData
{

    private $walletBalance;

    private $additional_mask;

    private $defaultMask;

    private $email;

    private $mobile;

    private $address;

    private $lname;

    private $fname;

    private $id;

    public function set($data) {
        foreach ($data AS $key => $value) $this->{$key} = $value;
    }

    public function setWalletBalance($walletBalance){
         $this->walletBalance = $walletBalance;
    }
    public function getWalletBalance(){
         return $this->walletBalance;
    }

    public function setAdditionalMask($additional_mask){
         $this->additional_mask = $additional_mask;
    }
    public function getAdditionalMask(){
         return $this->additional_mask;
    }

    public function setDefaultMask($defaultMask){
         $this->defaultMask = $defaultMask;
    }
    public function getDefaultMask(){
         return $this->defaultMask;
    }

    public function setEmail($email){
         $this->email = $email;
    }
    public function getEmail(){
         return $this->email;
    }

    public function setMobile($mobile){
         $this->mobile = $mobile;
    }
    public function getMobile(){
         return $this->mobile;
    }

    public function setAddress($address){
         $this->address = $address;
    }
    public function getAddress(){
         return $this->address;
    }

    public function setLname($lname){
         $this->lname = $lname;
    }
    public function getLname(){
         return $this->lname;
    }

    public function setFname($fname){
         $this->fname = $fname;
    }
    public function getFname(){
         return $this->fname;
    }

    public function setId($id){
         $this->id = $id;
    }
    public function getId(){
         return $this->id;
    }
}

class AdditionalMask
{

    private $mask;

    public function set($data) {
        foreach ($data AS $key => $value) $this->{$key} = $value;
    }

    public function setMask($mask){
         $this->mask = $mask;
    }
    public function getMask(){
         return $this->mask;
    }
}

?>
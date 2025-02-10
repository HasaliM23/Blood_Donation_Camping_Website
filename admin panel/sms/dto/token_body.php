<?php
class TokenBody implements \JsonSerializable
{
    private $username;

    private $password;

    public function jsonSerialize()
    {
        $vars = get_object_vars($this);

        return $vars;
    }


    public function setUsername($username){
         $this->username = $username;
    }
    public function getUsername(){
         return $this->username;
    }

    public function setPassword($password){
         $this->password = $password;
    }
    public function getPassword(){
         return $this->password;
    }
}
?>
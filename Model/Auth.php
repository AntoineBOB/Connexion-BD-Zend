<?php

namespace MiniModule\Model;

class Auth{
    
    public $id;
    public $login;
    public $pass;
    
    public function exchangeArray($data)
     {
         $this->id     = (!empty($data['id'])) ? $data['id'] : null;
         $this->login = (!empty($data['login'])) ? $data['login'] : null;
         $this->pass  = (!empty($data['pass'])) ? $data['pass'] : null;
     }
}
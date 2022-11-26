<?php

namespace Mod\UserNR;

Class User{
   
    public $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    public function cheack(){
        if (isset($_COOKIE["user_timer"]) and ($_COOKIE["user_timer"]!="")){
            return $_COOKIE["user_timer"];
        }
        else{
            return $this->create();
        }
    }
    public function create(){
        $id_str = $this->generate_string(100);
        setcookie("user_timer", $id_str,time()+(3600*24*365));
        return $id_str;
    }
   
    public function generate_string($strength) {
        //echo $this->permitted_chars;
        $input_length = strlen($this->permitted_chars);
        $random_string = '';
        for($i = 0; $i < $strength; $i++) {
            $random_character = $this->permitted_chars[mt_rand(0, $input_length - 1)];
            $random_string .= $random_character;
        }
     
        return $random_string;
    }
}
<?php

namespace Mod\User2;

Class User{
    public $error = [];
    public $type_f;
    public $connect;
    public function show_auth(){
        $result = [];
        if(!isset($_POST["go"])){
            $result["new"] = "yes";
            return $result;
        }
        $this->cfg = new \Mod\User2\Config();
        $date = [];
        $this->type_f = "auth";
        if(isset($_POST["login"])){
            $date["login"] = $_POST["login"];
        }else{
            $this->error["login"] = "Заполните логин!";
        }
        if(isset($_POST["password"])){
            $date["pass"] = $_POST["password"];
        }else{
            $this->error["pass"] = "Заполните Пароль";
        }
        if(isset($_POST["go"])){
            $date["but"] = $_POST["go"];
        }else{
            $this->error["but"] = "Кнопка не нажата";
        }
        if($this->error != []){
            return $this->error;
        }
        
        $this->cheak_in_date_auth($date);
        if($this->error != []){
            return $this->error;
        }
        $sql = new \Mod\Sql\Sql;
        $this->connect = $sql->db_connect;

        $this-> go_auth($date);
        if($this->error != []){
            return $this->error;
        }
        $result["new"] = "no";
        return $result;

    }
    public function show_register(){
        $result = [];
        if(!isset($_POST["go"])){
            $result["new"] = "yes";
            return $result;
        }
        $this->cfg = new \Mod\User2\Config();
        $date = [];
        $this->type_f = "reg";
        if(isset($_POST["login"])){
            $date["login"] = $_POST["login"];
        }else{
            $this->error["login"] = "Заполните логин!";
        }
        if(isset($_POST["password"])){
            $date["pass"] = $_POST["password"];
        }else{
            $this->error["pass"] = "Заполните Пароль";
        }
        if(isset($_POST["password2"])){
            $date["pass2"] = $_POST["password2"];
        }else{
            $this->error["pass2"] = "Заполните Пароль";
        }
        if(isset($_POST["mail"])){
            $date["email"] = $_POST["mail"];
        }else{
            $this->error["email"] = "Заполните поле емаил";
        }
        if(isset($_POST["go"])){
            $date["but"] = $_POST["go"];
        }else{
            $this->error["but"] = "Кнопка не нажата";
        }
        if($this->error != []){
            return $this->error;
        }

        $this->cheak_in_date($date);
        if($this->error != []){
            return $this->error;
        }
        $sql = new \Mod\Sql\Sql;
        $this->connect = $sql->db_connect;

        $this->cheak_free_login($date);
        if($this->error != []){
            return $this->error;
        }
        
        $this-> add_to_base($date);
        $result["new"] = "no";
        return $result;

    }
    public function show_exit(){
    }


    public function cheak_in_date($date){
        if($date["pass"] != $date["pass2"]){
            $this->error["pass2"] = "Пароли не совпадают";
        }
        if(strlen($date["login"]) < $this->cfg->min_login){
            $this->error["login"] = "Длина логина должна быть минимум ".$this->cfg->min_login." символа";
        }
        if(strlen($date["login"]) > $this->cfg->max_login){
            $this->error["login"] = "Длина логина должна быть максимум ".$this->cfg->min_login." символа";
        }
        if(strlen($date["pass"]) < $this->cfg->min_login){
            $this->error["pass"] = "Длина пароля должна быть минимум ".$this->cfg->min_login." символа";
        }
        if(strlen($date["pass"]) > $this->cfg->max_login){
            $this->error["pass"] = "Длина пароля должна быть максимум ".$this->cfg->min_login." символа";
        }
        if (!filter_var($date["email"], FILTER_VALIDATE_EMAIL)) {
            $this->error["email"] = "Некоректный емаил!";
        }
        return;
    }
    public function cheak_in_date_auth($date){
        if(strlen($date["login"]) < $this->cfg->min_login){
            $this->error["login"] = "Длина логина должна быть минимум ".$this->cfg->min_login." символа";
        }
        if(strlen($date["login"]) > $this->cfg->max_login){
            $this->error["login"] = "Длина логина должна быть максимум ".$this->cfg->min_login." символа";
        }
        if(strlen($date["pass"]) < $this->cfg->min_login){
            $this->error["pass"] = "Длина пароля должна быть минимум ".$this->cfg->min_login." символа";
        }
        if(strlen($date["pass"]) > $this->cfg->max_login){
            $this->error["pass"] = "Длина пароля должна быть максимум ".$this->cfg->min_login." символа";
        }
        return;
    }

    public function cheak_free_login($date){
        $sth = $this->connect->prepare("SELECT * FROM `user2` WHERE `login_s` = ?");
            $sth->execute(array($date["login"]));
            $result_sql = $sth->fetch(\PDO::FETCH_ASSOC);
        
        if(isset($result_sql["id"]) and ($result_sql["id"] >= 1)){
            $this->error["login"] = "Логин занят";            
        }
        return;
    }

    public function add_to_base($date){
        $ip = $this->up_date_ip();
        $times = time();
        $hash = $this->create_hash();
        $hash_pass = $this->take_hash_pass($hash,$date["pass"]);
        $sql = "INSERT INTO `user2` (`login_s`, `pass_s`, `secret_s`, `hash_s`, `datereg_s`, `ipreg_s`, `mailver_s`) VALUES (?,?,?,?,?,?,?)";
        $stmt= $this->connect->prepare($sql);
        $res = $stmt->execute([$date["login"],$hash_pass,USI,$hash,$times,$ip,$date["email"]]);
        //var_dump($stmt);
    }

    public function up_date_ip(){
        //ip
        $client  = @$_SERVER['HTTP_CLIENT_IP'];
        $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
        $remote  = @$_SERVER['REMOTE_ADDR'];

        if(filter_var($client, FILTER_VALIDATE_IP)) $ip = $client;
        elseif(filter_var($forward, FILTER_VALIDATE_IP)) $ip = $forward;
        else $ip = $remote;
        return $ip;
    }

    public function create_hash(){
        $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        return substr(str_shuffle($permitted_chars), 0, 16);
    }

    public function take_hash_pass($hash,$date_pass){
        $hash = $date_pass.$this->cfg->salt;
        $hash = hash('sha256', $hash);
        $hash = $hash.$date_pass;
        $hash = hash('sha256', $hash);
        return $hash;
    
    }
    public function go_auth($data){
        $sth = $this->connect->prepare("SELECT * FROM `user2` WHERE `login_s` = ? LIMIT 1");
            $sth->execute(array($data["login"]));
            $result_sql = $sth->fetch(\PDO::FETCH_ASSOC);
        if(!isset($result_sql["id"]) or ($result_sql["id"]<1)){
            $this->error["login"] = "Логин или пароль неверный";
            $this->error["pass"] = "Логин или пароль неверный";
            return;
        }

        $pass = $this->take_hash_pass($result_sql["hash_s"],$data["pass"]);
        if($result_sql["pass_s"] == $pass){
            //успещно
            $_SESSION["id"] = $result_sql["id"];
            $ip = $this->up_date_ip();
            $times = time();
            $sth = $this->connect->prepare("UPDATE `user2` SET `dateauth_s`=?, `ipauth_s`=? WHERE `id`=?");
            $sth->execute(array($times,$ip,$result_sql["id"]));
            //var_dump($sth);
        }else{
            //не успешно
            $this->error["login"] = "Логин или пароль неверный";
            $this->error["pass"] = "Логин или пароль неверный";
            return;
        }
    }

    public function den_adm(){
        if(!($this->its_admin())){
            $p = new \Page\error401;
            $p->main();
            die();
        }
    }
    public function its_admin(){
        if(!isset($_SESSION["id"])){
            return false;
        }
        $sql = new \Mod\Sql\Sql;
        $this->connect = $sql->db_connect;
        $sth = $this->connect->prepare("SELECT * FROM `user2` WHERE `id` = ?");
            $sth->execute(array($_SESSION["id"]));
            $result_sql = $sth->fetch(\PDO::FETCH_ASSOC);
        if(!isset($result_sql["roll_s"])){
            return false;
        }
        if($result_sql["roll_s"] == "admin"){
            return true;
        }else{
            return false;
        }
    }

}
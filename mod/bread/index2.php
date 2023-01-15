<?php

namespace Mod\Bread;

Class index2{
       
    
    public function main(){
        $data = [];
        $url = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
        $url = explode('?', $url);
        $url = explode('/', $url[0]);
        $long_arr = 0;
        //var_dump($url);
        
        $sql = new \Mod\Sql\Sql;
        $connect = $sql->db_connect; 

        //0
        if(isset($url[0])){
        $data["url"][] = "/"; 
        $data["url_solo"][]  = $url[0];             
        $data["name"][] = "Главная";
        $long_arr = 1;
        }

        if(isset($url[1]) and ($url[1]!= "")){
        //1
        $data["url"][] =  $data["url"][0]."galereya/"; 
        $data["url_solo"][]  = $url[1];             
        $data["name"][] = "Галерея";
        $long_arr = 2;
    }

    if(isset($url[2]) and ($url[2]!= "")){
        
        //2
        $sth = $connect->prepare("SELECT * FROM `kat_lvl1` WHERE `adr_s` = ? LIMIT 1");
        $sth->execute(array($url[2]));
        $result_sql = $sth->fetch(\PDO::FETCH_ASSOC);
        $data["url"][] =  $data["url"][1].$result_sql["adr_s"]."/"; 
        $data["url_solo"][]  = $url[2];             
        $data["name"][] = $result_sql["name_s"];
        $long_arr = 3;
    }

    if(isset($url[3]) and($url[3]!= "")){

        //3
        $sth = $connect->prepare("SELECT * FROM `kat_lvl2` WHERE `adr_s` = ? LIMIT 1");
        $sth->execute(array($url[3]));
        $result_sql = $sth->fetch(\PDO::FETCH_ASSOC);
        $data["url"][] =  $data["url"][2].$result_sql["adr_s"]."/"; 
        $data["url_solo"][]  = $url[3];             
        $data["name"][] = $result_sql["name_s"];
        $long_arr = 4;
    }

    if(isset($url[4]) and ($url[4]!= "")){

        //4
        $sth = $connect->prepare("SELECT * FROM `kat_lvl3` WHERE `adr_s` = ? LIMIT 1");
        $sth->execute(array($url[4]));
        $result_sql = $sth->fetch(\PDO::FETCH_ASSOC);
        $data["url"][] =  $data["url"][3].$result_sql["adr_s"]."/"; 
        $data["url_solo"][]  = $url[4];             
        $data["name"][] = $result_sql["name_s"];
        $long_arr = 5;
    }
    $data["long"] = $long_arr;
        /*
        if(isset($url[4])){
                $long_arr = 4;
                $data["url"][] = $data["url"][2].$url[4]."/"; 
                $data["url_solo"][]  = $url[4];             
                $data["name"][] = $this->take_date_dir($url[4]);
        }
        */
        //var_dump("<pre>",$data,"</pre>");
        return $data;
    }
    
    
}

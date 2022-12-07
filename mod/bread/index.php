<?php

namespace Mod\Bread;

Class index{
       
    
    public function main(){
        $data = [];
        $url = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
        $url = explode('?', $url);
        $url = explode('/', $url[0]);
        $long_arr = 0;
        //var_dump($url);
        if(isset($url[1])){
            $long_arr = 1;
            if($url[1] == "galereya-oblozhek"){
                $data["url"][] = "/".$url[1]."/";
                $data["url_solo"][]  = $url[1];
                $data["name"][] = "Галерея обложек";
            }
        }
        if(isset($url[2])){    
            $long_arr = 2;    
            $data["url"][] = $data["url"][0].$url[2]."/";  
            $data["url_solo"][]  = $url[2]; 
            if($url[2] == "anime"){
                $data["name"][] = "Аниме";
            }
            else if($url[2] == "igry"){
                $data["name"][] = "Игры";
            }
            else if($url[2] == "filmy"){
                $data["name"][] = "Фильмы";
            }
            else if($url[2] == "priroda"){
                $data["name"][] = "Природа";
            }
            else if($url[2] == "zhivotnye"){
                $data["name"][] = "Животные";
            }
            else if($url[2] == "goroda"){
                $data["name"][] = "Города";
            }
            else if($url[2] == "geometriya"){
                $data["name"][] = "Геометрия";
            }
            else if($url[2] == "patriotizm"){
                $data["name"][] = "Патриотизм";
            }
            else if($url[2] == "avto-moto"){
                $data["name"][] = "Авто\мото";
            }
            else if($url[2] == "iskustvo"){
                $data["name"][] = "Искуство";
            }
            else if($url[2] == "it"){
                $data["name"][] = "ИТ";
            }
            else{
                $data["name"][] = "Разное";
            }
        }
        if(isset($url[3])){
                $long_arr = 3;
                $data["url"][] = $data["url"][1].$url[3]."/";
                $data["url_solo"][]  = $url[3];              
                $data["name"][] = $this->take_date_dir($url[3]);
            
        }
        if(isset($url[4])){
                $long_arr = 4;
                $data["url"][] = $data["url"][2].$url[4]."/"; 
                $data["url_solo"][]  = $url[4];             
                $data["name"][] = $this->take_date_dir($url[4]);
        }
        $data["long"] = $long_arr;
        return $data;
    }
    
    public function take_date_dir($name_dir){
        $sql = new \Mod\Sql\Sql;
        $connect = $sql->db_connect;  
            $sth = $connect->prepare("SELECT * FROM `categories_url` WHERE `myAddres` = ?");
            $sth->execute(array($name_dir));
            $result_sql = $sth->fetch(\PDO::FETCH_ASSOC);
            //var_dump($result_sql);
        return $result_sql["name_i"];
    }
    
    
}
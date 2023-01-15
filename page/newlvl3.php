<?php

namespace Page;

Class newlvl3{
    public function main(){
        $data=[];

        $myId = $this->take_name_dir1();

        $seo = new \Mod\Seo\seo;
        $data["seo"] = $seo->main($myId);
        $bred = new \Mod\Bread\index2;        
        $data["bread"] = $bred->main();
        $data["fullDate"] = $this->select_all_date();
        $data["myDate"] = $this->takeMyDate($myId);
        $page = ["head","header","newlvl3","footer"];
        $vi = new \Mod\View\View();
        $vi->show($page,$data);
    }

    public function take_id_father(){
        $url = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
        $url1 = explode("/", $url);
        $name_fat = $url1[3];

        $sql = new \Mod\Sql\Sql;
        $connect = $sql->db_connect;  
        $sth = $connect->prepare("SELECT * FROM `kat_lvl2` WHERE `adr_s` = ? LIMIT 1");
        $sth->execute(array($name_fat));
        $result_sql = $sth->fetch(\PDO::FETCH_ASSOC);
        return $result_sql["id"];
    }

    public function takeMyDate($myId){
        $url = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
        $url1 = explode("/", $url);
        $name_fat = $url1[3];

        $sql = new \Mod\Sql\Sql;
        $connect = $sql->db_connect;  
        $sth = $connect->prepare("SELECT * FROM `kat_lvl2` WHERE `adr_s` = ? LIMIT 1");
        $sth->execute(array($name_fat));
        $result_sql = $sth->fetch(\PDO::FETCH_ASSOC);
        return $result_sql;
    }

    public function select_all_date(){
        $data_res=[];
        $sql = new \Mod\Sql\Sql;
        $connect = $sql->db_connect;  
        $sth = $connect->prepare("SELECT * FROM `kat_lvl3` WHERE `father_s` = ?");
        $sth->execute(array($this->take_id_father()));
        $i = 0;
        while($result_sql = $sth->fetch(\PDO::FETCH_ASSOC)){            
            $data_res[$i]["name_s"] =     $result_sql["name_s"];
            $data_res[$i]["img_s"] =    $result_sql["img_s"];
            $data_res[$i]["text_s"] =     $result_sql["text_s"];
            $data_res[$i]["adr_s"] =     $result_sql["adr_s"];
            $data_res[$i]["title_s"] =     $result_sql["title_s"];
            $data_res[$i]["disc_s"] =     $result_sql["disc_s"];
            $data_res[$i]["key_s"]=     $result_sql["key_s"];
            
            $data_res[$i]["plus_s"] =     $result_sql["plus_s"];
            $data_res[$i]["minus_s"]=     $result_sql["minus_s"];

            
            $data_res[$i]["img_s_pred"]=     $result_sql["img_s_pred"];
            $data_res[$i]["img_s_min"]=     $result_sql["img_s_min"];
            $data_res[$i]["img_s_pc"]=     $result_sql["img_s_pc"];

            		
	
	
            $i++;
        }
        return $data_res;

    }
    public function take_name_dir(){
        $url = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
        $url1 = explode("/", $url);
        
        return $url1[2];
    }
    public function take_name_dir1(){
        $url = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
        $url1 = explode("/", $url);
        
        return $url1[3];
    }
}
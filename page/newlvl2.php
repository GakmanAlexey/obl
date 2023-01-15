<?php

namespace Page;

Class newlvl2{
    public function main(){
        $data=[];



        $seo = new \Mod\Seo\seo;
        $data["seo"] = $seo->main($this->take_name_dir1());
        $bred = new \Mod\Bread\index2;        
        $data["bread"] = $bred->main();
        $data["fat_url"] = $this->take_name_dir();
        $data["all_it"] = $this->select_all_date();
        $data["myDate"] = $this->takeMyDate();
        $page = ["head","header","newlvl2","footer"];
        $vi = new \Mod\View\View();
        $vi->show($page,$data);
    }

    public function take_id_father(){
        $url = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
        $url1 = explode("/", $url);
        $name_fat = $url1[2];

        $sql = new \Mod\Sql\Sql;
        $connect = $sql->db_connect;  
        $sth = $connect->prepare("SELECT * FROM `kat_lvl1` WHERE `adr_s` = ? LIMIT 1");
        $sth->execute(array($name_fat));
        $result_sql = $sth->fetch(\PDO::FETCH_ASSOC);
        return $result_sql["id"];
    }

    public function takeMyDate(){
        $url = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
        $url1 = explode("/", $url);
        $name_fat = $url1[2];

        $sql = new \Mod\Sql\Sql;
        $connect = $sql->db_connect;  
        $sth = $connect->prepare("SELECT * FROM `kat_lvl1` WHERE `adr_s` = ? LIMIT 1");
        $sth->execute(array($name_fat));
        $result_sql = $sth->fetch(\PDO::FETCH_ASSOC);
        return $result_sql;
    }

    public function select_all_date(){
        $data_res=[];
        $fId = $this->take_id_father();
        $sql = new \Mod\Sql\Sql;
        $connect = $sql->db_connect;  
        $sth = $connect->prepare("SELECT * FROM `kat_lvl2` WHERE `father_s` = ?");
        $sth->execute(array($fId));
        $i = 0;
        while($result_sql = $sth->fetch(\PDO::FETCH_ASSOC)){  
            $sth1 = $connect->prepare("SELECT COUNT(*) FROM `kat_lvl3` WHERE `father_s` = ?");
            $sth1->execute(array($result_sql["id"]));
            $result_sql1 = $sth1->fetch(\PDO::FETCH_ASSOC);

            $data_res[$i]["count"] = $result_sql1["COUNT(*)"];
            $data_res[$i]["name_s"] =     $result_sql["name_s"];
            $data_res[$i]["img_s"] =    $result_sql["img_s"];
            $data_res[$i]["text_s"] =     $result_sql["text_s"];
            $data_res[$i]["adr_s"] =     $result_sql["adr_s"];
            $data_res[$i]["title_s"] =     $result_sql["title_s"];
            $data_res[$i]["disc_s"] =     $result_sql["disc_s"];
            $data_res[$i]["key_s"]=     $result_sql["key_s"];
            
            $data_res[$i]["plus_s"] =     $result_sql["plus_s"];
            $data_res[$i]["minus_s"]=     $result_sql["minus_s"];
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
        return $url1[2];
    }
}
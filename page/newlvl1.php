<?php

namespace Page;

Class newlvl1{
    public function main(){
        $data=[];



        $seo = new \Mod\Seo\seo;
        $data["seo"] = $seo->main($this->take_name_dir());
        $bred = new \Mod\Bread\index2;        
        $data["bread"] = $bred->main();
        $data["all_it"] = $this->select_all_date();
        $page = ["head","header","newlvl1","footer"];
        $vi = new \Mod\View\View();
        $vi->show($page,$data);
    }

    public function select_all_date(){
        $data_res=[];
        $sql = new \Mod\Sql\Sql;
        $connect = $sql->db_connect;  
        $sth = $connect->prepare("SELECT * FROM `kat_lvl1`");
        $sth->execute(array());
        $i = 0;
        while($result_sql = $sth->fetch(\PDO::FETCH_ASSOC)){            
            $data_res[$i]["name_s"] =     $result_sql["name_s"];
            $data_res[$i]["img_s"] =    $result_sql["img_s"];
            $data_res[$i]["text_s"] =     $result_sql["text_s"];
            $data_res[$i]["adr_s"] =     $result_sql["adr_s"];
            $data_res[$i]["title_s"] =     $result_sql["title_s"];
            $data_res[$i]["disc_s"] =     $result_sql["disc_s"];
            $data_res[$i]["key_s"]=     $result_sql["key_s"];
            $i++;
        }
        return $data_res;

    }
    public function take_name_dir(){
        $url = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
        $url1 = explode("/", $url);
        return $url1[1];
    }
}
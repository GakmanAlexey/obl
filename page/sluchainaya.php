<?php

namespace Page;

Class Sluchainaya{
    public function main(){
        $data=[];
        $name_dir="fs";
        $sql = new \Mod\Sql\Sql;
        $connect = $sql->db_connect; 
        $sth3 = $connect->prepare("SELECT * FROM `categories_url` WHERE `type_1` = ? ORDER BY RAND() LIMIT 1");
            $sth3->execute(array($name_dir));
            $result_sql3 = $sth3->fetch(\PDO::FETCH_ASSOC);
            $data[] = $result_sql3;
            $fat1 = $result_sql3["fathers"];            

            $sth11 = $connect->prepare("SELECT * FROM `categories_url` WHERE `id` = ? ");
            $sth11->execute(array($fat1));
            $result_sql11 = $sth11->fetch(\PDO::FETCH_ASSOC);
            $fat2 = $result_sql11["fathers"];
            
            $sth12 = $connect->prepare("SELECT * FROM `categories_url` WHERE `id` = ? ");
            $sth12->execute(array($fat2));
            $result_sql12 = $sth12->fetch(\PDO::FETCH_ASSOC);
            $fat3 = $result_sql12["fathers"];
            $url3 =  "/galereya-oblozhek/".$result_sql12["myAddres"]."/".$result_sql11["myAddres"]."/".$result_sql3["myAddres"]."/";

        
        $page = ["head","header","sluchainaya","footer"];
        $vi = new \Mod\View\View();
        $vi->show($page,$data);
    }
}
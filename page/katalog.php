<?php

namespace Page;
/*
     CREATE TABLE categories_url (
            id INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
            PRIMARY KEY(id),
            fathers int(10),
            myAddres  VARCHAR(255) NOT NULL,
            title  VARCHAR(255) NOT NULL,
            descript  VARCHAR(255) NOT NULL,
            keys_i  VARCHAR(255) NOT NULL,
            name_i  VARCHAR(255) NOT NULL,
            img  VARCHAR(255) NOT NULL,
            text_main  TEXT,
            pluses int(10),
            minuses int(10)
           )



*/
Class Katalog{
    public function index($pieces){
        //var_dump($pieces);
        $page_type = "direct";
        $cat0 = "katalog";
        $lvl=0;
        if(isset($pieces[2]) and $pieces[2] != ""){
            $cat1 = $pieces[2];//фниме
            $lvl = 1;
        }else{
            $cat1 = "";
        }
        if(isset($pieces[3]) and $pieces[3] != ""){
            $cat2 = $pieces[3];//tokiagul
            $lvl = 2;
        }else{
            $cat2 = "";
        }
        if(isset($pieces[4]) and $pieces[4] != ""){// 1
            $page_sh = $pieces[4];
            $page_type = "object";            
            $lvl=3;
        }else{
            $page_sh = "";
        }
        $data[] = $page_type;
        $data[] = $lvl;
        $data[] = $cat1;
        $data[] = $cat2;
        $data[] = $page_sh;
        /* sql */
        $sql = new \Mod\Sql\Sql;
        $connect = $sql->db_connect;        
        //echo $cat1;
        if($cat1 != ""){
            $sth = $connect->prepare("SELECT * FROM `categories_url` WHERE `myAddres` = ?");
            $sth->execute(array($cat1));
            $result_sql = $sth->fetch(\PDO::FETCH_ASSOC);
            //var_dump($result_sql);
            $data[] = $result_sql;
        }else{
            $data[] = "";
        }
        if($cat2 != ""){
            $sth = $connect->prepare("SELECT * FROM `categories_url` WHERE `myAddres` = ?");
            $sth->execute(array($cat2));
            $result_sql = $sth->fetch(\PDO::FETCH_ASSOC);
            //var_dump($result_sql);
            $data[] = $result_sql;
        }else{
            $data[] = "";
        }
        
        if($page_type == "direct"){
            $page = ["header","head","cat","footer"];
            $vi = new \Mod\View\View();
            $vi->show($page,$data);
        }else{
            $page = ["header","head","foto","footer"];
            $vi = new \Mod\View\View();
            $vi->show($page,$data);
        }
    }
}

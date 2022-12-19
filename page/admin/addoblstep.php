<?php

namespace Page\Admin;

Class addoblstep{
    public function step1(){
        $data=[];
        $den = new \Mod\User2\User;
        $den->den_adm();

        $sql = new \Mod\Sql\Sql;
        $connect = $sql->db_connect;  
            $sth = $connect->prepare("SELECT * FROM `categories_url` WHERE `type_1` = ? and `fathers` = ?");
            $sth->execute(array("direct",0));
        $x = 0;
        while($result_sql = $sth->fetch(\PDO::FETCH_ASSOC)){
            
            $data["items"][$x]["id"] = $result_sql["id"];
            $data["items"][$x]["name"] = $result_sql["name_i"];
            $x++;
        }

        
        $page = ["admin/head","admin/header","admin/lmenu","admin/addoblstep1","admin/footer"];
        $vi = new \Mod\View\View();
        $vi->show($page,$data);
    }
    public function step2(){
        $data=[];
        if(isset($_GET["id"]) and ($_GET["id"]>1)){
            $id = $_GET["id"];
        }else{
            $id = 1;
        }
        $sql = new \Mod\Sql\Sql;
        $connect = $sql->db_connect;  
            $sth = $connect->prepare("SELECT * FROM `categories_url` WHERE `type_1` = ? and `fathers` = ?");
            $sth->execute(array("direct",$id));
        $x = 0;
        while($result_sql = $sth->fetch(\PDO::FETCH_ASSOC)){
            
            $data["items"][$x]["id"] = $result_sql["id"];
            $data["items"][$x]["name"] = $result_sql["name_i"];
            $x++;
        }
        $den = new \Mod\User2\User;
        $den->den_adm();
        $page = ["admin/head","admin/header","admin/lmenu","admin/addoblstep2","admin/footer"];
        $vi = new \Mod\View\View();
        $vi->show($page,$data);
    }
    public function step3(){
        $data=[];
        $den = new \Mod\User2\User;
        $den->den_adm();
        if(isset($_GET["id"]) and ($_GET["id"]>1)){
            $id = $_GET["id"];
        }else{
            $p = new \Page\error404;
            $p->main();
            die();
        }
        $sql = new \Mod\Sql\Sql;
        $connect = $sql->db_connect;  
            $sth = $connect->prepare("SELECT * FROM `categories_url` WHERE `type_1` = ? and `fathers` = ?");
            $sth->execute(array("fs",$id));
        $x = 0;
        while($result_sql = $sth->fetch(\PDO::FETCH_ASSOC)){
            
            $data["items"][$x]["id"] = $result_sql["id"];
            $data["items"][$x]["name"] = $result_sql["name_i"];
            $data["items"][$x]["adres"] = $result_sql["myAddres"];
            $x++;
            
        }
        $data["counts"] = $x;//получил сколько итемов в базе
        //Получить название родителя и его юрл
        $sth1 = $connect->prepare("SELECT * FROM `categories_url` WHERE `fathers` = ?");
        $sth1->execute(array($id));
        $result_sql_fa1 = $sth1->fetch(\PDO::FETCH_ASSOC);
        //var_dump($result_sql_fa1);
        $data["fat1"] = $result_sql_fa1;

        $sth2 = $connect->prepare("SELECT * FROM `categories_url` WHERE `id` = ?");
        $sth2->execute(array($result_sql_fa1["fathers"]));
        $result_sql_fa2 = $sth2->fetch(\PDO::FETCH_ASSOC);
        $data["fat2"] = $result_sql_fa2;
        //Получить название прородителя и его юрл

        $sth3 = $connect->prepare("SELECT * FROM `categories_url` WHERE `id` = ?");
        $sth3->execute(array($result_sql_fa2["fathers"]));
        $result_sql_fa3 = $sth3->fetch(\PDO::FETCH_ASSOC);        
        $data["fat3"] = $result_sql_fa3;
        
        $page = ["admin/head","admin/header","admin/lmenu","admin/addoblstep3","admin/footer"];
        $vi = new \Mod\View\View();
        $vi->show($page,$data);
    }
}
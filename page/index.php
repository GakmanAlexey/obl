<?php

namespace Page;

Class index{
    public function main(){
        $data=[];
        //получить данные о самой популярной
        $name_dir="fs";
        $sql = new \Mod\Sql\Sql;
        $connect = $sql->db_connect;  
            $sth = $connect->prepare("SELECT * FROM `categories_url` WHERE `type_1` = ? ORDER BY `pluses` DESC LIMIT 1");
            $sth->execute(array($name_dir));
            $result_sql = $sth->fetch(\PDO::FETCH_ASSOC);
            $data[] = $result_sql;
            $fat1 = $result_sql["fathers"];            

            $sth11 = $connect->prepare("SELECT * FROM `categories_url` WHERE `id` = ? ");
            $sth11->execute(array($fat1));
            $result_sql11 = $sth11->fetch(\PDO::FETCH_ASSOC);
            $fat2 = $result_sql11["fathers"];
            
            $sth12 = $connect->prepare("SELECT * FROM `categories_url` WHERE `id` = ? ");
            $sth12->execute(array($fat2));
            $result_sql12 = $sth12->fetch(\PDO::FETCH_ASSOC);
            $fat3 = $result_sql12["fathers"];
            $url1 =  "/galereya-oblozhek/".$result_sql12["myAddres"]."/".$result_sql11["myAddres"]."/".$result_sql["myAddres"]."/";

        //получить данные о самой новой
            $sth2 = $connect->prepare("SELECT * FROM `categories_url` WHERE `type_1` = ? ORDER BY `id` DESC LIMIT 1");
            $sth2->execute(array($name_dir));
            $result_sql2 = $sth2->fetch(\PDO::FETCH_ASSOC);
            $data[] = $result_sql2;
            $fat1 = $result_sql2["fathers"];            

            $sth11 = $connect->prepare("SELECT * FROM `categories_url` WHERE `id` = ? ");
            $sth11->execute(array($fat1));
            $result_sql11 = $sth11->fetch(\PDO::FETCH_ASSOC);
            $fat2 = $result_sql11["fathers"];
            
            $sth12 = $connect->prepare("SELECT * FROM `categories_url` WHERE `id` = ? ");
            $sth12->execute(array($fat2));
            $result_sql12 = $sth12->fetch(\PDO::FETCH_ASSOC);
            $fat3 = $result_sql12["fathers"];
            $url2 =  "/galereya-oblozhek/".$result_sql12["myAddres"]."/".$result_sql11["myAddres"]."/".$result_sql2["myAddres"]."/";
        //получить данные о случайной записи
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

            $data[] = $url1;
            $data[] = $url2;
            $data[] = $url3;
        //var_dump($result_sql3);
        $page = ["head","header","index","footer"];
        $vi = new \Mod\View\View();
        $vi->show($page,$data);
    }
}

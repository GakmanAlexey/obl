<?php

namespace Page;

Class stateya{
    public function main(){
        $data=[];
        $url = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
        $url1 = explode("/", $url);
        //echo $url1[2];
        $url_stat = $url1[2];
        //$url_stat = 1;
        
        $sql = new \Mod\Sql\Sql;
        $connect = $sql->db_connect;
        $sth = $connect->prepare("SELECT * FROM `statii` WHERE `url_s` = ? LIMIT 1");
            $sth->execute(array($url_stat));
            $result_sql = $sth->fetch(\PDO::FETCH_ASSOC);
        $data["statiya"] = $result_sql;
        //var_dump($data["statiya"]);
        
        $seo = new \Mod\Seo\seo; 
        $data["seo"] = $seo->main("katalog-statey");
        $data["seo"]["title"] = $data["statiya"]["s_name"];
        $data["seo"]["disc"] = $data["statiya"]["s_kr_opis"];

        $page = ["head","header","stateya","footer"];
        $vi = new \Mod\View\View();
        $vi->show($page,$data);
    }

    
}
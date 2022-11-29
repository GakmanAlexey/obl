<?php

namespace Page;

Class zakaz{
    public function main(){
        $type = $_POST["type_obl"];
        $tema = $_POST["tema_obl"];
        $comment = $_POST["comment"];
        $email = $_POST["email"];

        $sql = new \Mod\Sql\Sql;
        $connect = $sql->db_connect;  
            $sth = $connect->prepare("INSERT INTO zakaz (types, thems, comments, emails) VALUES (?,?,?,?)");
            $sth->execute(array($type, $tema, $comment, $email));
            $result_sql = $sth->fetch(\PDO::FETCH_ASSOC);

        
        $urlist = "/zakaz/";
            $seo = new \Mod\Seo\seo;
            $data["seo"] = $seo->main($urlist);
        $page = ["head","header","zakaz","footer"];
        $vi = new \Mod\View\View();
        $vi->show($page,$data);
    }
}
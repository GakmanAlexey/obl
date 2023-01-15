<?php

namespace Mod\Seo;

Class seo{

    public function main($urlist){
        $sql = new \Mod\Sql\Sql;
        $connect = $sql->db_connect;  
            $sth = $connect->prepare("SELECT * FROM `seo` WHERE `url` = ?");
            $sth->execute(array($urlist));
            $result_sql = $sth->fetch(\PDO::FETCH_ASSOC);

        if((!isset($result_sql['id'])) or($result_sql['id'] < 1)){
            $title = "Обложки для вк профиля";
            $description = "Обложки для вк профиля, фон. скачать в хорошем качестве."; 
        }else{
            $title = $result_sql['title'] ;
            $description = $result_sql['discrip'] ;
        }

        $data = [];

        $data['title']=$title;
        $data['disc']=$description;
        $data['img']="logo.png";
        return $data;
    }

    public function add($url, $title, $discription){
        $sql = new \Mod\Sql\Sql;
        $connect = $sql->db_connect;  
        $sth = $connect->prepare("INSERT INTO `seo` SET  `url` = ?, `title` = ?, `discrip` = ?, `date_unix` = ?");
        $sth->execute(array($url,$title,$discription,0));
    }

}
<?php

namespace Page;

Class pagein{
    public function main(){
        $data=[];
        $name_dir = $this->take_name_dir();
        $date_dir = $this->take_date_dir($name_dir);
       

        //echo $date_dir['id'];
        $data[]=$date_dir;
        $page = ["head","header","pagein","footer"];
        $vi = new \Mod\View\View();
        $vi->show($page,$data);
    }

    public function take_name_dir(){
        $url = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
        $url1 = explode("/", $url);
        return $url1[4];
         
    }

    public function take_date_dir($name_dir){
        $sql = new \Mod\Sql\Sql;
        $connect = $sql->db_connect;  
            $sth = $connect->prepare("SELECT * FROM `categories_url` WHERE `myAddres` = ?");
            $sth->execute(array($name_dir));
            $result_sql = $sth->fetch(\PDO::FETCH_ASSOC);
        return $result_sql;
    }

    public function take_date_cil($id){
        $sql = new \Mod\Sql\Sql;
        $connect = $sql->db_connect;  
            $sth = $connect->prepare("SELECT * FROM `categories_url` WHERE `fathers` = ?");
            $sth->execute(array($id));
            $data =[];

            while($result_sql = $sth->fetch(\PDO::FETCH_ASSOC)){
                $data[] = $result_sql;
            }
        return $data;
    }
}
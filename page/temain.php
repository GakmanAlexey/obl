<?php

namespace Page;

Class temain{
    public function main(){
        $data=[];
        $fat =  $this->take_name_dir0();
        //echo $fat;
        $name_dir = $this->take_name_dir();
        $date_dir = $this->take_date_dir($name_dir);
        //var_dump( $date_dir);
        $h1 = $date_dir["name_i"];
        $text = $date_dir["text_main"];
        $children_data = $this->take_date_cil($date_dir['id']);
        //echo $date_dir['id'];
        $data[]=$h1;
        $data[]=$text;
        $data[]=$children_data;        
        $data[]=$name_dir;       
        $data[]=$fat;
        $urlist = $name_dir;
            $seo = new \Mod\Seo\seo;
            $data["seo"] = $seo->main($urlist);

            $bred = new \Mod\Bread\index;        
            $data["bread"] = $bred->main();
        $page = ["head","header","temain","footer"];
        $vi = new \Mod\View\View();
        $vi->show($page,$data);
    }
    
    public function take_name_dir(){
        $url = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
        $url1 = explode("/", $url);
        return $url1[3];
         
    }
    public function take_name_dir0(){
        $url = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
        $url1 = explode("/", $url);
        return $url1[2];
         
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
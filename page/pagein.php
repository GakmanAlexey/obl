<?php

namespace Page;

Class pagein{
    public function main(){
        $data=[];
        $name_dir = $this->take_name_dir();
        $date_dir = $this->take_date_dir($name_dir);
       

        //echo $date_dir['id'];
        $data[]=$date_dir;
        $urlist = $name_dir;
        $seo = new \Mod\Seo\seo;
        $data["seo"] = $seo->main($urlist);

        
        $bred = new \Mod\Bread\index;        
        $data["bread"] = $bred->main();
        
        $mms = $this->lf_line($date_dir);
        
        $data["left"] = $mms[0];
        $data["right"] = $mms[1];

        $page = ["head","header","pagein","footer"];
        $vi = new \Mod\View\View();
        $vi->show($page,$data);
    }

    public function lf_line($date_dir){
        //var_dump($date_dir["fathers"]);
        $l = "";
        $r = "";
        $x = 0;
        $mypos = 0;
        $dts = [];
        $sql = new \Mod\Sql\Sql;
        $connect = $sql->db_connect;  
            $sth = $connect->prepare("SELECT * FROM `categories_url` WHERE `fathers` = ?");
            $sth->execute(array($date_dir["fathers"]));
            while($result_sql = $sth->fetch(\PDO::FETCH_ASSOC)){
                $dts[]=$result_sql;
                if($result_sql["myAddres"] == $date_dir["myAddres"]){
                    $mypos = $x;
                }
                $x++;
            }
            if(isset($dts[$mypos-1])){$l = $dts[$mypos-1]["myAddres"];} else {$l = $dts[$x-1]["myAddres"];}
            if(isset($dts[$mypos+1])){$r = $dts[$mypos+1]["myAddres"];} else {$r = $dts[0]["myAddres"];}
            return [$l,$r];
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
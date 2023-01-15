<?php

namespace Page;

Class newlvl4{
    public function main(){
        $data=[];



        $seo = new \Mod\Seo\seo;
        $data["seo"] = $seo->main($this->take_name_dir_t());
        $bred = new \Mod\Bread\index2;        
        $data["bread"] = $bred->main();
        $data["fullDate"] = $this->select_all_date();
        
        $page = ["head","header","newlvl4","footer"];
        $vi = new \Mod\View\View();
        $vi->show($page,$data);
    }

    public function take_id_father(){
        $url = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
        $url1 = explode("/", $url);
        $name_fat = $url1[3];

        $sql = new \Mod\Sql\Sql;
        $connect = $sql->db_connect;  
        $sth = $connect->prepare("SELECT * FROM `kat_lvl2` WHERE `adr_s` = ? LIMIT 1");
        $sth->execute(array($name_fat));
        $result_sql = $sth->fetch(\PDO::FETCH_ASSOC);
        return $result_sql["id"];
    }

    public function select_all_date(){
        $data_res=[];
        $sql = new \Mod\Sql\Sql;
        $connect = $sql->db_connect;  
        $sth = $connect->prepare("SELECT * FROM `kat_lvl3` WHERE `adr_s` = ? LIMIT 1");
        $sth->execute(array($this->take_name_dir_t()));
        $i = 0;
        while($result_sql = $sth->fetch(\PDO::FETCH_ASSOC)){          
            $data_res["id"] =     $result_sql["id"];           
            $data_res["name_s"] =     $result_sql["name_s"];
            $data_res["img_s"] =    $result_sql["img_s"];
            $data_res["text_s"] =     $result_sql["text_s"];
            $data_res["adr_s"] =     $result_sql["adr_s"];
            $data_res["title_s"] =     $result_sql["title_s"];
            $data_res["disc_s"] =     $result_sql["disc_s"];
            $data_res["key_s"]=     $result_sql["key_s"];            
            $data_res["f"]=     $result_sql["father_s"];
            
            $data_res["plus_s"] =     $result_sql["plus_s"];
            $data_res["minus_s"]=     $result_sql["minus_s"];

            
            $data_res["img_s_pred"]=     $result_sql["img_s_pred"];
            $data_res["img_s_min"]=     $result_sql["img_s_min"];
            $data_res["img_s_pc"]=     $result_sql["img_s_pc"];

            $i++;
        }
        
        $data_res["lr"] = $this->lf_line($data_res);

        

        return $data_res;

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
            $sth = $connect->prepare("SELECT * FROM `kat_lvl3` WHERE `father_s` = ?");
            $sth->execute(array($date_dir["f"]));
            while($result_sql = $sth->fetch(\PDO::FETCH_ASSOC)){
                $dts[]=$result_sql;
                if($result_sql["adr_s"] == $date_dir["adr_s"]){
                    $mypos = $x;
                }
                $x++;
            }
            if(isset($dts[$mypos-1])){$l = $dts[$mypos-1]["adr_s"];} else {$l = $dts[$x-1]["adr_s"];}
            if(isset($dts[$mypos+1])){$r = $dts[$mypos+1]["adr_s"];} else {$r = $dts[0]["adr_s"];}
            return [$l,$r];
    }
    public function take_name_dir(){
        $url = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
        $url1 = explode("/", $url);
        return $url1[2];
    }

    public function take_name_dir_t(){
        $url = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
        $url1 = explode("/", $url);
        return $url1[4];
    }
}
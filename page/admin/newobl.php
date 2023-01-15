<?php

namespace Page\Admin;

Class newobl{
    public function add_lvl1(){
        $data=[];
        $den = new \Mod\User2\User;
        $den->den_adm();

        $add_mod = new \Mod\Adminstatii\newobl;
        $add_mod->add_lvl_1();
        
        $page = ["admin/head","admin/header","admin/lmenu","admin/new_add_lvl1","admin/footer"];
        $vi = new \Mod\View\View();
        $vi->show($page,$data);
    }
    public function add_lvl2(){
        $data=[];
        $den = new \Mod\User2\User;
        $den->den_adm();

        $add_mod = new \Mod\Adminstatii\newobl;
        $add_mod->add_lvl_2();

        $data["father_list"]=$this->take_fat_lvl2();
        
        $page = ["admin/head","admin/header","admin/lmenu","admin/new_add_lvl2","admin/footer"];
        $vi = new \Mod\View\View();
        $vi->show($page,$data);
    }
    public function add_lvl3(){
        $data=[];
        $den = new \Mod\User2\User;
        $den->den_adm();




        $add_mod = new \Mod\Adminstatii\newobl;
        $data["dt"] = $add_mod->add_lvl_3();
        
        
        
        
        $page = ["admin/head","admin/header","admin/lmenu","admin/new_add_lvl3","admin/footer"];
        $vi = new \Mod\View\View();
        $vi->show($page,$data);
    }

    public function take_fat_lvl2(){
        $data_res=[];
        $sql = new \Mod\Sql\Sql;
        $connect = $sql->db_connect;  
        $sth = $connect->prepare("SELECT * FROM `kat_lvl1`");
        $sth->execute(array());
        $i = 0;
        while($result_sql = $sth->fetch(\PDO::FETCH_ASSOC)){            
            $data_res[$i]["name_s"] =     $result_sql["name_s"];
            $data_res[$i]["id"] =    $result_sql["id"];
            $i++;
        }
        return $data_res;
    }
    
}
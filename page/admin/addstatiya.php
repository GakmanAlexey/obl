<?php

namespace Page\Admin;

Class addstatiya{
    public function main(){
        
        $den = new \Mod\User2\User;
        $den->den_adm();

        $add = new \Mod\Adminstatii\Add;
        $add->main();

        $data=[];
        $page = ["admin/head","admin/header","admin/lmenu","admin/addstatiya","admin/footer"];
        $vi = new \Mod\View\View();
        $vi->show($page,$data);
    }
}
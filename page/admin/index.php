<?php

namespace Page\Admin;

Class index{
    public function main(){
        $den = new \Mod\User2\User;
        $den->den_adm();
        $data=[];
        $page = ["admin\head","admin\header","admin\lmenu","admin\index","admin\footer"];
        $vi = new \Mod\View\View();
        $vi->show($page,$data);
    }
}
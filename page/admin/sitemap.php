<?php

namespace Page\Admin;

Class sitemap{
    public function main(){
        
        $den = new \Mod\User2\User;
        $den->den_adm();

        $st = new \Mod\Sitemap\load;
        $st->main();

        $data=[];
        $page = ["admin/head","admin/header","admin/lmenu","admin/sitemap","admin/footer"];
        $vi = new \Mod\View\View();
        $vi->show($page,$data);
    }
}
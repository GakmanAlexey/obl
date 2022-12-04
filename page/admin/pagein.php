<?php

namespace Page\Admin;

Class pagein{
    public function main(){
        

        $page = ["admin\head","admin\header","admin\pagein","admin\footer"];
        $vi = new \Mod\View\View();
        $vi->show($page,$data);
    }
}
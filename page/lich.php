<?php

namespace Page;

Class lich{
    public function main(){
        $data="";
        $page = ["head","header","lich","footer"];
        $vi = new \Mod\View\View();
        $vi->show($page,$data);
    }
}
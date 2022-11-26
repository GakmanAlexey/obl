<?php

namespace Page;

Class galereya{
    public function main(){
        $data="";
        $page = ["head","header","galereya","footer"];
        $vi = new \Mod\View\View();
        $vi->show($page,$data);
    }
}
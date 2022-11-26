<?php

namespace Page;

Class index{
    public function main(){
        //получить данные о самой популярной

        //получить данные о самой новой

        //получить данные о случайной записи
        $data="";
        $page = ["head","header","index","footer"];
        $vi = new \Mod\View\View();
        $vi->show($page,$data);
    }
}

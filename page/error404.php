<?php

namespace Page;

Class error404{
    public function main(){
        
        $data=[];
        $data['404'] = "on";
        $page = ["head","header","error404","footer"];
        $vi = new \Mod\View\View();
        $vi->show($page,$data);
    }
}
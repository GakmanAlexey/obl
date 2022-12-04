<?php

namespace Page;

Class error404{
    public function main(){
        header("HTTP/1.0 404 Not Found");
        header("HTTP/1.1 404 Not Found");
        header("Status: 404 Not Found");
        $data=[];
        $data['404'] = "on";
        $page = ["head","header","error404","footer"];
        $vi = new \Mod\View\View();
        $vi->show($page,$data);
    }
}
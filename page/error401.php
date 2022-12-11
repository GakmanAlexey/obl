<?php

namespace Page;

Class error401{
    public function main(){
        header("HTTP/1.0 401 Unauthorized");
        header("HTTP/1.1 401 Unauthorized");
        header("Status: 401 Unauthorized");
        $data=[];
        $data['401'] = "on";
        $page = ["head","header","error401","footer"];
        $vi = new \Mod\View\View();
        $vi->show($page,$data);
    }
}
<?php

namespace Page;

Class oblojka{
    public function main(){
        $data=[];



        $seo = new \Mod\Seo\seo;
        $data["seo"] = $seo->main($this->take_name_dir());
        //$bred = new \Mod\Bread\index;        
        //$data["bread"] = $bred->main();
        $page = ["head","header","oblojka","footer"];
        $vi = new \Mod\View\View();
        $vi->show($page,$data);
    }

    public function take_name_dir(){
        $url = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
        $url1 = explode("/", $url);
        return $url1[2];
    }
}
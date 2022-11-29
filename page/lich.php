<?php

namespace Page;

Class lich{
    public function main(){
        
        $urlist = "/litsenziya/";
        $seo = new \Mod\Seo\seo;
        $data["seo"] = $seo->main($urlist);
        $page = ["head","header","lich","footer"];
        $vi = new \Mod\View\View();
        $vi->show($page,$data);
    }
}
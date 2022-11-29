<?php

namespace Page;

Class galereya{
    public function main(){
        $urlist = "/galereya-oblozhek/";
        $seo = new \Mod\Seo\seo;
        $data["seo"] = $seo->main($urlist);

        $page = ["head","header","galereya","footer"];
        $vi = new \Mod\View\View();
        $vi->show($page,$data);
    }
}
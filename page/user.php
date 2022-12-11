<?php

namespace Page;

Class user{
    public function show_auth(){
        $data=[];
        $page = ["head","header","auth","footer"];
        $vi = new \Mod\View\View();
        $vi->show($page,$data);
    }
    public function show_reg(){
        $data=[];
        $regs = new \Mod\User2\User;
        $data["result"] = $regs ->show_register();
        $data["error"] =  $regs->error;
        $page = ["head","header","reg","footer"];
        $vi = new \Mod\View\View();
        $vi->show($page,$data);
    }
    public function show_exit(){
        
    }
}
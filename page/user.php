<?php

namespace Page;

Class user{
    public function show_auth(){
        $data=[];
        if((isset($_SESSION["id"])) and  ($_SESSION["id"] >= 1)){
            $page = ["head","header","authok","footer"];
            $vi = new \Mod\View\View();
            $vi->show($page,$data);
            return;
        }
        
        $regs = new \Mod\User2\User;
        $data["result"] = $regs ->show_auth();
        $data["error"] =  $regs->error;

        $page = ["head","header","auth","footer"];
        $vi = new \Mod\View\View();
        $vi->show($page,$data);
    }
    public function show_reg(){
        $data=[];
        if((isset($_SESSION["id"])) and  ($_SESSION["id"] >= 1)){
            $page = ["head","header","authok","footer"];
            $vi = new \Mod\View\View();
            $vi->show($page,$data);
        }
        $regs = new \Mod\User2\User;
        $data["result"] = $regs ->show_register();
        $data["error"] =  $regs->error;

        $page = ["head","header","reg","footer"];
        $vi = new \Mod\View\View();
        $vi->show($page,$data);
        return;
    }
    public function show_exit(){
        $data=[];
        unset($_SESSION["id"]);
        $page = ["head","header","exit","footer"];
        $vi = new \Mod\View\View();
        $vi->show($page,$data);
        return;
    }
}
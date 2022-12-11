<?php

namespace Mod\Errors;

Class Page{
    public function e401(){
        $p = new \Page\error401;
        $p->main();
        die(); 
    }
    public function e402(){
        
    }
    public function e403(){
        
    }
    public function e404(){
        $p = new \Page\error404;
        $p->main();
        die(); 
    }


}
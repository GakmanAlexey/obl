<?php

namespace Mod\Seo;

Class seo{

    public function main(){
        $data = [];
        $title = "";
        $image_src = "";
        $description = "";
        $data[]=$title;
        $data[]=$image_src;
        $data[]=$description;
        return $data;
    }

}
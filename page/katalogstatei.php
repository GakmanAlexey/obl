<?php

namespace Page;

Class katalogstatei{
    public function main(){
        $data=[];
        if(isset($_GET["page"])){
            $page = $_GET["page"];
        }else{
            $page = 1;
        }
        if($page == 1){            
            $data['big'] = true;
        }else{            
            $data['big'] = false;
        }
        $count_statii = $this->long_ind();
        $data['page_limit'] = $this->cheak_l($page,$count_statii);
        $data['page_tek'] = $page;
        //echo $data['page_limit'];
        $data["stat_list"] = $this->list_stat($page);
        //var_dump($data["stat_list"]);     
        
        $seo = new \Mod\Seo\seo; 
        $data["seo"] = $seo->main("katalog-statey");
        $data["seo"]["title"] = "Каталог статей";
        $data["seo"]["disc"] = "Каталог статей по тематике обложки для вк";

        $page = ["head","header","katalogstatei","footer"];
        $vi = new \Mod\View\View();
        $vi->show($page,$data);
    }

    public function long_ind(){
        
        $sql = new \Mod\Sql\Sql;
        $connect = $sql->db_connect;
        $sth = $connect->prepare("SELECT COUNT(*) FROM `statii` WHERE `s_show` = ?");
            $sth->execute(array(1));
            $result_sql = $sth->fetch(\PDO::FETCH_ASSOC);
            return $result_sql["COUNT(*)"];
    }
    public function cheak_l($page, $count){
        $count = $count -10;
        $tek_page = ceil($count / 12) +1;
        if($page <= $tek_page){
            return $tek_page;
        }else{
            $p = new \Page\error404;
            $p->main();
            die();
        }
    }
    public function list_stat($page){
        $data = [];
        if($page == 1){
        $sql = new \Mod\Sql\Sql;
        $connect = $sql->db_connect;
        $sth = $connect->prepare("SELECT * FROM `statii` WHERE `id` > ? and `s_show` = ? LIMIT 10");
            $sth->execute(array(0,1));
            while($result_sql = $sth->fetch(\PDO::FETCH_ASSOC)){
                $data[] = $result_sql;
            }
            return $data;
        }else{
            $st_num = (($page-2)*12)+9;
            $sql = new \Mod\Sql\Sql;
            $connect = $sql->db_connect;
            $sth = $connect->prepare("SELECT * FROM `statii` WHERE `id` > ? and `s_show` = ? LIMIT 12");
                $sth->execute(array($st_num,1));
                while($result_sql = $sth->fetch(\PDO::FETCH_ASSOC)){
                    $data[] = $result_sql;
                }
                return $data;
        }
    }
    
    
}
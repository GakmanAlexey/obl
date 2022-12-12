<?php

namespace Mod\Sitemap;

Class load{

    public function main(){
        if(isset($_POST["go1"]) and $_POST["go1"]=="yes"){
            if(isset($_POST["regenerat"]) and $_POST["regenerat"]==1){
                $this->rebild();
            }
            if(isset($_POST["gen"]) and $_POST["gen"]==1){
                $this->gen();
            }
            
        }
        
    }
    public function rebild(){
        $sql = new \Mod\Sql\Sql;
        $connect = $sql->db_connect;
        $sth = $connect->prepare("SELECT * FROM `router` WHERE `sw` = ?");
        $sth->execute(array(0));
        
        while($result_sql = $sth->fetch(\PDO::FETCH_ASSOC)){
            
            $sth1 = $connect->prepare("INSERT INTO `sitemap` SET `loc_s` = ?, `lastmod_s` = ?, `change_s` = ?, `priority_s` = ?");
            $sth1->execute(array($result_sql["url"],time(),"monthly",0.5));
        }
    }
    public function add_to($url,$last,$chang,$prior){
        $sql = new \Mod\Sql\Sql;
        $connect = $sql->db_connect;   
        $sth = $connect->prepare("INSERT INTO `sitemap` SET `loc_s` = ?, `lastmod_s` = ?, `change_s` = ?, `priority_s` = ?");
        $sth->execute(array($url,$last,$chang,$prior));
    }

    public function gen(){
        $sql = new \Mod\Sql\Sql;
        $connect = $sql->db_connect;
        $sth = $connect->prepare("SELECT * FROM `sitemap`");
            $sth->execute(array());
            

        $dom = new \DOMDocument('1.0', 'utf-8');
        $urlset = $dom->createElement('urlset');
        $urlset->setAttribute('xmlns','http://www.sitemaps.org/schemas/sitemap/0.9');

        $site_name = "https://xn----7sbcgrydczc.xn--p1ai";
        while($result_sql = $sth->fetch(\PDO::FETCH_ASSOC)){
            // Дата изменения статьи.
            
         
            $url = $dom->createElement('url');
         
            // Элемент <loc> - URL статьи.
            $loc = $dom->createElement('loc');
            $text = $dom->createTextNode(
                htmlentities($site_name.$result_sql["loc_s"], ENT_QUOTES)
            );
            $loc->appendChild($text);
            $url->appendChild($loc);
         
            // Элемент <lastmod> - дата последнего изменения статьи.
            $lastmod = $dom->createElement('lastmod');
            $text = $dom->createTextNode(date('Y-m-d', $result_sql["lastmod_s"]));
            $lastmod->appendChild($text);
            $url->appendChild($lastmod);
         
            // Элемент <priority> - приоритетность (от 0 до 1.0, по умолчанию 0.5).
            // Если дата публикации/изменения статьи была меньше недели назад ставим приоритет 1.
            $priority = $dom->createElement('priority');
            $text = $dom->createTextNode($result_sql["priority_s"]);
            $priority->appendChild($text);
            $url->appendChild($priority);
         
            $urlset->appendChild($url);
        }
         
        $dom->appendChild($urlset);
         
        // Сохранение в файл.
        $dom->save(MYPOS . '/sitemap.xml');
         
        // Или отправка в браузер.
        
        
    }
}
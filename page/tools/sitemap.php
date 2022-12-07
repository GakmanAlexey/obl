<?php

namespace Page\Tools;

Class sitemap{
    public function main(){
        $timer = "2022-12-08";
        $url = "https://xn----7sbcgrydczc.xn--p1ai";
        echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
';
$sql = new \Mod\Sql\Sql;
        $connect = $sql->db_connect;  
            $sth = $connect->prepare("SELECT * FROM `router` WHERE `sw` = ?");
            $sth->execute(array(0));
            while($result_sql = $sth->fetch(\PDO::FETCH_ASSOC)){
echo '<url>
    <loc>'.$url.$result_sql["url"].'</loc>
    <lastmod>'.$timer.'</lastmod>
</url>
';
            };






        echo '
</urlsetxmlns:xsi=>';
    


    }
}
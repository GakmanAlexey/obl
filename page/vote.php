<?php

namespace Page;

Class Vote{
    public function main(){
        var_dump($_POST);
        $publ = $_POST["urli"];
        $type = $_POST["text"];
        $user = USI;
        //проверить голосовал ли
        $sql = new \Mod\Sql\Sql;
        $connect = $sql->db_connect; 
        $sth3 = $connect->prepare("SELECT * FROM `liker` WHERE `url_i` = ? and `user_i` = ? LIMIT 1");
            $sth3->execute(array($publ,$user));
            $result_sql3 = $sth3->fetch(\PDO::FETCH_ASSOC);

        //если не голосовал то добавить голос
        if(isset($result_sql3["id"]) and $result_sql3["id"]>=1){

        }else{

            //обновить лайк
            $sth = $connect->prepare("INSERT INTO liker (url_i, user_i) VALUES (?,?)");
            $sth->execute(array($publ,$user));
            $result_sql = $sth->fetch(\PDO::FETCH_ASSOC);
            if($type == "like"){
                $sth = $connect->prepare("UPDATE categories_url SET pluses = pluses + 1 WHERE myAddres=?");
                $sth->execute(array($publ));
                $result_sql = $sth->fetch(\PDO::FETCH_ASSOC);
            }else{
                $sth = $connect->prepare("UPDATE categories_url SET minuses = minuses + 1 WHERE myAddres=?");
                $sth->execute(array($publ));
                $result_sql = $sth->fetch(\PDO::FETCH_ASSOC);

            }
        }
        
        $page = ["vote"];
        $data=["ok"];
        $vi = new \Mod\View\View();
        $vi->show($page,$data);
    }
}
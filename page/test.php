<?php

namespace Page;

Class test{
    public function main(){
        /*
        $sql = new \Mod\Sql\Sql;
        $connect = $sql->db_connect;  
            $sth = $connect->prepare("SELECT * FROM `categories_url` WHERE `type_1` = ?");
            $sth->execute(array("fs"));
            while($result_sql = $sth->fetch(\PDO::FETCH_ASSOC)){
                //echo $result_sql["fathers"];
                //echo $result_sql["myAddres"];
                $sth1 = $connect->prepare("SELECT * FROM `categories_url` WHERE `id` = ?");
                $sth1->execute(array($result_sql["fathers"]));
                $result_sql1 = $sth1->fetch(\PDO::FETCH_ASSOC);

                $sth3 = $connect->prepare("SELECT * FROM `categories_url` WHERE `id` = ?");
                $sth3->execute(array($result_sql1["fathers"]));
                $result_sql2 = $sth3->fetch(\PDO::FETCH_ASSOC);
                $old_g = $gates;
                $gates = "/galereya-oblozhek/".$result_sql2["myAddres"]."/".$result_sql1["myAddres"]."/";
                $cl = "Page\Temain";
                if ($old_g == $gates){continue;}
                //echo $gates;
                try {
                $sth2 = $connect->prepare("INSERT INTO `router` (`url`, `class`, `funct`) VALUES (?,?,?)");
                $sth2->execute(array($gates,$cl,"main"));
                }
                catch (PDOException $e) {
                    echo "Database error: " . $e->getMessage();
                }
                //var_dump( $sth2);
                echo "<br>";
        
            };
        
        $sql = new \Mod\Sql\Sql;
        $connect = $sql->db_connect;  
            $sth = $connect->prepare("SELECT * FROM `categories_url` WHERE `type_1` = ?");
            $sth->execute(array("fs"));
            while($result_sql = $sth->fetch(\PDO::FETCH_ASSOC)){
                //echo $result_sql["fathers"];
                //echo $result_sql["myAddres"];
                $sth1 = $connect->prepare("SELECT * FROM `categories_url` WHERE `id` = ?");
                $sth1->execute(array($result_sql["fathers"]));
                $result_sql1 = $sth1->fetch(\PDO::FETCH_ASSOC);

                $sth3 = $connect->prepare("SELECT * FROM `categories_url` WHERE `id` = ?");
                $sth3->execute(array($result_sql1["fathers"]));
                $result_sql2 = $sth3->fetch(\PDO::FETCH_ASSOC);

                $gates = "/galereya-oblozhek/".$result_sql2["myAddres"]."/".$result_sql1["myAddres"]."/".$result_sql["myAddres"]."/";
                $cl = "Page\pagein";
                //echo $gates;
                try {
                $sth2 = $connect->prepare("INSERT INTO `router` (`url`, `class`, `funct`) VALUES (?,?,?)");
                $sth2->execute(array($gates,$cl,"main"));
                }
                catch (PDOException $e) {
                    echo "Database error: " . $e->getMessage();
                }
                //var_dump( $sth2);
                echo "<br>";
        
            };
            */
        
    }
}

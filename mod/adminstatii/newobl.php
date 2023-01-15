<?php

namespace Mod\Adminstatii;

Class newobl{

    public function main(){
        if(isset($_POST["go"]) && ($_POST["go"] == "yes")){
            

            if(isset($_POST["autogen_url"])){
                $autogen_url = true;
            }else{
                $autogen_url = false;
            }

            if(isset($_POST["add_sitemap"])){
                $add_sitemap = true;
            }else{
                $add_sitemap = false;
            }
        }else{
            return false;
        }
        //var_dump("<pre><br><br><br><br><br><br><br>",$_POST,"</pre>");
        //Загрузка файла
        //$this->add_file();
        //конект к бд 
        
        $sql = new \Mod\Sql\Sql;
        $connect = $sql->db_connect;   
        //Загрузить статью
        $text = "";
        $sth = $connect->prepare("INSERT INTO `categories_url` SET  `fathers` = ?, `myAddres` = ?, `type_1` = ?, `name_i` = ?, `img` = ?, `text_main` = ?");
        $sth->execute(array($_POST["x9"],$_POST["x8"],"fs",$_POST["x15"],$_POST["x14"],$text));
        
        //загузить в роутер
        $sth1 = $connect->prepare("INSERT INTO `router` SET  `url` = ?, `class` = ?, `funct` = ?, `sw` = ?");
        $sth1->execute(array("/".$_POST["x12"],"Page\pagein","main",0));
        
        //добавить в sitemap
        $st = new \Mod\Sitemap\load;
        $st->add_to("/".$_POST["x12"],time(),"monthly",0.5);
        
        return true;
    }



    public function add_lvl_1(){
        if(isset($_POST["go"]) && ($_POST["go"] == "yes")){
        }else{
            return false;
        }

        $name_s = $_POST["name_s"];//Название
        $text_s = $_POST["text_s"];//Текст
        $plus_s = $_POST["plus_s"];//плюсы
        $minus_s = $_POST["minus_s"];//минусы
        $adr_s = $_POST["adr_s"];//адрес
        $title_s = $_POST["title_s"];//Тайтл
        $disc_s = $_POST["disc_s"];//Дискрипшин
        $key_s = $_POST["key_s"];//ключи

        $f_cr = new \Mod\Abc\ABC;
        $creater_name = $f_cr->ru_en($name_s);
        
        $name_adr = "/src/i/img_lvl1/".$creater_name.".png";
        $q_img_s = $creater_name.".png";
        $this->add_file($name_adr);

        $sql = new \Mod\Sql\Sql;
        $connect = $sql->db_connect; 
        //update 								

        $sth = $connect->prepare("INSERT INTO `kat_lvl1` SET  `name_s` = ?, `img_s` = ?, `text_s` = ?, `plus_s` = ?, `minus_s` = ?, `adr_s` = ?, `title_s` = ?, `disc_s` = ?, `key_s` = ?");
        $sth->execute(array($name_s,$q_img_s,$text_s,$plus_s,$minus_s,$adr_s,$title_s,$disc_s,$key_s));

        $urcheik = "/galereya/".$adr_s."/";
        //загузить в роутер
        $sth1 = $connect->prepare("INSERT INTO `router` SET  `url` = ?, `class` = ?, `funct` = ?, `sw` = ?");
        $sth1->execute(array($urcheik,"Page\\newlvl2","main",0));
        
        //добавить в sitemap
        $st = new \Mod\Sitemap\load;
        $st->add_to($urcheik,time(),"monthly",0.5);

        $seo = new \Mod\Seo\seo;
        $seo -> add($adr_s, $title_s, $disc_s);

        
        $path=MYPOS ."/src/i/img_lvl2/" . $adr_s;
        mkdir($path, 0777, true);

    }

    public function add_lvl_2(){
        if(isset($_POST["go"]) && ($_POST["go"] == "yes")){
        }else{
            return false;
        }

        $father_s = $_POST["father_s"];//Родитель
        $name_s = $_POST["name_s"];//Название
        $text_s = $_POST["text_s"];//Текст
        $plus_s = $_POST["plus_s"];//плюсы
        $minus_s = $_POST["minus_s"];//минусы
        $adr_s = $_POST["adr_s"];//адрес
        $title_s = $_POST["title_s"];//Тайтл
        $disc_s = $_POST["disc_s"];//Дискрипшин
        $key_s = $_POST["key_s"];//ключи

        $f_cr = new \Mod\Abc\ABC;
        $creater_name = $f_cr->ru_en($name_s);
        $sql = new \Mod\Sql\Sql;
        $connect = $sql->db_connect; 
            $sth0 = $connect->prepare("SELECT * FROM `kat_lvl1` WHERE `id` = ?");
            $sth0->execute(array($father_s));
            $result_sql0 = $sth0->fetch(\PDO::FETCH_ASSOC);

        $name_adr = "/src/i/img_lvl2/".$result_sql0["adr_s"]."/".$creater_name.".png";
        $q_img_s = $result_sql0["adr_s"]."/".$creater_name.".png";
        echo $name_adr;
        $this->add_file($name_adr);


        //update 								

        $sth = $connect->prepare("INSERT INTO `kat_lvl2` SET  `father_s` = ?,`name_s` = ?, `img_s` = ?, `text_s` = ?, `plus_s` = ?, `minus_s` = ?, `adr_s` = ?, `title_s` = ?, `disc_s` = ?, `key_s` = ?");
        $sth->execute(array($father_s,$name_s,$q_img_s,$text_s,$plus_s,$minus_s,$adr_s,$title_s,$disc_s,$key_s));

        $urcheik = "/galereya/".$result_sql0["adr_s"]."/".$adr_s."/";
        //загузить в роутер
        $sth1 = $connect->prepare("INSERT INTO `router` SET  `url` = ?, `class` = ?, `funct` = ?, `sw` = ?");
        $sth1->execute(array($urcheik,"Page\\newlvl3","main",0));
        
        //добавить в sitemap
        $st = new \Mod\Sitemap\load;
        $st->add_to($urcheik,time(),"monthly",0.5);
        $seo = new \Mod\Seo\seo;
        $seo -> add($adr_s, $title_s, $disc_s);
                
        $path=MYPOS ."/src/i/img_lvl3/".$result_sql0["adr_s"]."/". $adr_s;
        mkdir($path, 0777, true);

        $path=MYPOS ."/src/i/img_lvl3/".$result_sql0["adr_s"]."/". $adr_s."-pred";
        mkdir($path, 0777, true);
        $path=MYPOS ."/src/i/img_lvl3/".$result_sql0["adr_s"]."/". $adr_s."-min";
        mkdir($path, 0777, true);
        $path=MYPOS ."/src/i/img_lvl3/".$result_sql0["adr_s"]."/". $adr_s."-pc";
        mkdir($path, 0777, true);

    }
    public function add_lvl_3(){
        if(!isset($_GET["step"]) or ($_GET["step"]=="")){
            $step = 1;
        }else{
            $step = $_GET["step"];
        }
    
        if($step == 1){
            return $this->step_1();
        }else if($step == 2){
            return $this->step_2();
        }else if($step == 3){
            return $this->step_3();           
        }else if($step == 4){
            return $this->step_4();           
        }else{
            return $this->step_1();
        }

    }

    public function step_1(){
        $data = [];
        $data["step"] = 1;
        $sql = new \Mod\Sql\Sql;
        $connect = $sql->db_connect; 
            $sth0 = $connect->prepare("SELECT * FROM `kat_lvl1`");
            $sth0->execute(array());
            while($result_sql0 = $sth0->fetch(\PDO::FETCH_ASSOC)){
                $data["name"][] = $result_sql0["name_s"];
                $data["id"][] = $result_sql0["id"];
            }
        return $data;
    }
    public function step_2(){
        $data = [];
        $data["step"] = 2;
        $sql = new \Mod\Sql\Sql;
        $connect = $sql->db_connect; 
            $sth0 = $connect->prepare("SELECT * FROM `kat_lvl2` WHERE `father_s` = ?");
            $sth0->execute(array($_GET["id"]));
            while($result_sql0 = $sth0->fetch(\PDO::FETCH_ASSOC)){
                $data["name"][] = $result_sql0["name_s"];
                $data["id"][] = $result_sql0["id"];
            }
        return $data;
        
    }
    public function step_3(){
        $data = [];
        $data["step"] = 3;

        $sql = new \Mod\Sql\Sql;
        $connect = $sql->db_connect; 
            $sth0 = $connect->prepare("SELECT * FROM `kat_lvl1` WHERE `id` = ? LIMIT 1");
            $sth0->execute(array($_GET["id"]));
            $data["id"] = $result_sql0 = $sth0->fetch(\PDO::FETCH_ASSOC);

            $sth1 = $connect->prepare("SELECT * FROM `kat_lvl2` WHERE `id` = ? LIMIT 1");
            $sth1->execute(array($_GET["ids"]));
            $data["ids"] = $result_sql1 = $sth1->fetch(\PDO::FETCH_ASSOC);

            $sth2 = $connect->prepare("SELECT COUNT(*) FROM `kat_lvl3` WHERE `father_s` = ? ");
            $sth2->execute(array($_GET["ids"]));
            $data["count"] = $result_sql1 = $sth2->fetch(\PDO::FETCH_ASSOC);
            //echo "<br><br><br><br><br><br><br><br><br>";
            //var_dump($result_sql0,$result_sql1);
        
            return $data;
    }
    public function step_4(){
        $data = [];
        $data["step"] = 4;
        //echo "<br><br><br><br><br><br><br><br><br>";
        //var_dump($_POST);

        $sql = new \Mod\Sql\Sql;
        $connect = $sql->db_connect; 
            $sth0 = $connect->prepare("SELECT * FROM `kat_lvl1` WHERE `id` = ? LIMIT 1");
            $sth0->execute(array($_GET["id"]));
            $result_sql0 = $sth0->fetch(\PDO::FETCH_ASSOC);

            $sth2 = $connect->prepare("SELECT * FROM `kat_lvl2` WHERE `id` = ? LIMIT 1");
            $sth2->execute(array($_GET["ids"]));
            $result_sql2 = $sth2->fetch(\PDO::FETCH_ASSOC);

        $temp_name = $result_sql0["name_s"]." ".$_POST["name_x"];
        echo $temp_name;
        $f_cr = new \Mod\Abc\ABC;
        $creater_name = $f_cr->ru_en($temp_name);
        $creater_img = $f_cr->ru_en($_POST["name_x"]);

        $data =[];
        $data["pred"] = $creater_img_pred = "/".$result_sql0["adr_s"]."/".$result_sql2["adr_s"]."-pred/".$creater_img.".png";
        $data["min"] = $creater_img_min = "/".$result_sql0["adr_s"]."/".$result_sql2["adr_s"]."-min/".$creater_img.".png";
        $data["pc"] = $creater_img_pc = "/".$result_sql0["adr_s"]."/".$result_sql2["adr_s"]."-pc/".$creater_img.".png";
        $data["img"] = $creater_img = "/".$result_sql0["adr_s"]."/".$result_sql2["adr_s"]."/".$creater_img.".png";
        //var_dump($creater_name);
        $father_s = $_GET["ids"];
        $name_s	  = $_POST["name_x"];
        $img_s	  = $creater_img;
        $text_s	  = $_POST["text"];
        $plus_s	  = $_POST["plus"];
        $minus_s  = $_POST["minus"];
        $adr_s    = $creater_name;
        $title_s  = $_POST["title_x"];
        $disc_s	  = $_POST["opis"];
        $key_s    = "";

        
            $sth = $connect->prepare("INSERT INTO `kat_lvl3` SET 
            `father_s`=?	,
            `name_s`=?	,
            `img_s`=?	,
            `text_s`=?	,
            `plus_s`=?	,
            `minus_s`=?	,
            `adr_s`=?,
            `title_s`=?,
            `disc_s`=?	,
            `key_s`=?	,
            `img_s_pred`=?,	
            `img_s_min`=?,
            `img_s_pc`=?");
            $sth->execute(array($father_s,$name_s, $img_s, $text_s, $plus_s, $minus_s, $adr_s, $title_s,
                $disc_s, $key_s, $creater_img_pred, $creater_img_min, $creater_img_pc
            ));
        
        //var_dump($img_s);
        $urcheik ="/galereya/".$result_sql0["adr_s"]."/".$result_sql2["adr_s"]."/".$adr_s."/";
                //загузить в роутер
                $sth5 = $connect->prepare("INSERT INTO `router` SET  `url` = ?, `class` = ?, `funct` = ?, `sw` = ?");
                $sth5->execute(array($urcheik,"Page\\newlvl4","main",0));
                
                //добавить в sitemap
                $st = new \Mod\Sitemap\load;
                $st->add_to($urcheik,time(),"monthly",0.5);

                $seo = new \Mod\Seo\seo;
                $seo -> add($adr_s, $title_s, $disc_s);

        $sourseFileName = $this->add_file("/src/i/img_lvl3".$img_s);
        $this->add_file_pred($sourseFileName, MYPOS."/src/i/img_lvl3".$creater_img_pred);
        $this->add_file_min($sourseFileName, MYPOS."/src/i/img_lvl3".$creater_img_min);
        $this->add_file_pc(MYPOS."/src/i/img_lvl3".$creater_img_min, MYPOS."/src/i/img_lvl3".$creater_img_pc);
        $data["step"] = 4;
        return $data;
        
    }
    public function add_file_pred($sourceFile, $newFileAdress){
        //640	256   1k3

        $info   = getimagesize($sourceFile);
        $width  = $info[0];
        $height = $info[1];
        $type   = $info[2];
        $img = imageCreateFromPng($sourceFile); 
		imageSaveAlpha($img, true);

        $w = 640;
        $h = 256;
        
        if (empty($w)) {
            $w = ceil($h / ($height / $width));
        }
        if (empty($h)) {
            $h = ceil($w / ($width / $height));
        }
        
        $tmp = imageCreateTrueColor($w, $h);
        
            imagealphablending($tmp, true); 
            imageSaveAlpha($tmp, true);
            $transparent = imagecolorallocatealpha($tmp, 0, 0, 0, 127); 
            imagefill($tmp, 0, 0, $transparent); 
            imagecolortransparent($tmp, $transparent);    
          
        
        $tw = ceil($h / ($height / $width));
        $th = ceil($w / ($width / $height));
        if ($tw < $w) {
            imageCopyResampled($tmp, $img, ceil(($w - $tw) / 2), 0, 0, 0, $tw, $h, $width, $height);        
        } else {
            imageCopyResampled($tmp, $img, 0, ceil(($h - $th) / 2), 0, 0, $w, $th, $width, $height);    
        }            
        
        $img = $tmp;
        imagePng($img, $newFileAdress);
    }
    public function add_file_min($sourceFile, $newFileAdress){
        //320	128   1k6

        $info   = getimagesize($sourceFile);
        $width  = $info[0];
        $height = $info[1];
        $type   = $info[2];
        $img = imageCreateFromPng($sourceFile); 
		imageSaveAlpha($img, true);

        $w = 320;
        $h = 128;
        
        if (empty($w)) {
            $w = ceil($h / ($height / $width));
        }
        if (empty($h)) {
            $h = ceil($w / ($width / $height));
        }
        
        $tmp = imageCreateTrueColor($w, $h);
        
            imagealphablending($tmp, true); 
            imageSaveAlpha($tmp, true);
            $transparent = imagecolorallocatealpha($tmp, 0, 0, 0, 127); 
            imagefill($tmp, 0, 0, $transparent); 
            imagecolortransparent($tmp, $transparent);    
          
        
        $tw = ceil($h / ($height / $width));
        $th = ceil($w / ($width / $height));
        if ($tw < $w) {
            imageCopyResampled($tmp, $img, ceil(($w - $tw) / 2), 0, 0, 0, $tw, $h, $width, $height);        
        } else {
            imageCopyResampled($tmp, $img, 0, ceil(($h - $th) / 2), 0, 0, $w, $th, $width, $height);    
        }            
        
        $img = $tmp;
        imagePng($img, $newFileAdress);
    }
    public function add_file_pc($sourceFile, $newFileAdress){
        //320	80    
        
        $info   = getimagesize($sourceFile);
        $width  = $info[0];
        $height = $info[1];
        $type   = $info[2];
        $img = imageCreateFromPng($sourceFile); 
		imageSaveAlpha($img, true);

        $w = 320;
        $h = 128;
        
        $x = 0;
        $y = 24;
        
        if (strpos($x, '%') !== false) {
            $x = intval($x);
            $x = ceil(($width * $x / 100) - ($w / 100 * $x));
        }
        if (strpos($y, '%') !== false) {
            $y = intval($y);
            $y = ceil(($height * $y / 100) - ($h / 100 * $y));
        }
        
        $tmp = imageCreateTrueColor(320, 80);
        if ($type == 1 || $type == 3) {
            imagealphablending($tmp, true); 
            imageSaveAlpha($tmp, true);
            $transparent = imagecolorallocatealpha($tmp, 0, 0, 0, 127); 
            imagefill($tmp, 0, 0, $transparent); 
            imagecolortransparent($tmp, $transparent);    
        }
        
        imageCopyResampled($tmp, $img, 0, 0, 0, 24, 320, 80, 320, 80);
        $img = $tmp;
        imagePng($img, $newFileAdress);

    }

    public function add_file($name_adr){
        $adress_file = $name_adr;
        //echo "$adress_file";
       // Название <input type="file">
        $input_name = 'file';
        
        // Разрешенные расширения файлов.
        $allow = array();
        
        // Запрещенные расширения файлов.
        $deny = array(
            'phtml', 'php', 'php3', 'php4', 'php5', 'php6', 'php7', 'php8', 'phps', 'cgi', 'pl', 'asp', 
            'aspx', 'shtml', 'shtm', 'htaccess', 'htpasswd', 'ini', 'log', 'sh', 'js', 'html', 
            'htm', 'css', 'sql', 'spl', 'scgi', 'fcgi'
        );
        
        // Директория куда будут загружаться файлы.
        $path = MYPOS;
        
        
        if (isset($_FILES[$input_name])) {
            // Проверим директорию для загрузки.
            if (!is_dir($path)) {
                mkdir($path, 0777, true);
            }
 
        // Преобразуем массив $_FILES в удобный вид для перебора в foreach.
        $files = array();
        $diff = count($_FILES[$input_name]) - count($_FILES[$input_name], COUNT_RECURSIVE);
        if ($diff == 0) {
            $files = array($_FILES[$input_name]);
        } else {
            foreach($_FILES[$input_name] as $k => $l) {
                foreach($l as $i => $v) {
                    $files[$i][$k] = $v;
                }
            }		
        }	
        $i = 0;
        $f_n_e="";
        foreach ($files as $file) {
            $i++;
            $f_n_e = $adress_file;
            $error = $success = '';
    
            // Проверим на ошибки загрузки.
            if (!empty($file['error']) || empty($file['tmp_name'])) {
                switch (@$file['error']) {
                    case 1:
                    case 2: $error = 'Превышен размер загружаемого файла.'; break;
                    case 3: $error = 'Файл был получен только частично.'; break;
                    case 4: $error = 'Файл не был загружен.'; break;
                    case 6: $error = 'Файл не загружен - отсутствует временная директория.'; break;
                    case 7: $error = 'Не удалось записать файл на диск.'; break;
                    case 8: $error = 'PHP-расширение остановило загрузку файла.'; break;
                    case 9: $error = 'Файл не был загружен - директория не существует.'; break;
                    case 10: $error = 'Превышен максимально допустимый размер файла.'; break;
                    case 11: $error = 'Данный тип файла запрещен.'; break;
                    case 12: $error = 'Ошибка при копировании файла.'; break;
                    default: $error = 'Файл не был загружен - неизвестная ошибка.'; break;
                }
            } elseif ($file['tmp_name'] == 'none' || !is_uploaded_file($file['tmp_name'])) {
                $error = 'Не удалось загрузить файл.';
            } else {
                // Оставляем в имени файла только буквы, цифры и некоторые символы.
                $pattern = "[^a-zа-яё0-9,~!@#%^-_\$\?\(\)\{\}\[\]\.]";
                $name = mb_eregi_replace($pattern, '-', $file['name']);
                $name = mb_ereg_replace('[-]+', '-', $name);
                
                // Т.к. есть проблема с кириллицей в названиях файлов (файлы становятся недоступны).
                // Сделаем их транслит:
                $converter = array(
                    'а' => 'a',   'б' => 'b',   'в' => 'v',    'г' => 'g',   'д' => 'd',   'е' => 'e',
                    'ё' => 'e',   'ж' => 'zh',  'з' => 'z',    'и' => 'i',   'й' => 'y',   'к' => 'k',
                    'л' => 'l',   'м' => 'm',   'н' => 'n',    'о' => 'o',   'п' => 'p',   'р' => 'r',
                    'с' => 's',   'т' => 't',   'у' => 'u',    'ф' => 'f',   'х' => 'h',   'ц' => 'c',
                    'ч' => 'ch',  'ш' => 'sh',  'щ' => 'sch',  'ь' => '',    'ы' => 'y',   'ъ' => '',
                    'э' => 'e',   'ю' => 'yu',  'я' => 'ya', 
                
                    'А' => 'A',   'Б' => 'B',   'В' => 'V',    'Г' => 'G',   'Д' => 'D',   'Е' => 'E',
                    'Ё' => 'E',   'Ж' => 'Zh',  'З' => 'Z',    'И' => 'I',   'Й' => 'Y',   'К' => 'K',
                    'Л' => 'L',   'М' => 'M',   'Н' => 'N',    'О' => 'O',   'П' => 'P',   'Р' => 'R',
                    'С' => 'S',   'Т' => 'T',   'У' => 'U',    'Ф' => 'F',   'Х' => 'H',   'Ц' => 'C',
                    'Ч' => 'Ch',  'Ш' => 'Sh',  'Щ' => 'Sch',  'Ь' => '',    'Ы' => 'Y',   'Ъ' => '',
                    'Э' => 'E',   'Ю' => 'Yu',  'Я' => 'Ya',
                );
    
                $name = strtr($name, $converter);
                $parts = pathinfo($name);
                //var_dump($file['tmp_name']);
                if (empty($name) || empty($parts['extension'])) {
                    $error = 'Недопустимое тип файла';
                } elseif (!empty($allow) && !in_array(strtolower($parts['extension']), $allow)) {
                    $error = 'Недопустимый тип файла';
                } elseif (!empty($deny) && in_array(strtolower($parts['extension']), $deny)) {
                    $error = 'Недопустимый тип файла';
                } else {
                    // Чтобы не затереть файл с таким же названием, добавим префикс.
                    $i = 0;
                    $prefix = '';
                    while (is_file($path . $parts['filename'] . $prefix . '.' . $parts['extension'])) {
                        $prefix = '(' . ++$i . ')';
                    }
                    $name = $parts['filename'] . $prefix . '.' . $parts['extension'];
    
                    // Перемещаем файл в директорию.
                    if (move_uploaded_file($file['tmp_name'], $path . $f_n_e)) {
                        // Далее можно сохранить название файла в БД и т.п.
                        $success = 'Файл «' . $name . '» успешно загружен.';
                    } else {
                        $error = 'Не удалось загрузить файл.';
                    }
                }
                //var_dump($file['tmp_name']);
            }
            

            }
        }
        return $path . $f_n_e;
    }

    public function save_lower($img){
        //960	320

    }   
    public function save_mob($img){
        //350	170

    }
    public function save_prew($img){
        //600	200

    }
    public function save_probl($img){
        //1920	640

    }
}
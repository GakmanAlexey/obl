<?php

namespace Mod\Adminstatii;

Class Addobl{

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
        echo "<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>";
        //var_dump("<pre><br><br><br><br><br><br><br>",$_POST,"</pre>");
        //Загрузка файла
        $this->add_file();
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

    public function add_file(){
        $adress_file = $_POST["x14"];
        //echo "$adress_file";
       // Название <input type="file">
        $input_name = 'file';
        
        // Разрешенные расширения файлов.
        $allow = array();
        
        // Запрещенные расширения файлов.
        $deny = array(
            'phtml', 'php', 'php3', 'php4', 'php5', 'php6', 'php7', 'phps', 'cgi', 'pl', 'asp', 
            'aspx', 'shtml', 'shtm', 'htaccess', 'htpasswd', 'ini', 'log', 'sh', 'js', 'html', 
            'htm', 'css', 'sql', 'spl', 'scgi', 'fcgi'
        );
        
        // Директория куда будут загружаться файлы.
        $path = MYPOS . '/src/img/oblog/';
        
        
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
                var_dump($file['tmp_name']);
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
                var_dump($file['tmp_name']);
            }
            
            // Выводим сообщение о результате загрузки.
            /*
                if (!empty($success)) {
                    echo '<p>' . $success . '</p>';		
                } else {
                    echo '<p>' . $error . '</p>';
                }
                */
            }
        }
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
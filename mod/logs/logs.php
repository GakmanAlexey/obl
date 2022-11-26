<?php

namespace Mod\Logs;

Class Logs{
       
    
    public function loging($mod_name, $text, $auth = "system", $file_logs = "logs.txt"){
        $file_name = MYPOS.'/logs/'.$mod_name.'/'.$file_logs;        
        //Проверка на существование файла
        if (!file_exists($file_name)) {
            $this->create_file($file_name);
            echo "Файл $file_name не существует";
        } 

        $this->add_log($file_name, $text, $auth);
    }
    //Создание файла
    public function create_file($file_name){
        $file = fopen($file_name, 'w');
        fclose($file);
    }
    //Добавление строки лога        
    public function add_log($file_name, $text, $auth ){
        $date = date("d.m.Y H:i:s");
        $file = fopen($file_name, 'a');
        $text =  "[".$date."] ".$auth.": ".$text."\n";
        fwrite($file, $text);
        fclose($file);
    }
    
}
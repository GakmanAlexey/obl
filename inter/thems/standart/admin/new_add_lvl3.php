
   <div class="mine"> 
      <div class="top_head">ДОБАВИТЬ обложку (NEW)</div>

      <div class="text_block">


         <?php
         //step 1 start
        
         //var_dump($data);
         if($data["dt"]["step"] ==1){
            ?>
            <div class="text_block_head">Шаг 1</div>
            <div class="text_block_body">
            <?php
            $i = 0;
            while(isset($data["dt"]["name"][$i])){            
            ?>
            <a class="button_classic bt_start" href="/admin/new_add_lvl3/?step=2&id=<?php echo $data["dt"]["id"][$i];?>"><?php echo $data["dt"]["name"][$i];?></a>
            <?php
               $i++;
               }
         }
         //step 1 end
         ?>

<?php
         //step 2 start
         if($data["dt"]["step"] == 2){
            ?>
            <div class="text_block_head">Шаг 2</div>
            <br class="text_block_body">
            <?php
            $i = 0;
            while(isset($data["dt"]["name"][$i])){            
            ?>
            <a class="button_classic bt_start" href="/admin/new_add_lvl3/?step=3&id=<?php echo $_GET["id"];?>&ids=<?php echo $data["dt"]["id"][$i];?>"><?php echo $data["dt"]["name"][$i];?></a>
            <?php
               $i++;
               }
         }
         //step 2 end
         ?>

<?php
         //step 3 start
         if($data["dt"]["step"] == 3){
            ?>
            <div class="text_block_head">Шаг 3</div>
            <br class="text_block_body">
            
         
         <form  enctype="multipart/form-data"  action="/admin/new_add_lvl3/?step=4&id=<?php echo $_GET["id"];?>&ids=<?php echo $_GET["ids"];?>" method="post">
               <h4>Данные родителя</h4>               
               <input type="text" class="input_standart input_1inline" value="<?php echo $data["dt"]["id"]["name_s"]." | ".$data["dt"]["ids"]["name_s"];?>" name="x1">
               <input type="text" class="input_standart input_1inline" value="Колличество: <?php echo $data["dt"]["count"]["COUNT(*)"]; $counts=$data["dt"]["count"]["COUNT(*)"]+1;?>" name="x2">
               
               <h4>Данные файла</h4>   
               <h5>Название</h5>  
               <input type="text" class="input_standart input_1inline" value="<?php echo $data["dt"]["ids"]["name_s"] . " №".$counts;?>" name="name_x"> 
               <h5>Тайтл</h5>  
               <input type="text" class="input_standart input_1inline" value="<?php echo "Обложка для вк ".$data["dt"]["ids"]["name_s"] . " №".$counts . " Скачать 1920 на 768";?>" name="title_x">
               <textarea class="input_standart input_1inline text_area_standart " placeholder="Тест" name="text"></textarea>  
               <textarea class="input_standart input_1inline text_area_standart " placeholder="Описание" name="opis"></textarea>
               
               <input class="input_standart input_1inline button_classic bt_war" multiple  type="file" name="file">  
               <h4>Стартовые голоса</h4>               
               <input type="text" class="input_standart input_2inline" value="0" name="plus">
               <input type="text" class="input_standart input_2inline" value="0" name="minus"><br>

               <button class="button_classic bt_suc" name="go" value="yes">Сохранить</button>
         </form>
            
         <?php
         }
         //var_dump("<pre>",$data,"</pre>");
         //step 3 end
         

         if($data["dt"]["step"] == 4){
            //var_dump($data["dt"]);
            ?>
            <div class="text_block_head">Шаг 4 (Финал)</div>
            <br class="text_block_body">
            <?php echo "/src/i/img_lvl3".$data["dt"]["img"];?>(900px)<br>
               <img src ="<?php echo "/src/i/img_lvl3".$data["dt"]["img"];?>"  width="900px" />
            
            <?php echo "/src/i/img_lvl3".$data["dt"]["pred"];?><br>
            <img src ="<?php echo "/src/i/img_lvl3".$data["dt"]["pred"];?>" /></br>
               
            <?php echo "/src/i/img_lvl3".$data["dt"]["min"];?><br>
            <img src ="<?php echo "/src/i/img_lvl3".$data["dt"]["min"];?>" /></br>
               
            <?php echo "/src/i/img_lvl3".$data["dt"]["pc"];?><br>
            <img src ="<?php echo "/src/i/img_lvl3".$data["dt"]["pc"];?>" /></br>
            
         
        
            
         <?php
         }
         //var_dump("<pre>",$data,"</pre>");
         //step 3 end
         ?>
         </div>
      </div>


   </div>   
    
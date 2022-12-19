
   <div class="mine"> 
      <div class="top_head">Добавить обложку ШАГ 1</div>
      
      <div class="text_block">
         <div class="text_block_head">Основное</div>
         <div class="text_block_body">

            <h3>Добавить 1</h3>
            <?php
            //var_dump("<pre>",$data,"</pre>");
            ?>
            <form  enctype="multipart/form-data"  action="/admin/addoblstep/step4/" method="post">
               <h4>Категория</h4>               
               <input type="text" class="input_standart input_2inline" value="<?php echo $data["fat3"]["name_i"];?>" name="x1">
               <input type="text" class="input_standart input_2inline" value="<?php echo $data["fat3"]["myAddres"];?>" name="x2"><br>
               <h4>Родитель</h4>               
               <input type="text" class="input_standart input_2inline" value="<?php echo $data["fat2"]["name_i"];?>" name="x3">
               <input type="text" class="input_standart input_2inline" value="<?php echo $data["fat2"]["myAddres"];?>" name="x4"><br>
               <br><br><br>
               <h4>О файле</h4>  
               <h3>Адрес</h3>    
               <?php
               $ids_it = $data["counts"]+1;
               $url_name = $data["fat2"]["myAddres"]."-".$ids_it;

               ?>
               <input type="text" class="input_standart input_4inline" value="galereya-oblozhek"  name="x5">
               <input type="text" class="input_standart input_4inline" value="<?php echo $data["fat3"]["myAddres"];?>" name="x6">
               <input type="text" class="input_standart input_4inline" value="<?php echo $data["fat2"]["myAddres"];?>" name="x7">
               <input type="text" class="input_standart input_4inline" value="<?php echo $url_name;?>" name="x8"><br>
               <h3>Данные о файле - Таблица: categories_url</h3>  
               <?php
               $categories_u = [];

               $categories_u["fathers"] = $data["fat2"]["id"];
               $categories_u["myAddres"] = $url_name;
               $categories_u["img_i"] = $data["fat3"]["myAddres"]."\\".$data["fat2"]["myAddres"]."\\".$url_name.".png";
               $categories_u["img"] = $data["fat3"]["myAddres"]."\\".$data["fat2"]["myAddres"]."\\".$url_name.".png";
               $categories_u["name_i"] = $data["fat2"]["name_i"]."-".$ids_it;
               $full_url = "galereya-oblozhek"."/".$data["fat3"]["myAddres"]."/".$data["fat2"]["myAddres"]."/".$url_name."/";
               ?>
               <input type="text" class="input_standart input_3inline" value="Родитель [fathers]">
               <input type="text" class="input_standart input_3inline" value="<?php echo $categories_u["fathers"];?>"  name="x9">
               <input type="text" class="input_standart input_3inline" value="<?php echo $data["fat2"]["name_i"];?>"  name="x10"><br>
               <input type="text" class="input_standart input_3inline" value="Адрес страницы [myAddres]">
               <input type="text" class="input_standart input_3inline" value="<?php echo $categories_u["myAddres"];?>" name="x11">
               <input type="text" class="input_standart input_3inline" value="<?php echo $full_url;?>" name="x12"><br>
               <input type="text" class="input_standart input_3inline" value="Адрес картинки [img]">
               <input type="text" class="input_standart input_3inline" value="<?php echo $data["fat2"]["name_i"];?>" name="x13">
               <input type="text" class="input_standart input_3inline" value="<?php echo $categories_u["img"] ;?>" name="x14"><br>
               <input type="text" class="input_standart input_2inline" value="Название [name_i]">
               <input type="text" class="input_standart input_2inline" value="<?php echo $categories_u["name_i"] ;?>"  name="x15"><br>
               <input class="input_standart input_1inline button_classic bt_war" multiple  type="file" name="file">
               <h3>Данные о файле - Роутер</h3>  

               <input type="checkbox" class="checkbox_standart " id="cb3" checked="" name="autogen_url" value="1">
               <label class="label_checkbox_standart_text" for="cb3"  >Добавить в роутер</label>
               <h3>Данные о файле - Сайтмап</h3>  
               
               <input type="checkbox" class="checkbox_standart " id="cb4" checked=""  name="add_sitemap"  value="1">
               <label class="label_checkbox_standart_text" for="cb4">Добавить в сайтмап</label>
               <?php
/*
               fathers	
               myAddres
               type_1
               descript	
               keys_i
               name_i
               img
               text_main	
               pluses	
               minuses	
*/

               ?>
               <button class="button_classic bt_suc" name="go" value="yes">Сохранить</button>
            </form>
         </div>
      </div>


   </div>   
    
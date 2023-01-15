
   <div class="mine"> 
      <div class="top_head">ДОБАВИТЬ Группу (NEW)</div>
      
      <div class="text_block">
         <div class="text_block_head">Добавление</div>
         <div class="text_block_body">

            
            <form  enctype="multipart/form-data"  action="/admin/new_add_lvl2/" method="post">
               <h3>Id Родителя</h3>
               <select  name="father_s"  class="input_standart input_1inline" style="height:40px;">
               <?php
                  foreach ($data["father_list"] as $all_it){
               ?>
                     <option value="<?php echo $all_it["id"];?>"><?php echo $all_it["name_s"];?></option>
               <?php
                  }
               ?>
               </select>
               <h3>Название</h3>
               <input type="text" class="input_standart input_1inline" placeholder="Название" name="name_s">

               <h3>Текст</h3>
               <textarea class="input_standart input_1inline text_area_standart " placeholder="Описание - текст" name="text_s"></textarea>

               <h3>Стартовая оценка(плюсы и минусы)</h3>
               <input type="text" class="input_standart input_2inline" value="0" name="plus_s">
               <input type="text" class="input_standart input_2inline" value="0" name="minus_s">

               <h3>Адрес</h3>
               <input type="text" class="input_standart input_1inline" placeholder="anime" name="adr_s">

               <h3>SEO</h3>
               <input type="text" class="input_standart input_1inline" placeholder="Тайтл" name="title_s">
               <textarea class="input_standart input_1inline text_area_standart " placeholder="Дискрипшин" name="disc_s"></textarea>
               <textarea class="input_standart input_1inline text_area_standart " placeholder="Ключи" name="key_s"></textarea>

               <h3>Файлы</h3>
               <input class="input_standart input_1inline button_classic bt_war" multiple  type="file" name="file">

               <br><br>
               <button class="button_classic bt_start" type="reset">Очистить</button>
               <button class="button_classic bt_suc" name="go" value="yes">Сохранить</button>
            </form>
         </div>
      </div>


   </div>   
    
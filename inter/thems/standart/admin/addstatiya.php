
   <div class="mine"> 
      <div class="top_head">Добавить статью</div>
      
      <div class="text_block">
         <div class="text_block_head">Основное</div>
         <div class="text_block_body">

            <h3>Название</h3>
            <form  enctype="multipart/form-data"  action="/admin/addstatiya/" method="post">
               <input type="text" class="input_standart input_1inline" placeholder="Название" name="name">
               <h3>Статья</h3>
               <textarea class="input_standart input_1inline text_area_standart " placeholder="Краткое описание" name="opis"></textarea>
               <textarea class="input_standart input_1inline text_area_standart " placeholder="Суперкраткое описание"  name="opis_s"></textarea>
               <textarea class="input_standart input_1inline text_area_standart " placeholder="Полный текст" name="text"></textarea>
               <h3>Превью</h3>
               <input class="input_standart input_1inline button_classic bt_war" multiple  type="file" name="file">
               <h3>Адрес</h3>
               <input type="checkbox" class="checkbox_standart " id="cb3" checked="" name="autogen_url" value="1">
               <label class="label_checkbox_standart_text" for="cb3"  >Автогенерация</label>
               <input type="text" class="input_standart input_1inline" placeholder="Пример primer-statii"  name="url">
               <h3>Сайт мап</h3>
               <input type="checkbox" class="checkbox_standart " id="cb4" checked=""  name="add_sitemap"  value="1">
               <label class="label_checkbox_standart_text" for="cb4">Добавить в сайтмап</label>
               <br><br>
               <button class="button_classic bt_start" type="reset">Очистить</button>
               <button class="button_classic bt_suc" name="go" value="yes">Сохранить</button>
            </form>
         </div>
      </div>


   </div>   
    
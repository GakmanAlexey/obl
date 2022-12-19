
   <div class="mine"> 
      <div class="top_head">Добавить обложку ШАГ 1</div>
      
      <div class="text_block">
         <div class="text_block_head">Выбор категории</div>
         <div class="text_block_body">
         <?php 
         $i = 1;
         foreach($data["items"] as $it){
            if(fmod($i,5) == 0){
                echo "<br><br><br>";
                $i=1;
            }
            $i++;
         ?>
            <a class="button_classic bt_start" href="/admin/addoblstep/step2/?id=<?php echo $it["id"];?>"><?php echo $it["name"];?></a>
         <?php 
         }
         ?>
         
         </div>
      </div>


   </div>   
    
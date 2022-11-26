
    <?php



?>
    
    
    <h1 class="h1_index container"><?php  echo $data[0]; ?></h1>
    <p class="p_index container"><?php  echo $data[1]; ?></p>
    <?php
    foreach($data[2] as $dt){
        //var_dump($dt);
        //echo $data[3];
        $url = "/"."galereya-oblozhek"."/".$data[3]."/".$dt["myAddres"]."/";
        $name = $dt["name_i"];
        $url_img = $dt["img"];
    ?>
    <div class="section">
        <h3 class="section_title cover_box_title container"><?php  echo $name; ?></h3>
        <div class="section_cover_box">
            <div class="section_cover"> 
                <img class="section_cover_image" src="\src\img\oblog\<?php  echo $url_img; ?>" alt="Обложка для вк - <?php  echo $name; ?>">
            </div>
            <a class="section_cover_open " href="<?php  echo $url; ?>">
                <img class="section_cover_open_image" src="/src/img/eye.png" alt="">
                <p class="section_cover_open_p">открыть</p>
            </a>
        </div>
    </div>
    <br>
    <?php
    }
    ?>
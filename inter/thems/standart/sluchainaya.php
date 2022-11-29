
    <?php
    //var_dump($data);

    if($data[0]["pluses"] != 0){
        $ball = $data[0]["pluses"] / ($data[0]["pluses"] + $data[0]["minuses"])*10;
        }else{
            $ball = 0;
        }
    ?>
    
   
    

    <div class="section">
        <h3 class="section_title cover_box_title container"><?php  echo $data[0]["name_i"]; ?></h3>
        <div class="section_cover_box">
            <div class="section_cover"> 
                <img class="section_cover_image" src="\src\img\lower\<?php  echo $data[0]["img"]; ?>" alt="Обложка для вк - <?php  echo $data[0]["name_i"]; ?>">
            </div>
        </div>
    </div>
    <div class="container panel">
        <div class="cover_section_item_statistics ">
            <div class="cover_section_item_statistics_top">
                <a href=""><img class="cover_section_item_statistics_top_like" src="/src/img/like.png" alt=""></a>
                <div class="cover_section_item_statistics_top_number"><?php  echo round($ball,1); ?></div>
                <a href=""> <img class="cover_section_item_statistics_top_dislike" src="/src/img/dislike.png" alt=""> </a>
            </div>
            <div class="cover_section_item_statistics_line">
                    <div class="progress-bar" role="progressbar" style="width: <?php  echo $ball*10; ?>%"
                        aria-valuenow="<?php  echo $ball*10; ?>" aria-valuemin="0" aria-valuemax="100">
                    </div>
                <div class="cover_section_item_statistics_buttom">
                    <div class="cover_section_item_statistics_buttom_like"><?php  echo $data[0]["pluses"]; ?></div>
                    <div class="cover_section_item_statistics_buttom_dislike"><?php  echo $data[0]["minuses"]; ?></div>
                </div>
            </div>
        </div>
        <div class="share"></div>
            <a href="\src\img\oblog\<?php  echo $data[0]["img"]; ?>" class="download">
                <div class="download_button" >Скачать <img class="download_button_image" src="/src/img/download.png" alt=""></div>
            </a>
        </div>
    </div>

    <p class="kard_text container">
        <?php  echo $data[0]["text_main"]; ?>
    </p>
    <div class="mokap container">
        <h3 class="mokap_title">Как будет выглядить</h3>
<div class="mokap_container">
    <div class="mokap_desktop"><img class="mokap_desktop_image" src="/src/img/desk.png" alt=""> <img class="mokap_desktop_obl_image" src="\src\img\prew\<?php  echo $data[0]["img"]; ?>" alt=""></div>
    <br>
    <div class="mokap_mobile"><img class="mokap_mobile_image"src="/src/img/mobile.png" alt=""> <img class="mokap_mobile_obl_image" src="\src\img\mob\<?php  echo $data[0]["img"]; ?>" alt=""></div>
    
</div>
    </div>

    <?php
    
    ?>
<script type="text/javascript">
function like() {
    $.ajax({
        url: '/ajax/vote/',         
        method: 'post',             
        dataType: 'html',         
        data: {text: 'like',urli:'<?php  echo $url_img = $data[0]['myAddres'] ?>'},    
        success: function(data){   
        }
    });
    window.location.reload();

}
function dislike() {
    $.ajax({
        url: '/ajax/vote/',         
        method: 'post',             
        dataType: 'html',         
        data: {text: 'dislike',urli:'<?php  echo $url_img = $data[0]['myAddres'] ?>'},     
        success: function(data){   
        }
    });
    window.location.reload();
}

</script>
    <?php

//var_dump($data);

$url_img = $data[0]["img"];
$name = $data[0]["name_i"];
$text = $data[0]["text_main"];
$img = "";
$plus = $data[0]["pluses"];
$minus = $data[0]["minuses"];
if($plus != 0){
$ball = $data[0]["pluses"] / ($data[0]["pluses"] + $data[0]["minuses"])*10;
}else{
    $ball = 0;
}
?>
    
    <ul class="breadcrumb container"  itemscope itemtype="https://schema.org/BreadcrumbList">
        <?php 
            $x = 0;
            while($x <  $data["bread"]["long"]){
        ?>
        <li  itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
            <a itemprop="item" href="<?php echo $data["bread"]["url"][$x]; ?>"><span itemprop="name"><?php echo $data["bread"]["name"][$x]; ?></span></a>
            <meta itemprop="position" content="<?php echo $x+1;?>" />
        </li>
        <?php
            $x++;
            };
            $lefts = $data["bread"]["url"][2].$data["left"]."/";
            $rights = $data["bread"]["url"][2].$data["right"]."/";
        ?>

      </ul>
    

    <div class="section" itemscope itemtype="http://schema.org/ImageObject">
        <h3 itemprop="name" class="section_title cover_box_title container"><?php  echo $name; ?></h3>
        <div class="section_cover_box">
            <div class="section_cover">
                <img class="section_cover_image" src="\src\img\lower\<?php  echo $url_img; ?>" alt="Обложка для вк - <?php  echo $name; ?>"  itemprop="contentUrl" />
                <div class="section_cover_aron_box container">
                    <a href="<?php echo $lefts;?>"><img class="aron_left" src="/src/img/leftaron.png" alt=""> </a>
                    <a href="<?php echo $rights;?>"><img class="aron_right" src="/src/img/rightaron.png" alt="">  </a>
                </div>
            </div>
        </div>
        <div class="container">
            <span itemprop="description" >Обложка для вк "<?php  echo $name; ?>"</span>
        </div>
    </div>
    <div class="container panel">
        <div class="cover_section_item_statistics ">
            <div class="cover_section_item_statistics_top">
                <img class="cover_section_item_statistics_top_like" src="/src/img/like.png" alt="" onclick="like();">
                <div class="cover_section_item_statistics_top_number"><?php  echo round($ball,1); ?></div>
                <img class="cover_section_item_statistics_top_dislike" src="/src/img/dislike.png" alt="" onclick="dislike();"> 
            </div>
            <div class="cover_section_item_statistics_line">
                    <div class="progress-bar" role="progressbar" style="width: <?php  echo $ball*10; ?>%"
                        aria-valuenow="<?php  echo $ball*10; ?>" aria-valuemin="0" aria-valuemax="100">
                    </div>
                <div class="cover_section_item_statistics_buttom">
                    <div class="cover_section_item_statistics_buttom_like"><?php  echo $plus; ?></div>
                    <div class="cover_section_item_statistics_buttom_dislike"><?php  echo $minus; ?></div>
                </div>
            </div>
        </div>
        <div class="share"></div>
            <a href="\src\img\oblog\<?php  echo $url_img; ?>" class="download">
                <div class="download_button" onclick="ym(91306735,'reachGoal','TE'); return true;">Скачать <img class="download_button_image" src="/src/img/download.png" alt=""></div>
            </a>
        </div>
    </div>

    <p class="kard_text container">
        <?php  echo $text; ?>
    </p>
    <div class="mokap container">
        <h3 class="mokap_title">Как будет выглядить</h3>
<div class="mokap_container">
    <div class="mokap_desktop"><img class="mokap_desktop_image" src="/src/img/desk.png" alt=""> <img class="mokap_desktop_obl_image" src="\src\img\prew\<?php  echo $url_img; ?>" alt=""></div>
    <br>
    <div class="mokap_mobile"><img class="mokap_mobile_image"src="/src/img/mobile.png" alt=""> <img class="mokap_mobile_obl_image" src="\src\img\mob\<?php  echo $url_img; ?>" alt=""></div>
    
</div>
    </div>

    <?php
    
    ?>
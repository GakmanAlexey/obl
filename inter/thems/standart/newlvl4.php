<script type="text/javascript">
function like() {
    $.ajax({
        url: '/ajax/vote2/',         
        method: 'post',             
        dataType: 'html',         
        data: {text: 'like',urli:'<?php  echo $url_img = $data["fullDate"]["adr_s"] ?>'},    
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
        data: {text: 'dislike',urli:'<?php  echo $url_img = $data["fullDate"]["adr_s"]  ?>'},     
        success: function(data){   
        }
    });
    window.location.reload();
}

</script>
    <?php
$url = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$url1 = explode("/", $url);

$plus = $data["fullDate"]["plus_s"];
$minus = $data["fullDate"]["minus_s"];
if($plus != 0){
$ball = $data["fullDate"]["plus_s"] / ($data["fullDate"]["plus_s"] + $data["fullDate"]["minus_s"])*10;
}else{
    $ball = 0;
}
//var_dump($data);


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
        ?>

      </ul>


    <div class="section" itemscope itemtype="http://schema.org/ImageObject">
        <h3 itemprop="name" class="section_title cover_box_title container"><?php echo $data["fullDate"]["name_s"];?></h3>
        <div class="section_cover_box">
            <div class="section_cover">
                <img class="section_cover_image" src="<?php echo "/src/i/img_lvl3".$data["fullDate"]["img_s_pred"];?>" alt=""  itemprop="contentUrl" />
                <div class="section_cover_aron_box container">
                    <a href="<?php echo "/".$url1[1]."/".$url1[2]."/".$url1[3]."/".$data["fullDate"]["lr"][0]."/";?>"><img class="aron_left" src="/src/img/leftaron.png" alt=""> </a>
                    <a href="<?php echo "/".$url1[1]."/".$url1[2]."/".$url1[3]."/".$data["fullDate"]["lr"][1]."/";?>"><img class="aron_right" src="/src/img/rightaron.png" alt="">  </a>
                </div>
            </div>
        </div>
        <div class="container">
            <span itemprop="description" ><?php echo $data["fullDate"]["title_s"];?></span>
        </div>
    </div>
    <div class="container panel">
        <div class="cover_section_item_statistics ">
            <div class="cover_section_item_statistics_top">
                <img class="cover_section_item_statistics_top_like" src="/src/img/like.png" alt="" onclick="like();">
                <div class="cover_section_item_statistics_top_number"><?php  echo round($ball,1); ?> / 10</div>
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
            <a href="<?php echo "/src/i/img_lvl3".$data["fullDate"]["img_s"];?>" class="download">
                <div class="download_button1" onclick="ym(91306735,'reachGoal','TE'); return true;">Скачать в высоком качестве<img class="download_button_image" src="/src/img/download.png" alt=""></div>
            </a>
        </div>
    </div>

    <p class="kard_text container">
    <?php echo $data["fullDate"]["text_s"];?>
        <?php
        
        //echo "/src/i/img_lvl3".$data["fullDate"][0]["img_s_pred"];
        
        //var_dump($url1);
        // var_dump("<pre>",$data["fullDate"],"</pre>");

?>
    </p>
    <div class="mokap container">
        <h3 class="mokap_title">Как будет выглядить</h3>
<div class="mokap_container">
    <div class="mokap_desktop"><img class="mokap_desktop_image" src="/src/img/desk1.png" alt=""> <img class="mokap_desktop_obl_image1" src="<?php echo "/src/i/img_lvl3".$data["fullDate"]["img_s_pc"];?>" alt=""></div>
    <br>
    <div class="mokap_mobile"><img class="mokap_mobile_image"src="/src/img/mobile1.png" alt=""> <img class="mokap_mobile_obl_image1" src="<?php echo "/src/i/img_lvl3".$data["fullDate"]["img_s_min"];?>" alt=""></div>
    
</div>
    </div>

    <?php
    
    ?>
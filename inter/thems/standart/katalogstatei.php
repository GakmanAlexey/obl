<div class="container">
    <?php 
    $x = 0;
    if($data['big'] == true){
        $x = 1;
    ?>
    <a href="/katalog-statey/<?php echo $data["stat_list"][0]['url_s'];?>/">
    <div class="last_news">
        <div class="last_news_image_parent">
            <img class="last_news_image" src="/src/img/stat/<?php echo $data["stat_list"][0]['img_s'];?>" alt="">
        </div>
        <div class="last_news_ingo_box">
            <p class="last_news_ingo_box_title">
            <?php echo $data["stat_list"][0]['s_name'];?>
            </p>
            <p class="last_news_ingo_box_text">
            <?php echo $data["stat_list"][0]['s_kr_opis'];?></p>
            <p class="last_news_ingo_box_data">
            <?php echo $data["stat_list"][0]['s_date'];?>
            </p>
        </div>
    </div>
    </a>
    
    <?php
    };
    ?>
    <div class="other_news_box">
        <?php
    while(!empty($data["stat_list"][$x]['s_name'])){ 
    ?>
    <a href="/katalog-statey/<?php echo $data["stat_list"][$x]['url_s'];?>/">
        <div class="news_item">
            <img class="news_item_image" src="/src/img/stat/<?php echo $data["stat_list"][$x]['img_s'];?>" alt="">
            <p class="news_item_title">
            <?php echo $data["stat_list"][$x]['s_name'];?>
            </p>
            <p class="news_item_text">
            <?php echo $data["stat_list"][$x]['s_kr_opis'];?>
            </p>
            <p class="news_item_data">
            <?php echo $data["stat_list"][$x]['s_date'];?>
            </p>
        </div>
    </a>
    <?php 
$x++;    
} 
    ?>
    </div>
    <div class="navigation">

<?php
$i = 0;
while($i < $data['page_limit']){
    $i++;
?>
        <a href="<?php echo '/katalog-statey/?page='.$i;?>">
            <div class="navigation_number">
            <?php echo $i;?>
            </div>
        </a>
<?php
}
?>



    </div>
    
</div>
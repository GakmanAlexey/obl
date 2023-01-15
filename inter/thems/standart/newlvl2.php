    
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
    <h1 class="h1_index container"><?php echo $data["myDate"]["name_s"];?></h1>
    <p class="p_index container"><?php echo $data["myDate"]["text_s"];?></p>
<div class="new_theme container">

    <?php
    foreach ($data["all_it"] as $all_it){
        ?>
<!--
    <a href="/galereya/<?php echo $all_it["adr_s"];?>/" class="catalog_new_item">
        <img class="catalog_new_item_image" src="/src/i/img_lvl1/<?php echo $all_it["img_s"];?>" alt="">
        <div class="catalog_new_item_backgraund">
            <p class="catalog_new_item_title"><?php echo $all_it["name_s"];?></p>
        </div>
    </a>
    --->


    <div class="new_theme_item">
        <h3 class="new_theme_title"><?php echo $all_it["name_s"];?></h3>
        <img class="new_theme_image" src="/src/i/img_lvl2/<?php echo $all_it["img_s"];?>" alt="">
        <div class="new_theme_info">
            <div class="new_theme_info_number"><?php echo $all_it["count"];?> Обложек</div>
            <div class="new_theme_info_statistic">
                <div class="new_theme_info_statistic_parent">
                    <img class="new_theme_info_statistic_grade" src="/src/img/like.png" alt="">
                    <p class="new_theme_info_statistic_number"><?php echo $all_it["plus_s"];?></p>
                </div>
                <div class="new_theme_info_statistic_parent">
                    <img class="new_theme_info_statistic_grade" src="/src/img/dislike.png" alt="">
                    <p class="new_theme_info_statistic_number"><?php echo $all_it["minus_s"];?></p>
                </div>
            </div>
        </div>
        <a href="/galereya/<?php echo $data["fat_url"]."/".$all_it["adr_s"];?>/" class="new_theme_batton">
            <div class="new_theme_batton_text">открыть</div>
        </a>
    </div>

        <?php
    }
    ?>

</div>
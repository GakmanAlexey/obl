
    <?php
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

    <h1 class="h1_index container"><?php echo $data["myDate"]["name_s"];?></h1>
    <p class="p_index container"><?php echo $data["myDate"]["text_s"];?></p>
    

    <div class="section">
    <?php
    $url = ((!empty($_SERVER['HTTPS'])) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    $url = explode('?', $url);
    $url = $url[0];

    $x = 0;
    while(isset($data["fullDate"][$x]["img_s"])){
    ?>
        <h3 class="section_title cover_box_title container"><?php echo $data["fullDate"][$x]["name_s"];?></h3>
        <div class="section_cover_box">
            <div class="section_cover"> 
                <img class="section_cover_image" src="<?php echo "/src/i/img_lvl3".$data["fullDate"][$x]["img_s_pred"];?>" alt="">
            </div>
            <a class="section_cover_open1 " href="<?php echo $url.$data["fullDate"][$x]["adr_s"]."/";?>">
                <img class="section_cover_open_image" src="/src/img/eye.png" alt="">
                <p class="section_cover_open_p">открыть</p>
            </a>
        </div>
        <br>
        <?php
    $x++;
    }
    ?>
    </div>

    <br>
    
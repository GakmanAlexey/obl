
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
    <h1 class="h1_index container"><?php  echo $data[0]; ?></h1>
    <p class="p_index container"></p>
    <?php  echo $data[1]; ?>
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
                <img class="section_cover_image" src="\src\img\lower\<?php  echo $url_img; ?>" alt="Обложка для вк - <?php  echo $name; ?>">
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

<?php
/*
<p class="p_index container">В данном разделе собрано более 500 аниме обложек вк. Они представляют собой совершенно разные тайтлы, но главное их объединяет подходящий размер и качество 1920 на 640 пикселей и формат изображения пнг.

<h3 class="h3_index container">Популярные тайтлы</h3>
*/
?>

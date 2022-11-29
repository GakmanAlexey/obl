<?php
$m =new \Mod\UserNR\User;
$id_user = $m->cheack();
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <?php
     if (isset($data['404'])){
        ?>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="/src/css/style.css" rel="stylesheet" type="text/css">
        <title>Ошибка 404 – страница не найдена</title>
        <meta name="title" content="Ошибка 404 – страница не найдена" />
        <?php
     }else{
        
        //var_dump($data["seo"]);
     ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/src/css/style.css" rel="stylesheet" type="text/css">

    <meta name="title" content="<?php echo $data["seo"]["title"] ;?>" />
    <link rel="image_src" href="/src/img/<?php echo $data["seo"]["img"] ;?>" />
    
    <title><?php echo $data["seo"]["title"] ;?></title>
    <meta name="description" content="<?php echo $data["seo"]["disc"] ;?>">
    <link rel="icon" href="/favicon.ico" type="image/x-icon">

    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <!-- Yandex.Metrika counter -->
    <script type="text/javascript" >
   (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
   m[i].l=1*new Date();
   for (var j = 0; j < document.scripts.length; j++) {if (document.scripts[j].src === r) { return; }}
   k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
   (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

   ym(91306735, "init", {
        clickmap:true,
        trackLinks:true,
        accurateTrackBounce:true,
        webvisor:true,
        ecommerce:"dataLayer"
   });
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/91306735" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->
    <?php 
     }
     ?>
</head>
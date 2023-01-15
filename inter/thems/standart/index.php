<?php
$el1 = $data[0];
$el2 = $data[1];
$el3 = $data[2];



?>

<div class="banner_index"><br></div>
    <h1 class="h1_index container">
    Обложки для профиля вк
    </h1>
    <p class="p_index container">Наш проект занимается разработкой тематических обложек для профиля вк, с первых дней обновления. Мы первые и самое крупное сообщество художников. Наша цель сделать вашу страничку максимально привлекательной. А наши обложки должны сочетаться с вашим профилем и подчеркивать вашу уникальность и характер..</p>
    <h3  class="h3_index container">Характеристики наших работ</h3>
    <p class="p_index container">Наши фоны для страниц вк, соответствую всем требованиям социальной сети, включая форматы: png и размер 1920px на 640px. Они не содержат рекламу и прочих атрибутов данной сферы в том числе нет вотермарка. Так же стандарты наших творений всегда на высоте..</p>
    <h3  class="h3_index container">Тематики.</h3>
    <p class="p_index container">Основные тематики работ это Аниме, Игры, Фильмы и прочие направления искусств которые характеризуют вашу уникальность и изящность!  Вы можете ознакомиться с нашими работами в разделе «галерея обложек» и скачать понравившуюся вам..</p>
    <p class="p_index container">Наш девиз – Все лучше нашим пользователям.</p>



    <div class="contant_cover container">
        <h3 class="contant_cover_title">Новые обложки</h3>
        <div class="contant_cover_box">
            <div class="contant_cover_box_line">
                <div class="contant_cover_box_line_item"><img class="contant_cover_box_line_item_image" src="/src/img/3.png" alt=""></div>
                <div class="contant_cover_box_line_item margin_line_item"><img class="contant_cover_box_line_item_image" src="/src/img/3.png" alt=""></div>
                <div class="contant_cover_box_line_item"><img class="contant_cover_box_line_item_image" src="/src/img/3.png" alt=""></div>
            </div>

            <div class="contant_cover_box_big"><img class="contant_cover_box_big_image" src="/src/img/1.png" alt="">
                <a class="contant_cover_box_big_open " href="<?php echo $data[4];?>">
                    <img class="contant_cover_box_big_open_image" src="/src/img/eye.png" alt="">
                    <p class="contant_cover_box_big_p">ОТКРЫТЬ НОВЫЕ <br> ОБЛОЖКИ</p>
                </a>
            </div>            

            <div class="contant_cover_box_line">
                <div class="contant_cover_box_line_item"><img class="contant_cover_box_line_item_image" src="/src/img/3.png" alt=""></div>
                <div class="contant_cover_box_line_item margin_line_item"><img class="contant_cover_box_line_item_image" src="/src/img/3.png" alt=""></div>
                <div class="contant_cover_box_line_item"><img class="contant_cover_box_line_item_image" src="/src/img/3.png" alt=""></div>
            </div>
        </div>
    </div>

    <div class="contant_cover_vert container">
        <h3 class="contant_cover_title">Новые обложки</h3>
        <div class="contant_cover_vert_box">
            <div class="contant_cover_vert_box_side">
                <div class="contant_cover_vert_box_side_item_big"><img class="contant_cover_vert_box_side_item_image" src="/src/img/kvad.png" alt=""></div>
                <div class="contant_cover_vert_box_side_item_smal"><img class="contant_cover_vert_box_side_item_image" src="/src/img/pram.png" alt=""></div>
            </div>
                <div class="contant_cover_vert_box_center">
                    <img class="contant_cover_vert_box_center_image" src="/src/img/center.png" alt="">
                    
                    <a class="contant_cover_vert_box_center_open " href="<?php echo $data[4];?>">
                        <img class="contant_cover_vert_box_center_open_image" src="/src/img/eye.png" alt="">
                        <p class="contant_cover_vert_box_center_p">ОТКРЫТЬ <br> ГАЛЕРЕЮ</p>
                    </a>
                </div>
            <div class="contant_cover_vert_box_side">
                <div class="contant_cover_vert_box_side_item_smal"><img class="contant_cover_vert_box_side_item_image" src="/src/img/pram.png" alt=""></div>
                <div class="contant_cover_vert_box_side_item_big"><img class="contant_cover_vert_box_side_item_image" src="/src/img/kvad.png" alt=""></div>
                
            </div>


        </div>
    </div>

    <div class="container">
        <div class="form_title">
            <h3>Заказать обложку</h3>
        </div>
        <form class="form_box" name="test" method="post" action="/zakaz/">
            <div class="form_box_left">
                <select class="form_box_select" name="type_obl">
                    <option name="anime">Аниме</option>
                    <option name="igry">Игры</option> 
                    <option name="filmy">Фильмы</option> 
                    <option name="priroda">Природа</option> 
                    <option name="jivotnie">Животные</option> 
                    <option name="goroda">Города</option> 
                    <option name="geometriya">Геометрия</option> 
                    <option name="lampy">Лампы</option> 
                    <option name="moda">Мода</option> 
                    <option name="patriotizm">Патриотизм</option> 
                    <option name="avto">Авто\мото</option> 
                    <option name="iskustvo">Искуство</option> 
                    <option name="it">ИТ</option> 
                    <option name="paznoe">Разное</option> 
                </select>

                <p>Тема:<br>
                    <input class="form_box_theme" type="text" size="40" placeholder="Атака титанов" name="tema_obl">
                </p>

                <p>Описание:<br>
                    <textarea class="form_box_description" name="comment" cols="40" rows="3" name="desc_obl"></textarea>
                </p>
            </div>

            <div class="form_box_right">
                <p class="form_box_right_title">Уведомить о готовности</p>

                <p>Email:<br> 
                    <input class="form_box_email" type="email" name="email">
                </p>

                <input class="form_box_checkbox" type="checkbox" id="politics" onclick="check();" value="" autocomplete="off"/>
                Нажимая на кнопку "Отправить заказ", я даю 
                <a href="/litsenziya/">
                    согласие на обработку персональных данных.
                </a>
                <br><br>
                <button class="form_box_button" >Заказать</button>
            </div>
        </form>
    </div>
    
    <div class="section">
        <h3 class="section_title container">Случайная обложка</h3>
        <p class="section_trek container"><?php echo $el3["name_i"];?></p>
        <div class="section_cover_box">
            <div class="section_cover"> 
                <img class="section_cover_image" src="\src\img\lower\<?php echo $el3["img"];?>" alt="">
            </div>
            <a class="section_cover_open " href="<?php echo $data[5];?>">
                <img class="section_cover_open_image" src="/src/img/eye.png" alt="">
                <p class="section_cover_open_p">открыть</p>
            </a>
        </div>
    </div>
    <br>
    <div class="container">
        <div class="comment_title"><h3>Отзывы</h3></div>
        <div class="comment">
            <div class="comment_box">
                <div class="comment_box_avtor">
                    <div class="comment_box_avatar"></div>
                    <div class="comment_box_name">Имя Фамилия</div>
                </div>
                <div class="comment_box_text"><p>Отзывов еще нет :(</p></div>
            </div>

            <div class="comment_box">
                <div class="comment_box_avtor">
                    <div class="comment_box_avatar"></div>
                    <div class="comment_box_name">Имя Фамилия</div>
                </div>
                <div class="comment_box_text"><p>Отзывов еще нет :(</p></div>
            </div>

            <div class="comment_box">
                <div class="comment_box_avtor">
                    <div class="comment_box_avatar"></div>
                    <div class="comment_box_name">Имя Фамилия</div>
                </div>
                <div class="comment_box_text"><p>Отзывов еще нет :(</p></div>
            </div>
        </div>
    </div>
        <a class="comment_link" href="#">Все отзывы</a>
<br> <br> <br>

<div class=" container">
<div class="social_title"><h3>Мы в Вконтакте</h3></div>
<div class="social">
    <div class="social_image_box"><img class="social_image_box_img" src="/src/img/vk1.png" alt=""></div>
    <div class="social_center">
        <p class="social_text">
            Задача организации, в особенности же постоянное информационно-пропагандистское обеспечение нашей деятельности 
            позволяет выполнять важные задания по разработке модели развития. Таким образом постоянное информационно-пропагандистское обеспечение нашей 
            деятельности в значительной степени обуславливает создание форм развития. Товарищи! рамки и место обучения кадров влечет за собой процесс внедрения и 
            модернизации модели развития.
        </p>
        <a class="social_batton_a" href="">
            <div class="social_batton"> 
            перейти
            </div>
        </a>
    </div>
    <div class="social_image_box"><img class="social_image_box_img display_none" src="/src/img/vk2.png" alt=""></div>
</div>

</div>
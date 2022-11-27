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

 

    <div class="section">
        <h3 class="section_title container">Новые обложки</h3>
        <p class="section_trek container"><?php echo $el2["name_i"];?></p>
        <div class="section_cover_box">
            <div class="section_cover"> 
                <img class="section_cover_image" src="\src\img\lower\<?php echo $el2["img"];?>" alt="">
            </div>
            <a class="section_cover_open " href="<?php echo $data[4];?>">
                <img class="section_cover_open_image" src="/src/img/eye.png" alt="">
                <p class="section_cover_open_p">открыть</p>
            </a>
        </div>
    </div>
<br>
    <div class="section">
        <h3 class="section_title container">Популярные обложки</h3>
        <p class="section_trek container"><?php echo $el1["name_i"];?></p>
        <div class="section_cover_box">
            <div class="section_cover"> 
                <img class="section_cover_image" src="\src\img\lower\<?php echo $el1["img"];?>" alt="">
            </div>
            <a class="section_cover_open " href="<?php echo $data[3];?>">
                <img class="section_cover_open_image" src="/src/img/eye.png" alt="">
                <p class="section_cover_open_p">открыть</p>
            </a>
        </div>
    </div>
    <br>
    <div class="container">
        <div class="form_title">
            <h3>Заказать обложку</h3>
        </div>
        <form class="form_box" name="test" method="post" action="input1.php">
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
                    <div class="comment_box_name">Super Penis</div>
                </div>
                <div class="comment_box_text"><p>Однозначно, ключевые особенности структуры проекта могут быть представлены в исключительно положительном свете.</p></div>
            </div>

            <div class="comment_box">
                <div class="comment_box_avtor">
                    <div class="comment_box_avatar"></div>
                    <div class="comment_box_name">Super Penis</div>
                </div>
                <div class="comment_box_text"><p>Однозначно, ключевые особенности структуры проекта могут быть представлены в исключительно положительном свете.</p></div>
            </div>

            <div class="comment_box">
                <div class="comment_box_avtor">
                    <div class="comment_box_avatar"></div>
                    <div class="comment_box_name">Super Penis</div>
                </div>
                <div class="comment_box_text"><p>Однозначно, ключевые особенности структуры проекта могут быть представлены в исключительно положительном свете.</p></div>
            </div>
        </div>
    </div>
        <a class="comment_link" href="#">Все отзывы</a>
<br> <br> <br>
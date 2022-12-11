<?php
        if(($data["error"] == []) and isset($data["result"]["new"]) and ($data["result"]["new"] == "no")){
            echo '<div class="container height_reg"><br><br><br>Регистрация прошла успешно!<a href="/user/auth/"  class="login_form_personal_link"> Авторизуйтесь </a></div>';
        }else{
?>
<div class="container height_reg">
    <div class="login">
        <div class="login_panel">
            <a class="login_panel_register" href="/user/reg/">Регистрация</a>
            <a class="login_panel_login" href="/user/auth/">Вход</a>
        </div>
        <form class="login_form" action="/user/reg/" method="post">
            <label class="login_form_lable" for="login">Логин<?php  if(isset($data["error"]["login"])){echo "<span class='error'> ".$data["error"]["login"]."</span>";} ?></label><br>
            <input class="login_form_input" type="text" id="login" placeholder="Введите логин" name="login" required>
            <br><br>
            <label class="login_form_lable"  for="login">Email<?php  if(isset($data["error"]["email"])){echo "<span class='error'> ".$data["error"]["email"]."</span>";} ?></label><br>
            <input class="login_form_input" type="email" id="Email" placeholder="Введите почту" name="mail" required>
            <br><br>
            <label class="login_form_lable"  for="password">Пароль<?php  if(isset($data["error"]["pass"])){echo "<span class='error'> ".$data["error"]["pass"]."</span>";} ?></label><br>
            <input class="login_form_input" type="password" id="password" placeholder="Введите пароль" name="password" required>
            <br>          
            <label class="login_form_lable"  for="password"><?php  if(isset($data["error"]["pass2"])){echo "<span class='error'> ".$data["error"]["pass2"]."</span>";} ?></label><br>
            <input class="login_form_input"  type="password" id="password" placeholder="Повторите пароль" name="password2" required>
            
            <br><br>
            <p class="fix_1">
                <input class="login_form_input_checbox" type="checkbox" id="politics"  value="" autocomplete="off" required/>
                Нажимая на кнопку "Отправить заказ", я даю 
                <a class="login_form_personal_link" href="ссылка на страницу согласия">
                    согласие на обработку персональных данных.
                </a>
            </p>

            <p  class="fix_1">
            <button class="login_form_button" name="go" value="pres">Вперёд</button>
            </p>
        </form>
        <p>Войти через</p>
        <div class="login_social">
            <div class="login_social_item"><a href="#"><img src="/src/img/icosoc/vk.png" alt=""></a></div>
            <div class="login_social_item"><a href="#"><img src="/src/img/icosoc/ya.png" alt=""></a></div>
            <div class="login_social_item"><a href="#"><img src="/src/img/icosoc/go.png" alt=""></a></div>
            <div class="login_social_item"><a href="#"><img src="/src/img/icosoc/ot.png" alt=""></a></div>
        </div>
        
    </div>
</div>
<?php
        }
        ?>
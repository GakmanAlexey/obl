<div class="container height_reg">
    <div class="login">
        <div class="login_panel">
            <a class="login_panel_register" href="/user/auth/">Вход</a>
            <a class="login_panel_login" href="/user/reg/">Регистрация</a>
        </div>
        <form class="login_form" action="/user/auth/" method="post">
            <label class="login_form_lable" for="login">Логин</label><br>
            <input class="login_form_input" type="text" id="login" placeholder="Введите логин" name="login"  required>
            <br><br>
    
            <label class="login_form_lable"  for="password">Пароль</label><br>
            <input class="login_form_input" type="password" id="password" placeholder="Введите пароль"  name="password"  required>
            <br><br>
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
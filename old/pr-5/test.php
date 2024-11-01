<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="utf-8">
    <title>Регистрация студентов</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="fonts/font-awesome-4.7.0/css/font-awesome.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="valid.js"></script>
</head>

<body>
    <header>Сайт поддержки дистанционного обучения</header>
    <main>
        <h2>Введите свои данные</h2>
        <fieldset>
            <form action="create_user.php" method="POST" enctype="multipart/form-data" id="form" oninput="valid_form()">
                <label for="user_name">Имя:</label><br>
                <input type="text" name="first_name" minlength="3" maxlength="20" required
                    pattern="(^[A-Za-z]+$)|(^[А-ЯЁа-яё]+$)" id='user_name' placeholder="Обязательное поле">
                <span class="fa fa-check" id='valid_user_name'></span>
                <span class="fa fa-times" id='invalid_user_name'></span>
                <p class="hint">Введите имя латинскими или русскими буквами, минимум
                    3 буквы, максимум 20 букв</p>
                <label for="user_last_name">Фамилия:</label><br>
                <input type="text" name="last_name" required pattern="(^[A-Za-z]+$)|(^[А-ЯЁа-яё]+$)" minlength="3"
                    maxlength="20" placeholder="Обязательное поле" id="user_last_name">
                <span class="fa fa-check" id='valid_user_last_name'></span>
                <span class="fa fa-times" id='invalid_user_last_name'></span>
                <p class="hint">Введите имя латинскими или русскими буквами, минимум
                    3 буквы, максимум 20 букв</p>
                <label for="user_pic">Изображение профиля:</label><br>
                <input type="file" name="user_pic" size="50" required id="user_pic" onchange="filecontrol()">
                <span class="fa fa-check" id='valid_user_pic'></span>
                <span class="fa fa-times" id='invalid_user_pic'></span>
                <p class="hint">Выберите изображение в формате jpeg или bmp
                    размером не более 2 Мб</p>
                <label for="email">E-mail:</label><br>
                <input type="email" name="email" id="email" required placeholder="Обязательное поле">
                <span class="fa fa-check" id='valid_email'></span>
                <span class="fa fa-times" id='invalid_email'></span>
                <p class="hint"></p>
                <label for="vk_url">Адресс Вконтакте:</label><br>
                <input type="text" name="vk_url" required pattern="(^(vk.com).{3,}$)" minlength="3" maxlength="20"
                    placeholder="Обязательное поле" id="vk_url">
                <span class="fa fa-check" id='valid_vk_url'></span>
                <span class="fa fa-times" id='invalid_vk_url'></span>
                <p class="hint"></p>
                <label for="username">Имя пользователя:</label><br>
                <input type="text" name="username" minlength="3" maxlength="20" required id="username" pattern="^[\w]+$"
                    onblur="uniq_username(this.value)" placeholder="Обязательное поле">
                <span class="fa fa-check" id='valid_username'></span>
                <span class="fa fa-times" id='invalid_username'></span>
                <p class="hint">От 3 до 20 символов: цифр, аглийских букв и знака _</p>
                <label for="password">Пароль:</label><br>
                <input type="password" name="password" minlength="6" maxlength="20" required id="password"
                    oninput="checkpass(document.getElementById('pass2').value)"
                    pattern="^(?=.*[A-Z])(?=.*[\d])(?=.*[a-z])(?=.*[\W])[a-zA-Z\d\W]{6,20}$"
                    placeholder="Обязательное поле">
                <span class="fa fa-check" id='valid_password'></span>
                <span class="fa fa-times" id='invalid_password'></span>
                <p class="hint">От 6 до 20 символов, обязательно одна заглавная и строчная английская буква,
                    одна цифра и один спец. символ. Русские буквы не допускаются</p>
                <label for='pass2'>Повторите пароль:</label><br>

                <input type="password" id="pass2" required placeholder="Обязательное поле"
                    oninput="checkpass(this.value)">
                <span class="fa fa-check" id='valid_pass2'></span>
                <span class="fa fa-times" id='invalid_pass2'></span>
                <p class="hint"></p>
                <input type="submit" value="Зарегистрироваться" disabled id="submit" class="button">
                <input type="reset" value="Очитстить" class="button">
            </form>
        </fieldset>
    </main>
    <br><br>
    <footer>Ильюшенков Леонид Владимирович</footer>
</body>

</html
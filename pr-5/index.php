<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Регистрация пользователя</title>
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
</head>

<body>
    <h1 style="text-align: center;">Автосалон</h1>
    <h2>Введите свои данные</h2>
    <form action="show_user.php" method="POST" enctype="multipart/form-data" oninput="valid_form()">
        <fieldset>
            <table id="form">
                <tr>
                    <td class="col1"><label for="first_name">Имя:</label></td>
                    <td class="col1">
                        <input type="text" name="first_name" minlength="3" maxlength="20" required
                            pattern="(^[A-Za-z]+$)|(^[А-ЯЁа-яё]+$)" id='user_name' placeholder="Обязательное поле">
                    </td>
                    <td class="col2">
                        <span class="fa fa-check" id='valid_user_name'></span>
                        <span class="fa fa-times" id='invalid_user_name'></span>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td class="hint">Введите имя латинскими или русскими буквами, минимум
                        3 буквы, максимум 20 букв</td>
                </tr>
                <tr>
                    <td><label for="last_name">Фамилия:</label></td>
                    <td>
                        <input type="text" name="last_name" required pattern="(^[A-Za-z]+$)|(^[А-ЯЁа-яё]+$)"
                            minlength="3" maxlength="20" placeholder="Обязательное поле" id="user_last_name">
                    </td>
                    <td>
                        <span class="fa fa-check" id='valid_user_last_name'></span>
                        <span class="fa fa-times" id='invalid_user_last_name'></span>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td class="hint">Введите фамилию латинскими или русскими буквами, минимум
                        3 буквы, максимум 20 букв</td>
                </tr>
                <tr>
                    <td><label for="user_pic">Изображение профиля:</label></td>
                    <td>
                        <input type="file" name="user_pic" size="50" required id="user_pic" onchange="filecontrol()">
                    </td>
                    <td>
                        <span class="fa fa-check" id='valid_user_pic'></span>
                        <span class="fa fa-times" id='invalid_user_pic'></span>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td class="hint">Выберите изображение в формате jpeg или bmp
                        размером не более 2 Мб</td>
                </tr>
                <tr>
                    <td><label for="email">e-mail:</label></td>
                    <td>
                        <input type="email" name="email" id="email" required placeholder="Обязательное поле">
                    </td>
                    <td>
                        <span class="fa fa-check" id='valid_email'></span>
                        <span class="fa fa-times" id='invalid_email'></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="username">Логин:</label></td>
                    <td>
                        <input type="text" name="username" minlength="3" maxlength="20" required id="username"
                            pattern="^[\w]+$" onblur="uniq_username(this.value)" placeholder="Обязательное поле">
                    </td>
                    <td>
                        <span class="fa fa-check" id='valid_user_name'></span>
                        <span class="fa fa-times" id='invalid_user_name'></span>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td class="hint">От 3 до 20 символов: цифр, английских букв и знака _</td>
                </tr>
                <tr>
                    <td><label for="password">Пароль:</label></td>
                    <td>
                        <input type="password" name="password" minlength="6" maxlength="20" required id="password"
                            oninput="checkpass(document.getElementById('pass2').value)"
                            pattern="^(?=.*[A-Z])(?=.*[\d])(?=.*[a-z])(?=.*[\W])[a-zA-Z\d\W]{6,20}$"
                            placeholder="Обязательное поле">
                    </td>
                    <td>
                        <span class="fa fa-check" id='valid_password'></span>
                        <span class="fa fa-times" id='invalid_password'></span>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td class="hint">От 6 до 20 символов, обязательно одна заглавная и строчная английская буква,
                        одна цифра и один спец. символ. Русские буквы не допускаются</td>
                </tr>
                <tr>
                    <td><label for='pass2'>Повторите пароль:</label></td>
                    <td>
                        <input type="password" id="pass2" required placeholder="Обязательное поле"
                            oninput="checkpass(this.value)">
                    </td>
                    <td>
                        <span class="fa fa-check" id='valid_pass2'></span>
                        <span class="fa fa-times" id='invalid_pass2'></span>
                    </td>
                </tr>
            </table>
        </fieldset>
        <br>
        <table style="width: auto;">
            <tr>
                <td class="button"><input type="submit" value="Зарегистрироваться" id="submit" class="button" disabled="true"></td>
                <td class="button"><input type="reset" value="Очистить" class="button"></td>
                <a href="/pr-1">
                    <td class="button"><input type="button" value="Войти" class="button"></td>
                </a>
            </tr>
        </table>
    </form>
    <br><br>
    <footer>Коробков Леонид Алексеевич</footer>

    <script src="index.js"></script>
</body>

</html>
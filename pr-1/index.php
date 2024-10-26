<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Страница авторизации</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <header>
            <h1>Автосалон</h1>
            <p>Здесь можно добавить миссию компании</p>
        </header>

        <section class="info">
            <p>Здесь можно добавить информацию, почему нужно авторизоваться</p>
        </section>

        <section class="auth">
            <h2>Авторизация</h2>
            <form method="post">
                <label for="login">Логин:
                    <input type="text" id="login" name="login">
                </label>

                <label for="password">Пароль:
                    <input type="password" id="password" name="password">
                </label>

                <div class="checkbox">
                    <input type="checkbox" id="stay_logged_in" name="stay_logged_in">
                    <label for="stay_logged_in">Оставаться на сайте</label>
                </div>

                <div class="buttons">
                    <button type="submit">Войти</button>
                    <a href="/pr-5"><button type="button">Зарегистрироваться</button></a>
                    <button type="button">Забыли пароль</button>
                </div>
            </form>
        </section>

        <footer>
            <p>Контактная информация. Какой-то текст.</p>
        </footer>
    </div>
</body>

</html>
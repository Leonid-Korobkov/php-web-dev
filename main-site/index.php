<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Главная страница</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <div class="wrapper">
    <main class="page">
      <section class="main-container">
        <!-- Хедер -->
        <?php include 'templates/header.php'; ?>
        <?php include 'templates/navigation.php'; ?>

        <section class="main-info" style="max-width: 400px; margin: 0 auto; padding: 20px 0">
          <h2>Добро пожаловать на сайт Автосалона!</h2>
          <p>На нашем сайте вы сможете найти лучший выбор автомобилей по выгодным ценам. Также зарегистрированные пользователи могут сохранять понравившиеся модели и делать запросы на тест-драйв.</p>
          <p>Пожалуйста, <a href="login.php" style="text-decoration: underline">авторизуйтесь</a> или <a href="register.php" style="text-decoration: underline">зарегистрируйтесь</a>, чтобы получить доступ ко всем функциям сайта.</p>
        </section>

        <!-- Футер -->
        <?php include 'templates/footer.php'; ?>
      </section>
    </main>
</body>

</html>
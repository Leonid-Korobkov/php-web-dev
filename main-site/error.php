<html lang="ru">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ошибка</title>
  <link rel="stylesheet" href="style.css" />
</head>

<body>
  <div class="wrapper">
    <main class="page">

      <section class="main-container">
        <!-- Хедер -->
        <?php include 'templates/header.php'; ?>

        <!-- Сообщение об ошибке -->
        <section class="error-container">
          <h1>Произошла ошибка</h1>

          <table class="error-table">
            <tr>
              <td>
                <p>Уважаемый, Пользователь!</p>
                <p>Наша система не смогла обработать Ваше последнее действие. Мы уже в курсе проблемы и предпримем все возможные действия, чтобы Вас не огорчать.</p>
                <p>С уважением, группа поддержки.</p>
                <p>Если хотите вернуться назад, то можете <a href="javascript:history.go(-1)">щелкнуть здесь</a></p>
                <p>Обратиться лично: <a href="mailto:forestmarket@yandex.ru">forestmarket@yandex.ru</a></p>
              </td>
            </tr>
          </table>

          <div class="technical-details">
            <h3>Технические детали:</h3>
            <?php
            if (isset($_GET['error_message'])) {
              $error_message = htmlspecialchars(preg_replace("/\\\\/", '', $_GET['error_message']));
            } else {
              $error_message = "Вы здесь оказались из-за сбоя в программе.";
            }

            if (isset($_GET['system_error_message'])) {
              $system_error_message = htmlspecialchars(preg_replace("/\\\\/", '', $_GET['system_error_message']));
            } else {
              $system_error_message = "Сообщения о системных ошибках отсутствуют";
            }

            echo "<p>{$error_message}</p>";
            echo "<p>Было получено сообщение системного характера: <b>{$system_error_message}</b></p>";
            ?>
          </div>

        </section>
        <!-- Футер -->
        <?php include 'templates/footer.php'; ?>
    </main>
    </section>
</body>

</html>
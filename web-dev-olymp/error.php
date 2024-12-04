<?php //include 'includes/header.php'; 
?>

<div class="container my-5">
  <main class="page">

    <section class="main-container">
      <div class="error-container my-4">
        <h1 class="text-danger">Произошла ошибка</h1>

        <div class="card shadow-sm mt-4">
          <div class="card-body">
            <p>Уважаемый Пользователь!</p>
            <p>Наша система не смогла обработать Ваше последнее действие. Мы уже в курсе проблемы и предпримем все возможные действия, чтобы Вас не огорчать.</p>
            <p>С уважением, группа поддержки.</p>
            <p>Если хотите вернуться назад, то можете <a href="javascript:history.go(-1)">щелкнуть здесь</a></p>
            <p>Обратиться лично: <a href="mailto:korobkov-leo@mail.ru">korobkov-leo@mail.ru</a></p>
          </div>
        </div>

        <div class="technical-details card shadow-sm mt-4">
          <div class="card-header bg-dark text-white">
            <h3 class="mb-0">Технические детали:</h3>
          </div>
          <div class="card-body">
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
        </div>
      </div>
    </section>

  </main>
</div>

<?php //include 'includes/footer.php'; 
?>
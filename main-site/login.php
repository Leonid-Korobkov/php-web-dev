<?php
// Подключаем файл подключения к базе данных
require_once 'db.php';
require_once 'functions.php';
?>

<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Страница авторизации</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <div class="wrapper">
    <main class="page page-center">
      <div class="container">
        <?php include 'templates/header.php'; ?>

        <section class="info">
          <h2>Авторизация</h2>
        </section>

        <section class="auth">
          <?php
          // Инициализация переменных для отображения ошибок и сохранения введенных данных
          $login = '';
          $error = '';

          if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Чтение данных формы
            $login = filter_input(
              INPUT_POST,
              'login',
              FILTER_VALIDATE_REGEXP,
              array('options' => array('regexp' => '/^[\w]+$/'))
            );
            $password = $_POST['password'];

            // Подготовленный запрос для проверки логина
            try {
              $query_user = "SELECT id, username, password FROM user WHERE username = ?";
              $stmt_user = mysqli_prepare($conn, $query_user);
              mysqli_stmt_bind_param($stmt_user, 's', $login);
              mysqli_stmt_execute($stmt_user);
              mysqli_stmt_store_result($stmt_user);
              mysqli_stmt_bind_result($stmt_user, $user_id, $user_username, $hashed_password);
              mysqli_stmt_fetch($stmt_user);

              if (mysqli_stmt_num_rows($stmt_user) > 0) {
                // Проверка пароля
                if (password_verify($password, $hashed_password)) {
                  //При успешной авторизации в базу данных помещаем token и устанавливаем cookie
                  $token = bin2hex(random_bytes(15));
                  $query = "UPDATE user SET token='{$token}' WHERE id='{$user_id}';";

                  $row = mysqli_query($conn, $query);
                  if (isset($_POST['stay_logged_in'])) {
                    //Если установлена галочка «Оставаться на сайте», действие cookie продлеваем на 60 дней
                    setcookie('user_id', $user_id, time() + 3600 * 24 * 60);
                    setcookie('token', $token, time() + 3600 * 24 * 60);
                  } else {
                    setcookie('user_id', $user_id);
                    setcookie('token', $token);
                  }
                  // Если логин и пароль верны, перенаправляем на страницу профиля
                  header("Location: /main-site/profile_user.php");
                  exit();
                } else {
                  $error = "Неверный пароль.";
                }
              } else {
                $error = "Пользователь не найден.";
              }

              // Закрытие соединения
              mysqli_stmt_close($stmt_user);
              mysqli_close($conn);
            } catch (Exception $e) {
              $error = "Возникла ошибка при авторизации и проверке пароля (попробуйте позже): ";
              handl_error($error, $e->getMessage());
              exit();
            }
          }
          ?>

          <form method="post" action="login.php">
            <!-- Сообщение об ошибке -->
            <?php if ($error): ?>
              <div class="error-message" style="color: red;"><?php echo $error; ?></div>
            <?php endif; ?>

            <div class="form-group">
              <label for="login">Логин:
                <input type="text" id="login" name="login" value="<?php echo htmlspecialchars($login); ?>" required>
              </label>
            </div>

            <div class="form-group">
              <label for="password">Пароль:
                <input type="password" id="password" name="password" required>
              </label>
            </div>

            <div class="form-group">
              <div class="checkbox">
                <input type="checkbox" id="stay_logged_in" name="stay_logged_in">
                <label for="stay_logged_in">Оставаться на сайте</label>
              </div>
            </div>

            <div class="form-group">
              <div class="buttons">
                <button type="submit">Войти</button>
                <a href="register.php" class="btn btn--link">Зарегистрироваться</a>
              </div>
            </div>
          </form>
        </section>

        <?php include 'templates/footer.php'; ?>
      </div>
    </main>
  </div>
</body>

</html>
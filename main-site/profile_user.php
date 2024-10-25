<?php
require_once 'db.php';
require_once 'functions.php';

session_start();

$user = getCurrentUser();

if ($user) {
  // Путь к аватару пользователя
  $full_path = "https://korobkov.xn--80ahdri7a.site/main-site/uploads/" . htmlspecialchars($user['id']) . "_" . htmlspecialchars($user['foto']);
} else {
  echo "Пользователь не найден!";
  exit;
}

// Закрываем соединение
mysqli_close($conn);
?>

<html lang="ru">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Данные пользователя</title>
  <link rel="stylesheet" href="style.css" />
</head>

<body>
  <div class="wrapper">
    <main class="page">
      <section class="main-container">
        <!-- Хедер -->
        <?php include 'templates/header.php'; ?>


        <!-- Контейнер с аватаром и приветствием -->
        <div class="head">
          <div class="avatar-container">
            <img src="<?php echo $full_path; ?>" alt="Аватар пользователя">
          </div>
          <div class="welcome-info">
            <p>Добро пожаловать, <strong><?php echo htmlspecialchars($user['first_name']) . ' ' . htmlspecialchars($user['last_name']) ?></strong></p>
            <p><?php echo '<a href="exit.php" style="text-decoration: underline; color: crimson"><strong>Выйти</strong></a>'; ?></p>
            <p>Ваши регистрационные данные:</p>
            <p class="error">Адрес электронной почты не подтвержден!</p>
            <p class="error">Идентификатор сессии: <?php echo session_id(); ?></p>
          </div>
        </div>

        <!-- Профильная информация -->
        <div class="profile-info">
          <h3>Профиль пользователя</h3>
          <ul>
            <li>ID: <span id="id_u"><?php echo htmlspecialchars($user['id']); ?></span></li>
            <li>Логин: <?php echo htmlspecialchars($user['username']); ?></li>
            <li>Имя: <?php echo htmlspecialchars($user['first_name']); ?></li>
            <li>Фамилия: <?php echo htmlspecialchars($user['last_name']); ?></li>
            <li>Электронная почта: <?php echo htmlspecialchars($user['e_mail']); ?></li>
          </ul>
        </div>

        <!-- Футер -->
        <?php include 'templates/footer.php'; ?>
      </section>
    </main>
</body>

</html>
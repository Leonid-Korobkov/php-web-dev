<?php
// Чтение данных формы
$login = $_POST['login'];
$password = $_POST['password'];

// Подключение к базе данных
$servername = "localhost";
$username = "korobkov_leonid";
$password_db = "leoK238501"; // пароль для подключения к БД
$dbname = "korobkov_autoshow";

$conn = mysqli_connect($servername, $username, $password_db, $dbname);
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Проверка введенного логина
$query_user = "SELECT * FROM user WHERE username = '{$login}'";
$result = mysqli_query($conn, $query_user);
$user = mysqli_fetch_assoc($result);

if ($user) {
  // Проверка пароля
  if (password_verify($password, $user['password'])) {
    // Если логин и пароль верны, перенаправляем на страницу профиля
    header("Location: /main-site/profile_user.php?user_id=" . $user['id']);
    exit();
  } else {
    echo "Неверный пароль.";
  }
} else {
  echo "Пользователь не найден.";
}

// Закрытие соединения
mysqli_close($conn);

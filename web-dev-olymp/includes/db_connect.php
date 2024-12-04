<?php
// require_once 'functions.php';
function handl_error($error_message, $system_error_message)
{
  header("Location: /web-dev-olymp/error.php?" . "error_message={$error_message}&" .
    "system_error_message={$system_error_message}");
  exit();
}


$servername = '';
$username = '';
$password_db = '';
$dbname = '';

// Подключение к базе данных
try {
  $conn = mysqli_connect($servername, $username, $password_db, $dbname);

  // Проверка подключения
  if (mysqli_connect_errno()) {
    throw new Exception("Не удалось подключиться к базе данных: " . mysqli_connect_error());
  }
  // Устанавливаем кодировку соединения
  mysqli_set_charset($conn, 'utf8mb4');
} catch (Exception $e) {
  // В случае ошибки перенаправляем на страницу с сообщением об ошибке
  $error = "Возникла ошибка при подключении к базе данных: ";
  handl_error($error, $e->getMessage());
  exit();
}

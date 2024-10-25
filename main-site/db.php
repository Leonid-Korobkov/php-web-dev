<?php
require_once 'functions.php';

// Настройки подключения к базе данных
$servername = "localhost";
$username = "korobkov_leonid";
$password_db = "leoK238501";
$dbname = "korobkov_autoshow";

// Подключение к базе данных
try {
  $conn = mysqli_connect($servername, $username, $password_db, $dbname);

  // Проверка подключения
  if (mysqli_connect_errno()) {
    throw new Exception("Не удалось подключиться к базе данных: " . mysqli_connect_error());
  }
} catch (Exception $e) {
  // В случае ошибки перенаправляем на страницу с сообщением об ошибке
  $error = "Возникла ошибка при подключении к базе данных: ";
  handl_error($error, $e->getMessage());
  exit();
}

// if (!$conn) {
//   die("Ошибка подключения: " . mysqli_connect_error());
// }
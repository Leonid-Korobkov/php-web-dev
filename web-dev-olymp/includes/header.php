<?php
require 'db_connect.php';
?>

<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ООО «Узнай Россию»</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="/assets/css/styles.css">
</head>

<body>
  <header class="p-3 text-bg-dark">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <h2 class="me-2"><a class="navbar-brand" href="/index.php">Узнай Россию</a></h2>

        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          <li><a href="#" class="nav-link px-2 text-white">Маршруты</a></li>
          <li><a href="#" class="nav-link px-2 text-white">Редактировать компанию</a></li>
          <li><a href="#"" class=" nav-link px-2 text-white">Профиль</a></li>
        </ul>

        <div class="text-end">
          <a href="login.php" type="button" class="btn btn-outline-light me-2">Войти</a>
          <a href="register.php" type="button" class="btn btn-warning">Зарегистрироваться</a>
        </div>
      </div>
    </div>
  </header>
  <div class="container mt-4">
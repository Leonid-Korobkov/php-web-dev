<?php
function handl_error($error_message, $system_error_message)
{
  header("Location: /main-site/error.php?" . "error_message={$error_message}&" .
    "system_error_message={$system_error_message}");
  exit();
}

function check_cookie()
{
  require 'db.php';
  $user_id = filter_input(INPUT_COOKIE, 'user_id', FILTER_VALIDATE_INT);
  $token = filter_input(
    INPUT_COOKIE,
    'token',
    FILTER_VALIDATE_REGEXP,
    array('options' => array('regexp' => '/^[0-9a-f]+$/'))
  );
  $query = "SELECT token FROM user WHERE id='{$user_id}'";
  $result = mysqli_query($conn, $query);
  $row = mysqli_fetch_array($result);
  if ($token == $row['token']) {
    return $user_id;
  } else {
    return false;
  }
}

function clear_cookie()
{
  //Отмена cookie, нажатие «Выйти из приложения»
  setcookie('user_id', '', time() - 2 * 3600 * 24 * 182);
  setcookie('token', '', time() - 2 * 3600 * 24 * 182);
  header("Location: index.php");
}

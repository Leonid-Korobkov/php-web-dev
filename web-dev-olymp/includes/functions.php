<?php
function handl_error($error_message, $system_error_message)
{
  header("Location: /web-dev-olymp/error.php?" . "error_message={$error_message}&" .
    "system_error_message={$system_error_message}");
  exit();
}

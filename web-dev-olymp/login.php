<?php include 'includes/header.php'; ?>

<?php
// Инициализация переменных
$inn = '';
$password = '';
$error = '';
$success = '';

// Обработка данных формы
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // Получаем и фильтруем данные
  $inn = $_POST['inn'];
  $password = $_POST['password'];

  // Проверка на пустые поля
  if (empty($inn) || empty($password)) {
    $error = "Пожалуйста, введите ИНН и пароль.";
  }

  // Если ошибок нет, проверяем данные в базе
  if (empty($error)) {
    // Подготовленный запрос для поиска компании по ИНН
    $stmt = $conn->prepare("SELECT * FROM companies WHERE inn = ?");
    $stmt->bind_param("s", $inn);
    $stmt->execute();
    $result = $stmt->get_result();

    // Если компания найдена
    if ($result->num_rows > 0) {
      $company = $result->fetch_assoc();

      // Проверка пароля
      if (password_verify($password, $company['password_hash'])) {
        // Успешный вход
        $success = "Вход выполнен успешно!";
        // Здесь можно установить сессию для авторизации, если нужно
        session_start();
        $_SESSION['company_id'] = $company['id'];
        $_SESSION['company_name'] = $company['company_name'];
      } else {
        $error = "Неверный пароль.";
      }
    } else {
      $error = "Компания с таким ИНН не найдена.";
    }

    // Закрытие подготовленного запроса
    $stmt->close();
  }
}

// Закрытие соединения с базой данных
$conn->close();
?>

<div class="container mt-5">
  <div class="row">
    <div class="offset-lg-3 offset-md-1 col-lg-6 col-md-10">
      <h3 class="fw-semibold fs-3 text-uppercase text-primary">Авторизация</h3>

      <?php if ($error): ?>
        <div class="alert alert-danger"><?= $error ?></div>
      <?php elseif ($success): ?>
        <div class="alert alert-success"><?= $success ?></div>
      <?php endif; ?>

      <form action="login.php" method="POST" id="loginForm" novalidate>
        <!-- Группа: Сведения для входа -->
        <fieldset class="border p-3 mb-3">
          <legend class="w-auto px-2">Вход в систему</legend>
          <div class="mb-3">
            <label for="inn" class="form-label">ИНН</label>
            <input type="text" class="form-control" name="inn" id="inn" value="<?php echo htmlspecialchars($inn); ?>" required pattern="\d{10}" placeholder="Введите 10-значный ИНН" />
            <div class="invalid-feedback">ИНН должен содержать 10 цифр.</div>
          </div>
          <div class="mb-3">
            <label for="password" class="form-label">Пароль</label>
            <input type="password" class="form-control" name="password" id="password" required placeholder="Введите пароль" />
            <div class="invalid-feedback">Пожалуйста, введите пароль.</div>
          </div>
        </fieldset>

        <div class="mb-3 d-flex justify-content-end">
          <button type="submit" class="btn btn-primary me-2">Войти</button>
          <button type="reset" class="btn btn-danger">Очистить</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script>
  (function() {
    "use strict";
    const form = document.getElementById("loginForm");

    form.addEventListener("submit", function(event) {
      if (!form.checkValidity()) {
        event.preventDefault();
        event.stopPropagation();
      }

      form.classList.add("was-validated");
    }, false);
  })();
</script>

<?php include 'includes/footer.php'; ?>
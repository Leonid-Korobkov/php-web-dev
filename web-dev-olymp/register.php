<?php include 'includes/header.php'; ?>

<?php
// Инициализация переменных
$company_name = '';
$address = '';
$rto_number = '';
$inn = '';
$kpp = '';
$bank_account = '';
$bank_name = '';
$bic = '';
$correspondent_account = '';
$representative_name = '';
$phone_number = '';
$contact_email = '';
$password = '';
$confirm_password = '';
$error = '';
$success = '';

// Обработка данных формы
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // Получаем и фильтруем данные
  $company_name = $_POST['companyName'];
  $address = $_POST['address'];
  $rto_number = $_POST['rtoNumber'];
  $inn = $_POST['inn'];
  $kpp = $_POST['kpp'];
  $bank_account = $_POST['bankAccount'];
  $bank_name = $_POST['bankName'];
  $bic = $_POST['bic'];
  $correspondent_account = $_POST['correspondentAccount'];
  $representative_name = $_POST['representativeName'];
  $phone_number = $_POST['phoneNumber'];
  $contact_email = $_POST['contactEmail'];
  $password = $_POST['password'];
  $confirm_password = $_POST['confirmPassword'];

  // Проверка паролей на совпадение
  if ($password !== $confirm_password) {
    $error = "Пароли не совпадают.";
  }

  // Проверка на пустые поля
  if (
    empty($company_name) || empty($address) || empty($rto_number) || empty($inn) || empty($kpp) ||
    empty($bank_account) || empty($bank_name) || empty($bic) || empty($correspondent_account) ||
    empty($representative_name) || empty($phone_number) || empty($contact_email) || empty($password)
  ) {
    $error = "Пожалуйста, заполните все обязательные поля. ";
  }

  // Если ошибок нет, сохраняем данные в базе
  if (empty($error)) {
    // Хеширование пароля
    $password_hash = password_hash($password, PASSWORD_DEFAULT);

    // Подготовленный запрос для вставки данных в таблицу companies
    $stmt = $conn->prepare("INSERT INTO companies (company_name, address, rto_number, inn, kpp, bank_account, bank_name, bic, correspondent_account, representative_name, phone_number, contact_email, password_hash) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

    $stmt->bind_param(
      "sssssssssssss",
      $company_name,
      $address,
      $rto_number,
      $inn,
      $kpp,
      $bank_account,
      $bank_name,
      $bic,
      $correspondent_account,
      $representative_name,
      $phone_number,
      $contact_email,
      $password_hash
    );

    // Проверка выполнения запроса
    if ($stmt->execute()) {
      $success = "Регистрация прошла успешно!";
    } else {
      $error = "Ошибка при регистрации. Попробуйте снова.";
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
      <h3 class="fw-semibold fs-3 text-uppercase text-primary">Регистрация юридического лица</h3>

      <?php if ($error): ?>
        <div class="alert alert-danger"><?= $error ?></div>
      <?php elseif ($success): ?>
        <div class="alert alert-success"><?= $success ?></div>
      <?php endif; ?>

      <form action="register.php" method="POST" id="registrationForm" enctype="multipart/form-data" novalidate>
        <!-- Группа: Сведения о юридическом лице -->
        <fieldset class="border p-3 mb-3">
          <legend class="w-auto px-2">Сведения о юридическом лице</legend>
          <div class="mb-3">
            <label for="companyName" class="form-label">Название компании</label>
            <input type="text" class="form-control" name="companyName" id="companyName" value="<?php echo htmlspecialchars($company_name); ?>" required placeholder="Введите полное наименование компании" />
            <div class="invalid-feedback">Пожалуйста, введите название компании.</div>
          </div>
          <div class="mb-3">
            <label for="address" class="form-label">Адрес</label>
            <input type="text" class="form-control" name="address" id="address" value="<?php echo htmlspecialchars($address); ?>" required placeholder="Введите адрес компании" />
            <div class="invalid-feedback">Пожалуйста, введите адрес компании.</div>
          </div>
          <div class="mb-3">
            <label for="rtoNumber" class="form-label">Номер в реестре туроператоров</label>
            <input type="text" class="form-control" name="rtoNumber" id="rtoNumber" value="<?php echo htmlspecialchars($rto_number); ?>" required pattern="^РТО \d{6}$" placeholder="РТО 123456" />
            <div class="invalid-feedback">Формат номера: РТО 123456.</div>
          </div>
          <div class="mb-3">
            <label for="inn" class="form-label">ИНН</label>
            <input type="text" class="form-control" name="inn" id="inn" value="<?php echo htmlspecialchars($inn); ?>" required pattern="\d{10}" placeholder="Введите 10-значный ИНН" />
            <div class="invalid-feedback">ИНН должен содержать 10 цифр.</div>
          </div>
          <div class="mb-3">
            <label for="kpp" class="form-label">КПП</label>
            <input type="text" class="form-control" name="kpp" id="kpp" value="<?php echo htmlspecialchars($kpp); ?>" required pattern="\d{9}" placeholder="Введите 9-значный КПП" />
            <div class="invalid-feedback">КПП должен содержать 9 цифр.</div>
          </div>
        </fieldset>

        <!-- Группа: Сведения о банковских реквизитах -->
        <fieldset class="border p-3 mb-3">
          <legend class="w-auto px-2">Сведения о банковских реквизитах</legend>
          <div class="mb-3">
            <label for="bankAccount" class="form-label">Расчетный счет</label>
            <input type="text" class="form-control" name="bankAccount" id="bankAccount" value="<?php echo htmlspecialchars($bank_account); ?>" required pattern="\d{20}" placeholder="Введите 20-значный расчетный счет" />
            <div class="invalid-feedback">Расчетный счет должен содержать 20 цифр.</div>
          </div>
          <div class="mb-3">
            <label for="bankName" class="form-label">Название банка</label>
            <input type="text" class="form-control" name="bankName" id="bankName" value="<?php echo htmlspecialchars($bank_name); ?>" required placeholder="Введите название банка" />
            <div class="invalid-feedback">Пожалуйста, введите название банка.</div>
          </div>
          <div class="mb-3">
            <label for="bic" class="form-label">БИК</label>
            <input type="text" class="form-control" name="bic" id="bic" value="<?php echo htmlspecialchars($bic); ?>" required pattern="\d{9}" placeholder="Введите 9-значный БИК" />
            <div class="invalid-feedback">БИК должен содержать 9 цифр.</div>
          </div>
          <div class="mb-3">
            <label for="correspondentAccount" class="form-label">Корреспондентский счет</label>
            <input type="text" class="form-control" name="correspondentAccount" id="correspondentAccount" value="<?php echo htmlspecialchars($correspondent_account); ?>" required pattern="\d{20}" placeholder="Введите 20-значный корреспондентский счет" />
            <div class="invalid-feedback">Корреспондентский счет должен содержать 20 цифр.</div>
          </div>
        </fieldset>

        <!-- Группа: Сведения о лице, работающем с договорами -->
        <fieldset class="border p-3 mb-3">
          <legend class="w-auto px-2">Сведения о лице, работающем с договорами</legend>
          <div class="mb-3">
            <label for="representativeName" class="form-label">ФИО представителя</label>
            <input type="text" class="form-control" name="representativeName" id="representativeName" value="<?php echo htmlspecialchars($representative_name); ?>" required placeholder="Введите ФИО представителя" />
            <div class="invalid-feedback">Пожалуйста, введите ФИО представителя.</div>
          </div>
          <div class="mb-3">
            <label for="phoneNumber" class="form-label">Телефон</label>
            <input type="text" class="form-control" name="phoneNumber" id="phoneNumber" value="<?php echo htmlspecialchars($phone_number); ?>" required pattern="^\+7 \d{3} \d{3} \d{2} \d{2}$" placeholder="+7 XXX XXX XX XX" />
            <div class="invalid-feedback">Формат телефона: +7 XXX XXX XX XX.</div>
          </div>
          <div class="mb-3">
            <label for="contactEmail" class="form-label">E-mail</label>
            <input type="email" class="form-control" name="contactEmail" id="contactEmail" value="<?php echo htmlspecialchars($contact_email); ?>" required placeholder="Введите E-mail" />
            <div class="invalid-feedback">Пожалуйста, введите корректный E-mail.</div>
          </div>
        </fieldset>

        <!-- Группа: Сведения для входа в систему -->
        <fieldset class="border p-3 mb-3">
          <legend class="w-auto px-2">Сведения для входа в систему</legend>
          <div class="mb-3">
            <label for="password" class="form-label">Пароль</label>
            <input type="password" class="form-control" name="password" id="password" required placeholder="Введите пароль" pattern="^(?=.*[A-Z])(?=.*[\d])(?=.*[a-z])(?=.*[\W])[a-zA-Z\d\W]{6,20}$" />
            <div class="invalid-feedback">Пожалуйста, введите пароль.</div>
          </div>
          <div class="mb-3">
            <label for="confirmPassword" class="form-label">Подтвердите пароль</label>
            <input type="password" class="form-control" name="confirmPassword" id="confirmPassword" required placeholder="Повторите пароль" />
            <div class="invalid-feedback">Пароли должны совпадать.</div>
          </div>
        </fieldset>

        <div class="mb-3 d-flex justify-content-end">
          <button type="submit" class="btn btn-primary me-2">Зарегистрироваться</button>
          <button type="reset" class="btn btn-danger">Очистить</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script>
  (function() {
    "use strict";
    const form = document.getElementById("registrationForm");

    form.addEventListener("submit", function(event) {
      if (!form.checkValidity()) {
        event.preventDefault();
        event.stopPropagation();
      }

      // Проверка совпадения паролей
      const password = document.getElementById("password");
      const confirmPassword = document.getElementById("confirmPassword");
      if (password.value !== confirmPassword.value) {
        confirmPassword.setCustomValidity("Пароли должны совпадать.");
      } else {
        confirmPassword.setCustomValidity("");
      }

      form.classList.add("was-validated");
    }, false);
  })();
</script>


<?php include 'includes/footer.php'; ?>
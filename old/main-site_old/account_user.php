<html lang="ru">

<head>
  <meta charset="utf-8" />
  <title>Данные пользователя</title>
  <link rel="stylesheet" href="style.css" />
  <!---<script type="text/javascript"src="main1.js"></script>-->
</head>

<body>
  <header>Аккаунт Автосалона</header>

  <!-- Загрузка файла аватарки -->
  <!-- 
  $target_dir = "uploads/";
  $target_file = $target_dir . basename($_FILES["user_pic"]["name"]);
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

  // Check if image file is a actual image or fake image
  if (isset($_POST["submit"])) {
    $check = getimagesize($_FILES["user_pic"]["tmp_name"]);
    if ($check !== false) {
      echo "File is an image - " . $check["mime"] . ".";
      $uploadOk = 1;
    } else {
      echo "File is not an image.";
      $uploadOk = 0;
    }
  }

  // Check if file already exists
  if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
  }

  // Check file size
  if ($_FILES["user_pic"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
  }

  // Allow certain file formats
  if (
    $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif"
  ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
  }

  // Check if $uploadOk is set to 0 by an error
  if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
  } else {
    if (move_uploaded_file($_FILES["user_pic"]["tmp_name"], $target_file)) {
      echo "The file " . htmlspecialchars(basename($_FILES["user_pic"]["name"])) . " has been uploaded.";
    } else {
      echo "Sorry, there was an error uploading your file.";
    }
  } ?> -->

  <?php
  $first_name = $_POST['first_name'];
  $last_name = $_POST['last_name'];
  $email = $_POST['email'];
  $username = $_POST['username'];
  $password = $_POST['password'];

  $avatar = $_FILES["user_pic"]["name"];
  $full_path = "uploads/" . $avatar;
  ?>

  <div class="head">
    <div class="avatar-container">
      <img style="max-width: 200px;" src="<?php echo $full_path; ?>" alt="Аватар пользователя">
    </div>
    
    <div class="welcome-info">
      <p>Добро пожаловать, <strong>
          <?php echo $first_name . ' ' . $last_name ?>
        </strong></p>
      <?php echo '<a href=unautoriz.php><strong>Выйти из приложения</strong></a>'; ?>
      <p>Ваши регистрационные данные:</p><br>
      <?php $check = 0;
      if ($check != 1) {
        echo "<p class='error'>Адрес электронной почты не подтвержден, зайдите на почту. Аккаунт будет удален в течении 30 дней, в случае отсутствия подтверждения!</p>";
      } ?>
    </div>
  </div>

  <br>

  <div class="profile-info">
    <h3>Профиль пользователя</h3>
    <ul>
      <li>ID: <span id='id_u'></span></li>
      <li>Логин:
        <?php echo $username ?>
      </li>
      <li>Имя:
        <?php echo $first_name ?>
      </li>
      <li>Фамилия:
        <?php echo $last_name ?>
      </li>
      <li>Электронная почта:
        <?php echo $email ?>
      </li>
    </ul>
  </div>


</body>

</html>
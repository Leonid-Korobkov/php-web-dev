<?php
//чтение формы
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email = $_POST['email'];
$user_username = $_POST['user_username'];
$user_password = $_POST['password'];
$name_foto = basename($_FILES["user_pic"]["name"]);
$password_hash = password_hash($_POST['password'], PASSWORD_DEFAULT);

// запись в базу
$servername = "localhost";
$username = "korobkov_leonid";
$password = "leoK238501";
$dbname = "korobkov_autoshow";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// $query_user = "INSERT INTO user(first_name, last_name, username, password, e_mail)
//  VALUES('{$first_name}', '{$last_name}', '{$username}', '{$password_hash}', '{$email}')";
$query_user = "INSERT INTO user(first_name, last_name, username, password, foto, e_mail, date_of_creation, check_mail)
VALUES('{$first_name}', '{$last_name}', '{$user_username}', '{$password_hash}', '{$name_foto}', '{$email}', NOW(), 1)";

$msqq = mysqli_query($conn, $query_user) or
    die(mysqli_error($conn));

$num = strval(mysqli_insert_id($conn));

// Загрузка файла аватарки
$target_dir = "uploads/" . $num . "_";
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
}

//перенаправление
header("Location: /main-site/profile_user.php?user_id=" . $num);

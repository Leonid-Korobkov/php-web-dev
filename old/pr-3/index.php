<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Практическая работа 3</title>
</head>

<body>
    <style type="text/css">

    </style>

    <h1>Пирамида</h1>

    <?php
    $index = 2;
    $length = 2;
    for ($i = 0; $i < 8; $i++) {
        for ($j = 0; $j < $length; $j++) {
            echo $index;
        }
        echo "</br>";
        $index++;
        $length++;
    }
    ?>

</body>

</html>
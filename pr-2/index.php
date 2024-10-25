<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Практическая работа 2</title>
</head>

<body>
    <style type="text/css">
        table {
            border-collapse: collapse;
        }

        td {
            width: 20%;
            border: 1px solid black;
        }
    </style>

    <h1>Движении поездов «Санкт-Петербург — Москва»:</h1>
    <table>
        <tr>
            <td>№ п/п</td>
            <td>Название поезда</td>
            <td>Время в пути, ч</td>
        </tr>
        <?php
        // Создаем ассоциативный массив с данными о движении поездов
        $trains = [
            'Сапсан' => 4.0,
            '119А' => 9.3,
            'Невский экспресс' => 4.2,
            'Аврора' => 4.5,
            'Юность' => 7.8,
            'Красная стрела' => 8.0,
            'Смена' => 8.2
        ];

        // Выводим старые данные
        $index = 1;
        foreach ($trains as $name => $time) {
            echo "<tr><td>$index</td><td>$name</td><td>$time</td></tr>";
            $index++;
        }
        ?>
    </table>

    <h1>Новые сведения о движении поездов «Санкт-Петербург — Москва»:</h1>
    <table>
        <tr>
            <td>№ п/п</td>
            <td>Название поезда</td>
            <td>Время в пути, ч</td>
        </tr>
        <?php
        // Удаляем поезда "Аврора" и "Юность"
        unset($trains['Аврора']);
        unset($trains['Юность']);

        // Сортируем по времени в пути
        asort($trains);

        $index = 1;
        foreach ($trains as $name => $time) {
            echo "<tr><td>$index</td><td>$name</td><td>$time</td></tr>";
            $index++;
        }
        ?>
    </table>
</body>
<script>
    document.body.style.backgroundColor = "#000"
</script>
</html>
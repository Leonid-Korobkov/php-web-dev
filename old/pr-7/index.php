<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    $servername = "localhost";
    $username = "korobkov_leonid";
    $password = "leoK238501";


    // Create connection
    $conn = mysqli_connect($servername, $username, $password, "korobkov_autoshow");


    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    echo "Connected successfully";


    $sql = "SELECT id_group, name, logo, description FROM groups";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while ($row = mysqli_fetch_assoc($result)) {
            echo "id_group: " . $row["id_group"] . " - Name: " . $row["name"] . " " . $row["logo"] . "<br>";
        }
    } else {
        echo "0 results";
    }

    mysqli_close($conn);
    ?>

    ?>
</body>

</html>
<!DOCTYPE html>

<html lang="en">

<head>

<title>Additional client data</title>

    <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <meta name="theme-color" content="#009a9f">

    <link rel="stylesheet" type="text/css" href="/style.css">

</head>

<body>

    <div class="container menu">

    <?php

if(!$_COOKIE["user"]){

    echo "Please login!";

    exit();

}

$username = "id3270759_theback1_sid";

$password = "id3270759_theback1_sid";

$sadderss = "localhost";

$dbname = "id3270759_theback1_sid";

$conn = new mysqli($saddress ,$username ,$password ,$dbname);

if($conn->connect_error){

    die("Failed to connect to the server!" . $conn->connect_error);

}

$sql = "SELECT * FROM add_client_details";

$result = $conn->query($sql);

if($result->num_rows > 0){

    echo "<table class='table' align='center'><tr><th>Customer ID</th><th>Secondary Phone number</th><th>Purpose</th></tr>";

    while($row = $result->fetch_assoc()){

        echo "<tr><td>" . $row["CID"] . "</td><td>" . $row["Secondary_phoneno"] . "</td><td>" . $row["Purpose"] . "</td></tr>";

    }

    echo "</table>";

}else{

    echo "There is no data to show.<br>";

}

$conn->close();

    ?>

    </div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body>

</html>
<?php

if(!$_COOKIE["user"]){

    echo "Please login!";

    exit();

}

    $username = "root";

    $password = "";

    $address = "localhost";

    $dbname = "id3270759_theback1_sid";

    $receiver = isset($_POST["receiver"]);

    $user = $_COOKIE["user"];

    $message = isset($_POST["message"]);

    $conn = new mysqli( $address, $username, $password, $dbname);

    $sql="SELECT * FROM message WHERE receiver='$user'";

    $result = $conn->query($sql);

    $chat=$result->num_rows;
?>

<!DOCTYPE html>

<html lang="en">

<head>

<title>Talk</title>

<meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="/style.css">

    <meta name="theme-color" content="#009a9f">

    <meta http-equiv="refresh" content="7">

</head>

<body>

    <div class="container menu">

    <?php
        $sql="SELECT * FROM message WHERE receiver='$user'";

        $result = $conn->query($sql);

        if($result->num_rows > 0){

            echo "<br/><table align='center'><tr><th>Sender</th><th>Message</th></tr>";

            while($row = $result->fetch_assoc()){

                echo "<tr><td>" . $row["sender"] . "</td><td>" . $row["message"] . "</td></tr>";

            }echo "</table><br/>";

        }else{

            echo "No messages to show<br/>";
        }
        /*for($i = 0; $i <= $i + 1; $i++){
            time_sleep_until(time()+5);
            $sql="SELECT * FROM message WHERE receiver='$user'";
            $result = $conn->query($sql);
            $chat2=$result->num_rows;
            if($chat != $chat2){
                echo "<script type='text/javascript'>document.location = '/index.php';</script>";
            }
        }*/
    $conn->close();
    ?>

    </div>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body>

</html>
<!DOCTYPE html>

<?php

    $user = $_COOKIE["user"];

    $username = "root";

    $password = "";

    $address = "localhost";

    $dbname = "id3270759_theback1_sid";

    $conn = new mysqli($address ,$username ,$password ,$dbname);

?>

<html lang="en">

<head>

<title>Client section</title>

    <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="/style.css">

    <meta name="theme-color" content="#009a9f">

</head>

<body>

    <div class="container menu">

    <?php

    if(!$_COOKIE["user"]){

        echo "Please login!";

        exit();

    }

        echo "<h2>Welcome " . $_COOKIE["user"] . "!</h2>";

        $sql = "SELECT empname FROM relation WHERE clientname='$user'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        if($result->num_rows > 0){
            echo "You ar ecurrently allocated to " . $row["empname"] . " you can use the talk feature to get in touch with them.<br/>";
        }else{
            echo "You are yet to be allocated to an employee. You can wait or you can contact our manager.<br/>";
        }

    ?>

    </div>

    <div class="container menu">

    <p>Here you have a chatting facility to communicate with the employee and managers of the organization.</p>

    <div class="container">

    <a class='btn btn-outline-primary my-1' href="/talk.php">Talk</a><br/>

    </div>

    <div class="container">

    <a class='btn btn-outline-primary my-1' href="/change.php">Change Password</a>

    </div>

    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body>

</html>
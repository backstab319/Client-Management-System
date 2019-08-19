<!DOCTYPE html>

<html lang="en">

<head>

<title>Employee Data Updater</title>

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

    $sel = $_POST["sel"];

    $id = $_POST["id"];

    $val = $_POST["val"];

    $username = "id3270759_theback1_sid";

    $password = "id3270759_theback1_sid";

    $address = "localhost";

    $dbname = "id3270759_theback1_sid";

    $conn = new mysqli($address ,$username ,$password ,$dbname);

if($conn->connect_error){

    die("Failed to connect to the server!" . $conn->connect_error);

}

    echo "The value of EID " . $id . " and column " . $sel . " will be updated to " . $val . "<br/>";

    if($sel=="Name"){

        $sql="SELECT Name FROM emp_details WHERE EID = $id";

        $result=$conn->query($sql);

        $row = $result->fetch_assoc();

        $result = $row["Name"];

        $sql = "UPDATE login_details SET user_id = '$val' WHERE user_id = '$result'";

        $conn->query($sql);

    }

    $sql = "UPDATE emp_details SET $sel = '$val' WHERE EID = $id";

    if($conn->query($sql) == TRUE){

        echo "Content updated successfully!";

    }else{

        echo "Error updating the content. " . $conn->error;

    }

    $conn->close();

    ?>

    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body>

</html>
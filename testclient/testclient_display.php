<!DOCTYPE html>

<html lang="en">

<head>

<title>Test Client Section</title>

<meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">
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

$username = "root";

$password = "";

$sadderss = "localhost";

$dbname = "id3270759_theback1_sid";

$conn = new mysqli($sadderss ,$username ,$password ,$dbname);

if($conn->connect_error){

    die("Failed to connect to the server!" . $conn->connect_error);

}

$sql = "SELECT * FROM login_details where user_type = 'testclient'";

$result = $conn->query($sql);

echo "<h1>Test Clients:</h1>";

if($result->num_rows > 0){

    echo "<table class='table' align='center'><tr><th>Name</th</tr>";

    while($row = $result->fetch_assoc()){

        echo "<tr><td>" . $row["user_id"] . "</td></tr>";
        
    }

    echo "</table>";

}else{

    echo "No availabe test clients to display<br/>";

}

?>

<h2>Delete test client credentials:</h2>

<form method="POST" action="/testclient/testclient_display.php">

    <label for="cname">Name of test client</label>

    <input type="text" name="cname" id="cname" placeholder="Test clients name" maxlength="30">

    <br/>

    <input type="submit" name="del" value="Delete">

</form>

<?php

    if(isset($_POST["del"])){

        $cname = $_POST["cname"];

        $sql = "DELETE FROM login_details WHERE user_id = '$cname' AND user_type = 'testclient'";

        if($conn->query($sql) == FALSE){

            echo "The test client " . $cname . " does not exist!<br/>";

        }
        echo "Test client credentials deleted!<br/>";

    }
    $conn->close();

?>

</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body>

</html>
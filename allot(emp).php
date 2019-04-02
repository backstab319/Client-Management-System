<!DOCTYPE html>

<?php
    $username = "u463135857_yxuq";

    $password = "u463135857_yxuq";

    $address = "localhost";

    $dbname = "u463135857_yxuq";

    $conn = new mysqli($address ,$username ,$password ,$dbname);

    $user = $_COOKIE["user"];
?>

<html lang="en">

<head><title>Welcome to Pages</title>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

<link rel="stylesheet" type="text/css" href="/style.css">

<meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<meta name="theme-color" content="#009a9f">

</head>

<body>

<div class="container menu welcome">
        <h1>Allocate client's to you:</h1>
        <p>You can allot a client to yourself using the following tool.</p>
    </div>
    <div class="container menu">
    <h2>Allot client to you</h2>
    <form method="POST" action="allot(emp).php">
        <label for="client">Select Client:</label>
        <select name="client" id="client">
            <?php
                $sql = "SELECT Name FROM client_details";
                $result = $conn->query($sql);
                while($row = $result->fetch_assoc()){
                    echo "<option name='" . $row["Name"] . "'>" . $row["Name"] . "</option>";
                }
            ?>
        </select>
        <input type="submit" name="allot" value="Allot">
    </form>
    <?php
        if($_POST["allot"]){
            $client = $_POST["client"];
            $emp = $_POST["emp"];
            $sql = "INSERT INTO relation VALUES('$user','$client')";
            if($conn->query($sql) == TRUE){
                echo "Client has been allocated to you!<br/>";
                exit();
            }else{
                echo "Error allocating client to you" . $conn->error();
            }
        }
    ?>
    </div>
    <div class="container menu">
    <h2>Clients that are allocated to you</h2>
    <?php
        $sql = "SELECT * FROM relation WHERE empname='$user'";
        $result = $conn->query($sql);
        echo "<table class='table' align='center'><tr><th>Employee</th><th>Client</th></tr>";
        while($row = $result->fetch_assoc()){
            echo "<tr><td>" . $row["empname"] . "</td><td>" . $row["clientname"] . "</td></tr>";
        }
        echo "</table>";
    ?>
    </div>
    <div class="container menu">
    <h2>View unallocated clients</h2>
    <?php
        $sql = "SELECT Name FROM client_details WHERE Name NOT IN (SELECT clientname FROM relation)";
        $result = $conn->query($sql);
        echo "<table class='table' align='center'><tr><th>Unallocated Client</th></tr>";
        while($row = $result->fetch_assoc()){
            echo "<tr><td>" . $row["Name"] . "</td></tr>";
        }
        echo "</table>";
    ?>
    </div>
    <div class="container menu">
    <h2>Remove client's that are allocated to you</h2>
    <form method="POST" action="allot(emp).php">
        <select name="client" id="client">
            <?php
                $sql = "SELECT clientname FROM relation WHERE empname='$user'";
                $result = $conn->query($sql);
                while($row = $result->fetch_assoc()){
                    echo "<option value='" . $row["clientname"] . "'>" . $row["clientname"] . "</option>";
                }
            ?>
        </select>
        <input type="submit" value="Remove" name="remove">
    </form>
    <?php
        if($_POST["remove"]){
            $client = $_POST["client"];
            $sql = "DELETE FROM relation WHERE empname='$user' AND clientname='$client'";
            if($conn->query($sql) == TRUE){
                echo "The client has be removed<br/>";
            }else{
                echo "There was an error removing the client " . $conn->error() . "<br/>";
            }
        }
    ?>
    </div>

<script type="application/javascript">

</script>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body>

</html>
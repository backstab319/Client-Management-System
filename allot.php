<!DOCTYPE html>

<?php
    $username = "root";

    $password = "";

    $address = "localhost";

    $dbname = "id3270759_theback1_sid";

    $conn = new mysqli($address ,$username ,$password ,$dbname);
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
        <h1>Allocate client's and employees:</h1>
        <p>You can allot a client to an employee or an employee to a client using the following tool.</p>
    </div>
    <div class="container menu">
    <h2>Allot client to an employee</h2>
    <form method="POST" action="allot.php">
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
        <label for="emp">Select Employee to allot to:</label>
        <select name="emp" id="emp">
            <?php
                $sql = "SELECT Name FROM emp_details";
                $result = $conn->query($sql);
                while($row = $result->fetch_assoc()){
                    echo "<option name='" . $row["Name"] . "'>" . $row["Name"] . "</option>";
                }
            ?>
        </select>
        <input type="submit" name="allot" value="Allot">
    </form>
    <?php
        if(isset($_POST["allot"])){
            $client = $_POST["client"];
            $emp = $_POST["emp"];
            $sql = "INSERT INTO relation VALUES('$emp','$client')";
            if($conn->query($sql) == TRUE){
                echo "Client has been allocated to the employee!<br/>";
                exit();
            }else{
                echo "Error allocating client and employee" . $conn->error();
            }
        }
    ?>
    </div>
    <div class="container menu">
    <h2>View alloted employee's and client's</h2>
    <?php
        $sql = "SELECT * FROM relation";
        $result = $conn->query($sql);
        echo "<table class='table' align='center'><tr><th>Employee</th><th>Client</th></tr>";
        while($row = $result->fetch_assoc()){
            echo "<tr><td>" . $row["empname"] . "</td><td>" . $row["clientname"] . "</td></tr>";
        }
        echo "</table>";
    ?>
    </div>
    <div class="container menu">
    <h2>Selective view of alloted employee's</h2>
    <form method="POST" action="allot.php">
    <label for="empsearch">Select employee to see allocated clients:</label>
        <select name="empsearch" id="empsearch">
            <?php
                $sql = "SELECT Name FROM emp_details";
                $result = $conn->query($sql);
                while($row = $result->fetch_assoc()){
                    echo "<option name='" . $row["Name"] . "'>" . $row["Name"] . "</option>";
                }
            ?>
        </select>
        <input type="submit" value="Search" name="searchemp">
    </form>
    <?php
        if(isset($_POST["searchemp"])){
            $empname = $_POST["empsearch"];
            $sql = "SELECT * FROM relation WHERE empname='$empname'";
            $result = $conn->query($sql);
            echo "<table class='table' align='center'><tr><th>Employee</th><th>Client</th></tr>";
            while($row = $result->fetch_assoc()){
                echo "<tr><td>" . $row["empname"] . "</td><td>" . $row["clientname"] . "</td></tr>";
            }
            echo "</table>";
        }
    ?>
    </div>
    <div class="container menu">
    <h2>Selective view of alloted clients</h2>
        <form method="POST" action="allot.php">
            <label for="clientsearch">Select Client:</label>
            <select name="clientsearch" id="clientsearch">
                <?php
                    $sql = "SELECT Name FROM client_details";
                    $result = $conn->query($sql);
                    while($row = $result->fetch_assoc()){
                        echo "<option name='" . $row["Name"] . "'>" . $row["Name"] . "</option>";
                    }
                ?>
            </select>
            <input type="submit" value="Search" name="searchclient">
        </form>
        <?php
        if(isset($_POST["searchclient"])){
            $clientname = $_POST["clientsearch"];
            $sql = "SELECT * FROM relation WHERE clientname='$clientname'";
            $result = $conn->query($sql);
            echo "<table class='table' align='center'><tr><th>Employee</th><th>Client</th></tr>";
            while($row = $result->fetch_assoc()){
                echo "<tr><td>" . $row["empname"] . "</td><td>" . $row["clientname"] . "</td></tr>";
            }
            echo "</table>";
        }
        ?>
    </div>
    <div class="container menu">
    <h2>Unallocated employees are as follows</h2>
    <?php
        $sql = "SELECT Name FROM emp_details WHERE Name NOT IN (SELECT empname FROM relation)";
        $result = $conn->query($sql);
        echo "<table class='table' align='center'><tr><th>Unallocated Employees</th></tr>";
        while($row = $result->fetch_assoc()){
            echo "<tr><td>" . $row["Name"] . "</td></tr>";
        }
        echo "</table>";
    ?>
    </div>
    <div class="container menu">
    <h2>Unallocated clients are as follows</h2>
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
    <h2>Remove allocated employees and clients</h2>
    <form method="POST" action="allot.php">
        <label></label>
        <h2>Select name of the client:</h2>
    <form method="POST" action="allot.php">
        <label for="delclient">Select Client:</label>
        <select name="delclient" id="delclient">
            <?php
                $sql = "SELECT clientname FROM relation";
                $result = $conn->query($sql);
                while($row = $result->fetch_assoc()){
                    echo "<option name='" . $row["Name"] . "'>" . $row["Name"] . "</option>";
                }
            ?>
        </select>
        <label for="delemp">Select name of the employee</label>
        <select name="delemp" id="delemp">
            <?php
                $sql = "SELECT empname FROM relation";
                $result = $conn->query($sql);
                while($row = $result->fetch_assoc()){
                    echo "<option name='" . $row["Name"] . "'>" . $row["Name"] . "</option>";
                }
            ?>
            <input type="submit" value="Deallocate" name="deallocate">
        </select>
    </form>
    <?php
    if(isset($_POST["deallocate"])){
        $delclient = $_POST["delclient"];
        $delemp = $_POST["delemp"];
        $sql = "SELECT * FROM relation WHERE empname='$delemp' AND clientname='$delclient'";
        $result = $conn->query($sql);
        if($result->num_rows > 0){
            $sql = "DELETE FROM relation WHERE empname='$delemp' AND clientname='$delclient'";
            if($conn->query($sql) == TRUE){
                echo "Employee and clients deallocated!<br/>";
                exit();
            }else{
                echo "Error while deallocating clients and employees " . $conn->error() . "<br/>";
            }
        }else{
            echo "The entered client and employee are not allocated together!<br/>";
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
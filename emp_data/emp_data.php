<!DOCTYPE html>

<html lang="en">

    <head><title>Employee data.</title></head>

    <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <meta name="theme-color" content="#009a9f">

    <link rel="stylesheet" type="text/css" href="/style.css">

<body>

    <?php

if(!$_COOKIE["user"]){

    echo "Please login!";

    exit();

}

    $username = "u463135857_yxuq";

    $password = "u463135857_yxuq";
    
    $saddress = "localhost";
    
    $dbname = "u463135857_yxuq";

    $conn = new mysqli($saddress ,$username ,$password ,$dbname);

    if($conn->connect_error){

        die("Failed to connect to the server!" . $conn->connect_error);
    
    }

    ?>

    <div class="container menu">

    <h1>Please use the following tools to manage employee data</h1>

    </div>

    <div class="container menu">

    <h2>Enter employee data:</h2>

    <form method="POST" action="/emp_data/emp_data.php">

        <label for="name">Name:</label>

    <input type="text" placeholder="Name" name="name" maxlength="30" id="name">

        <br/>

        <label for="phoneno">Phone number:</label>

    <input type="number" placeholder="Phone number" name="phoneno" maxlength="10" id="phoneno">

        <br/>

        <label for="address">Address:</label>

    <input type="text" placeholder="Address" name="address" maxlength="50" id="address">

        <br/>

        <label for="dep">Department:</label>

        <select name="dep" id="dep" required>

            <option value="accounts">Accounts</option>

            <option value="marketting">Marketting</option>

            <option value="computer">Computer</option>

            <option value="production">production</option>

            <option value="research">Research</option>

        </select>

        <br/>

        <input type="submit" value="Done" name="emp">

    </form>

    <?php

    if($_POST["emp"]){

        $name = $_POST["name"];
    
        $phoneno = $_POST["phoneno"];
    
        $address = $_POST["address"];
    
        $dep = $_POST["dep"];

        if(($name && $phoneno && $address && $dep) != ""){
            
            /*$sql = "ALTER TABLE emp_details MODIFY COLUMN EID int(10)";

            $conn->query($sql);

            $sql = "ALTER TABLE emp_details MODIFY COLUMN EID int(10) NOT NULL AUTO_INCREMENT";

            $conn->query($sql);*/

            $sql = "SELECT * FROM client_details WHERE Name = '$name'";

            $result = $conn->query($sql);

            $result = $result->num_rows;

            $sql = "SELECT * FROM emp_details WHERE Name = '$name'";

            $result1 = $conn->query($sql);

            $result1 = $result1->num_rows;

            $sql = "SELECT * FROM login_details WHERE user_id = '$name'";

            $result2 = $conn->query($sql);

            $result2 = $result2->num_rows;

            if(strrchr($name, "#")){

                echo "No special characters allowed!<br/>";
                
                exit();

            }

            if(strlen($phoneno) > 10){

                echo "Please enter 10 digit phone number!<br/>";

                exit();

            }

            if(($result + $result1 + $result2) == 0){

                $sql = "INSERT INTO emp_details(Name, Phone_no, Address, Department) values ('$name', $phoneno, '$address', '$dep')";

                $conn->query($sql);

                $epassword=$name."123";

                $sql="INSERT INTO login_details VALUES('$name','$epassword','emp')";

                if($conn->query($sql) === TRUE){

                    echo "The username is " . $name . " the password is " . $epassword . "<br/>";
    
                }else{
    
                echo "There was an error creating userid and password for the employee<br/>";
    
                }

            }else{

                if($result > 0){

                    echo "Client " . $name . " already exists!<br/>";

                    exit();

                }
                if($result1 > 0){

                    echo "Employee " . $name . " already exists!<br/>";

                    exit();

                }
                if($result2 > 0){

                    echo $name . "Login name already taken<br/>";

                    exit();

                }

            }

        }else{

            echo "Enter Name, Phone number, Address, Department<br/>";

        }

    }
    $conn->close();

    ?>

    </div>

    <div class="container menu">

    <h2>The table can be viewed by clicking the following link.</h2>    

    <p><a href="emp_data_reader.php">Contents of the table.</a></p>

    </div>

    <div class="container menu">

    <h2>The content of the table can deleted using the following link.</h2>

    <p><a href="emp_data_deleter.html">Delete values of the table.</a></p>

    </div>

    <div class="container menu">

    <h1>The data of the employees can be updated using the following provided tool.<br/></h1>

    <form method="POST" action="/emp_data/emp_data_updater.php">

        <label for="sel">Update:</label>

        <select id="sel" name="sel" required>

            <option value="Name">Name</option>

            <option value="Phone_no">Phone number</option>

            <option value="Address">Address</option>

            <option value="Department">Department</option>

        </select>

        <br/>

        <label for="id">EID to update:</label>

        <input type="number" name="id" maxlength="10" placeholder="EID" id="id">

        <br/>

        <label for="value">Updated value:</label>

        <input type="text" placeholder="Value" name="val" maxlength="50" id="value">

        <input type="submit" value="Done">

        <br/>

    </form>

    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body>

</html>
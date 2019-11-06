<!DOCTYPE html>

<html lang="en">

    <head><title>Client data.</title></head>

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
    
    $username = "root";
    
    $password = "";
    
    $sadderess = "localhost";
    
    $dbname = "id3270759_theback1_sid";

    $conn = new mysqli($sadderess ,$username ,$password ,$dbname);

    if($conn->connect_error){

        die("Failed to connect to the server!" . $conn->connect_error);
    
    }

    ?>

    <div class="container menu">

    <h1>Please enter customer details below:</h1>

    </div>

    <div class="container menu">

    <form method="POST" action="/client_data/client_data.php">

        <label for="name">Name:</label>

    <input type="text" placeholder="Name" name="name" maxlength="30" id="name" autofocus>

        <br/>

        <label for="phoneno">Phone number:</label>

    <input type="number" placeholder="Phone number" name="phoneno" maxlength="10" id="phoneno">

        <br/>

        <label for="address">Address:</label>

    <input type="text" placeholder="Address" name="address" maxlength="50" id="address">

        <br/>

        <input type="submit" value="Done" name="cdata">

    </form>

    </div>

    <?php

    if(isset($_POST["cdata"])){

        $name = $_POST["name"];

        $phoneno = $_POST["phoneno"];
    
        $address = $_POST["address"];

        if(($name AND $phoneno AND $address) != ""){

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

                $sql = "INSERT INTO client_details(Name, Phone_no, Address) VALUES ('$name', $phoneno, '$address')";

                $conn->query($sql);

                $cpassword=$name."123";

                $sql="INSERT INTO login_details VALUES('$name','$cpassword','client')";

                if($conn->query($sql) === TRUE){

                echo "The username is " . $name . " the password is " . $cpassword . "<br/>";
    
                }else{
    
                echo "There was an error creating userid and password for the client<br/>";
    
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

            echo "Please enter Name, Phone number, Address to proceed.<br/>";

        }

    }
    $conn->close();

    ?>

    <div class="container menu">

    <h2>The table can be viewed by clicking the following link.</h2>    

    <p><a href="client_data_reader.php">Contents of the table.</a></p>

    </div>

    <div class="container menu">

    <h2>The content of the table can deleted using the following link.</h2>

    <p><a href="client_data_deleter.html">Delete values of the table.</a></p>

    </div>

    <div class="container menu">

    <h2>The data of the clients can be updated using the following provided tool.<br/></h2>

    <form method="POST" action="/client_data/client_data_updater.php">

        

        <label for="sel">Update:</label>

        <select id="sel" name="sel">

            <option value="name">Name</option>

            <option value="Phone_no">Phone number</option>

            <option value="address">Address</option>

        </select>

        <br/>

        <label for="id">CID to update:</label>

        <input type="number" name="id" maxlength="10" placeholder="CID" id="id">

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
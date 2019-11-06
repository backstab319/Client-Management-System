<?php
    if(isset($_POST["s"])){
        $name = $_POST["username"];
        setcookie("user",$name,time()+(14400),'/');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Login page</title>
<meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="/style.css">
    <meta name="theme-color" content="#009a9f">
</head>
<body>
<div class="background d-flex align-items-start justify-content-center">
<div class="overlay mt-5">
<div class="container-fluid">
<div class="container text-center">
        <h1 class="heading-1"> Login: </h1>
</div>
<div class="container col-lg-4 col-md-4 text-center d-flex-justify-content-center">
    <form method="POST" action="/index.php">
        <div class="form-group">
            <label for="username" class="label label-primary">Username:</label>
            <input type="text" name="username" id="username" placeholder="Username" maxlength="30" autofocus class="form-control"><br/>
            <label for="password" class="label label-primary">Password:</label>
            <input type="password" name="password" id="password" placeholder="Password" maxlength="30" class="form-control"><br/>
            <select name="sel" required  class="form-control mb-2">
                <option value="manager">Manager</option>
                <option value="emp">Employee</option>
                <option value="client">Client</option>
                <option value="testclient">Test Client</option>
            </select>
            <input type="submit" name="s" value="Login!" class="btn btn-outline-primary">
        </div>
    </form>
</div>
<div class="d-flex justify-content-center">
    <div class="container text-center">

        <h3>Or sign up for free to have a look!</h3>

        <a class="btn btn-outline-primary" href="/testclient/signup.php">Sign me up!</a>
    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    <?php
    if(isset($_POST["s"])){
        checker();
    }
    function checker(){
        $username = "root";
        $password = "";
        $address = "localhost";
        $dbname = "id3270759_theback1_sid";
        $name=$_POST["username"];
        $pass = $_POST["password"];
        $type = $_POST["sel"];
        global $name;
        $conn = new mysqli($address ,$username ,$password ,$dbname);
        if($conn->connect_error){
            die("Failed to connect to the server!" . $conn->connect_error);
        }
        $sql = "SELECT * FROM login_details WHERE user_id='$name'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        if($pass == $row["password"] && $type == $row["user_type"]){
            echo "The entered password is correct!";
            if($row["user_type"] == "manager"){
                echo "<script type='text/javascript'>document.location = 'manager.php';</script>";
                exit();
            }elseif($row["user_type"] == "emp"){
                echo "<script type='text/javascript'>document.location = 'emp.php';</script>";
                exit();
            }elseif($row["user_type"] == "client"){
                echo "<script type='text/javascript'>document.location = 'client.php';</script>";
                exit();
            }elseif($row["user_type"] == "testclient"){
                echo "<script type='text/javascript'>document.location = '/testclient/testclient.php';</script>";
                exit();
            }
        }else{
            echo "The entered password is incorrect! Please try again!";
        }
        
        $conn->close();
    }
?>
</div>
</div>
</div>
</div>
</div>
</body>
</html>
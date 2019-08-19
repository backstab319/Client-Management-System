<!DOCTYPE html>

<html lang="en">

    <head><title>Client data.</title></head>

<meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <meta name="theme-color" content="#009a9f">

    <link rel="stylesheet" type="text/css" href="/style.css">

<body>

    <?php
    
    $username = "id3270759_theback1_sid";
    
    $password = "id3270759_theback1_sid";
    
    $sadderess = "localhost";
    
    $dbname = "id3270759_theback1_sid";

    $conn = new mysqli($sadderess ,$username ,$password ,$dbname);

    if($conn->connect_error){

        echo "<div class='container menu>'";

        die("Failed to connect to the server!" . $conn->connect_error);
    
        echo "</div>";

    }

    ?>

    <div class="container page-header menu">

    <h1>Please enter new username and password</h1>

    </div>

    <div class="container menu">

    <form method="POST" action="/testclient/signup.php">

    <label for="username1">Enter username:</label>

    <input type="text" placeholder="Username" name="username1" id="username1" maxlength="30">

    <br/>

    <label for="password1">Enter password:</label>

    <input type="password" placeholder="Password" name="password1" id="password1" maxlength="30">

    <br/>

    <label for="password2">Re-enter password:</label>

    <input type="password" placeholder="Password" name="password2" id="password2" maxlength="30">

    <br/>

    <input type="submit" value="Sign up!" name="signup">

    </form>

    <?php

        if($_POST["signup"]){

            $username1 = $_POST["username1"];

            $password1 = $_POST["password1"];

            $password2 = $_POST["password2"];

            if(($username1 and $password1 and $password2) != ""){
                
                $sql = "SELECT * FROM login_details WHERE user_id = '$username1'";

                $result = $conn->query($sql);

                if($result->num_rows > 0){

                    echo "The username already exists! Please enter a new username!<br/>";
                    
                    exit();

                }else{

                    if($password1 != $password2){

                        echo "Passwords do not match!<br/>";

                        exit();

                    }

                    if(strrchr($username1, "#")){

                        echo "No special characters allowed!<br/>";
                        
                        exit();
        
                    }

                    $sql = "INSERT INTO login_details VALUES ('$username1','$password1','testclient')";

                    $conn->query($sql);

                    echo "Signup Successfull!";

                }

            }else{

                echo "Please check entered username and password";

            }

        }

    ?>

    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body>

</html>
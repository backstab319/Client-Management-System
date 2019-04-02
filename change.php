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

<?php

$user = $_COOKIE["user"];

if(!$_COOKIE["user"]){

    echo "<div class='container menu'>";

    echo "Please login again!";

    echo "</div>";

    exit();

}

?>

    <div class="container menu">

        <div class="container page-header menu">

        <h1>Change password:</h1>

        </div>

    <form method="post" action="change.php">

        <label for="previous">Enter previous password:</label>

        <input type="password" maxlength="20" id="previous" name="previous" placeholder="Previous" autofocus>

        <br/>

        <label for="new">Enter new password:</label>

        <input type="password" maxlength="20" id="new" name="new" placeholder="New">

        <br/>

        <label for="new1">Please reenter new password:</label>

        <input type="password" maxlength="20" id="new1" name="new1" placeholder="Reenter">

        <br/>

        <input type="submit" value="Change!" name="change">

    </form>

    <?php

        if($_POST["change"]){

            $username = "u463135857_yxuq";

            $password = "u463135857_yxuq";

            $address = "localhost";

            $dbname = "u463135857_yxuq";

            $name = $_COOKIE["user"];

            $oldclientpass = $_POST["previous"];

            $newpass = $_POST["new"];

            $newpass1 = $_POST["new1"];

            $conn = new mysqli($address ,$username ,$password ,$dbname);

            $sql="SELECT password FROM login_details WHERE user_id='$name'";

            $result = $conn->query($sql);

            $row=$result->fetch_assoc();

            $oldserverpass=$row["password"];

            if($oldclientpass===""){

                echo "Please enter the old password!<br/>";
                
                exit();

            }elseif($newpass===""){

                echo "You cannot leave new password field blank!<br/>";

                exit();

            }elseif($newpass1===""){
            
                echo "Please reenter the new password<br/>";
                
                exit();
            
            }

            if($oldclientpass===$oldserverpass){

                if($newpass === $newpass1){

                    $sql="UPDATE login_details SET password='$newpass' WHERE user_id='$name'";

                    if($conn->query($sql) == true){

                        echo "Password Successfully changed!<br/>";

                    }else{

                        echo "Error! Please try again later!" . $conn->error();

                    }

                }else{
                    
                    echo "The new passwords do not match!<br/>";

                }

            }else{

                echo "Password incorrect! Please try again!<br/>";

            }

        }

    $conn->close();

    ?>

    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body>

</html>
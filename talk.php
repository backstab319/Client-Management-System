<!DOCTYPE html>

<html lang="en">

<head>

<title>Talk</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="/style.css">

    <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="theme-color" content="#009a9f">

</head>

<body>

    <?php

        $username = "root";

        $password = "";

        $address = "localhost";

        $dbname = "id3270759_theback1_sid";

        $user = $_COOKIE["user"];

        $conn = new mysqli( $address, $username, $password, $dbname);

        if(!$_COOKIE["user"]){

            echo "<div class='container menu'>";

            echo "Please login again to use chatting functionality!";

            exit();

            echo "</div>";

        }

        echo "<div class='container menu'>";

        echo "<h1>Welcome " . $user . "! for further queries please contact following individuals</h1>";

        $sql = "SELECT * FROM login_details";

        $result = $conn->query($sql);

        if($result->num_rows > 0){

            echo "<table class='table' align='center'><tr><th>Username</th><th>Privilege</th></tr>";

        while($row=$result->fetch_assoc()){

            echo "<tr><td>" . $row["user_id"] . "</td><td>" . $row["user_type"] . "</td></tr>";

                                        }

            echo "</table>";

                                }

        echo "</div>";

    ?>
    <div class="page-header container menu">

    <h1>Read message</h1>

    </div>

    <!--<form method="post" action="talk.php">

        <input type="submit" value="Refresh Inbox" name="refresh">

    </form>!-->

    <?php

            if($conn->connect_error){

                echo "<div class='container menu'>";

                die("Failed to connect to the server!" . $conn->connect_error);

                echo "</div>";

            }


        /*if($_POST["refresh"]){

            echo "Inbox refreshed!";

        }*/

        /*$sql="SELECT * FROM message WHERE receiver='$user'";

        $result = $conn->query($sql);

        if($result->num_rows > 0){

            echo "<br/><table align='center'><tr><th>Sender</th><th>Message</th></tr>";

            while($row = $result->fetch_assoc()){

                echo "<tr><td>" . $row["sender"] . "</td><td>" . $row["message"] . "</td></tr>";

            }echo "</table><br/>";

        }else{

            echo "No messages to show<br/>";

        }*/

    ?>
        <div class="container menu">

    <iframe src="/messages/message.php" width="auto" height="300px" scrolling="auto">
    </iframe>

    </div>

    <div class="container menu">

<h1>Write message</h1>

    <form method="post" action="talk.php">

    <label for="receiver">To:</label>

    <input type="text" maxlength="30" id="receiver" name="receiver">

    <br/>

    <label>Message:</label>

    <textarea rows="14" cols="30" name="message" id="message"></textarea>

    <br/>
    
    <input type="submit" value="Send" name="mess">

    </form>

    <?php

        if(isset($_POST["mess"])){

            $receiver = $_POST["receiver"];

            $message = $_POST["message"];

            if($_COOKIE["user"] == "manager"){

                if(strrchr($receiver, "#")){

                    if($receiver == "#all"){

                        $sql = "SELECT user_id FROM login_details";
    
                        $result = $conn->query($sql);
    
                        while($row = $result->fetch_assoc()){
    
                            $receiver1 = $row["user_id"];
    
                            $sql = "INSERT INTO message VALUES('$user','$receiver1','$message')";
    
                            $conn->query($sql);
    
                        }
    
                        exit();
    
                    }

                    if($receiver == "#emp"){

                        $sql = "SELECT user_id FROM login_details WHERE user_type = 'emp'";
    
                        $result = $conn->query($sql);
    
                        while($row = $result->fetch_assoc()){
    
                            $receiver1 = $row["user_id"];
    
                            $sql = "INSERT INTO message VALUES('$user','$receiver1','$message')";
    
                            $conn->query($sql);
    
                        }
    
                        exit();
    
                    }

                    if($receiver == "#client"){

                        $sql = "SELECT user_id FROM login_details WHERE user_type = 'client'";
    
                        $result = $conn->query($sql);
    
                        while($row = $result->fetch_assoc()){
    
                            $receiver1 = $row["user_id"];
    
                            $sql = "INSERT INTO message VALUES('$user','$receiver1','$message')";
    
                            $conn->query($sql);
    
                        }
    
                        exit();
    
                    }

                    if($receiver == "#testclient"){

                        $sql = "SELECT user_id FROM login_details WHERE user_type = 'testclient'";
    
                        $result = $conn->query($sql);
    
                        while($row = $result->fetch_assoc()){
    
                            $receiver1 = $row["user_id"];
    
                            $sql = "INSERT INTO message VALUES('$user','$receiver1','$message')";
    
                            $conn->query($sql);
    
                        }
    
                        exit();
    
                    }

                }

            }

            $sql="SELECT * FROM login_details WHERE user_id='$receiver'";

            $result = $conn->query($sql);

            if($result->num_rows > 0){

                $sql="INSERT INTO message VALUES('$user','$receiver','$message')";

                $conn->query($sql);

                echo "Message sent!<br/>";

            }else{



                echo "The user " . $receiver . " does not exist!<br/>";

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
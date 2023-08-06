<!DOCTYPE html>
<html>
    <head>
        <title> nerdLuv </title>
        <link rel="stylesheet" type="text/css" href="./static/nerdieluv.css">
    </head>
    <body>
        <img src="./static/nerdluv-logo.png">
        <h1>Thank you!</h1>
        <!-- Placing info in the text document -->
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = $_POST['name'];
            $gender = $_POST['gender'];
            $age = $_POST['age'];
            $person = $_POST['personality'];
            $os = $_POST['fav_os'];
            $min = $_POST['min'];
            $max = $_POST['max'];
        }

        $u_info = "<br>$name, $gender, $age, $person,  $os, $min, $max";

        $file = "./singles.txt";

        file_put_contents($file,$u_info,FILE_APPEND);

        ?>
        <p>Now <a href="./matches.php">log in to see your matches</a><br><br>
            This page is for single nerds to meet and date each other! Type in <br>
            your personal information and wait for the nerdly luv to begin!<br>
            Thank you for using our site.<br><br>
            Results and page (C) Copyright NerdLuv Inc.
            <br>
            <a href="">Back to front page</a>
        </p>



    </body>
</html>

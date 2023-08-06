<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $type = $_POST["u_type"];
        $fname = $_POST["fname"];
        $lname = $_POST["lname"];
        $email = $_POST["email"];
        $uname = $_POST["user"];
        $pname = $_POST["pass"];


        // hash the password 
        $hashPass = password_hash($pname, PASSWORD_BCRYPT);

        $host = "localhost";
        $user = "XXXX";
        $pass = "XXXX";
        $dbname = "XXXX";

        //create connection
        $conn = new mysqli($host, $user, $pass, $dbname);
        //check connection
        if($conn->connect_error){
            die("Connection failed: ".$conn->connect_error);
        }

        //sql table
        /*$sql = "CREATE TABLE ALL_USERS (
            id INT AUTO_INCREMENT PRIMARY KEY,
            utype VARCHAR(30) NOT NULL,
            fname VARCHAR(30) NOT NULL,
            lname VARCHAR(30) NOT NULL,
            email VARCHAR(30) NOT NULL UNIQUE,
            uname VARCHAR(30) NOT NULL UNIQUE,
            upass VARCHAR(255) NOT NULL)";

        if ($conn->query($sql) === TRUE) {
            echo "Table USERS created successfully";
        }else{
            echo "Error creating table: ". $conn->error;
        }*/
        
        $inserted = "INSERT INTO ALL_USERS (utype, fname, lname, email, uname, upass)
        VALUES ('$type','$fname','$lname','$email','$uname','$hashPass')";


        if($conn->query($inserted) === TRUE){
            setcookie("uname", $uname, time() + (86400 * 30), "/");
            

            if ($type === "Seller") {
                header("Location: seller.html");
                exit;
            } elseif ($type === "Buyer") {
                header("Location: buyer.html");
                exit;
            } else{
                header("Location: admin.php");
                exit;
            }
        }

        $conn->close();
    }else{
        header("Location: signUp.html");
        exit;
    }
?>
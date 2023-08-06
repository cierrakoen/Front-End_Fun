<?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $usname = $_POST["username"];
        $paword = $_POST["password"];

        //connect to database
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

        //password from database (? - protects insertion) 
        $db_pass = "SELECT upass from ALL_USERS WHERE uname = ?";

        //filter for username w/special chars
        $stmt = $conn->prepare($db_pass);
        $stmt->bind_param("s", $usname);

        // Check if the username exists in the database
        if ($stmt->execute()) {
            $res1 = $stmt->get_result();
            //finding hash password
            if ($res1->num_rows === 1) {
                $row1 = $res1->fetch_assoc();
                $hash_db_pass = $row1["upass"];

                //check for user type (res2)
                $stmt_type = $conn->prepare("SELECT utype FROM ALL_USERS WHERE uname = ?");
                $stmt_type->bind_param("s", $usname);
                $stmt_type->execute();
                $res2 = $stmt_type->get_result();

                //check for user id (res3)
                $stmt_id = $conn->prepare("SELECT id FROM ALL_USERS WHERE uname = ?");
                $stmt_id->bind_param("s", $usname);
                $stmt_id->execute();
                $res3 = $stmt_id->get_result();


                // Check if all queries were successful
                if (($res1->num_rows === 1) && ($res2->num_rows === 1) && ($res3->num_rows === 1)){
                    $row2 = $res2->fetch_assoc();
                    $selected_type = $row2["utype"];

                    $row3 = $res3->fetch_assoc();
                    

                    //password verify with hashes
                    if(password_verify($paword, $hash_db_pass)) {
                        //check if the cookies are not already set and then sets them for later
                        if(!isset($_COOKIE["uname"])){
                            // username will be stored for 30 days
                            setcookie("uname", $usname, time() + (86400 * 30), "/");
                        }
            
                        //transfeer to different dashboard based on u_type
                        if ($selected_type === "Seller") {
                            header("Location: seller.html");
                            exit;
                        } elseif ($selected_type === "Buyer") {
                            header("Location: user.html");
                            exit;
                        } else{
                            // I will be working on the admin dashboard
                            header("Location: admin.php");
                            exit;
                        }
                    }else{
                        header("Location: login.html");
                        exit;
                    }
                }
            }
            //now check the hash password with the input password   
        }
        $stmt->close();
        $conn->close();
    }else{
        header("Location: login.html");
        exit;
    }//need else statement if they are already in database
?>
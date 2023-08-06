<!DOCTYPE html>
<html>
    <head>
        <title>NerdLuv</title>
        <link type="text/css" href="./static/nerdieluv.css">
    </head>
    <body>
        <img src="./static/nerdluv-logo.png">
        <?php
            //getting user submitted name
            if ($_SERVER["REQUEST_METHOD"] == "POST"){
                $named = $_POST["named"];
            }

            //print heading
            print "<h1> Matches for " . $named . " </h1>";

            // var for file text retreivement 
            $file = "./singles.txt";
            $lines = file($file);

            //variables
            $count = 0;
            $saves = array();
            $preferences = array();
            $p_letters = array();
            $new_p = array();
            $new_listy = array();
            $type = "";
            $match = array();
            $matches = array();

            //finds person as an array of elements
            //will be used to compare values 
            foreach ($lines as $line){
                //delimits each line into an array list 
                $listy = explode(",",$line);
                //pops the first name of the list 
                $namey = array_shift($listy);
                // looking to see the user data is registered
                if($namey == $named){
                    $saves = $listy;
                    break;
                }
            }
            
            //creating associative array for possible matches
            // returns a comparitive array
            for($i=0; $i < 6; $i++) {
                if($i == 0){
                //gender
                    if($saves[$i] == 'M'){
                        $preferences["gender"] = 'F';
                    }else{
                        $preferences["gender"] = 'M';
                    }
                }elseif($i==2){
                //personality type
                    $preferences["type"] = $saves[$i];
                }elseif($i==3){
                // favorite OS
                    switch($saves[$i]){
                        case "Windows":
                            $preferences["os"] = "Windows";
                            break;
                            
                        case "Linux":
                            $preferences["os"] = "Linux";
                            break;
                            
                        case "Mac_os":
                            $preferences["os"] = "Mac_os"; 
                            break;
                    }
                }elseif($i==4 || $i==5){
                    $num[] = $saves[$i];
                }
            }

            //min and max
            $preferences["min"] = min($num);
            $preferences["max"] = max($num);

            
            /* Preferences is now the associative array that will be used to compare a lover and their matches */

            //creating a list of each possible match compared to the user's information  
            foreach ($lines as $line){
                //delimites line by commas
                //matches user info: name[0], gender[1], age[2], type[3], OS[4]
                $new_listy = explode(",",$line);
                
                //new personality types
                $new_p = str_split($new_listy[3]);
                $match_let = 0;

                //personality type comparision code
                //personality type
                $personality_types= array(
                    "ESTJ", "ESTP", "ESFJ", "ESFP", "ENTJ", "ENTP", "ENFJ", "ENFP",
                    "ISTJ", "ISTP", "ISFJ", "ISFP", "INTJ", "INTP", "INFJ", "INFP"
                );
                
                //match_let matches the letters that are needed to compare personalities
                for($k = 0; $k <4; $k++){
                    if (strpos($preferences["type"], $new_p[$k]) !== false) {
                       $match_let++;
                    }
                }

                $match = array(
                    "name" => $new_listy[0],
                    "gender" => $new_listy[1],
                    "age" => $new_listy[2],
                    "type" => $new_listy[3],
                    "os" => $new_listy[4]
                );
            
                /*if statement to compare person to preferences*/
                    //gender
                if(($match["gender"] == $preferences["gender"]) && 
                    //age between min and max
                (($match["age"] >= $preferences["min"]) && ($match["age"] < $preferences["max"])) &&
                    //personality
                ($match_let >= 2) &&
                    //OS
                ($match["os"] == $preferences["os"])
                ){
                    echo "<match>
                <img src=\"./static/user.png\">
                <p>
                    <strong>Name:</strong>".$match["name"]."<br>
                    <strong>Gender:</strong>". $match["gender"]."<br>
                    <strong>Age:</strong>". $match["age"] . "<br>
                    <strong>Type:</strong>". $match["type"]." <br>
                </p>
                <br><br>

                
                
                </match>";

                }
            }  
        ?>

    </body>

</html>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="./static/nerdieluv.css">
        <title>Signup</title>
    </head>
    <body>
        <?php
        
        ?>
        <fieldset>
            <legend>New User Signin</legend>
            
            <form action="./signup-submit.php" method="post">
                <!-- Left side -->
                <div class="column">
                    <strong>
                        <ul>
                        <li><label class="left">Name:</label></li>
                        <li><label class="left">Gender: </label></li>
                        <li><label class="left">Age: </label></li><br>
                        <li><label class="left">Personality Type:</label></li>
                        <li><label class="left">Favorite OS:</label></li>  
                        <li><label class="left">Seeking Age:</label></li>                      
                        </ul>
                    </strong>

                </div>
                <ul>
                    <li><input type="text" size="16" name="name"><br></li>
                    <li><input type="radio" name="gender" value="M" checked>Male
                    <input type="radio" name="gender" value="F">Female<br></li>
                    <li><input type="text" size="6" name="age" maxlength="2"></li>
                    <input type="text" size="6" name="personality" maxlength="4">(<a href=""> Don't know your type?</a>)<br>
                    <select name="fav_os">
                        <option selected value="Windows">Windows</option>
                        <option value="Mac_os">Mac OS X</option>
                        <option value="Linux">Linux</option>
                    </select><br>
                    <input type="text" size="6" name="min" maxlength="2" placeholder="min"> to
                    <input type="text" size="6" name="max" maxlength="2" placeholder="max"><br>
                    <input type="submit" value="Signup">
                </ul>
                
            </form>
        </fieldset>
    </body>
</html>
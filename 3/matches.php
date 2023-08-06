<!DOCTYPE html>
<html>
    <head>
        <title>NerdLuv</title>
        <link type="text/css" rel="stylesheet" href="./static/nerdieluv.css">
    </head>
    <body>
        <img src="./static/nerdluv-logo.png">
        <fieldset>
            <legend>New User Signin</legend>
            <br>
            <form action="./matches-submit.php" method="post">
                <div class="column">
                    <strong><label class="left">Name:</label></strong>
                    <?php print "<br><br>";
                    ?>
                </div>
                <input type="text" name="named" size="16">
                    <?php print "<br><br>";
                    ?>
                <input type="submit" value="View My Matches">
            </form>
        </fieldset>
    </body>
</html>
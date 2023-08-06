<!DOCTYPE html>
<html>
    <head>
        <style>
            body{
                display: flex;
            }

            .sidebar{
                position: relative;
                width: 200px;
                height: 580px;
                background-color: #b87316;
                flex: left;
            }

            .topbar{
                position: absolute;
                height: 70px;
                width: 1208px;
                background-color: #b87316;
                display: flex;
            }

            .signout{
                left: 950px;
                height: 58px;
                width: 200px;
                margin: 5px;
                background-color: #eedda0;
                position: absolute;
                
                text-align: center;
                font-size: 28px;
                font-weight: 600;
            }

            .welcome{
                position: relative;
                height:58px;
                width: 800px;
                margin: 5px;
                left: 25px;
                text-align: center;
                line-height:100%;
                font-size: 30px;
            }

            .sidebtn{
                height: 50px;
                width: 170px;
                margin: 15px;
                border-radius: 8%;
                background-color: #eedda0;
                margin-bottom: 40px;
            }

            .main_container{
                display: flex;
                top:80px;
                left:10px;
                position: relative;
                height: 500px;
                width: 1000px;
                background-color: #eedda0;

            }

            .sales{
                position: relative;
                height: 150px;
                background-color: #fff;
                width: 650px;
                margin: 10px;
                overflow: auto;
            }

            .insights{
                position: relative;
                height: 150px;
                width: 300px;
                margin: 10px;
                background-color: #fff;
                overflow: auto;
            }

            .total{
                top: 160px;
                position: absolute;
                height: 150px;
                background-color: #fff;
                width: 500px;
                margin: 10px;
                overflow: auto;
            }

            .top{
                top: 320px;
                position: absolute;
                height: 150px;
                background-color: #fff;
                width: 500px;
                margin: 10px;
                overflow: auto;
            }

            .squares{
                top: 160px;
                left: 520px;
                position: absolute;
                height: 150px;
                background-color: #fff;
                width: 215px;
                margin: 10px;
                overflow: auto;
            }

            h1{
                font-size: 15px;
            }

            img {
                max-width: 100%; /* Ensure the image doesn't exceed the width of the container */
                max-height: 100%; /* Ensure the image doesn't exceed the height of the container */
                display: block;
                object-fit: cover; /* Remove any default space below the image */
                margin: auto; /* Center the image horizontally within the container */
            }

            .logo{
                font-size: 30px;
                margin: 5px;
                margin-left: 20px;

            }

            .dash{
                margin-left: 30px;
                font-size: 30px;
                margin: 5px;
            }
        </style>
        <title>Admin Portal</title>
    </head>
    <body>
        <!-- naviagation bars-->
        <div class="sidebar">
            <div class="sidebtn">
                
            </div>
            <div class="sidebtn">
                <p class="dash"> Orders </p>
            </div>
            <div class="sidebtn">
                <p class="dash"> Products </p>
            </div>
            <div class="sidebtn">
                <p class="dash"> Sales Report </p>

            </div>
            <div class="sidebtn">
                <p class="dash"> Messages </p>

            </div>
            <div class="sidebtn">
                <p class="dash"> Moderation </p>

            </div>
        </div>
        <div class="topbar">
            <p class="logo"> BrewTrade <br> Dashboard </p>
            <div class="welcome">
                <?php 
                    /* PHP will print out the user and the number that they are stored within the database */
                    if(isset($_COOKIE["uname"])){
                        $cookie_uname = $_COOKIE["uname"];

                        echo '<p> Welcome back ' . $cookie_uname . '</p>';
                    }
                ?>
            </div>
            <div class="signout">
                <a href="./index.html"><p>Sign Out</p></a>
            </div>
        </div>
        <!-- Main Body -->
        <div class="main_container">
            <div class="sales">
                <h1> Today's Sales</h1>
                <img src="./static/fig1.png">

            </div>

            <div class="insights">
                <h1> Visitor Insights </h1>
                <img src="./static/fig2.png">

            </div>

            <div class="total">
                <h1> Total Revenue </h1>
                <img src="./static/fig3.png">

            </div>

            <div class="top">
                <h1> Top Products</h1>
                <img src="./static/fig6.png">

            </div>

            <div class="squares">
                <h1> Customer Satisfaction</h1>
                <img src="./static/fig4.png">

            </div>

            <div style="left: 755px;"class="squares">
                <h1> Target vs Reality </h1>
                <img src="./static/fig5.png">

            </div>

            <div style="top: 320px;"class="squares">
                <h1> Sales Mapping by Country </h1>
                <img src="./static/fig7.png">

            </div>

            <div style="top: 320px; left: 755px;"class="squares">
                <h1> Volume vs Service Level</h1>
                <img src="./static/fig8.png">

            </div>

        </div>
    </body>
</html>
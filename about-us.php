<?php
    session_start();
    $uname = $_SESSION['user'] ?? '';
?>

<html>
    <head>
        <title>
            About Us
        </title>
        <link rel="stylesheet" href="bootstrap.css">
        <style>
            li{
                font-size: 40px;
                color:navy;
            }
            button{
                position: relative;
                left: 30px;
                width: 400px;
                height: 50px;

            }
        </style>
    </head>

    <body>
        <ul type="disc">
            <li>Name: K.V. Maheesha Sulakshana</li>
            <li>Index No: KADSE222F-039</li>
            <li>DSE 22.2 F Batch</li>
        </ul>
        <a href="home-page.php"><button type="button" class="btn btn-outline-primary">Click here to go to Home</button></a>
    </body>
</html>
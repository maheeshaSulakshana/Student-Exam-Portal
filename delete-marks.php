<?php
    session_start();
    $uname = $_SESSION['user'] ?? '';
    
    include_once 'DbConnection.php';

    $studentname = $_POST['student-name'];

    $query = "Delete from student_marks where name = '".$studentname."'";

    $res = mysqli_query($con, $query);
?>

<html>
    <head>
        <link rel="stylesheet" href="bootstrap.css">
        <style>
            div{
                position: relative;
                top: 100px;
                left: 100px;
            }
        </style>
    </head>

    <body>
        <?php if ($res){ ?>
            <div>
                <h1>Marks Deleted Successfully</h1>
                <a href="home-page.php"><button class="btn btn-outline-success">Click here to go to home</button></a>
            </div>
        <?php }
        else{ ?>
            <div>
                <h1>Something went wrong please contact developer</h1>
                <a href="home-page.php"><button class="btn btn-outline-success">Click here to go to home</button></a>
            </div>
        <?php } ?>
    </body>
</html>
<?php
    session_start();
    $uname = $_SESSION['user'] ?? '';
    
    include_once 'DbConnection.php';

    $studentname = $_POST['student-name'];
    $religion = $_POST['religion'];
    $english = $_POST['english'];
    $maths = $_POST['maths'];
    $science = $_POST['science'];
    $ICT = $_POST['ICT'];
    $art = $_POST['art'];
    $commerce = $_POST['commerce'];
    $sinhala = $_POST['sinhala'];
    $history = $_POST['history'];
    $total = $_POST['total'];
    $average = $_POST['average'];

    $query = "update student_marks set religion = ".$religion.",
                                       english = ".$english.",
                                       maths = ".$maths.",
                                       science = ".$science.",
                                       ICT = ".$ICT.",
                                       commerce = ".$commerce.",
                                       art = ".$art.",
                                       sinhala = ".$sinhala.",
                                       history = ".$history.",
                                       total = ".$total.",
                                       average = ".$average."
                                       where name = '".$studentname."'";

    $res = mysqli_query($con, $query);
?>

<html>
    <head>
        <link rel="stylesheet" href="bootstrap.css"/>
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
                <h1>Marks successfully Updated</h1>
                <a href="home-page.php"><button class="btn btn-outline-success">Click here to go to home</button></a>
            </div>
        <?php }
        else
        { ?>
            <div>
                <h1>Something went wrong please contact developer</h1>
                <a href="home-page.php"><button class="btn btn-outline-danger">Click here to go to home</button></a>
            </div>
        <?php } ?>
    </body>
</html>
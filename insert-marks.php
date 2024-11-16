<?php
    session_start();
    $uname = $_SESSION['user'] ?? '';
    
    include_once 'DbConnection.php';
    
    $studentname = $_POST['student-name'];
    $religion = $_POST['religion'];
    $english = $_POST['english'];
    $math = $_POST['maths'];
    $science = $_POST['science'];
    $ICT = $_POST['ICT'];
    $commerce = $_POST['commerce'];
    $art = $_POST['art'];
    $sinhala = $_POST['sinhala'];
    $history = $_POST['history'];
    $total = $_POST['total'];
    $average = $_POST['average'];

    $query = "insert into student_marks values('".$studentname."',
                                        ".$religion.",
                                        ".$english.",
                                        ".$math.",
                                        ".$science.",
                                        ".$ICT.",
                                        ".$commerce.",
                                        ".$art.",
                                        ".$sinhala.",
                                        ".$history.",
                                        ".$total.",
                                        ".$average.")";
    try{
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
                <h1>Marks successfully stored</h1>
                <a href="insert-marks-page.php"><button class="btn btn-outline-info">Click here to go back to marks page</button></a>
                <a href="home-page.php"><button class="btn btn-outline-info">Or Click here to go to home</button></a>
            </div>
        <?php }
        }
        catch (Exception $ex){?>
            <div style="position:relative; top:100px; left:100px;">
                <h1 style="font-family:Helvetica;">Something went wrong <br>
                Please contact developer</h1>
                <a href="home-page.php"><button style="width: 200px; height: 50px; background-color:#0275d8;"><span style="font-family:Helvetica; color:white;">Click here to go to home page</span></button></a>
            </div>
        <?php } ?>
    </body>
</html>
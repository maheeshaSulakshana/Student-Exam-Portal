<?php
    session_start();
    $uname = $_SESSION['user'] ?? '';
    
    ini_set('display_errors', 0);
    try{
        $username = $_POST['username'];
        if ($username == ""){
            throw new Exception();
        }
    }
    catch (Exception $ex){

    }
?>

<html>
    <head>
        <link rel="stylesheet" href="bootstrap.css"/>
        <style>
            h1{
                display: inline-block;
                color: white;
                font-size: 40px;
                text-decoration: underline;
                position: relative;
                top: 40px;
                left: 570px;
            }
            #logout{
                position: relative;
                top: 10px;
                left: 30px;
                color: white;
            }
            #about-us{
                position: relative;
                top: 20px;
                left: 780px;
            }
            table{
                position: relative;
                top: 100px;
            }
            button{
                width: 400px;
                height: 100px;
            }
            span{
                font-size: 35px;
                color: white;
            }
            tr{
                height: 250px;
            }
            body{
                background-image: url('photos/ICSE-CSE-CISCE-exams.jpeg');
                background-size: cover;
                background-repeat: no-repeat;
            }
        </style>
    </head>

    <body>
        <div>
            <a id="logout" class="btn btn-danger">Logout</a>
            <h1>Student Exam Portal</h1>
            <a href="about-us.php" class="btn btn-info" id="about-us">About Us Page</a>
        </div>

        <div>
            <table border="0" cellspacing="0px" cellpadding="10px" align="center">
                <tr>
                    <td>
                        <a href="view-results.php"><button class="btn btn-primary"><span>View Results</span></button></a>
                    </td>
                    <td>
                        <a href="insert-marks-page.php"><button class="btn btn-primary" id="insert-marks"><span>Insert Mark</span></button></a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="update-marks-page.php"><button class="btn btn-primary" id="update-marks"><span>Update Marks</span></button></a>
                    </td>
                    <td>
                        <a href="delete-marks-page.php"><button class="btn btn-primary" id="delete-marks"><span>Delete Marks</span></button></a>
                    </td>
                </tr>
            </table>
        <div>

        <script src="JQuery.js"></script>
        <script>
            $(function(){

                <?php if ($uname == "student"){ ?>
                    $('#insert-marks').prop('disabled', true);
                    $('#update-marks').prop('disabled', true);
                    $('#delete-marks').prop('disabled', true);
                <?php } ?>

                $('#logout').on('click', function(){
                    <?php session_destroy(); ?>
                    window.location.href = "login-page.php";
                });
            });
        </script>
    </body>
</html>
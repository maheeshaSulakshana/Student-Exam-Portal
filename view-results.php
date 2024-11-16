<?php
    session_start();
    $uname = $_SESSION['user'] ?? '';

    include_once 'DbConnection.php';

    $query = "select * from student_marks order by total desc";

    $res = mysqli_query($con, $query);

    $no_rows = mysqli_num_rows($res);

    $c = 1;
?>

<html>
    <head>
        <title>Results</title>

        <link rel="stylesheet" href="bootstrap.css"/>

        <style>
            div{
                position: relative;
                top: 20px;
                left: 120px;
            }
            table{
                color: white;
                font-size: 30px;
                border: 2px solid white;
            }
            h1{
                color: white;
                position: relative;
                left: 440px;
                display:inline-block;
            }
            #table-container{
                top: 40px;
            }
            body{
                background-image: url('photos/notice_boards.jpg');
                background-repeat: no-repeat;
                background-position: center;
                background-size: 150%;
            }
        </style>
    </head>

    <body>
        <div>
            <a href="home-page.php"><button class="btn btn-light">Home</button></a>
            <h1>Students Marks</h1>
        </div>

        <div id="table-container">
            <table border="1" cellspacing="0px" cellpadding="5px">
                <tr>
                    <th>Name</th>
                    <th>Religion</th>
                    <th>English</th>
                    <th>Maths</th>
                    <th>Science</th>
                    <th>ICT</th>
                    <th>Commerce</th>
                    <th>Art</th>
                    <th>Sinhala</th>
                    <th>History</th>
                    <th>Rank</th>
                </tr>

                <?php while ($c <= $no_rows){
                    $row = mysqli_fetch_assoc($res); ?>
                    <tr>
                    <td><?php echo $row['Name']; ?></td>
                    <td><?php echo $row['Religion']; ?></td>
                    <td><?php echo $row['English']; ?></td>
                    <td><?php echo $row['Maths']; ?></td>
                    <td><?php echo $row['Science']; ?></td>
                    <td><?php echo $row['ICT']; ?></td>
                    <td><?php echo $row['Commerce']; ?></td>
                    <td><?php echo $row['Art']; ?></td>
                    <td><?php echo $row['Sinhala']; ?></td>
                    <td><?php echo $row['History']; ?></td>
                    <td><?php echo $c; ?></td>
                    </tr>
                <?php $c = $c + 1; } ?>
            </table>
        </div>
    </body>
</html>
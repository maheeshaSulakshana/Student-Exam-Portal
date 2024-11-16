<?php
    session_start();
    $uname = $_SESSION['user'] ?? '';
?>

<html>
<head>
    <title>
        Student Marks
    </title>

    <link rel="stylesheet" href="form-layout.css"/>

    <style>
        h1{
            color: white;
            display: inline-block;
        }
        body{
            color: white;
            background-image: url('photos/comrawpixel7599520.jpg');
        }
        a{
            position: relative;
            right: 500px;
        }
    </style>
</head>

<body>
    <div>
        <a href="home-page.php" class="btn btn-light">Home</a>
        <h1>
            Student Marks Calculator
        </h1>
    </div>

    <form action="insert-marks.php" method="POST" id="form">
        <label for="student-name">Student Name</label>
        <input type="text" name="student-name" id="student-name"> <br>

        <label for="religion">Religion</label>
        <input type="text" name="religion" id="religion"> <br>

        <label for="english">English</label>
        <input type="text" name="english" id="english"> <br>

        <label for="maths">Maths</label>
        <input type="text" name="maths" id="maths"> <br>

        <label for="science">Science</label>
        <input type="text" name="science" id="science"> <br>

        <label for="ICT">ICT</label>
        <input type="text" name="ICT" id="ICT"> <br>

        <label for="commerce">Commerce</label>
        <input type="text" name="commerce" id="commerce"> <br>

        <label for="art">Art</label>
        <input type="text" name="art" id="art"> <br>

        <label for="sinhala">Sinhala</label>
        <input type="text" name="sinhala" id="sinhala"> <br>

        <label for="history">History</label>
        <input type="text" name="history" id="history"> <br>

        <button type="button" name="calculate" id="calculate" class="btn btn-info">Calculate</button> <br>

        <label for="total" id="lbltotal">Total</label>
        <input type="text" name="total" id="total"> <br>

        <label for="average" id="lblaverage">Average</label>
        <input type="text" name="average" id="average"> <br>

        <button type="submit" name="submit" id="submit" class="btn btn-info">Submit</button> <br>
        <button type="reset" name="reset" id="reset" class="btn btn-dark">Reset</button> <br>
    </form>

    <script src="JQuery.js"></script>

    <script>
        $(function() {
            $('#submit').prop('disabled', true);
            $('#clear').hide();
            $('#total').prop('disabled', true);
            $('#average').prop('disabled', true);

            $('#calculate').on('click', function() {
                //validations
                if ($('#student-name').val() == "") {
                    alert("Must enter Student Name");
                    return;
                }

                if ($('#religion').val() == "") {
                    alert("Must enter Religion marks");
                    return;
                }
                if ($.isNumeric($('#religion').val()) == false) {
                    alert("Must enter religion marks must be numeric");
                    return;
                }

                if ($('#english').val() == "") {
                    alert("Must enter English marks");
                    return;
                }
                if ($.isNumeric($('#english').val()) == false) {
                    alert("Must enter english marks must be numeric");
                    return;
                }

                if ($('#maths').val() == "") {
                    alert("Must enter maths marks");
                    return;
                }
                if ($.isNumeric($('#maths').val()) == false) {
                    alert("Must enter maths marks must be numeric");
                    return;
                }

                if ($('#science').val() == "") {
                    alert("Must enter science marks");
                    return;
                }
                if ($.isNumeric($('#science').val()) == false) {
                    alert("Must enter science marks must be numeric");
                    return;
                }

                if ($('#ICT').val() == "") {
                    alert("Must enter ICT marks");
                    return;
                }
                if ($.isNumeric($('#ICT').val()) == false) {
                    alert("Must enter ICT marks must be numeric");
                    return;
                }

                if ($('#commerce').val() == "") {
                    alert("Must enter commerce marks");
                    return;
                }
                if ($.isNumeric($('#commerce').val()) == false) {
                    alert("Must enter commerce marks must be numeric");
                    return;
                }

                if ($('#art').val() == "") {
                    alert("Must enter art marks");
                    return;
                }
                if ($.isNumeric($('#art').val()) == false) {
                    alert("Must enter art marks must be numeric");
                    return;
                }

                if ($('#sinhala').val() == "") {
                    alert("Must enter sinhala marks");
                    return;
                }
                if ($.isNumeric($('#sinhala').val()) == false) {
                    alert("Must enter sinhala marks must be numeric");
                    return;
                }

                if ($('#history').val() == "") {
                    alert("Must enter history marks");
                    return;
                }
                if ($.isNumeric($('#history').val()) == false) {
                    alert("Must enter religion marks must be numeric");
                    return;
                }

                let religion = $('#religion').val() * 1;
                let english = $('#english').val() * 1;
                let maths = $('#maths').val() * 1;
                let science = $('#science').val() * 1;
                let ICT = $('#ICT').val() * 1;
                let commerce = $('#commerce').val() * 1;
                let art = $('#art').val() * 1;
                let sinhala = $('#sinhala').val() * 1;
                let history = $('#history').val() * 1;

                let total = (religion + english + maths + science + ICT +
                    commerce + art + sinhala + history);
                let average = total / 9;

                $('#total').val(total);
                $('#average').val(average);
                $('#total').prop('disabled', false);
                $('#average').prop('disabled', false);
                $('#submit').prop('disabled', false);
                $('#calculate').prop('disabled', true);
                $('#clear').show();
            });

            $('#reset').on('click', function() {
                $('#clear').hide();
                $('#submit').prop('disabled', true);
                $('#calculate').prop('disabled', false);
            });
        });
    </script>
</body>
</html>
<?php
    session_start();
    $uname = $_SESSION['user'] ?? '';
    
    include_once 'DbConnection.php';
    
    ini_set('display_errors', 0);
    try{
        $studentname = $_GET['student_name'];

        if ($studentname == ""){
            throw new Exception();
        }

        $query = "select * from student_marks where name='".$studentname."'";

        $res = mysqli_query($con, $query);
        
        $row = mysqli_fetch_assoc($res);

        $religion = $row['Religion'] * 1;
        $english = $row['English'] * 1;
        $maths = $row['Maths'] * 1;
        $science = $row['Science'] * 1;
        $ICT = $row['ICT'] * 1;
        $commerce = $row['Commerce'] * 1;
        $art = $row['Art'] * 1;
        $sinhala = $row['Sinhala'] * 1;
        $history = $row['History'] * 1;
        $total = $row['Total'] * 1;
        $average = $row['Average'] * 1;

        $query = "Select name from student_marks";

        $res = mysqli_query($con, $query);

        $no_rows = mysqli_num_rows($res);
        $c = 1;
    }
    catch (Exception $ex){
        $query = "Select name from student_marks";

        $res = mysqli_query($con, $query);

        $no_rows = mysqli_num_rows($res);
        $c = 1;

        $studentname = "";
        $religion = "";
        $english = "";
        $maths = "";
        $science = "";
        $ICT = "";
        $commerce = "";
        $art = "";
        $sinhala = "";
        $history = "";
    }
?>

<html>
    <head>
        <title>Update Student Marks</title>
        <link rel="stylesheet" href="form-layout.css"/>
        <style>
            h1{
                display:inline-block;
                position: relative;
                top: 10px;
            }
            a{
                position: relative;
                right: 500px;
            }
            body{
                background-color:floralwhite;
            }
        </style>
    </head>

    <body>
        <div>
            <a href="home-page.php" class="btn btn-info">Home</a>
            <h1>Update Student Marks</h1>
        </div>

        <form action="update-marks.php" method="POST" id="form">
            <label for="student-name">Student Name</label>
            <select name="student-name" id="student-name">
                <option value="">Please select a student</option>
                <?php while ($c <= $no_rows){
                    $row = mysqli_fetch_assoc($res);
                    $name = $row['name'];
                    $c = $c + 1; ?>

                    <option value="<?php echo $name ?>"><?php echo $name ?></option>
                <?php } ?>
            </select> <br>

            <label for="religion">Religion</label>
            <input type="text" name="religion" id="religion" value="<?php if ($religion != ""){echo $religion;}?>"> <br>

            <label for="english">English</label>
            <input type="text" name="english" id="english" value="<?php if ($english != ""){echo $english;}?>"> <br>

            <label for="maths">Maths</label>
            <input type="text" name="maths" id="maths" value="<?php if ($maths != ""){echo $maths;}?>"> <br>

            <label for="science">Science</label>
            <input type="text" name="science" id="science" value="<?php if ($science != ""){echo $science;}?>"> <br>

            <label for="ICT">ICT</label>
            <input type="text" name="ICT" id="ICT" value="<?php if ($ICT != ""){echo $ICT;}?>"> <br>

            <label for="commerce">Commerce</label>
            <input type="text" name="commerce" id="commerce" value="<?php if ($commerce != ""){echo $commerce;}?>"> <br>

            <label for="art">Art</label>
            <input type="text" name="art" id="art" value="<?php if ($art != ""){echo $art;}?>"> <br>

            <label for="sinhala">Sinhala</label>
            <input type="text" name="sinhala" id="sinhala" value="<?php if ($sinhala != ""){echo $sinhala;}?>"> <br>

            <label for="history">History</label>
            <input type="text" name="history" id="history" value="<?php if ($history != ""){echo $history;}?>"> <br>

            <button type="button" name="calculate" id="calculate" class="btn btn-outline-success">Calculate</button> <br>

            <label for="total" id="lbltotal">Total</label>
            <input type="text" name="total" id="total" value="<?php if($total != ""){echo $total;} ?>"> <br>

            <label for="average" id="lblaverage">Average</label>
            <input type="text" name="average" id="average" value="<?php if ($average != "") {echo $average;} ?>"> <br>

            <button type="submit" name="submit" id="submit" class="btn btn-outline-info">Submit</button> <br>
            <button type="reset" name="reset" id="reset" class="btn btn-outline-secondary">Reset</button> <br>
            <button type="button" name="btn-getDetails" id="btn-getDetails" class="btn btn-outline-primary" style="left:1000px;">Get Details</button>
        </form>

        <script src="JQuery.js"></script>

        <script>
            $(function(){
                $('#religion').prop('disabled', true);
                $('#english').prop('disabled', true);
                $('#maths').prop('disabled', true);
                $('#science').prop('disabled', true);
                $('#ICT').prop('disabled', true);
                $('#commerce').prop('disabled', true);
                $('#art').prop('disabled', true);
                $('#sinhala').prop('disabled', true);
                $('#history').prop('disabled', true);
                $('#total').prop('disabled', true);
                $('#average').prop('disabled', true);
                
                $('#calculate').prop('disabled', true);
                $('#submit').prop('disabled', true);
                $('#edit').prop('disabled', true);
                $('#btn-getDetails').hide();

                <?php
                if ($studentname != ""){ ?>
                    $('#student-name').val("<?php echo $studentname ?>");
                    $('#student-name').prop('disabled', true);
                    $('#religion').prop('disabled', false);
                    $('#english').prop('disabled', false);
                    $('#maths').prop('disabled', false);
                    $('#science').prop('disabled', false);
                    $('#ICT').prop('disabled', false);
                    $('#commerce').prop('disabled', false);
                    $('#art').prop('disabled', false);
                    $('#sinhala').prop('disabled', false);
                    $('#history').prop('disabled', false);
                    $('#total').prop('disabled', false);
                    $('#average').prop('disabled', false);

                    $('#calculate').prop('disabled', false);
                <?php } ?>

                $('#student-name').on('change', function(){
                    $('#btn-getDetails').show();
                });

                $('#btn-getDetails').on('click', function(){
                    let studentname = $('#student-name').val();
                    window.location.href = 'update-marks-page.php?student_name='+studentname+'';
                });

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
                    $('#submit').prop('disabled', false);
                    $('#calculate').prop('disabled', true);

                    $('#student-name').prop('disabled', false);
                });

                $('#reset').on('click', function(){
                    window.location.href = 'update-marks-page.php';
                });
            });
        </script>
    </body>
</html>
<?php
    include_once 'DbConnection.php';

    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "Select password from users where username = '" . $username . "'";

    $res = mysqli_query($con, $query);

    $no_rows = mysqli_num_rows($res);
?>

<html>
    <head>
        <link rel="stylesheet" href="bootstrap.css"/>
    <style>
        form{
            position: relative;
            top: 150px;
            left: 200px;
        }

        h1{
            font-size: 40px;
        }
    </style>
    </head>

    <body>
        <?php if ($no_rows == 0) { ?>
            <form>
                <h1>Username not found</h1>
                <a href="login-page.php">Click here to go back</a>
            </form>
        <?php } else {
            $row = mysqli_fetch_assoc($res);
            $pass = $row['password'];

            if ($password == $pass) { 
                session_start();
                $_SESSION['user'] = $username;?>
                <form action="home-page.php" method="POST">
                    <h1>Login Successfull</h1>
                    <input type="text" name="username" value="<?php echo $username ?>" style="display: none;"> <br>
                    <button type="submit" class="btn btn-outline-success">Click here to go to home page</button>
                </form>
            <?php } else { ?>
                <form>
                    <h1>Login Unsuccessfull</h1>
                    <a href="login-page.php">Please try again</a>
                </form>
        <?php }
        } ?>
    </body>
</html>
<html>
    <head>
        <title>Login Page</title>

        <style>
            table{
                position: relative;
                top: 100px;
            }

            .form-elements{
                font-size: 40px;
            }

            #username{
                position: relative;
                left: 50px;
            }

            #password{
                position: relative;
                left: 77px;
            }

            #submit-button{
                position: relative;
                top: 50px;
                left: 250px;
                width: 200px;
                height: 50px;
                font-size: 25px;
            }

            #clear-button{
                position: relative;
                top: 50px;
                left: 290px;
                width: 200px;
                height: 50px;
                font-size: 25px;
            }

            #banner{
                width: 100%;
                height: 150px;
                background-color: wheat;
                text-align: center;
            }

            #title{
                position: relative;
                top: 50px;
            }
        </style>

        <link rel="stylesheet" href="bootstrap.css"/>
    </head>

    <body>
        <div id="banner">
            <h1 id="title">
                Login Page
            </h1>
        </div>
        <table align="center">
            <tr>
                <td>
                    <form action="login.php" method="POST">
                        <label for="username" class="form-elements">User Name</label>
                        <input type="text" name="username" id="username" class="form-elements"> <br><br>
                        <label for="password" class="form-elements">Password</label>
                        <input type="password" name="password" id="password" class="form-elements"> <br><br>
                        <button type="button" id="submit-button" class="btn btn-outline-success">Login</button>
                        <button type="reset" id="clear-button" class="btn btn-outline-secondary">Clear</button>
                    </form>
                </td>
            </tr>
        </table>

        <script src="JQuery.js"></script>
        <script>
            $(function () {
                $('#submit-button').on("click", function(){
                    //validations
                    if ($('#username').val() == "" || $('#username').length == 0){
                        alert("Must enter username");
                        return;
                    }

                    if ($('#password').val() == "" || $('#password').length == 0){
                        alert("Must enter password");
                        return;
                    }

                    $('form').submit();
                    
                });
            });
        </script>
    </body>
</html>
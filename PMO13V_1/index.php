<?php 
    include("connection.php");
    include("login.php")
   
    ?>
    
<html>
    <head>
        <title>Login</title>

        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="css/style1.css">
    </head>
    <body>
            <div id="form">
           
            <h1><center>Login</center></h1>
            <br>
            <form name="form" action="login.php" onsubmit="return isvalid()" method="POST">
                <label>Username:</label>
                <input type="text" id="user"name="user"></br></br>
                <label>Password:</label>
                <input type="password" id="pass" name="pass"></br></br>
               
                <p class="link"> <a href="user-login/forgot.php">Forgot password</a></p>
                <center><input type="submit" id="btn" value="       Login      " name = "submit"/></center>
                
                <p class="link">Don't have an account? <a href="Registration/registration.php">Register Now</a></p>
                
            </form>
        </div>
        

        
        <style>
        body {
        background-image: url('img/bg1.jpg');
        }
        </style>



        <script>
            function isvalid(){
                var user = document.form.user.value;
                var pass = document.form.pass.value;
                if(user.length=="" && pass.length==""){
                    alert(" Username and password field is empty!!!");
                    return false;
                }
                else if(user.length==""){
                    alert(" Username field is empty!!!");
                    return false;
                }
                else if(pass.length==""){
                    alert(" Password field is empty!!!");
                    return false;
                }
                
            }
        </script>
    </body>
</html>
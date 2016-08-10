<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link type="text/css" rel="stylesheet" href="login1.css"/>
    </head>
    <body>
       <?php 
       session_start();
       if(isset($_SESSION['login']))
     {
         header("location:home1.php");
     }
       if(isset($_REQUEST["msg"]))
     {
         echo $_REQUEST["msg"];
     }
     if(isset($_REQUEST["note"]))
     {
         echo $_REQUEST["note"];
     }
     ?>
        <div id="header"> </div>
        <div id="middle">
        <h1>Create an Account</h1><br>
        <form action="register.php" method="post" id="form">
        <input type="text" name="name" required="required" placeholder="Name"/><br><br>
        <input type="text" name="lname" required="required" placeholder="Last Name"/><br><br>
        <input type="email" name="email" required="required" placeholder="Email"/><br><br>
        <input type="password" name="pass" required="required" placeholder="Password"/><br><br>
        <input type="password" name="cpass" required="required" placeholder="Confirm Password"/><br><br>
        <input type="radio" name="gen" value="Male"/>Male
        <input type="radio" name="gen" value="Female"/>Female<br><br>
        <select name="country" required="required">
            <option>UK</option> 
            <option>USA</option>
            <option>India</option>
            <option>Australia</option>
        </select><hr/>
        <input type="submit" value="Register Now"/>
        </form>
        </div>
        <a id="login" href="loginpage.php">Login</a>
    </body>
</html>

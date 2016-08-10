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
        <link type="text/css" rel="stylesheet" href="loginpage.css"/>
    </head>
    <body>
        <?php
        session_start();
        if(isset($_REQUEST["msg"]))
     {
         echo $_REQUEST["msg"];
         
     }
     if(isset($_SESSION['login']))
     {
         header("location:home1.php");
     }
     ?>
        <div id="logindetail">
        <form action="process.php" method="post" id="form">
        <input type="email" name="email" required="required" placeholder="Email"/><br><br>
        <input type="password" name="pass" required="required" placeholder="Password"/><br><br>
         <input type="submit" value="log in"/>
         <a  href="login1.php">Register Now</a>
        </form>
        </div>
    </body>
</html>

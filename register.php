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
    </head>
    <body>
        <?php
       
        
       $name= $_REQUEST['name'];
       $lname=$_REQUEST['lname'];
       $email= $_REQUEST['email'];
       $pass= $_REQUEST['pass'];
       $cpass= $_REQUEST['cpass'];
       $gen=$_REQUEST['gen'];
       $country= $_REQUEST['country'];
       
       if($pass!=$cpass)
       {
          header("location:login1.php?note=password not same");
       }
 else {
       $con=  mysql_connect('localhost:3306','root','vipul@2003');
       mysql_select_db('coaching');
       $query="select email from register";
       $rs=  mysql_query($query);
       $count=  mysql_num_rows($rs);
       if($count==0)
       {
           $query1="insert into register(name,lastname,email,pass,gender,country)values('$name','$lname','$email','$pass','$gen','$country')";
           mysql_query($query1);
           header("location:loginpage.php");
       }
       else
       {
           while($row=  mysql_fetch_array($rs))
           {
               if($email===$row['email'])
               {
                    header("location:login1.php?msg=Registered email id");
               }
                else 
                {
                    $query1="insert into register(name,lastname,email,pass,gender,country)values('$name','$lname','$email','$pass','$gen','$country')";
                    mysql_query($query1);
                    if (!file_exists('./'.$email))
                        {
                        mkdir('./'.$email, 0777, true);
       
                        }
                    header("location:loginpage.php");
                    
                }
           }
       }
 }
       
        ?>
    </body>
</html>

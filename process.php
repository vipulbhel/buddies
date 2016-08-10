<?php
$email=$_REQUEST['email'];
$pass=$_REQUEST['pass'];
$con=  mysql_connect('localhost:3306','root','vipul@2003');
mysql_select_db('coaching');
$query="select * from register";
$rs=  mysql_query($query);
 $count=  mysql_num_rows($rs);
    if($count==0)
    {
        echo "No username";
    }
    else 
    {
        session_start();
     while($row =  mysql_fetch_array($rs))
        {
         echo $row['email'];
            if($email === $row['email'] && $pass === $row['pass'])
            {
                $_SESSION["login"]="yes";
                $_SESSION["pass"]="vipul@2003";
                $_SESSION["name1"]=$row['name'];
                $_SESSION["rid"]=$row['rid'];
                $_SESSION["gender"]=$row['gender'];
                $_SESSION['email']=$row['email'];
                header("location:home1.php");
            
            }
            else
            {
            header('location:loginpage.php?msg=Not registered');
            }
        }
    }
 ?>




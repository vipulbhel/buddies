<?php
session_start();
if(!isset($_SESSION['login']))
        {
            header('location:loginpage.php');
        }
        $pass=$_SESSION['pass'];
$link=mysql_connect("localhost:3306","root","$pass") or die("connection fail");
mysql_select_db("coaching"); 

$id=$_SESSION['rid'];
$idf=$_REQUEST['idf'];
$query="insert into friend (friend1,friend2,status) values ($id,$idf,'pending')";
 mysql_query($query);
 echo "friend request sent";
?>


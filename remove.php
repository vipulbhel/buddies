<?php
session_start();
if(!isset($_SESSION['login']))
        {
            header('location:loginpage.php');
        }
        $pass=$_SESSION['pass'];
$link=mysql_connect("localhost:3306","root","$pass") or die("connection fail");
mysql_select_db("coaching");
$id=$_REQUEST['id'];
$idfriend=$_REQUEST['idfriend'];
$query="update friend set status='' where friend1=$idfriend and friend2=$id";
mysql_query($query);
echo "friend request cancel";
header("location:home1.php");
?>

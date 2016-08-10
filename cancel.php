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
$idf=$_REQUEST['idfriend'];
$query="update friend set status='' where friend1=$id and friend2=$idf";
 mysql_query($query);
 echo "friend request cancel";
 ?>

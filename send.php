<?php

session_start();
if(!isset($_SESSION['login']))
        {
            header('location:loginpage.php');
        }
$pass=$_SESSION['pass'];        
$link=mysql_connect("localhost:3306","root","$pass") or die("connection fail");
mysql_select_db("coaching");
$ids=$_SESSION['rid'];
$idr=$_REQUEST['idr'];
$text=$_REQUEST['textmsg'];
$datetime=date("Y-m-d h:i:sa");
echo $datetime;
$query="insert into msg(sender,reciver,message,details) values ($ids,$idr,'$text','$datetime')";
mysql_query($query);
$query1="select name,lastname from register where rid=$ids";
$rs=  mysql_query($query1);
$row=  mysql_fetch_array($rs);
echo $row['name'];
echo $row['lastname'];
echo $text;


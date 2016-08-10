<?php
session_start();
if(!isset($_SESSION['login']))
        {
            header('location:loginpage.php');
        }
$id=$_SESSION['rid'];
$pass=$_SESSION['pass'];
$work=$_REQUEST['work'];
$study=$_REQUEST['study'];
$stu=$_REQUEST['stu'];
$live=$_REQUEST['lives'];
$relation=$_REQUEST['relation'];
$from=$_REQUEST['from'];
$link=mysql_connect("localhost:3306","root","$pass") or die("connection fail");
mysql_select_db("coaching"); 
$query="select * from info where id=$id";
 $rs=  mysql_query($query);
 $count=  mysql_num_rows($rs);
 if($count==0)
 {
     $query1="insert into info(id,work,study,studyp,live,relation,birthplace) values ($id,'$work','$study','$stu','$live','$relation','$from')";
     mysql_query($query1);
     header('location:home1.php');
 }
else
{
    $query="update info set work='$work',study='$study',studyp='$stu',live='$live',relation='$relation',birthplace='$from' where id=$id";
    mysql_query($query);
    header('location:home1.php');
}
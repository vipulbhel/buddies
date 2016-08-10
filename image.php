<?php
session_start();
$id=$_SESSION['rid'];
$pass=$_SESSION['pass'];
if(!isset($_SESSION['login']))
        {
            header('location:loginpage.php');
        }
$link=mysql_connect("localhost:3306","root","$pass") or die("connection fail");
mysql_select_db("coaching");     
$file_name=$_FILES['file']['name'];
$file_size=$_FILES['file']['size'];
$file_type=$_FILES['file']['type'];
$file_tmp_name=$_FILES['file']['tmp_name'];

if($file_name=="")
          
  {
     echo "please select the file";
  }
else
{
    if($file_type=='image/jpeg')
           
     {
        $em=$_SESSION['email'];
        if('$em/$file_name')
        {
          move_uploaded_file($file_tmp_name, "$em/$file_name");   
        $query1="insert into image(id,url) values($id,'$em/$file_name')";         
        mysql_query($query1);
        header('location:home1.php');
        }
        else
        {
         move_uploaded_file($file_tmp_name, "$em/$file_name");   
        $query1="insert into image(id,url) values($id,'$em/$file_name')";         
        mysql_query($query1);
        header('location:home1.php');
        }
      
     }
      else
      {
          echo "select a img file";
      }
}
 ?>
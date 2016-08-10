
<?php
session_start();
if(!isset($_SESSION['login']))
        {
            header('location:loginpage.php');
        }
        $pass=$_SESSION['pass'];
$link=mysql_connect("localhost:3306","root","$pass") or die("connection fail");
mysql_select_db("coaching");
$search=$_REQUEST['search'];
$query="select name,lastname,rid from register where name like'%$search%' ";
$rs=  mysql_query($query);
$count=  mysql_num_rows($rs);
 if($count==0)
 {
     echo "No person found";
     
 }
 else
 {
     while($row=  mysql_fetch_array($rs))
     {
        
         $id=$row['rid'];
       ?><a target="_blank" href="others.php ?id=<?php echo $id?>"> <?php  
       echo $row['name'];
       echo  $row['lastname'];?><br/><br></a>
    <?php
    }
     
     
 }
 ?>


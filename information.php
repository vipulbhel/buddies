<?php
session_start();
if(!isset($_SESSION['login']))
        {
            header('location:loginpage.php');
        }
$id=$_SESSION["rid"];
$pass=$_SESSION['pass'];
$link=mysql_connect("localhost:3306","root","$pass") or die("connection fail");
mysql_select_db("coaching"); 
$query="select * from info where id=$id";
 $rs=  mysql_query($query);
 $count=  mysql_num_rows($rs);
 if($count==0)
 {?>
     <form action="edit.php" method="post">
         <strong> Works at</strong> <input type="text" name="work"/><br><br>
         <strong> Studies at</strong> <input type="text" name="study"/><br><br>
         <strong> Studied at</strong> <input type="text" name="stu"/><br><br>
         <strong> lives at </strong><input type="text" name="lives"/><br><br>
         <strong> <label> Relationship status</label></strong>
            <select name="relation">
                <option>Single</option>
                 <option>Complicated</option>
                  <option>Married</option>
            </select><br><br>
            <strong> From </strong> <input type="text" name="from"/><br><br>
           <input type="submit" id="ed"/>  <!-- <input type="submit" value="Cancel"/>-->
</form>

     
 <?php }

else
{
$row=  mysql_fetch_array($rs);
?>
            <form action="edit.php" method="post">
           <strong> Works at</strong> <input type="text" name="work" value="<?php  echo $row['work']?>"/><br><br>
           <strong> Studies at</strong> <input type="text" name="study" value="<?php  echo $row['study']?>"/><br><br>
           <strong> Studied at</strong> <input type="text" name="stu" value="<?php  echo $row['studyp']?>"/><br><br>
           <strong> lives at </strong> <input type="text" name="lives" value="<?php  echo $row['live']?>"/><br><br>
            <strong> <label> Relationship status</label></strong>
            <select name="relation" value="<?php echo $row['relation']?>">
                <option>Single</option>
                 <option>Complicated</option>
                  <option>Married</option>
            </select><br><br>
           <strong> From </strong>  <input type="text" name="from" value="<?php  echo $row['birthplace']?>"/><br><br>
           <input type="submit" />  <!-- <input type="submit" value="Cancel"/>-->
</form>
<?php }?>

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
        <script src="jquery-1.11.1.js" type="text/javascript"></script>
        <script>
           $(document).ready(function(){
               $("#btn").click(function(){
                   
                 //  alert("hello");
                  $.ajax({
                      url:"information.php",
                      success:function(dl)
                      {
                          $("#info").html(dl);
                      }
                  });
               });
               $("#srch").keyup(function(){
                   //alert('1');
                   var valu=$("#srch").val();
                   $.ajax({
                       
                       url:"search.php",
                       data: {search:valu },
                       type:'post',
                       success: function(data)
                       {
                           $("#searchbox").html(data);
                       }
                   });
               });
               /*$("#accept").click(function(){
                   
                 alert("hello");
                  $.ajax({
                      url:"accept.php",
                      data: {id:<?php echo $id ?>,idfriend:<?php echo $idfriend ?>},
                       type:'post',
                      success:function(dl)
                      {
                          $("#accept").val(dl);
                      }
                  });
               });
               $("#remove").click(function(){
                   
                 alert("hello");
                  $.ajax({
                      url:"remove.php",
                      data: {id:<?php echo $id ?>,idfriend:<?php echo $idfriend ?>},
                       type:'post',
                      success:function(dl)
                      {
                          $("#remove").val(dl);
                      }
                  });
               });*/
           });
            
        </script>
        <style>
            #srch
            {
                position: absolute;
                top:100px;
                right:50px;
            }
             #searchbox
            {
                position: absolute;
                top:150px;
                right:50px;
            }
        </style>
    </head>
    <body>
        <?php
        session_start();
        $gen=$_SESSION['gender'];
        $id=$_SESSION["rid"];
        $pass=$_SESSION['pass'];
        if(!isset($_SESSION['login']))
        {
            header('location:loginpage.php');
        }
        $link=mysql_connect("localhost:3306","root","$pass") or die("connection fail");
        mysql_select_db("coaching");
        $query="select url  from image where id=$id";
        $rs=mysql_query($query);
        if($row = mysql_fetch_array($rs))
        {
            $x=$row['url'];
            echo "<img  src='$x' height='300' width='300'/>";
        }
 else {
        if($gen==="Male")
           {
               
                echo "<img src='../img/male.jpg' height='300' width='300'/>";
           }
        else 
           {
            echo "<img src='../img/fe.png' height='300' width='300'/>";
           }
        }
        ?>
        <h1>Welcome <?php echo $_SESSION["name1"]?></h1>
        <form enctype="multipart/form-data" action="image.php" method="post">
             <input type="file" name="file"/><br/><br/>
             <input type="submit" value="Upload" id="up"/><br><br>
        </form>
        <div id="info">
            <h1>Addition information: </h1>
          <?php  $query1="select * from info where id=$id";
            $rs=mysql_query($query1);
            $count=  mysql_num_rows($rs);
            if($count==0)
            {?>
                 <strong> Works at: </strong><br><br>
           <strong> Studies at: </strong><br><br>
            <strong> Studied at: </strong><br><br>
            <strong> lives at: </strong><br><br>
           <strong> Relationship status: </strong><br><br>
           <strong> From: </strong><br><br>
            <?php }
            else
            {
            $row=  mysql_fetch_array($rs);
            ?>
           <strong> Works at: </strong><?php  echo $row['work'] ?><br><br>
           <strong> Studies at: </strong><?php  echo $row['study'] ?><br><br>
            <strong> Studied at: </strong><?php  echo $row['studyp'] ?><br><br>
           <strong> lives at: </strong><?php echo $row['live'] ?><br><br>
           <strong> Relationship status: </strong><?php echo $row['relation'] ?><br><br>
           <strong> From: </strong><?php echo $row['birthplace'] ?><br><br>
            <?php
            
            }?>
        </div>
        <input id="btn" type="button" value="Edit"/> <br><br>
        <form action="logout.php" >
            <input type="submit" value="log out"/>
        </form>
        <input type="search" id="srch" />
        <div id="searchbox">
            
        </div>
        <?php
       
                   $query2="select * from friend where friend2=$id ";
                   
                   $rs2=  mysql_query($query2);
                   $count1=  mysql_num_rows($rs2);
                   if($count1==0)
                   {
                       echo "";
                   }
                   else
                   {
                      while( $row3=  mysql_fetch_array($rs2))
                      {
                          $idfriend=$row3['friend1'];
                          if($row3['status']=="pending")
                          {
                              $query="select name,lastname from register where rid=$idfriend";
                              $rs=  mysql_query($query);
        
                              $count=  mysql_num_rows($rs);
                              if($count==0)
                              {
                                  echo "";
                              }
                              else
                              {
                                  $row=  mysql_fetch_array($rs);
                                  echo $row['name'];
                                  echo $row['lastname'];
                                  ?>
        <a href="accept.php ? id=<?php echo $id ?>&idfriend=<?php echo $idfriend ?>">Accept</a>
         <a href="remove.php ? id=<?php echo $id ?>&idfriend=<?php echo $idfriend ?>">Remove</a>
                                 <!-- <input id="accept" type="button" value="Accept"/>
                                  <input id="remove" type="button" value="Remove"/>--><br><br>
                             <?php
                             }
                          }
                      }
                       
                   }   
        ?>
                                  
    </body>
</html>

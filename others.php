
<?php
 session_start();
$id=$_REQUEST['id'];
$pass=$_SESSION['pass'];
$link=mysql_connect("localhost:3306","root","$pass") or die("connection fail");
mysql_select_db("coaching"); 
$query="select * from register where rid=$id";
 $rs=  mysql_query($query);
 $count=  mysql_num_rows($rs);
 $row=  mysql_fetch_array($rs);
 $gen=$row['gender'];
 if($count==0)
 {
     echo "No one";
 }
 else
 {
     
     $query1= "select url from image where id=$id";
     $rs1=  mysql_query($query1);
     $count=  mysql_num_rows($rs1);
     if($count==0)
     {
         if($gen==="Male")
           {
               
                echo "<img src='../img/male.jpg' height='300' width='300'/><br>";
           }
        else 
           {
            echo "<img src='../img/fe.png' height='300' width='300'/><br>";
           }
     }
    else {
        $row1=  mysql_fetch_array($rs1);
        $image=$row1['url'];
         echo "<img src='./$image' height='300' width='300'/><br>";
        }
     $query2= "select * from info where id=$id";
     $rs=  mysql_query($query2);
     $count=  mysql_num_rows($rs);
     if($count==0)
            {?>
                 <strong> Works at: </strong><br><br>
           <strong> Studies at: </strong><br><br>
            <strong> Studied at: </strong><br><br>
            <strong> lives at: </strong><br><br>
           <strong> Relationship status: </strong><br><br>
           <strong> From: </strong><br><br>
            <?php 
            
            }
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
             <input type="search" id="srch" />
        <div id="searchbox">
            
        </div>
             
             <a href="message.php?idf=<?php echo $id ?>">Message</a>
             
          <?php 
         
          if(!isset($_SESSION['login']))
        {
            header('location:loginpage.php');
        }
          $id1=$_SESSION["rid"];
          $query3="select status from friend where friend1=$id1 and friend2=$id";
          $rs2=  mysql_query($query3);
          $row3=  mysql_fetch_array($rs2);
          $request= $row3['status'];
                   if($request=="")
                    {
                               
?>
             <input id="friend" type="submit" value="Add friend"/>
             <?php
                 }
             else if($request=='pending')
             {?>
                 <input id="cancel" type="submit" value="Cancel request"/>
             <?php
             
             }
             else
             {
                 echo "Friends";
             }
             ?>
            
<?php
}
 ?>
 <script src="jquery-1.11.1.js" type="text/javascript"></script>
<script>
           $(document).ready(function(){
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
               $("#friend").click(function(){
                  // alert(1);
                  $.ajax({
                      
                      url:"friend.php",
                      data: {idf:<?php echo $id ?>},
                      type:'post',
                      success: function(data1)
                        {
                            $("#friend").val(data1);
                            $("#friend").type('disable');
                        }
                  
                  }); 
               });
               $("#cancel").click(function(){
                  
                  $.ajax({
                      
                      url:"cancel.php",
                      data: {idfriend:<?php echo $id ?>},
                      type:'post',
                      success: function(data1)
                        {
                            $("#cancel").val(data1);
                           
                        }
                  
                  }); 
               });
                
           });
            
</script>
 

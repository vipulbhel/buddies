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
$idr=$_REQUEST['idf'];

$query="select * from msg where sender=$ids or $idr and reciver=$idr or $ids";
$rs=  mysql_query($query);
$count=  mysql_num_rows($rs);
if($count==0)
{
    ?>
<div id="message">
    
</div>
        <input id="textmsg" type="text" height="50px"/>
        <input id="send" type="submit" value="send"/>
        
        <?php
}
else
{
    
}
?>
        
<script src="jquery-1.11.1.js" type="text/javascript"></script>
      <script> 
       $(document).ready(function(){
           $("#send").click(function(){
                  
                  $.ajax({
                      
                      url:"send.php",
                      data: {idr:<?php echo $idr?>,textmsg:$("#textmsg").val()},
                      type:'post',
                      success: function(data1)
                        {
                            $("#message").html(data1);
                        }
                  
                  }); 
               });
       });
      </script>

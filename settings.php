<?
include 'class.php';
date_default_timezone_set('Asia/kolkata');

if(empty($_SESSION["name"]))
	{
		echo '<script>window.location="users.php";</script>';
	}
$frnd=$_GET['talk'];
$dat=date("g:i:s");
$db=new database();
$db->connect();
if(isset($_GET['status']))
	{
		$s=$_GET['status'];
		database::query("Update login Set st=$s Where  name='".$_SESSION["name"]."'");
		if($s=='0')
		{
				database::query("Update login Set status='ON' Where  name='".$_SESSION["name"]."'");
				database::query("Update login Set status='OFF' Where  name='".$_SESSION["name"]."'");
		}
		else
		{
			database::query("Update login Set status='ON' Where  name='".$_SESSION["name"]."'");
		}
		$_SESSION["status"]=$s;
	}
	
if($_SESSION["status"]=='1')
{
database::query("Update login Set status='OFF' Where  name='".$_SESSION["name"]."'");
database::query("Update login Set status='ON' Where  name='".$_SESSION["name"]."'");
}
?>
<title>Talk To Me</title>
<link rel="stylesheet" type="text/css" href="wall.css.php?bgcolor=<?php echo $_SESSION["bgcolor"]?>"  media="screen" />
        
<div id="container">

<div class="middle">
<font size="3" color="orange">Welcome <? echo $_SESSION["name"]; ?>!!</font>
<div class="r" style="float:right;"> 
<a href="logout.php"><img src="logout.png"  align="right" width="25" height="25" alt="logout" title="logout"/></a> &nbsp;&nbsp;&nbsp;
<? if(!(empty($frnd))) echo '<a href="indes.php?talk='.$frnd.'"><img src="chat1.png"  align="right" width="25" height="25" alt="chat" title="chat"/></a>'; ?> &nbsp;&nbsp;&nbsp;
<a href="users.php?talk=<? echo $frnd?>"><img src="friends.png"  align="right" width="30" height="25" alt="friends list" title="Friends list"/></a> 
</div>
</div>

<br> <br>
<div style="background-color:rgb(174,122,219); border-radius:8px; a:link{color:grey;}; a:hover{color:green;}; ">
<center>
<h2>SETTINGS: <img src="settings.png"  align="" width="45" height="45" alt="settings" title="settings"/></h2>
</center>
<font face="tahoma" color="green">
<br><br>
<ul type="square">
	<li><a href="pwdchng.php?talk=<? echo $frnd?>">CHANGE PASSWORD</a><br><br>
	<li><a href="bgchng.php?talk=<? echo $frnd?>">CHANGE THEME</a><br><br>
	<li><a href="<? if($_SESSION["device"]=='computer') echo 'profile_pic'; else echo 'm_profile_pic'; ?>.php?talk=<? echo $frnd?>" target="_blank">CHANGE PROFILE PIC</a><br><br>
	<li><a href="settings.php?talk=<? echo $frnd?>&status=<? if($_SESSION["status"]=='1') echo '0'; else echo '1'; ?> " ><? if($_SESSION["status"]=='1') echo 'GO OFFLINE'; else echo 'GO ONLINE'; ?> </a><br><br>
	<li><a href="unsend.php?talk=<? echo $frnd?>" >UNSEND OPTIONS</a>

</ul>
<br><br>
</div>    
</div>
 
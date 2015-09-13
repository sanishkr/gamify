<?
$frnd=$_GET['talk'];
include 'functions.php';
$function=new main();
if(isset($_POST["login"]))
{
 //$a[1]=$_POST["oldpassword"]; 
 $a=$_POST["newunsend"];
 if($a!="")
 {
	$res=$function->chngunsend($a);
	
	if($res==1)
	{
		
		echo '<script> alert("Settings changed successfully."); window.location="settings.php?talk='.$frnd.'" </script>';
	}
	else
	{
		echo '<script>alert("Choose a different Option.");</script>';
	}
 }
 else
 {
	 echo '<script>alert("Please select an option.");</script>';
 }
}

?> 

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<title>Change profile picture</title>
	<link rel="stylesheet" type="text/css" href="wall.css.php?bgcolor=<?php echo $_SESSION["bgcolor"]?>"  media="screen" />
	 <!--link href="style.css" rel="stylesheet" type="text/css" /-->
	
</head>
<body>
<div id="container">
<div class="r" style="float:right;"> 
<a href="logout.php"><img src="logout.png"  align="right" width="25" height="25" alt="logout" title="logout"/></a> &nbsp;&nbsp;&nbsp;
 <a href="settings.php?talk=<? echo $frnd?>"><img src="settings.png"  align="right" width="25" height="25" alt="settings" title="settings"/></a>&nbsp;&nbsp;&nbsp;
<? if(!(empty($frnd))) echo '<a href="indes.php?talk='.$frnd.'"><img src="chat1.png"  align="right" width="25" height="25" alt="chat" title="chat"/></a>'; ?> &nbsp;&nbsp;&nbsp;
<a href="notif.php?talk=<? echo $frnd?>"><img src="notif.png"  align="right" width="25" height="25" alt="Notifications" title="Notifications"/></a>&nbsp;&nbsp;&nbsp;
<a href="users.php?talk=<? echo $frnd?>"><img src="friends.png"  align="right" width="30" height="25" alt="friends list" title="Friends list"/></a> 
</div>
<br><br>
<div style="background-color:rgb(174,122,219); border-radius:8px; a:link{color:grey;}; a:hover{color:green;}; ">
<h3 align=center>Unsend Options:</h3>
<br>  Dear <b><? echo $_SESSION['name'] ?></b>,
	<form action="" method="post" id="sign">
    <label class="lab">Choose a time duration for which your Unsend Button will be active after every new message you will send: </label>&nbsp;&nbsp;&nbsp;
    <br>
	<div style="float:right;">
	<select id="unsend" name="newunsend">
		<option value="0">Unset</option>
		<option value="10">10 Seconds</option>
		<option value="20">20 Seconds</option>
		<option value="30">30 Seconds</option>
	</select>
	</div><br><br>
    <div class="flt" style="float:right;"><br/>
    	<input name="login" type="submit" value="Save"  class="but" id="lg"/>   
    </div>
   </form>
</div>
<br><br>
 &copy; 2014 &raquo; An SNS Production
</div>
<? 
//	include 'class.php';
$frnd=$_GET['talk'];

include 'functions.php';
$function=new main();
if(isset($_POST["login"]))
{
 $a[1]=$_POST["oldpassword"]; 
 $a[2]=$_POST["newpassword"];
 if($a[1]!="" && $a[2]!="")
 {
	$res=$function->chngpwd($a[1],$a[2]);
	
	if($res==1)
	{
		
		echo '<script> alert("Password changed successfully."); window.location="settings.php"; </script>';
	}
	else
	{
		echo '<script>alert("Old password does not match.");</script>';
	}
 }
 else
 {
	 echo '<script>alert("Please fill both the fields.");</script>';
 }
} 

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Change Password</title>
<link href="style.css" rel="stylesheet" type="text/css" />
<script src="jquery-latest.js"></script>
</head>
<body>

<div class="r" style="float:right;"> 
<a href="logout.php"><img src="logout.png"  align="right" width="25" height="25" alt="logout" title="logout"/></a> &nbsp;&nbsp;&nbsp;
 <a href="settings.php?talk=<? echo $frnd?>"><img src="settings.png"  align="right" width="25" height="25" alt="settings" title="settings"/></a>&nbsp;&nbsp;&nbsp;
<? if(!(empty($frnd))) echo '<a href="indes.php?talk='.$frnd.'"><img src="chat1.png"  align="right" width="25" height="25" alt="chat" title="chat"/></a>'; ?> &nbsp;&nbsp;&nbsp;
<a href="notif.php?talk=<? echo $frnd?>"><img src="notif.png"  align="right" width="25" height="25" alt="Notifications" title="Notifications"/></a>&nbsp;&nbsp;&nbsp;
<a href="users.php?talk=<? echo $frnd?>"><img src="friends.png"  align="right" width="30" height="25" alt="friends list" title="Friends list"/></a> 
</div>

<br><br><br>
<br><br>
<div class="middle">
<div class="log" id="logi" align="center">
<br>
<font face="comic sans ms" size="3" color="plum"><b>PASSWORD CHANGE: </b></font> 
<br><br>
</div>
<div class="midd">
  <form action="" method="post" id="sign">
    <label class="lab"><font size="1">Old<br>Password: </font></label>
    <input name="oldpassword" type="password"  placdeholder="old password " class="inpu" autocomplete="off"/><br /><br />
    <label class="lab"><font size="1">New<br>Password: </font></label>
    <input name="newpassword" type="password"  placdeholder="new password" class="inpu"/><br /><br />
    <div class="flt"><br/>
    	<input name="login" type="submit" value="Change Password"  class="but" id="lg"/>   
    </div>
   </form>
</div>

</div>

</body>
</html>
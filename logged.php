<?
include 'class.php';

if(empty($_SESSION["name"]))
	{
		if($_SESSION["device"]=="computer")
		echo '<script>window.location="inde.php";</script>';
		else
		echo '<script>window.location="form.php";</script>';
	}

else
?>
<title>Talk To Me</title>
<meta http-equiv="refresh"  content="30">
<link rel="stylesheet" type="text/css" href="wall.css.php?bgcolor=<?php echo $_SESSION["bgcolor"]?>"  media="screen" />
<!--script type="text/javascript" src="jquery-latest.js"></script-->
<div id="container">

<div class="middle">
<font size="3" color="orange">Welcome <? echo $_SESSION["name"]; ?>!!</font>
<div class="r" style="float:right;"> 
<a href="logout.php"><img src="logout.png"  align="right" width="25" height="25" alt="logout" title="logout"/></a>&nbsp;&nbsp;&nbsp;
</div>
</div>
<?
	echo '<br><br><br><br><br>You have successfully logged in your ';
	echo $_SESSION["device"];
	

$dat=date("g:i:s");
$db=new database();
$db->connect();
?>
<br><br>
<center>
<? if($_SESSION["device"]!='computer') echo '
<a href="notif.php" ><img src="notif.png"   width="25" height="25" alt="Notifications" title="Notifications"/></a>&nbsp;&nbsp;&nbsp;
<a href="users.php"><img src="friends.png"   width="30" height="25" alt="friends list" title="Friends list"/></a> &nbsp;&nbsp;&nbsp;
<a href="settings.php "><img src="settings.png"   width="25" height="25" alt="settings" title="settings"/></a>&nbsp;&nbsp;&nbsp;';
?>

</center><br><br><br>
To know the codes of newly added special smileys(other than basic ones)	<a href="smiley.php">click here</a>
</div>

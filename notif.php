<? 
 include 'class.php';
date_default_timezone_set('Asia/kolkata');
$frnd=$_GET['talk'];
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="wall.css.php?bgcolor=<?php echo $_SESSION["bgcolor"]?>"  media="screen" />
<meta http-equiv="refresh"  content="50">
<script type="text/javascript" src="jquery-latest.js"></script>
<script type="text/javascript" src="sound-mouseover.js"> </script>
<style>
a:link {text-decoration:none; color:blue;} 
a:hover{color:#ffffff; text-decoration:underline;}
</style>
	</head>
<body>
	<center>
    	
	<?
if(empty($_SESSION["name"]))
	{
		echo '<br><br><br><br><br>You are not logged in.<br> We cant load your new notifications.'; exit();
	}

$dat=date("g:i:s");
$db=new database();
$db->connect();
if($_SESSION["status"]=='1')
{
database::query("Update login Set status='OFF' Where  name='".$_SESSION["name"]."'");
database::query("Update login Set status='ON' Where  name='".$_SESSION["name"]."'");
}
?>
<div style="left-border:50px; width=200px;" id="container">
<div class="middle">
<div style="float:left;"><font size="3" color="orange">Welcome <? echo $_SESSION['name']; ?>!!</font></div>
<div class="r" style="float:right;"> <a href="logout.php"><img src="logout.png"  align="right" width="25" height="25" alt="logout" title="logout"/></a></div>&nbsp;&nbsp;&nbsp;
<? if(!(empty($frnd))) echo '<a href="indes.php?talk='.$frnd.'"><img src="chat1.png"  align="right" width="25" height="25" alt="chat" title="chat"/></a>'; ?> &nbsp;&nbsp;&nbsp;
<a href="users.php?talk=<? echo $frnd?>"><img src="friends.png"  align="right" width="25" height="25" alt="friends" title="friends"/></a>
 </div><br><br>
<font color="#FFFFFF">Notifications
<img src="notif.png"  width="80" height="80" alt="Notifications" title="Notifications"/>
<hr color="#FFFFFF" height="10px">
<br>  
<?
$id=$_SESSION["uid"];
$sql=database::query("select tid from message where id1='".$id."' or id2='".$id."'");
$i=0; $m=0;
$msg=array();
	while($row = mysql_fetch_assoc($sql))
	{
		
		$msg[]='messages'.$row['tid'];
		//$sel2=database::query("select * from $msg[$i] where uid_fk='".$id."'". "ORDER BY `msg_id` DESC LIMIT 0, 30 ");
		$sql1 = database::query("select * from $msg[$i] where uid_fk='".$id."' ORDER BY `msg_id` DESC LIMIT 0, 30");
		$tab= mysql_fetch_assoc(database::query("select * from $msg[$i]   where uid_fk!='".$id."' ORDER BY `msg_id` DESC LIMIT 1"));
		if($tab['seen']==NULL&&!empty($tab['message']))
		{
		$stl= mysql_fetch_assoc(database::query("select * from login where uid='".$tab['uid_fk']."'"));
		$tm=date('Y-m-d H:i:s');
		if($stl['status']=='ON'&&(strtotime($tm)-strtotime($stl['last_activity']))<19920) $col='lime'; else $col='blue'; 
		echo '<div  align="left"><a style="color:'.$col.';" href="indes.php?talk='.$tab['uid_fk'].'"><strong style="text-transform:uppercase;">'.$stl['name'].' : </strong></a> <font color="#BDBCDB">'.$tab['created'].'</font><br><font color="black">';
		if(strlen($tab['message'])>10)
			{$tab['message']= substr($tab['message'],0,10);
			$tab['message']=$tab['message'].'...';}
		echo $tab['message']."</font></div><embed height=0 width=0 src=dedication1.mp3><script> playclip(\'dedication\'); </script><br><br>";
		//echo $msg[$i++].'<br>';
		$m++;
		}
		$i++;
	}
	/*$spl= mysql_fetch_assoc(database::query("select notif from login where uid='".$_SESSION["name"]."'"));
	if($m>$spl['notif'])
		{
		database::query("Update login Set notif=$m Where  name='".$_SESSION["name"]."'");
		 echo $m.'<embed height=0 width=0 src=dedication.mp3>';
		}*/
		
?>

</font>
</div>

<script type="text/javascript" >
function playclip(clip) {
var audio = document.getElementById(clip);
audio.play();
} </script>
<audio id="dedication" src="dedication.mp3" preload="auto"></audio>
<audio id="click1" src="click1.mp3" preload="auto"></audio>
</body>
</html>
	
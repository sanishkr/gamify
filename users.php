<? 
 include 'class.php';
$frnd=$_GET['talk'];
	
?>
<title>Talk To Me</title>
<link rel="stylesheet" type="text/css" href="wall.css.php?bgcolor=<?php echo $_SESSION["bgcolor"]?>"  media="screen" />
<meta http-equiv="refresh"  content="<? if($_SESSION["device"]=='computer') echo '4'; elseif($_SESSION["device"]=='tablet') echo '15'; elseif($_SESSION["device"]=='phone') echo '30'; else echo '300'; ?> ">
<!--script type="text/javascript" src="jquery-latest.js"></script--->
<style>
a:link{color:#ccccdd; text-transform:uppercase;}
a:visited{color:#ccccdd;}
a:hover{color:#ffffff;}
</style>
	<center>
    	
	<?
if(empty($_SESSION["name"]))
	{
		echo '<br><br><br><br><br>You are not logged in.<br> We cant load Friends list.'; exit();
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
<a href="notif.php?talk=<? echo $frnd?>" align=right style="float:right;"><img src="notif.png"  align="right" width="25" height="25" alt="Notifications" title="Notifications"/></a>
 </div><br><br>
<font color="#FFFFFF">FRIEND's LIST<hr color="#FFFFFF" height="10px">
<br>  

<?php
	if($_SESSION['name']=='salty')
	{
	$sql = $db->query("SELECT `uid`, `name`, `status`,`last_activity`,`st` FROM `login` WHERE name=\"meoow\" ");
	}
	elseif($_SESSION['name']=='meoow')
	{
	$sql = $db->query("SELECT `uid`, `name`, `status`,`last_activity`,`st` FROM `login` WHERE name=\"salty\" ");
	}
	else
	{
	$sql = $db->query("SELECT `uid`, `name`, `status`,`last_activity`,`st` FROM `login` WHERE name!=\"meoow\" AND name!=\"salty\" ". "ORDER BY `login`.`name` ASC LIMIT 0, 30 ");
	}
	while($row = mysql_fetch_array($sql))
	{ 
		$tm=date('Y-m-d H:i:s');
		if($_SESSION['uid']!=$row{'uid'})
		{
		
			if($_SESSION['name']=='salty'&&$row{'name'}=='meoow')
	?>
        <div style="float:right;"><img src="<?php if (file_exists("profile_pic/".$row{'name'}.".jpg")) echo "profile_pic/".$row{'name'}; else echo 'deflt'; ?>.jpg"  width="35" height="35" style="border-radius:4px;"/>
        </div>
        &nbsp;&nbsp; 
		<div style="float:left;color:#BDBCDB; font-weight: bold;cursor: pointer; hover:'text-decoration: underline';">
		<? if($row{'status'}=='ON'&&(strtotime($tm)-strtotime($row{'last_activity'}))<19920) echo '<div style="color:white; float:left;"> <li type=square> </div>'; ?>
		<a href="indes.php?talk=<? echo $row{'uid'};?> " style="text-transform:uppercase; text-decoration:none; color: <?php if($row{'status'}=='ON'&&(strtotime($tm)-strtotime($row{'last_activity'}))<19920) echo 'lime;'; else echo '#BDBCDB; hover{color:white;}'; ?>"> <?php echo $row{'name'}." &nbsp;&nbsp;&nbsp; ";  ?> </a>
		</div>
		<?php if($row{'st'}==1)
				{
				if((((strtotime($tm)-strtotime($row{'last_activity'}))-19800)>6&&((strtotime($tm)-strtotime($row{'last_activity'}))-19800)<60)) echo '<font size="1" style="text-transform:lowercase;" color="#BDBCDB">active '.round(((strtotime($tm)-strtotime($row{'last_activity'}))-19800)).' sec ago</font>'; 
				elseif((((strtotime($tm)-strtotime($row{'last_activity'}))-19800)>61&&((strtotime($tm)-strtotime($row{'last_activity'}))-19800)<3600)) echo '<font size="1" style="text-transform:lowercase;" color="#BDBCDB">active '.round(((strtotime($tm)-strtotime($row{'last_activity'}))-19800)/60).' minutes ago</font>'; 
				elseif(((strtotime($tm)-strtotime($row{'last_activity'}))-19800)>3600&&round(((strtotime($tm)-strtotime($row{'last_activity'}))-19800)/3600)<24) echo '<font size="1" style="text-transform:lowercase;" color="#BDBCDB">active '.round(((strtotime($tm)-strtotime($row{'last_activity'}))-19800)/3600).' hours ago</font>';
				elseif((round(((strtotime($tm)-strtotime($row{'last_activity'}))-19800)/3600)>24&&round(((strtotime($tm)-strtotime($row{'last_activity'}))-19800)/(3600*24))<30)) echo '<font size="1" style="text-transform:lowercase;" color="#BDBCDB">active '.round(((strtotime($tm)-strtotime($row{'last_activity'}))-19800)/(3600*24)).' days ago</font>';
				}
				?>
		
	<hr> <br>
    <?php } } ?>
	
	</div>
	</center>
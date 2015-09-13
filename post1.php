<?
include 'class.php';
date_default_timezone_set('Asia/kolkata');

if(empty($_SESSION["name"]))
	{
		echo 'You have logged out.<br> We cant load messages.'; exit();
	}
$messages=$_GET['tid'];
$dat=date("g:i:s");
$db=new database();
$db->connect();
if($_SESSION["status"]=='1')
{
database::query("Update login Set status='OFF' Where  name='".$_SESSION["name"]."'");
database::query("Update login Set status='ON' Where  name='".$_SESSION["name"]."'");
}
$id=str_replace("messages","",$messages);
$sel2=database::query("select * from message where tid='".$id."'");
$row2 = mysql_fetch_assoc($sel2);
if(!($_SESSION["uid"]==$row2['id1']|$_SESSION["uid"]==$row2['id2']))
	{
	echo 'jyada dimag mat laga.... chal bhag yahan se..';
	exit();
	}
?>
<? if($_SESSION["device"]=='computer') echo '<link rel="stylesheet" href="hover-lib.css">'; ?>
<link rel="stylesheet" type="text/css" href="wall.css.php?bgcolor=<?php echo $_SESSION["bgcolor"]?>"  media="screen" />
<meta http-equiv="refresh"  content="<? if($_SESSION["device"]=='computer') echo '59'; elseif($_SESSION["device"]=='tablet') echo '75'; elseif($_SESSION["device"]=='phone') echo '110'; else echo '500'; ?> ">
<!--script type="text/javascript" src="jquery-latest.js"></script-->
        
<style>
input[type=submit]
{
background:url(delete.png);
border:0;
display:block;
height:15px;
width:15px;
cursor:pointer;
color:transparent;
}
</style>
		<a href="post1.php?tid=<? echo $messages.'&del=1'; ?>" style=" float:right; cursor:pointer; " title="Delete all messages">
			<? if($_GET['del']=='1') {
			echo '<img src="loader.gif" alt="ALL MESSAGES DELETED" title="Please wait..">';
			}
			else echo '<img src=delete1.png  height=30 width=45  alt="Delete all messages">'; ?> 
		</a>
<br><br>
<div id="container">
<!--- <div id="viewpost"> --->
    <? 
	$queyr=$db->query("select * from $messages as m join login as l on m.uid_fk=l.uid  ORDER BY `msg_id` DESC");
	$quw=$db->query("select * from login where name='".$_SESSION["name"]."'");
	$qu=$db->fetch($quw);
	$tab1= mysql_fetch_assoc(database::query("select * from $messages  where uid_fk='".$_SESSION["uid"]."' ORDER BY `msg_id` DESC LIMIT 1"));
		if( $tab1['seen']!=NULL)
		{
			echo '<div><font size=1 color="#BDBCDB" style="float:right;">&#10004; seen on '.date('F j, g:i:s a',(strtotime($tab1['seen']))+19800).'</font></div><br>';
		}
	while($query=$db->fetch($queyr))
	{
	$tm=date('Y-m-d H:i:s');
	
	
	$tab= mysql_fetch_assoc(database::query("select * from $messages  where uid_fk!='".$_SESSION["uid"]."' ORDER BY `msg_id` DESC LIMIT 1"));
		if( $tab['seen']==NULL)
		{
			database::query("Update $messages Set seen=now() Where msg_id='".$tab['msg_id']."'");
		}
	$sel=database::query("select * from login where name='".$query[name]."'");
	$row = mysql_fetch_assoc($sel);
	$u='s'.$_SESSION["uid"];
			
		if(isset($_GET["del"]))
		{
	$id=$query["msg_id"];
	database::query("Update $messages Set $u='0' Where msg_id='".$id."'");
		}
		
	if($query[$u]=='1')
	{
	?>
    <div id="display">    
    	<div id="leftdisplay">
        <img src="<?if(file_exists("profile_pic/".$query[name].".jpg")) echo "profile_pic/".$query[name]; else echo "deflt";?>.jpg"  width="35" height="35" style="border-radius:4px;"/>
        </div>
        &nbsp;&nbsp;<label class="headname"><font style="color: <?  if($row{'status'}=='ON'&&(strtotime($tm)-strtotime($row{'last_activity'}))<19920) echo 'lime;'; else '#BDBCDB'; ?>"> <? echo $query[name];?></font></label>
		&nbsp;&nbsp;&nbsp;<label style="float:righ;"><? echo $query[created]; ?></label>
		
        <br />
<?
if($_SESSION["device"]=='computer')
echo '
        <form method="post" action="">
		<div align="right">	<input type="submit" name="msgid" value="'.$query["msg_id"].'" title="Delete">
		</div>
		</form>';
?>
		<?
		if(isset($_POST["msgid"]))
		{
	$id=$_POST["msgid"];
	database::query("Update $messages Set $u='0' Where msg_id='".$id."'");
	echo "<script>alert('message deleted');</script>";
		}
		?>        
        <div id="rightdisplay">            
        	<p class="triangle-border left">
<? 
$symbol[0]=':P';
$symbol[1]=':-P';
$symbol[2]=':p';
$symbol[3]=':-p';
$symbol[4]=':)';
$symbol[5]=':-)';
$symbol[6]=':o';
$symbol[7]=':-o';
$symbol[8]=':O';
$symbol[9]=':-O';
$symbol[10]=':(';
$symbol[11]=':-(';
$symbol[12]=':s';
$symbol[13]=':-s';
$symbol[14]=':-S';
$symbol[15]=':S';
$symbol[16]=':-*';
$symbol[17]=':*';
$symbol[18]=':d';
$symbol[19]=':-D';
$symbol[20]=':-d';
$symbol[21]=':D';
$symbol[22]=';-)';
$symbol[23]=';)';
$symbol[24]='[cry]';
$symbol[25]='[peng:cry]';
$symbol[26]='[sleep]';
$symbol[27]='[tongue]';
$symbol[28]='[no]';
$symbol[29]='[tongue:cat]';
$symbol[30]='[banana]';
$symbol[31]='[bigbanana]';
$symbol[32]='[1eyetong]';
$symbol[33]='[hi]';
$symbol[34]='[welcome]';
$symbol[35]='[sorry]';
$symbol[36]='[dog:no]';
$symbol[37]='[bored]';
$symbol[38]='[surprise]';
$symbol[39]='[think]';
$symbol[40]='[thinking]';
$symbol[41]='[cake]';
$symbol[42]='[flowers]';
$symbol[43]='[date]';
$symbol[44]='[we:2]';
$symbol[45]='[yawn:gn]';
$symbol[46]='[idea]';
$symbol[47]='[help]';
$symbol[48]='[sing]';
$symbol[49]='[hbd]';
$symbol[50]='[HBD]';
$symbol[51]='[gudluck]';
$smiley[0]=' <img src=smileys/2.gif>';
$smiley[1]=' <img src=smileys/2.gif>';
$smiley[2]=' <img src=smileys/2.gif>';
$smiley[3]=' <img src=smileys/2.gif>';
$smiley[4]=' <img src=smileys/0.gif>';
$smiley[5]=' <img src=smileys/0.gif>';
$smiley[6]=' <img src=smileys/5.gif>';
$smiley[7]=' <img src=smileys/5.gif>';
$smiley[8]=' <img src=smileys/5.gif>';
$smiley[9]=' <img src=smileys/5.gif>';
$smiley[10]=' <img src=smileys/1.gif>';
$smiley[11]=' <img src=smileys/1.gif>';
$smiley[12]=' <img src=smileys/4.gif>';
$smiley[13]=' <img src=smileys/4.gif>';
$smiley[14]=' <img src=smileys/4.gif>';
$smiley[15]=' <img src=smileys/4.gif>';
$smiley[16]=' <img src=smileys/9.gif>';
$smiley[17]=' <img src=smileys/9.gif>';
$smiley[18]=' <img src=smileys/3.gif>';
$smiley[19]=' <img src=smileys/3.gif>';
$smiley[20]=' <img src=smileys/3.gif>';
$smiley[21]=' <img src=smileys/3.gif>';
$smiley[22]=' <img src=smileys/10.gif>';
$smiley[23]=' <img src=smileys/10.gif>';
$smiley[24]=' <img src=smileys/11.gif>';
$smiley[25]=' <img src=smileys/12.gif>';
$smiley[26]=' <img src=smileys/16.gif>';
$smiley[27]=' <img src=smileys/23.gif>';
$smiley[28]=' <img src=smileys/22.gif>';
$smiley[29]=' <img src=smileys/26.gif>';
$smiley[30]=' <img src=smileys/15.gif>';
$smiley[31]=' <img src=smileys/14.gif>';
$smiley[32]=' <img src=smileys/17.gif>';
$smiley[33]='<img src="smileys/34.gif">';
$smiley[34]='<img src="smileys/38.gif">';
$smiley[35]='<img src="smileys/39.gif">';
$smiley[36]='<img src="smileys/43.gif">';
$smiley[37]='<img src="smileys/42.gif">';
$smiley[38]='<img src="smileys/37.gif">';
$smiley[39]='<img src="smileys/31.gif">';
$smiley[40]='<img src="smileys/32.gif">';
$smiley[41]='<img src="smileys/24.gif">';
$smiley[42]='<img src="smileys/25.gif">';
$smiley[43]='<img src="smileys/41.gif">';
$smiley[44]='<img src="smileys/30.gif">';
$smiley[45]='<img src="smileys/29.gif">';
$smiley[46]='<img src="smileys/33.gif">';
$smiley[47]='<img src="smileys/28.gif">';
$smiley[48]='<img src="smileys/27.gif">';
$smiley[49]='<img src="smileys/35.gif">';
$smiley[50]='<img src="smileys/36.gif">';
$smiley[51]='<img src="smileys/44.gif">';
$query["message"]=str_replace($symbol,$smiley,$query["message"]);
echo $query["message"];
?>                

				</p> 
			</div>
        </br>
    </div>
    <div style="height:100px;"></div>
    <!--- <div style=" border:1px dashed #4e4;"></div>--->
    <br />
    <? }
	} ?>   
	</div>
<?
if($_SESSION["device"]=='computer')
echo '
	<!--   after the closing body tag import jquery.js   -->
  <script type="text/javascript" src="jquery1.js"></script>   
  <!--   after the closing body tag import hover-lib.js   -->
  <script type="text/javascript" src="hover-lib.js"></script></html>';
  ?>

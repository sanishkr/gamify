<style>
.cursor{cursor: pointer; color:#3b5997;}
.cursor:hover{ text-decoration:underline;}
</style>
<?
include 'class.php';
$dat=date("F j, g:i:s a");
$db=new database();
$db->connect();
//database::query("Update login Set status='ON' Where  name='".$_SESSION["name"]."'");
$messages=$_GET['tid'];

$m=str_replace("messages","",$messages);
$bl=database::query("select * from message where tid='".$m."'");
$blrow = mysql_fetch_assoc($bl);
$b=$blrow['block'];
$bid=$blrow['blocker_id'];
if($b=='0')
{
if($bid==$_SESSION["uid"])
{echo "<script>alert('You must first unblock the user to send a message.');</script>";}
else
{echo "<script>alert('You do not have permission to send a message right now.');</script>";}
exit();
}

	 	if(isset($_REQUEST["fbwall"]))
{
	$wall= trim(mysql_real_escape_string($_REQUEST["fbwall"]));
	$ui=$db->query("select * from login where name='".$_SESSION["name"]."'");
	$uidd=$db->fetch($ui);
	$insert=$db->query("INSERT INTO $messages (message,uid_fk,created) VALUES ('$wall','".$uidd[uid]."','$dat')");
	if($insert)
	{
		$select=$db->query("select * from $messages as m join login as l on m.uid_fk=l.uid  ORDER BY `msg_id` DESC");
		while($view=$db->fetch($select))
		{?>
             <div id="display">
                <div id="leftdisplay">
                	<img src="arun.jpg"  width="35" height="35"/>				</div><br/><br/><br/><br/>
                <div id="rightdisplay">
                    <p class="triangle-border left">
                        <? echo $query["name"].':'.$view["message"];?>
                    </p>
                </div>
            </div>
            <div style="height:200px;"></div> 
		<? }
	}
}
if(isset($_REQUEST["user"])&&isset($_REQUEST["msg"]))
{
	$userid=$_REQUEST["user"];
	$msgid=$_REQUEST["msg"];
	$db->query("insert into message_like (msg_id_fk,uid_fk) VALUES ($msgid,$userid)");
	$lico=$db->query("select like_count from messages where msg_id='$msgid'");
	$coun=$db->fetch($lico);
	$cou=$coun[like_count]+1;
	$db->query("UPDATE `messages` SET `like_count` = '$cou' WHERE `msg_id`='$msgid'; ");
	$licoi=$db->query("select like_count from messages where msg_id='$msgid'");
	$couni=$db->fetch($licoi);
	
	$cn=$couni[like_count]-1;
	if($cn>0)
	{
	echo '&nbsp; &nbsp; &nbsp; you and '.$cn.' others like this';
	}
	elseif($cn==0)
	{
		
			echo "&nbsp; &nbsp; &nbsp; you Like this ";
		
	}
	$licoi=$db->query("select * from messages as m join login as l where  m.uid_fk=l.uid and m.msg_id='$msgid'");
	$query=$db->fetch($licoi);
	$licoi=$db->query("select * from login where name='".$_SESSION["name"]."'");
	$qu=$db->fetch($licoi);
	?>
<p>&nbsp; &nbsp; &nbsp;<a  class="cursor"  onclick="return unlikecount(<?php echo $qu[uid]; ?>,<?php echo $query[msg_id]; ?>);">Unlike</a></p>
<?
}




if(isset($_REQUEST["users"])&&isset($_REQUEST["msgs"]))
{
	$userid=$_REQUEST["users"];
	$msgid=$_REQUEST["msgs"];	 	
	$lico=$db->query("select like_count from messages where msg_id='$msgid'");
	$coun=$db->fetch($lico);
	$cou=$coun[like_count]-1;
	$db->query("UPDATE `messages` SET `like_count` = '$cou' WHERE `msg_id`='$msgid'; ");
	$db->query("delete from message_like where msg_id_fk='$msgid' and uid_fk='$userid'");
	/*$licoi=$db->query("select *  from login as log join messages as msg on log.uid=msg.uid_fk join message_like as ml on ml.msg_id_fk=msg.msg_id where msg.msg_id='$msgid' ");*/
	$licoi=$db->query("select * from login as log join message_like as ml on log.uid=ml.uid_fk join messages as msg where ml.msg_id_fk='$msgid' and msg.msg_id='$msgid'");
	$query=$db->fetch($licoi);
	$cnn=$query[like_count]-1;
	if($cnn>0)
	{
		echo '&nbsp; &nbsp; &nbsp;'.$query["name"].' and '.$cnn.' others like this';	
	}
	elseif($cnn==0)
	{
		echo '&nbsp; &nbsp; &nbsp;'.$chinnu[name].' like this';
	}
	$licoi=$db->query("select * from messages as m join login as l where  m.uid_fk=l.uid and m.msg_id='$msgid'");
	$query=$db->fetch($licoi);
	$licoi=$db->query("select * from login where name='".$_SESSION["name"]."'");
	$qu=$db->fetch($licoi);
	?>
	<p>&nbsp; &nbsp; &nbsp;<a class="cursor" onclick="return likecount(<?php echo $qu[uid]; ?>,<?php echo $query[msg_id]; ?>);">Like</a></p>
    <?
}
?>
<?php
include 'class.php';
date_default_timezone_set('Asia/kolkata');
$dat=date("F j, g:i:s a");
if(empty($_GET['talk']))
	{
		echo '<script>window.location="users.php";</script>';
	}
else
	$frnd=$_GET['talk'];
	
$messages=$_GET['tid'];
$db=new database();
$db->connect();
if($_SESSION["status"]=='1')
{
database::query("Update login Set status='OFF' Where  name='".$_SESSION["name"]."'");
database::query("Update login Set status='ON' Where  name='".$_SESSION["name"]."'");
}


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


$uploaddir = './uploads/'; 
$file = $uploaddir . basename($_FILES['uploadfile']['name']); 
$file=str_replace(" ","",$file);
$_FILES['uploadfile']['name']=str_replace(" ","",$_FILES['uploadfile']['name']);

$fileext=strtolower(substr(strrchr($_FILES['uploadfile']['name'],'.'),1));

if($fileext=='jpg'||$fileext=='jpeg'||$fileext=='png'||$fileext=='gif')
{
if (move_uploaded_file($_FILES['uploadfile']['tmp_name'], $file)) 
{ 
	$pic_info=getimagesize($file);
	$pic_wdth=$pic_info[0];
	$pic_ht=$pic_info[1];
	if($pic_ht>200)
		$pic_ht='200px';
	if($pic_wdth>200)
		$pic_wdth='180px';
	$wall='<a href=uploads/'.$_FILES['uploadfile']['name'].' title=Download target="_blank"><img src=uploads/'.$_FILES['uploadfile']['name'].' height='.$pic_ht.' width='.$pic_wdth.' ></a>';

	$ui=$db->query("select * from login where name='".$_SESSION["name"]."'");
	$uidd=$db->fetch($ui);
	$insert=$db->query("INSERT INTO $messages (message,uid_fk,created) VALUES ('$wall','".$uidd[uid]."','$dat')");
	echo '<script>alert("photo sent successfully.");</script>';
//if(($_SESSION["device"]=='computer')||($_SESSION["device"]=='tablet'))
{
echo '<script>window.location="indes.php?talk='.$frnd.'";</script>';
}
	} 
}
	else 
{
	echo "error: Please select a jpg, png, jpeg or gif type picture to upload.";
}

?>
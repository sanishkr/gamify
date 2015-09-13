<?
$frnd=$_GET['talk'];
$tname=$_GET['tid'];
include 'class.php';
date_default_timezone_set('Asia/kolkata');

if(empty($_SESSION["name"]))
	{
		echo '<script>window.location="inde.php";</script>';
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
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<title>Upload a Photo</title>
	<link rel="stylesheet" type="text/css" href="wall.css.php?bgcolor=<?php echo $_SESSION["bgcolor"]?>"  media="screen" />
	 <!--link href="style.css" rel="stylesheet" type="text/css" /-->
	
</head>
<body>
<div id="container">
<div class="r" style="float:right;"> 
<a href="logout.php"><img src="logout.png"  align="right" width="25" height="25" alt="logout" title="logout"/></a> &nbsp;&nbsp;&nbsp;
 <a href="indes.php?talk=<? echo $frnd?>"><img src="chat1.png"  align="right" width="25" height="25" alt="home" title="Home"/></a>&nbsp;&nbsp;&nbsp;
 </div>
<br><br>
<div style="background-color:rgb(174,122,219); border-radius:8px; a:link{color:grey;}; a:hover{color:green;}; ">
<center><br>
<br>Dear <? echo $_SESSION['name']; ?>
<h3>Choose a Photo to send :</h3>
</center>
	<form name="photo" enctype="multipart/form-data" action="<?php echo "upload-file.php?tid=".$tname; ?>&talk=<? echo $frnd?>" method="post">
	<input type="file" name="uploadfile" size="30" title="Upload an image" /> </br>
	<input type="submit" name="upload" value="Upload" />
	</form>
<br><br>
</div>
<br>
 &copy; 2014 &raquo; An SNS Production
</div>
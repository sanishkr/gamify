<?
$frnd=$_GET['talk'];
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
$upload_dir = "profile_pic"; 				// The directory for the images to be saved in
$upload_path = $upload_dir."/";				// The path to where the image will be saved
$image_name = $_SESSION["name"].".jpg"; 	// New name of the thumbnail image
$image_location=$upload_path.$image_name;
$max_file = "1148576"; 						// Approx 1MB
$width = "100";						// Width of image
$height = "100";						// Height of image
$fileext=substr(strrchr($_FILES['image']['name'],'.'),1);
	//Only process if the file is a JPG and below the allowed limit
	if((!empty($_FILES["image"])) && ($_FILES['image']['error'] == 0)) {
		if (($fileext!="jpg") || ($_FILES['image']['size']> $max_file)) {
			echo  "Error: ONLY jpeg images under 1MB are accepted for upload";
			exit();
		}
	}
	
		
	
if (isset($_FILES['image']['name'])){
			
			move_uploaded_file( $_FILES['image']['tmp_name'], $image_location);
			
		echo '<script>alert("Profile picture changed successfully."); window.location="settings.php?talk='.$frnd.'";</script>';
			
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
 <a href="index.php?talk=<? echo $frnd?>"><img src="home.png"  align="right" width="25" height="25" alt="home" title="Home"/></a>&nbsp;&nbsp;&nbsp;
 <a href="#" onclick="window.close();"><img src="close.png"  align="right" width="25" height="25" alt="Close window" title="Close Window"/></a>
 </div>
<br><br>
<div style="background-color:rgb(174,122,219); border-radius:8px; a:link{color:grey;}; a:hover{color:green;}; ">
<center><br>
<img src="<?if(file_exists("profile_pic/".$_SESSION['name'].".jpg")) echo "profile_pic/".$_SESSION['name']; else echo "deflt";?>.jpg"  width="55" height="55" style="border-radius:4px;"/>
<br><? echo $_SESSION['name']; ?>
<h3>Upload your profile picture:</h3>
</center>
	<form name="photo" enctype="multipart/form-data" action="<?php echo $_SERVER["PHP_SELF"];?>?talk=<? echo $frnd?>" method="post">
	<input type="file" name="image" size="30" title="Upload a jpg image < 1Mb" /> </br>
	<input type="submit" name="upload" value="Upload" />
	</form>
<br><br>
</div>
<br>
 &copy; 2014 &raquo; An SNS Production
</div>
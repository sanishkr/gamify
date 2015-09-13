<? 
$frnd=$_GET['talk'];

include 'functions.php';
$function=new main();
if(isset($_POST["login"]))
{
 //$a[1]=$_POST["oldpassword"]; 
 $a=$_POST["newbgcolor"];
 if($a!="")
 {
	$res=$function->chngbg($a);
	
	if($res==1)
	{
		
		echo '<script> alert("Background Color changed successfully."); window.location="settings.php?talk='.$frnd.'" </script>';
	}
	else
	{
		echo '<script>alert("Choose a different color.");</script>';
	}
 }
 else
 {
	 echo '<script>alert("Please select a color.");</script>';
 }
}

?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Change Background color</title>
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
<br><br>

<br><br>
<div>  <!--<img src="blo.png" />-->
 </div>
 <br>


<div class="middle">
<div class="log" id="logi" align="center">
<br>
<font face="comic sans ms" size="2" color="plum"><b>Change Background Color: </b></font> 
<br><br>
</div>
<br>

<div class="midd">
  <form action="" method="post" id="sign">
    <label class="lab">New_Color: </label>&nbsp;&nbsp;&nbsp;
    <div style="float:right;">
	<select id="bgcolor" name="newbgcolor">
		<option value="purple">default</option>
		<option value="yellow">yellow</option>
		<option value="green">green</option>
		<option value="salmon">salmon</option>
		<option value="grey">grey</option>
		<option value="skyblue">skyblue</option>
		<option value="hotpink">pink</option>
		<option value="brown">brown</option>
		<option value="red">red</option>
		<option value="maroon">maroon</option>
	</select>
	</div><br><br>
    <div class="flt" style="float:right;"><br/>
    	<input name="login" type="submit" value="Change"  class="but" id="lg"/>   
    </div>
   </form>
</div>

</div>

 


</body>
</html>
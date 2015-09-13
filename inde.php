<?
include 'functions.php';
$function=new main();
if(isset($_POST["login"]))
{
 $a[1]=$_POST["name"]; 
 $a[2]=$_POST["pass"];
 if($a[1]!="" && $a[2]!="")
 {
	$function->login($a[1],$a[2]);
	$fun=$_SESSION["name"];
	if($_SESSION["name"])
	{
		echo '<script>window.location="logged.php";</script>';
	}
	else
	{
		echo '<script>alert("incorrect username or password");</script>';
	}
 }
 else
 {
	 echo '<script>alert("please fill all the details");</script>';
 }
}
if(isset($_POST["reg"]))
{
 $a[1]=$_POST["name"]; 
 $a[]=$_POST["pass"];
 if($a[1]!="" && $a[2]!="")
 {	 
	 if($function->register($a[1],$a[2])>0)
	 {
		 echo '<script>alert("name already exist");</script>';
	 }
	 else
	 {
		 echo '<script>alert("Registered sucessfully");</script>';
	 }
 }
 else
 {
	 echo '<script>alert("please fill all the details");</script>';
 }
}
?> 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" href="favicon.ico" type="image/x-icon" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Talk To Me :TTM </title>
<link href="style.css" rel="stylesheet" type="text/css" />
<!--script src="jquery-latest.js"></script--->
</head>
<body>
<br>
<br><br><br><br>
<div class="middle">
<div class="log" id="logi">
<img src="<? if(isset($_COOKIE['uname'])) {if (file_exists("profile_pic/".$_COOKIE['uname'].".jpg")) echo "profile_pic/".$_COOKIE['uname'].".jpg"; else echo 'deflt.jpg';} else echo 'picture2.png'; ?>" width="50" height="50" alt="<? if(isset($_COOKIE['uname'])) echo $_COOKIE['uname']; else echo 'TTM'; ?>" />
<font style="float:right;" color=white size=4 >Talk To Me : TTM<br>
<font style="float:right;" color=lime  size=2>made by sns
</font>
</font>
</div>
<div class="midd">
  <form action="" method="post" id="sign">
    <label class="lab">Name</label>
    <input name="name" type="text"  class="inpu" value="<? if(isset($_COOKIE['uname'])) echo $_COOKIE['uname']; else '';?>"  autofocus="autofocus" autocomplete="off"/><br /><br />
    <label class="lab">Password</label>
    <input name="pass" type="password"   class="inpu"/><br /><br />
	<div class="flt">
	
    	<input name="login" style="float:right;" type="submit" value="Login"  class="but" id="lg"/>   
    
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   
	
   <input style="float:left;" name="reg" type="submit" value="Register"  class="but" id="clkhide"/>
   </div>
   </form>
</div>

</div>
</body>
</html>
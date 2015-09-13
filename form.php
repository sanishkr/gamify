<?
include 'functions.php';
$function=new main();

if($_SESSION["device"]=="computer")
		{
                echo '<script>window.location="index.php";</script>';
                exit();
                }
                
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

?> 

<html lang="en">
<head>
<title>Talk To Me :TTM </title>
<link rel="shortcut icon" href="favicon.ico" type="image/vnd.microsoft.icon">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link type="text/css" rel="stylesheet" href="install-prompt.css"> 
<link href="bootstrap.min.css" rel="stylesheet" type="text/css" />
  <link href="isvipi-install.css" rel="stylesheet" media="screen">
<script language="JavaScript" src="fallt.js"></script>
<link rel="stylesheet" href="css/style.css" type="text/css" media="screen" />
        
<!--link rel="dns-prefetch" href="http://talktome.me.pn/register.php"-->
<link rel="prerender" href="register.php">
<!--link rel="prefetch" href="http://talktome.me.pn/register.php"-->
</head>
<body style="width:100%;overflow-x:hidden;overflow-y:hidden">
  		
  <div class="row">
  <div class="panel panel-default">
  <div class="panel-heading">
  <img src="<? if(isset($_COOKIE['uname'])) {if (file_exists("profile_pic/".$_COOKIE['uname'].".jpg")) echo "profile_pic/".$_COOKIE['uname'].".jpg"; else echo 'deflt.jpg';} else echo 'picture2.png'; ?>" width="50" height="50" alt="<? if(isset($_COOKIE['uname'])) echo $_COOKIE['uname']; else echo 'TTM'; ?>" />&nbsp;&nbsp;
<font style="float:right;" color=skyblue size=4 >Talk To Me : TTM<br>
<font style="float:right;" color=lime  size=2><br>made by sns
</font>
</font>
</div>
  <div class="panel-body">
  <form role="form" action="" method="post">
  <div class="form-group">
    <label for="dbusername">Username</label>
    <input  name="name" type="text" value="<? if(isset($_COOKIE['uname'])) echo $_COOKIE['uname']; else '';?>" autocomplete="off" class="form-control" autofocus="autofocus" placeholder="username" required>
  </div>
  <div class="form-group">
    <label for="dbpassword">Password</label>
    <input  name="pass" type="password" class="form-control" placeholder="Password" required>
  </div>
  <input type="hidden" name="op" value="step1">
   <div style="float:right">
  <button   name="login" value="Login" class="myButton" type="submit" class="btn btn-default" >Login</button></div>
  <br><br><br><br><hr height="20px" color="purple">
</form>
  <div align="center"><a href="register.php">
  <button type="button" class="myButton" class="btn btn-default" >New Users Register here</button></a></div><br>
</div>
</div>

            <div class="footer-left">
			For slower connections 
			<a href="#" onclick="window.open('form.php','newwin','width=400 height=900');">click here</a>
			</div>
            <div class="footer-right">
                 &copy; 2014 <br>An SNS Production <br> All Rights Reserved
            </div>

</div>



</body>
</html>
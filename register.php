<?
include 'functions.php';
$function=new main();

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
		 echo '<script>window.location="form.php";</script>';
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
<link rel="icon" href="favicon.ico" type="image/x-icon" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link type="text/css" rel="stylesheet" href="install-prompt.css"> 
<link href="bootstrap.min.css" rel="stylesheet" type="text/css" />
  <link href="isvipi-install.css" rel="stylesheet" media="screen">
<script language="JavaScript" src="fallt.js"></script>
<link rel="stylesheet" href="css/style.css" type="text/css" media="screen" />
        
<!--link rel="dns-prefetch" href="http://talktome.me.pn/form.php"-->
<!--link rel="prerender" href="http://talktome.me.pn/form.php"-->
<link rel="prefetch" href="form.php">

</head>
<body style="width:100%;overflow-x:hidden;overflow-y:hidden">
  		
  <div class="row">
  <div class="panel panel-default">
  <div class="panel-heading">
  <img src="gillu.jpg" width="50" height="50" alt="SNS" />&nbsp;&nbsp;
<font style="float:right;" color=skyblue size=4 >Talk To Me : TTM<br>
<font style="float:right;" color=lime  size=2><br>made by sns
</font>
</font>
</div>
  <div class="panel-body">
  <form role="form" action="" method="post">
  <div class="form-group">
    <label for="dbusername">Username</label>
    <input  name="name" type="text" autocomplete="off" class="form-control" autofocus="autofocus" placeholder="username" required>
  </div>
  <div class="form-group">
    <label for="dbpassword">Password</label>
    <input  name="pass" type="password" class="form-control" placeholder="Password" required>
  </div>
  <input type="hidden" name="op" value="step1">
   <div style="float:right">
  <button  name="reg" type="submit" value="Register"  class="myButton" class="btn btn-default" >Register</button>
  </div>
  <br><br><br><br><hr height="20px" color="purple">
</form>
  <div align="center">
  <a href="form.php"><button  class="myButton" type="button" class="btn btn-default" >Already registered. Login Here</button></a>
  </div><br>
</div>
</div>

            <div class="footer-left">
               <a href="http://www.netfreaks.me.pn"></a>
            </div>
            <div class="footer-right">
                 &copy; 2014 <br>An SNS Production <br> All Rights Reserved
            </div>

</div>



</body>
</html>
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
		echo '<script>window.location="indes.php";</script>';
	}
	else
	{
		echo '<script>alert("not sec");</script>';
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
		 echo '<script>alert("register sucessfully");</script>';
	 }
 }
 else
 {
	 echo '<script>alert("please fill all the details");</script>';
 }
}
?>
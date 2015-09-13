<?
{
include 'functions.php';
	{
	$function=new main();
	$s="OFF";
	$res=$function->chngstatus($s);
	}
}
session_start();
error_reporting(0);
unset($_SESSION["name"]);
unset($_SESSION["bgcolor"]);
unset($_SESSION["uid"]);
unset($_SESSION["st"]);
unset($_SESSION["device"]);
if(!$_SESSION["name"])
{
	echo '<script>window.location="index.php";</script>';
}
?>
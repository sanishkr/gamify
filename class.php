<?
session_start();
error_reporting(0);
date_default_timezone_set('Asia/kolkata');


class database
{
	function __construct()
	 {
//        $con=mysql_connect("fdb3.freehostingeu.com","1529183_nfdata","9342434037sns") or die("unable to connect");
        $con=mysql_connect("localhost","root","") or die("unable to connect");
		mysql_select_db("gamify",$con) or die("unable to select");
     }
	 public function connect()
     {
//        $con=mysql_connect("fdb3.freehostingeu.com","1529183_nfdata","9342434037sns") or die("unable to connect");
        $con=mysql_connect("localhost","root","") or die("unable to connect");
        mysql_select_db("gamify",$con) or die("unable to select");
     }
     public function query($sql)
     {
         $sc=mysql_query($sql) or die("query not working".  mysql_error());
         return $sc;
         
     }
     public function  fetch($qu)
     {
         $ft=mysql_fetch_array($qu);
         return $ft;
     }
     public function num($rows)
     {
         $rw=mysql_num_rows($rows);
         return $rw;
         
     }

}
?>
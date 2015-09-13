<?
include 'class.php';
class main extends database
{
	public function login($username,$password)
	{	
	 $sel=database::query("select * from login,reward where name='".$username."' and password='".$password."' and login.uid=reward.uid");
	 $row = mysql_fetch_assoc($sel);
	 $succ=database::num($sel);
		 if($succ>0)
		 {	 //$tm=date(Y-m-d H:i:s);
			 $_SESSION["name"]=$username;	
			 $_SESSION["bgcolor"]=$row['bgcolor'];
			 $_SESSION["uid"]=$row['uid'];			 
			 $_SESSION["status"]=$row['st'];			 
			 $_SESSION["unsend"]=$row['unsend_tym'];
			 $_SESSION['coins']=$row['coins'];
			 $_SESSION['lifes']=$row['lifes'];
			 $_SESSION['ach']=$row['ach'];

			 $topic=mysql_query("select * from training");
			 $i=1;
			 while ($tp = mysql_fetch_array($topic)) 
				{
					$_SESSION['tp'.$i]='topic'.$tp['id'];
					$top=$_SESSION['tp'.$i];
					$topc=mysql_query("select * from $top");
						//if(!$topc)	{ echo '<script>alert("incorrect");</script>'; echo $_SESSION["tp".$i]; exit(); }
					$j=1;
					 while ($tp1 = mysql_fetch_array($topc)) 
					{
						$_SESSION['qno'.$i.$j]=$tp1['qno'];
						$_SESSION['qstn'.$i.$j]=$tp1['qstn'];
						$_SESSION['ans'.$i.$j]=$tp1['ans'];
						$_SESSION['link'.$i.$j]=$tp1['link'];
						$j++;
					}
					$i++;
				}

				$k=1;
				$asmt=mysql_query("select * from asmt");
				while ($assm = mysql_fetch_array($asmt)) 
				{
					$_SESSION['diflev'.$k]=$assm['diflev'];
					$_SESSION['qstn'.$k]=$assm['qstn'];
					$_SESSION['key1'.$k]=$assm['key1'];
					$_SESSION['key2'.$k]=$assm['key2'];
					$_SESSION['key3'.$k]=$assm['key3'];
					$k++;
				}

			//$chng3=database::query("Update login Set last_activity Where  name='".$_SESSION["name"]."'");
			 $number_of_days = 10 ;
                         $date_of_expiry = time() + 60 * 60 * 24 * $number_of_days ; 
                         setcookie( "uname",$username, $date_of_expiry, "/" ) ; 
			if($row['status']!='ON'&&$row['st']=='1') {database::query("Update login Set status='ON' Where  name='".$_SESSION["name"]."'");}
			return true;	 
		 }
		 else
		 {
			 return false ;
		 }
	}
	public function register($username,$password)
	{
		$seli=database::query("select * from login where name='".$username."'");
		$succi=database::num($seli);
		if($succi>0)
		{
			return $succi;
		}
		else
		{
		$re=database::query("insert into login (name,password) VALUES ('$username','$password')");		
		}
	}
	public function chngpwd($oldpassword,$newpassword)
	{	
	 
	 $sel1=database::query("select * from login where name='".$_SESSION["name"]."' and password='".$oldpassword."'");
	 $succ1=database::num($sel1);
		 if($succ1>0)
		 {
			$chng=database::query("Update login Set password='".($newpassword)."' Where  name='".$_SESSION["name"]."'");
			if($_SESSION["status"]=='1')
				{
					database::query("Update login Set status='ON' Where  name='".$_SESSION["name"]."'");
				}
			return 1 ;
		}
		else
		{
			
			return 0 ;
		}
	}
		public function chngbg($newbg)
	{	
	 
	 $sel1=database::query("select * from login where name='".$_SESSION["name"]."' and bgcolor='".$_SESSION["bgcolor"]."'");
	 //$sel1=database::query("select * from login where name='".$_SESSION["name"]."'");
	 $succ1=database::num($sel1);
		 if($succ1>0)
		 {
			$chng=database::query("Update login Set bgcolor='".($newbg)."' Where  name='".$_SESSION["name"]."'");
			if($_SESSION["status"]=='1')
				{
					database::query("Update login Set status='ON' Where  name='".$_SESSION["name"]."'");
				}
			$_SESSION["bgcolor"]=$newbg;
			return 1 ;
		}
		else
		{
			
			return 0 ;
		}
	}
        
        public function chngunsend($newunsend)
	{	
	 
	 $sel5=database::query("select * from login where name='".$_SESSION["name"]."'");
	 $succ5=database::num($sel5);
		 if($succ5>0)
		 {
			$chng5=database::query("Update login Set unsend_tym='".($newunsend)."' Where  name='".$_SESSION["name"]."'");
			if($_SESSION["status"]=='1')
				{
					database::query("Update login Set status='ON' Where  name='".$_SESSION["name"]."'");
				}
			$_SESSION["unsend"]=$newunsend;
			return 1 ;
		}
		else
		{
			
			return 0 ;
		}
	}

        
	public function chngstatus($s='ON')
	{	
	 
	 $sel4=database::query("select * from login where name='".$_SESSION["name"]."'");
	 $succ4=database::num($sel4);
		 if($succ4>0)
		 {
			$chng4=database::query("Update login Set status='".($s)."' Where  name='".$_SESSION["name"]."'");
			return 1 ;
		}
		else
		{
			
			return 0 ;
		}
	} 

}
?>
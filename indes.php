<?
include 'class.php';
date_default_timezone_set('Asia/kolkata');

if(empty($_SESSION["name"]))
	{
		echo '<script>window.location="users.php";</script>';
	}
if(empty($_GET['talk']))
	{
		echo '<script>window.location="users.php";</script>';
	}
else
	$frnd=$_GET['talk'];
$dat=date("g:i:s");
$db=new database();
$db->connect();
if($_SESSION["status"]=='1')
{
database::query("Update login Set status='OFF' Where  name='".$_SESSION["name"]."'");
database::query("Update login Set status='ON' Where  name='".$_SESSION["name"]."'");
}
?>
<?
$frndname=mysql_fetch_assoc(database::query("select name from login where uid=$frnd"));

$id1=$_SESSION["uid"];
$id2=$frnd;
 if($id1!="" && $id2!="")
 {
	$sel2=database::query("select * from message where id1='".$id1."' and id2='".$id2."'");
	$sel3=database::query("select * from message where id1='".$id2."' and id2='".$id1."'");
	 $row2 = mysql_fetch_assoc($sel2);
	 $row3 = mysql_fetch_assoc($sel3);
	 $succ2=database::num($sel2);
	 $succ3=database::num($sel3);
	 	if($succ2>0)
		{
			$tname="messages".$row2['tid'];
		}
		elseif($succ3>0)
		{
			$tname="messages".$row3['tid'];
		}
		else
		{
		$re=database::query("insert into message (id1,id2) VALUES ('$id1','$id2')");
		$tab=mysql_insert_id();
		$tname="messages".$tab;
		$s1='s'.$id1;
		$s2='s'.$id2;
		$se=database::query("CREATE TABLE IF NOT EXISTS `$tname` (
  `msg_id` int(11) NOT NULL AUTO_INCREMENT,
  `$s1` int(1) DEFAULT '1',
  `$s2` int(1) DEFAULT '1',
  `message` varchar(5000) NOT NULL,
  `uid_fk` int(11) NOT NULL,
  `created` varchar(250) DEFAULT NULL,
  `seen` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`msg_id`),
  KEY `uid_fk` (`uid_fk`)
					) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ");
		}
	
 }
 ?>
<link rel="stylesheet" type="text/css" href="wall.css.php?bgcolor=<?php echo $_SESSION["bgcolor"]?>"  media="screen" />
<script type="text/javascript" src="js/jquery-1.3.2.js" ></script>
<script type="text/javascript" src="js/ajaxupload.3.5.js" ></script>
		<? if(($_SESSION["device"]=='computer')||($_SESSION["device"]=='tablet')) 
		echo '
		<link rel="stylesheet" type="text/css" href="./styles1.css" />
		';
?>

<title>Talk To Me<?if(!empty($frndname['name'])) echo ' : '.$frndname['name']; ?></title>
<!--script type="text/javascript" src="jquery-latest.js"></script-->
<script type="text/javascript" >
	$(function(){
		var btnUpload=$('#upload');
		var status=$('#status');
		new AjaxUpload(btnUpload, {
			action: 'upload-file.php?tid=<? echo $tname;?>',
			name: 'uploadfile',
			onSubmit: function(file, ext){
				 if (! (ext && /^(jpg|png|jpeg|gif)$/.test(ext))){ 
                    // extension is not allowed 
					status.text('Only JPG, PNG or GIF files are allowed');
					return false;
				}
				status.text('Uploading...');
			},
			onComplete: function(file, response){
				//On completion clear the status
				status.text('');
				//Add uploaded file to list
				if(response==="success"){
					$('<li></li>').appendTo('#files').html('<img src="./uploads/'+file+'" alt="" /><br />'+file).addClass('success');
				} else{
					$('<li></li>').appendTo('#files').text(file).addClass('error');
				}
			}
		});
		
	});
</script>
<script>
$(document).ready(function() {
$('#textpost').click(function() {
        
      var b=$("#fbpost").val();
      var dataString = 'fbwall='+b;
      $.ajax( {
              type:"POST",
      		async: false,
              url:"ajax.php?tid=<? echo $tname;?>",
              data: dataString,
              success: function(data) {		
			  	  $("#fbpost").val("");		  
                  $("#viewpost").html(data);
				  window.location="indes.php?talk=<? echo $frnd; ?>";				  				              
              }
          });
});
});

</script>

<div id="container">

<div class="middle">
<font size="3" color="orange">Welcome <? echo $_SESSION["name"]; ?>!!</font>
<div class="r" style="float:right;"> 
<a href="logout.php"><img src="logout.png"  align="right" width="25" height="25" alt="logout" title="logout"/></a> &nbsp;&nbsp;&nbsp;
<a href="settings.php?talk=<? echo $frnd?> "><img src="settings.png"  align="right" width="25" height="25" alt="settings" title="settings"/></a>&nbsp;&nbsp;&nbsp;
<a href="users.php?talk=<? echo $frnd?>"><img src="friends.png"  align="right" width="30" height="25" alt="friends list" title="Friends list"/></a> 
</div>
</div>

<br><br>
<div>  <!--<img src="blo.png" />-->
 </div>
 
	<div id="post">
    	<form action="" method="post">
        	<p class="example-twitter">
        	<textarea  autofocus="autofocus" name="fbwall" id="fbpost" class="" placeholder="whatzz upp?"  maxlength="250" >
            </textarea>                
            <br/>  <br/>  
            <a href="#" class="button postfb" id="textpost">Send</a>
         <div id="mainbody" >
		<? echo '  <div id="upload" style="float:left;"><span>';
		   if(($_SESSION["device"]!='computer')&&($_SESSION["device"]!='tablet')) 
		   echo '<a href=uploadphoto.php?talk='.$frnd.'&tid='.$tname.' style="background-color:rgb(174,122,219); text-decoration:none; color:white;">';
		echo 'Upload a Photo<img src="upload.png"  width="16" height="16" />';
		if(($_SESSION["device"]!='computer')&&($_SESSION["device"]!='tablet')) 
		   echo '</a>';
		echo  '</span></div><span id="status" ></span>';
		?>
		</p>
		   </div>
        </form>  
		

    </div>

    <br>
	<?php echo "<a href=indes1.php?talk=".$frnd."><font color=black><div align=center style=background-color:plum;>see all messages<br></div><br></font></a>"; ?>
</div>
 <iframe src="post.php?tid=<? echo $tname;?>" scrolling="auto" style="float:left; border:none; overflow:hidden; width:300px; height:400px; border:0px;" allowtransparency="true"></iframe>  
  
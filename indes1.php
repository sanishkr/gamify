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

//$messages=$_GET['talk'];
$dat=date("g:i:s");
$db=new database();
$db->connect();
if($_SESSION["status"]=='1')
{
database::query("Update login Set status='OFF' Where  name='".$_SESSION["name"]."'");
database::query("Update login Set status='ON' Where  name='".$_SESSION["name"]."'");
}

/*
$upload_dir = "uploads"; 				// The directory for the images to be saved in
$upload_path = $upload_dir."/";				// The path to where the image will be saved
$image_name = $_FILES['image']['name']; 	// New name of the thumbnail image
$image_location=$upload_path.$image_name;
$max_file = "1148576"; 						// Approx 1MB
$width = "100";						// Width of image
$height = "100";						// Height of image
	//Only process if the file is a JPG and below the allowed limit
	if((!empty($_FILES["image"])) && ($_FILES['image']['error'] == 0)) {
		if (($_FILES['image']['ext']!="jpg") && ($_FILES['image']['size']> $max_file)) {
			echo  "Error: ONLY jpeg images under 1MB are accepted for upload";
			exit();
		}
	}
		
	
if (isset($_FILES['image']['name'])){
			
			move_uploaded_file( $_FILES['image']['tmp_name'], $image_location);
			
		echo '<script>alert("Photo uploaded successfully."); window.location="indes1.php?talk='.$frnd.'";</script>';
			
		} */
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
		echo '<link rel="stylesheet" type="text/css" href="./styles1.css" />
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
				  window.location="indes1.php?talk=<? echo $frnd; ?>";				  				              
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
<a href="settings.php?talk=<? echo $frnd?>"><img src="settings.png"  align="right" width="25" height="25" alt="settings" title="settings"/></a>&nbsp;&nbsp;&nbsp;
<a href="users.php?talk=<? echo $frnd?>"><img src="friends.png"  align="right" width="30" height="25" alt="friends list" title="Friends list"/></a> 
</div>
</div>

<br><br>
 
	<div id="post">
    	<form action="" method="post">
        	<p class="example-twitter">
        	<textarea  autofocus="autofocus" name="fbwall" id="fbpost" class="" placeholder="whatzz upp?"  maxlength="250" >
            </textarea>                
            <br/>  <br/>  
            <a href="#" class="button postfb" id="textpost">Send</a>
        <div id="mainbody" >
		<? //if(($_SESSION["device"]=='computer')||($_SESSION["device"]=='tablet')) 
		echo '
		  <div id="upload" style="float:left;">';
		  if(($_SESSION["device"]!='computer')&&($_SESSION["device"]!='tablet')) 
		   echo '<a href=uploadphoto.php?talk='.$frnd.'&tid='.$tname.' style="background-color:rgb(174,122,219); text-decoration:none; color:white;">';
		echo '<span>Upload a Photo<img src="upload.png"  width="16" height="16" />';
		  if(($_SESSION["device"]!='computer')&&($_SESSION["device"]!='tablet')) 
		   echo '</a>';
		echo  '<span></div><span id="status" ></span>
		  ';
		  ?>
		
		<? 
		$mid=str_replace("messages","",$tname);
		$bl1=database::query("select * from message where tid='".$mid."'");
		$blrow1 = mysql_fetch_assoc($bl1);
		$b1=$blrow1['block'];
		$bid1=$blrow1['blocker_id'];
		if($b1=='1') {$c='0';}
		elseif($bid1==$_SESSION["uid"]){$c='1';}
		
	if(isset($_POST["bl"]))
		{
	$bid=$_POST["bl"];
	database::query("Update message Set block=$bid Where tid='".$mid."'");
	database::query("Update message Set blocker_id=$_SESSION[uid] Where tid='".$mid."'");
	if($c=='0') echo "<script>alert('Blocked');</script>";
	elseif($c=='1') echo "<script>alert('Unblocked');</script>";
		}
		?> 
<style>
input[type=submit]
{
background:url(<? if($c=='0') echo 'block'; elseif($c=='1') echo 'unblock'; ?>.png);
border:0;
display:block;
height:32px;
width:44px;
cursor:pointer;
color:transparent;
}
</style>
		<form method="post" action="">
		<div align="right" style="float:right;">
		<?  if($c=='0') {echo  '<input type=submit name=bl value='.$c.' title=BLOCK>';}
		elseif($c=='1') {echo  '<input type=submit name=bl value='.$c.' title=UNBLOCK>';}
		else echo '';
		?>
		</div>
		</form>
		</div>
		
		</p>
        </form>                       
    </div>
    <br>
	<?php echo "<a href=indes.php?talk=".$frnd."><font color=black><div align=center style=background-color:plum;>see latest messages<br></div><br></font></a>";
	 ?>
	
	
    
</div>
 <iframe src="post1.php?tid=<? echo $tname;?>" scrolling="auto" style="float:left; border:none; overflow:hidden; width:300px; height:400px; border:0px;" allowtransparency="true"></iframe>  
  
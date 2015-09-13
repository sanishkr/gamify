<?php 
require_once 'Mobile-Detect/Mobile_Detect.php';
include 'class.php';

$detect = new Mobile_Detect;
$deviceType = ($detect->isMobile() ? ($detect->isTablet() ? 'tablet' : 'phone') : 'computer');
//$deviceType ='phone';
?>
<html>
<head>
<link rel="icon" href="favicon.ico" type="image/x-icon" />
<meta http-equiv="keywords" content="talktome,TTM,chat,SNS,TALK TO ME, ttm,talktome.me.pn" />
<link rel="stylesheet" href="head.css" />
<link rel="stylesheet" href="reset.css" />
<title><? if(isset($_SESSION['name'])) echo 'Hi '.$_SESSION['name'].'! Welcome to '; ?> Talk To Me : TTM </title>

<?
if($deviceType=='computer')
{
echo '
<link rel="stylesheet" id="bp-default-main-css" href="default.css" type="text/css" media="all">
<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript" src="cufon.js"></script>';
}
?>
</head>

<body background=".gif" bgcolor="" text="brown" link="blue" alink="red" vlink="skyblue" >

<center>
<?
if($deviceType=='computer')
{
echo '<br><br>PC users use the box below for login<br>and chat in the side windows<br>';
}
?>

<br><br>
<iframe src="form.php" scrolling="yes" style="border:none; overflow:hidden; width:450px; height:450px; background:#FFFFFF; border-radius:8px;" allowtransparency="true"></iframe>



<style type="text/css">
/*<![CDATA[*/
#fbplikebox{display: block;padding: 0;z-index: 99999;position: fixed;}
.fbplbadge {background-color:purple;display: block;height: 60px;top: 50%;margin-top: -95px;position: absolute;left: -47px;width: 47px;background-image: url('chat.png');background-repeat: no-repeat;overflow: hidden;-webkit-border-top-left-radius: 8px;-webkit-border-bottom-left-radius: 8px;-moz-border-radius-topleft: 8px;-moz-border-radius-bottomleft: 8px;border-top-left-radius: 8px;border-bottom-left-radius: 8px;}
/*]]>*/
</style>
<script type="text/javascript">
/*<![CDATA[*/
    (function(w2b){
        w2b(document).ready(function(){
            var $dur = 'medium'; // Duration of Animation
            w2b('#fbplikebox').css({right: -320, 'top' : 30 })
            //w2b('#fbplikebox').css({top: -190, 'right': 550})
            w2b('#fbplikebox').hover(function () {
                w2b(this).stop().animate({
                    right: 0
					//top: 0
                }, $dur);
            }, function () {
                w2b(this).stop().animate({
                    right: -320
					//top: -190
                }, $dur);
            });
            w2b('#fbplikebox').show();
        });
    })(jQuery);
/*]]>*/
</script>
<?
if($deviceType=='computer')
{
echo '<div id="fbplikebox" style="right: -320px; top: 30px;">
<div class="fbplbadge"></div> 
<iframe src="load.php" scrolling="yes" style="border:none; overflow:hidden; width:320px; height:400px;background:#FFFFFF; border-radius:8px;" allowtransparency="true"></iframe>
</div>';
}
?>

<style type="text/css">
/*<![CDATA[*/
#fbplikebox1{display: block;padding: 0;z-index: 99999;position: fixed;}
.fbplbadge {background-color:purple;display: block;height: 60px;top: 50%;margin-top: -95px;position: absolute;left: -47px;width: 47px;background-image: url('chat.png');background-repeat: no-repeat;overflow: hidden;-webkit-border-top-left-radius: 8px;-webkit-border-bottom-left-radius: 8px;-moz-border-radius-topleft: 8px;-moz-border-radius-bottomleft: 8px;border-top-left-radius: 8px;border-bottom-left-radius: 8px;}
/*]]>*/
</style>
<script type="text/javascript">
/*<![CDATA[*/
    (function(w2b){
        w2b(document).ready(function(){
            var $dur = 'medium'; // Duration of Animation
            w2b('#fbplikebox1').css({right: -320, 'top' : 100 })
            //w2b('#fbplikebox').css({top: -190, 'right': 550})
            w2b('#fbplikebox1').hover(function () {
                w2b(this).stop().animate({
                    right: 0
					//top: 0
                }, $dur);
            }, function () {
                w2b(this).stop().animate({
                    right: -320
					//top: -190
                }, $dur);
            });
            w2b('#fbplikebox1').show();
        });
    })(jQuery);
/*]]>*/
</script>
<?
if($deviceType=='computer')
{
echo '<div id="fbplikebox1" style="right: -320px; top: 100px;">
<div class="fbplbadge"></div> 
<iframe src="load.php" scrolling="yes" style="border:none; overflow:hidden; width:320px; height:400px;background:#FFFFFF; border-radius:8px;" allowtransparency="true"></iframe>
</div>';
}
?>

<style type="text/css">
/*<![CDATA[*/
#fbplikebox2{display: block;padding: 0;z-index: 99999;position: fixed;}
.fbplbadge {background-color:purple;display: block;height: 60px;top: 50%;margin-top: -95px;position: absolute;left: -47px;width: 47px;background-image: url('chat.png');background-repeat: no-repeat;overflow: hidden;-webkit-border-top-left-radius: 8px;-webkit-border-bottom-left-radius: 8px;-moz-border-radius-topleft: 8px;-moz-border-radius-bottomleft: 8px;border-top-left-radius: 8px;border-bottom-left-radius: 8px;}
/*]]>*/
</style>
<script type="text/javascript">
/*<![CDATA[*/
    (function(w2b){
        w2b(document).ready(function(){
            var $dur = 'medium'; // Duration of Animation
            w2b('#fbplikebox2').css({right: -320, 'top' : 180 })
            //w2b('#fbplikebox').css({top: -190, 'right': 550})
            w2b('#fbplikebox2').hover(function () {
                w2b(this).stop().animate({
                    right: 0
					//top: 0
                }, $dur);
            }, function () {
                w2b(this).stop().animate({
                    right: -320
					//top: -190
                }, $dur);
            });
            w2b('#fbplikebox2').show();
        });
    })(jQuery);
/*]]>*/
</script>
<?
if($deviceType=='computer')
{
echo '<div id="fbplikebox2" style="right: -320px; top: 180px;">
<div class="fbplbadge"></div> 
<iframe src="users.php" scrolling="yes" style="border:none; overflow:hidden; width:320px; height:400px;background:#FFFFFF; border-radius:8px;" allowtransparency="true"></iframe>
</div>';
}
?>

<br><br><center>
<?
if($deviceType=='computer')
{
echo '<h4>PC Instructions:</h4>
Use arrow keys to scroll while chatting.
<br>
Use mozilla firefox for better results.<br>';
}
?>
For slower connections 
<a href="#" onclick="window.open('inde.php','newwin','width=400 height=900');">click here</a>
<br>
 &copy; 2014 &raquo; An SNS Production
</body>
</html>

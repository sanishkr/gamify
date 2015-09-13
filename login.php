<?
require_once 'Mobile-Detect/Mobile_Detect.php';
include 'functions.php';

$myFile = "iptrace.txt";
$fh = fopen($myFile, 'a+') or die("can't open file");
$stringData ="\n\n\nTTM :\nDate and Time: ".date('Y-m-d H:i:s')."\nIp Address : ".$_SERVER['REMOTE_ADDR']."\nBrowser : ".$_SERVER['HTTP_USER_AGENT']." \n \n" ;
fwrite($fh, $stringData);
fclose($fh);

$detect = new Mobile_Detect;
$deviceType = ($detect->isMobile() ? ($detect->isTablet() ? 'tablet' : 'phone') : 'computer');
//$deviceType ='phone';

$function=new main();

if(empty($_SESSION["name"]))
	{
		//if($_SESSION["device"]=="computer")
		echo '<script>window.location="index.php";</script>';
		//else
		//echo '<script>window.location="form.php";</script>';
	}

else
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<title>Gamified Training</title>
		<link rel="shortcut icon" href="../favicon.ico"> 
		<link rel="stylesheet" type="text/css" href="css/component1.css" />
        <script src="js/modernizr.custom.63321.js"></script>
		<script src="js/modernizr.custom.js"></script>
			<link rel="stylesheet" href="head.css" />
			<link rel="stylesheet" href="reset.css" />
        <link rel="stylesheet" type="text/css" href="css/style1.css" />
<?
if($deviceType=='computer')
{
echo '
<link rel="stylesheet" id="bp-default-main-css" href="default.css" type="text/css" media="all">
<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript" src="cufon.js"></script>';
}
?>
<style>

.triangle-border.left {
	margin-left:60px;
}

.triangle-border:before {
	content:"";
	position:absolute;
	top:70px; /* value = - border-top-width - border-bottom-width */
	left:420px; /* controls horizontal position */
    border-top: 25px solid transparent;
    border-bottom: 25px solid transparent;
    border-right: 20px solid transparent;
    border-left:0px;
    border-style:solid;
    border-color: transparent #bdbcdb;
    /* reduce the damage in FF3.0 */
    display:block; 
    height:0;
    width:0;
}

/* creates the smaller  triangle */
.triangle-border:after {
	content:"";
	position:absolute;
	top:75px; /* value = - border-top-width - border-bottom-width */
	left:430px; /* value = (:before left) + (:before border-left) - (:after border-left) */
	border-top: 20px solid transparent;
    border-bottom: 20px solid transparent;
    border-right: 15px solid transparent;
    border-left: 0px;
	border-style:solid;
    border-color: transparent #fff ;
    /* reduce the damage in FF3.0 */
    display:block; 
    width:0;
}
	.triangle-border1.left {
	margin-left:60px;
	}
	
	.triangle-border1:before {
	content:"";
	position:absolute;
	top:40px; /* value = - border-top-width - border-bottom-width */
	left:315px; /* controls horizontal position */
    border-top: 25px solid transparent;
    border-bottom: 25px solid transparent;
    border-right: 0px solid transparent;
    border-left:20px;
    border-style:solid;
    border-color: transparent #bdbcdb;
    /* reduce the damage in FF3.0 */
    display:block; 
    height:0;
    width:0;
	}
	
	/* creates the smaller  triangle */
	.triangle-border1:after {
	content:"";
	position:absolute;
	top:45px; /* value = - border-top-width - border-bottom-width */
	left:320px; /* value = (:before left) + (:before border-left) - (:after border-left) */
	border-top: 20px solid transparent;
    border-bottom: 20px solid transparent;
    border-right: 0px solid transparent;
    border-left: 15px;
	border-style:solid;
    border-color: transparent #fff ;
    /* reduce the damage in FF3.0 */
    display:block; 
    width:0;
	}.triangle-border.left {
	margin-left:60px;
	}
	
	.triangle-border2:before {
	content:"";
	position:absolute;
	top:270px; /* value = - border-top-width - border-bottom-width */
	left:-216px; /* controls horizontal position */
    border-top: 25px solid transparent;
    border-bottom: 25px solid transparent;
    border-right: 20px solid transparent;
    border-left:0px;
    border-style:solid;
    border-color: transparent #bdbcdb;
    /* reduce the damage in FF3.0 */
    display:block; 
    height:0;
    width:0;
	}
	
	/* creates the smaller  triangle */
	.triangle-border2:after {
	content:"";
	position:absolute;
	top:275px; /* value = - border-top-width - border-bottom-width */
	left:-213px; /* value = (:before left) + (:before border-left) - (:after border-left) */
	border-top: 20px solid transparent;
    border-bottom: 20px solid transparent;
    border-right: 15px solid transparent;
    border-left: 0px;
	border-style:solid;
    border-color: transparent #fff ;
    /* reduce the damage in FF3.0 */
    display:block; 
    width:0;
	}.triangle-border.left {
	margin-left:60px;
	}
	
	.triangle-border3:before {
	content:"";
	position:absolute;
	top:270px; /* value = - border-top-width - border-bottom-width */
	left:315px; /* controls horizontal position */
    border-top: 25px solid transparent;
    border-bottom: 25px solid transparent;
    border-right: 0px solid transparent;
    border-left:20px;
    border-style:solid;
    border-color: transparent #bdbcdb;
    /* reduce the damage in FF3.0 */
    display:block; 
    height:0;
    width:0;
	}
	
	/* creates the smaller  triangle */
	.triangle-border3:after {
	content:"";
	position:absolute;
	top:275px; /* value = - border-top-width - border-bottom-width */
	left:320px; /* value = (:before left) + (:before border-left) - (:after border-left) */
	border-top: 20px solid transparent;
    border-bottom: 20px solid transparent;
    border-right: 0px solid transparent;
    border-left: 15px;
	border-style:solid;
    border-color: transparent #fff ;
    /* reduce the damage in FF3.0 */
    display:block; 
    width:0;
	}
</style>
<script>
	function change()
	{
		document.getElementById('image').src="images/char4.png";
	}		
</script>
	</head>
	<body>
		<div class="container">	
			<div id="bl-main" class="bl-main">
				<!--a href="index.php"><img src="images/home.png"></a-->
				<section>
					<div class="bl-box">
						<h2 class="bl-icon bl-icon-about">Mutual Fund</h2>
					</div>
					<div class="bl-content">
						<!--h2>About training</h2-->
						<h2>Mutual Fund</h2>
						<p>Get ready for the training of Mutual Fund<br>
						Be Attentive.. You may be asked optional questions for extra coins <img src="images/c2.png" height="20px">
							<?= $_SESSION['qstn26']; ?>
						</p>
						<span class="bl-icon bl-icon-close"></span>
							<img id="image" src="images/char4.png" style="position: absolute;margin-left: 150px; margin-top: 10px;">
							<img src="images/char2.png" style="position: absolute;margin-left: 950px; margin-top: 10px;">
							<img src="images/char3.png" style="position: absolute;margin-left: 0px; margin-top: 270px;">
							<img src="images/char1.png" style="position: absolute;margin-left: 950px; margin-top: 270px;">
						
						
						<DIV align="right" ID="ticker6" style="position:relative;padding:13px;margin:1em 1em 1em;border:5px solid #ccc;color:#333;background:#fff;-webkit-border-radius:10px;-moz-border-radius:10px;border-radius:10px; margin-left: 420px; margin-top: -80px; float:left; display:inline; "></DIV>
						<p class="triangle-border left" style="-webkit-border-radius:10px;-moz-border-radius:10px;border-radius:10px;"></p>
						<DIV ID="do_not_delete_this" style="position:relative;  float:left;">
							
							
							<DIV align="right" ID="ticker4" style="position:absolute;padding:13px;margin:1em 1em 1em;border:5px solid #ccc;color:#333;background:#fff;-webkit-border-radius:10px;-moz-border-radius:10px;border-radius:10px; margin-left: 180px; margin-top: 0px; float:left; display:inline; "></DIV>
							<p class="triangle-border1 left" style="-webkit-border-radius:10px;-moz-border-radius:10px;border-radius:10px;"></p>
							<DIV ID="do_not_delete_this" style="position:relative;  float:left;">
								
								<DIV align="right" ID="ticker5" style="position:relative;padding:13px;margin:1em 1em 1em;border:5px solid #ccc;color:#333;background:#fff;-webkit-border-radius:10px;-moz-border-radius:10px;border-radius:10px; margin-left: -200px; margin-top: 180px; float:left; display:inline; "></DIV>
								<p class="triangle-border2 left" style="-webkit-border-radius:10px;-moz-border-radius:10px;border-radius:10px;"></p>
								<DIV ID="do_not_delete_this" style="position:relative;  float:left;">
									
									<DIV align="right" ID="ticker3" style="position:absolute;padding:13px;margin:1em 1em 1em;border:5px solid #ccc;color:#333;background:#fff;-webkit-border-radius:10px;-moz-border-radius:10px;border-radius:10px; margin-left: 180px; margin-top: 180px; float:left; display:inline; "></DIV>
									<p class="triangle-border3 left" style="-webkit-border-radius:10px;-moz-border-radius:10px;border-radius:10px;"></p>
									<DIV ID="do_not_delete_this" style="position:relative;  float:left;">					</div>
				</section>
				<section id="bl-work-section">
					<div class="bl-box">
						<h2 class="bl-icon bl-icon-works">Stocks</h2>
					</div>
					<div class="bl-content">
						<h2>Stocks</h2>
						<p>Get ready for the training of Stock Market<br>
						Be Attentive.. You may be asked optional questions for extra coins <img src="images/c2.png" height="20px">
						</p>
						<span class="bl-icon bl-icon-close"></span>
										<!--ul id="bl-work-items">
											<li data-panel="panel-1"><a href="#"><img src="images/1.jpg" /></a></li>
											<li data-panel="panel-2"><a href="#"><img src="images/2.jpg" /></a></li>
											<li data-panel="panel-3"><a href="#"><img src="images/3.jpg" /></a></li>
											<li data-panel="panel-4"><a href="#"><img src="images/4.jpg" /></a></li>
										</ul-->
								<!--p>Illustrations by <a href="">Isaac Montemayor</a></p-->
							<img src="images/char1.png" style="position: absolute;margin-left: 150px; margin-top: 10px;">
							<img src="images/char2.png" style="position: absolute;margin-left: 950px; margin-top: 120px;">
							<img src="images/char3.png" style="position: absolute;margin-left: 200px; margin-top: 270px;">

							<!--img src="images/rightc.png" style="position: absolute;margin-left: 370px; margin-top: -100px; float:right;">
							<img src="images/leftc.png" style="position: absolute;margin-left: 630px; margin-top: 60px;"-->
								
									<DIV align="right" ID="ticker" style="position:relative;padding:13px;margin:1em 1em 1em;border:5px solid #ccc;color:#333;background:#fff;-webkit-border-radius:10px;-moz-border-radius:10px;border-radius:10px; margin-left: 420px; margin-top: -80px; float:left; display:inline; "></DIV>
									
								<DIV ID="do_not_delete_this" style="position:relative;  float:left;">
									

								<DIV align="right" ID="ticker1" style="position:relative;padding:13px;margin:1em 1em 1em;border:5px solid #ccc;color:#333;background:#fff;-webkit-border-radius:10px;-moz-border-radius:10px;border-radius:10px; margin-left: 780px; margin-top: 30px; float:left; display:inline; "></DIV>
								<DIV ID="do_not_delete_this" style="position:relative;  float:left;">

								<DIV align="right" ID="ticker2" style="position:relative;padding:13px;margin:1em 1em 1em;border:5px solid #ccc;color:#333;background:#fff;-webkit-border-radius:10px;-moz-border-radius:10px;border-radius:10px; margin-left: 470px; margin-top: 0px; float:left; display:inline; "></DIV>
									
								<DIV ID="do_not_delete_this" style="position:relative;  float:left;">
									
						
				</section>
				<section>
					<div class="bl-box">
						<h2 class="bl-icon bl-icon-blog">Bonds</h2>
					</div>
					<div class="bl-content">
						<h2>Bonds</h2>
						<article>
							<h3>Coins Collected</h3>
							<p>Stumptown helvetica cardigan, odd future seitan tattooed flannel. Kale chips direct trade cray beard. 8-bit etsy butcher post-ironic blog lo-fi mcsweeney's, sustainable pickled umami flexitarian DIY ethical plaid trust fund. Wolf cred organic, terry richardson aesthetic four loko occupy vegan chillwave readymade deep... <a href="#">Read more</a></p>
						</article>
						<article>
							<h3>Life Reamining</h3>
							<p>Cosby sweater odd future gluten-free actually dreamcatcher. Fixie cray vice sriracha disrupt, lo-fi pitchfork mcsweeney's swag YOLO meh chambray etsy. Keytar sriracha fanny pack church-key hashtag vice blog. 3 wolf moon VHS helvetica, raw denim deep v shoreditch seitan twee... <a href="#">Read more</a></p>
						</article>
						<article>
							<h3>Buy new life</h3>
							<p>Locavore irony gastropub chillwave, butcher meggings flexitarian pinterest master cleanse godard. Intelligentsia pop-up neutra, williamsburg gastropub godard pinterest swag deep v umami lomo. Butcher next level 90's wolf bushwick, narwhal photo booth YOLO kale chips whatever small batch. Meh viral ethical hella cardigan portland, street art mlkshk meggings mixtape kale chips cliche messenger bag pitchfork... <a href="#">Read more</a></p>
						</article>
						<article>
							<h3>About the characters</h3>
							<p>Stumptown helvetica cardigan, odd future seitan tattooed flannel. Kale chips direct trade cray beard. 8-bit etsy butcher post-ironic blog lo-fi mcsweeney's, sustainable pickled umami flexitarian DIY ethical plaid trust fund. Wolf cred organic, terry richardson aesthetic four loko occupy vegan chillwave readymade deep... <a href="#">Read more</a></p>
						</article>
						<article>
							<h3>Working with Photoshop</h3>
							<p>Cosby sweater odd future gluten-free actually dreamcatcher. Fixie cray vice sriracha disrupt, lo-fi pitchfork mcsweeney's swag YOLO meh chambray etsy. Keytar sriracha fanny pack church-key hashtag vice blog. 3 wolf moon VHS helvetica, raw denim deep v shoreditch seitan twee... <a href="#">Read more</a></p>
						</article>
						<article>
							<h3>Making use of Icon Fonts</h3>
							<p>Locavore irony gastropub chillwave, butcher meggings flexitarian pinterest master cleanse godard. Intelligentsia pop-up neutra, williamsburg gastropub godard pinterest swag deep v umami lomo. Butcher next level 90's wolf bushwick, narwhal photo booth YOLO kale chips whatever small batch. Meh viral ethical hella cardigan portland, street art mlkshk meggings mixtape kale chips cliche messenger bag pitchfork... <a href="#">Read more</a></p>
						</article>
					</div>
					<span class="bl-icon bl-icon-close"></span>
				</section>
				<section>
					<div class="bl-box">
						<h2 class="bl-icon bl-icon-contact">Options/Future</h2>
					</div>
					<div class="bl-content">
						<h2>Get in touch</h2>
						<p>Pinterest semiotics single-origin coffee craft beer thundercats irony, tumblr bushwick intelligentsia pickled. Narwhal mustache godard master cleanse street art, occupy ugh selfies put a bird on it cray salvia four loko gluten-free shoreditch. Occupy american apparel freegan cliche. Mustache trust fund 8-bit jean shorts mumblecore thundercats. Pour-over small batch forage cray, banjo post-ironic flannel keffiyeh cred ethnic semiotics next level tousled fashion axe. Sustainable cardigan keytar fap bushwick bespoke.</p>
					</div>
					<span class="bl-icon bl-icon-close"></span>
				</section>
				<!-- Panel items for the works -->
				<div class="bl-panel-items" id="bl-panel-work-items">
					<div data-panel="panel-1">
						<div>
							<img src="images/1.jpg" />
							<h3>Fixie bespoke</h3>
							<p>Iphone artisan direct trade ethical Austin. Fixie bespoke banh mi ugh, deep v vinyl hashtag. Tumblr gentrify keffiyeh pop-up iphone twee biodiesel. Occupy american apparel freegan cliche. Mustache trust fund 8-bit jean shorts mumblecore thundercats. Pour-over small batch forage cray, banjo post-ironic flannel keffiyeh cred ethnic semiotics next level tousled fashion axe. Sustainable cardigan keytar fap bushwick bespoke.</p>
						</div>
					</div>
					<div data-panel="panel-2">
						<div>
							<img src="images/2.jpg" />
							<h3>Chillwave mustache</h3>
							<p>Squid vinyl scenester literally pug, hashtag tofu try-hard typewriter polaroid craft beer mlkshk cardigan photo booth PBR. Chillwave 90's gentrify american apparel carles disrupt. Pinterest semiotics single-origin coffee craft beer thundercats irony, tumblr bushwick intelligentsia pickled. Narwhal mustache godard master cleanse street art, occupy ugh selfies put a bird on it cray salvia four loko gluten-free shoreditch.</p>
						</div>
					</div>
					<div data-panel="panel-3">
						<div>
							<img src="images/3.jpg" />
							<h3>Austin hella</h3>
							<p>Ethical cray wayfarers leggings vice, seitan banksy small batch ethnic master cleanse. Pug chillwave etsy, scenester meh occupy blue bottle tousled blog tonx pinterest selvage mixtape swag cosby sweater. Synth tousled direct trade, hella Austin craft beer ugh chambray.</p>
						</div>
					</div>
					<div data-panel="panel-4">
						<div>
							<img src="images/4.jpg" />
							<h3>Brooklyn dreamcatcher</h3>
							<p>Fashion axe 90's pug fap. Blog wayfarers brooklyn dreamcatcher, bicycle rights retro YOLO. Wes anderson lomo 90's food truck 3 wolf moon, twee jean shorts. Iphone small batch twee wolf yr before they sold out. Brooklyn echo park cred, portland pug selvage flannel seitan tousled mcsweeney's.</p>
						</div>
					</div>
					<nav>
						<span class="bl-next-work">&gt; Next Project</span>
						<span class="bl-icon bl-icon-close"></span>
					</nav>
				</div>
			</div>
		</div><!-- /container -->


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






		<script src="js/jquery.min.js"></script>
		<script src="js/boxlayout.js"></script>
		<script>
			$(function() {
				Boxlayout.init();
			});
		</script>


        <script type="text/javascript" src="js/jquery.min1.js"></script>
		<script type="text/javascript">
			$(function(){
			    $(".showpassword").each(function(index,input) {
			        var $input = $(input);
			        $("<p class='opt'/>").append(
			            $("<input type='checkbox' class='showpasswordcheckbox' id='showPassword' />").click(function() {
			                var change = $(this).is(":checked") ? "text" : "password";
			                var rep = $("<input placeholder='Password' type='" + change + "' />")
			                    .attr("id", $input.attr("id"))
			                    .attr("name", $input.attr("name"))
			                    .attr('class', $input.attr('class'))
			                    .val($input.val())
			                    .insertBefore($input);
			                $input.remove();
			                $input = rep;
			             })
			        ).append($("<label for='showPassword'/>").text("Show password")).insertAfter($input.parent());
			    });

			    $('#showPassword').click(function(){
					if($("#showPassword").is(":checked")) {
						$('.icon-lock').addClass('icon-unlock');
						$('.icon-unlock').removeClass('icon-lock');    
					} else {
						$('.icon-unlock').addClass('icon-lock');
						$('.icon-lock').removeClass('icon-unlock');
					}
			    });
			});
		</script>



<script type="text/javascript">

// CREDITS:
// Fullpage Background-Ticker 2.1 by Peter Gehrig 
// Copyright (c) 2010 Peter Gehrig. All rights reserved.
// Permission given to use the script provided that this notice remains as is.
// Additional scripts can be found at http://www.fabulant.com.

// IMPORTANT: 
// If you add this script to a script-library or a script-archive 
// you have to insert a link to http://www.fabulant.com right into the webpage where the script
// will be displayed.

// Set your messages. You may add as many messages as you like.
var message=new Array()
var message1= new Array()
var message2= new Array()
var message3= new Array()
var message4= new Array()
var message5= new Array()
var message6= new Array()
message[0]="How can we start our own organisation"
message[1]="That would be an ideal way to grow as well as help own customers grow along with us"
message[2]="				"
message[3]="				"
message[4]="				"
message[5]="				"
message[6]="				"
message[7]="				"






message1[0]="				"
message1[1]="We can sell some stock to customer"
message1[2]="				"
message1[3]="It helps anyone to own the business without even having to work for it"
/*message1[2]="I can not forget our daily 2-3 hours conversations on senseless topics..."
message1[3]="I can not forget the way how you got to know about my mood each time..."
message1[4]="I can not forget that innocent eyes and beautiful-hair on your cute-looking face..."
message1[5]="Shut up!! Stop Blushing!"
message1[6]="You still look scary... "
message1[7]="And how can I forget the way we teased each other... and shared every little thing and giving consolation"
message1[8]="and above all...  I can not forget how you came running before me on the last day..."
message1[9]="I can not forget "*/
message2[0]="				"
message2[1]="				"
message2[2]="Yes thats a good idea"
message2[4]="Yes the share holder can collect divident check with the company growing its profits"





message3[0]="I have Rs 10000 with me  I want to invest in some business"
message3[1]="         "
message3[4]="How can you help us"
message3[2]="     "
message3[3]="         "
	message3[6]="That seems to be a good idea"
	message3[5]="       "
	message3[7]="         "
	/*message3[1]="I can not forget how we used to wakever needed..."
	message3[2]="I can not forget our dailyless topics..."
	message3[3]="I can not forget the way how each time..."*/
	message4[0]="         "
	message4[1]="Yes I too  have some money that I am wanting to invest on something "
	message4[2]="         "
	message4[3]="         "
	message4[4]="         "
	message4[5]="          "
	message4[6]="         "
	message4[7]="          "
	//message4[1]="<?= $_SESSION['qstn52']; ?>"
	/*message4[2]="I can not forget our dailyless topics..."
	message4[3]="I can not forget the way how each time..."*/
	message5[0]="         "
	message5[2]="I agree I am also ready to invest but your investments are less"
	message5[3]="         "
	message5[1]="        "
	message5[4]="          "
	message5[7]="Lets invest our money on mutual fund"
	message5[5]="          "
	message5[6]="          "
	/*message5[2]="I can not forget our dailyless topics..."
	message5[3]="I can not forget the way ho, w each time..."*/
	message6[0]="                            "
	message6[2]="                            "
	message6[3]="Hey gentlemen I am here to help you out with your investments"
	message6[1]="                              "
	message6[4]="                                "
	message6[6]="                              "
	message6[7]="                 "
	message6[5]="I take investments from the people like you and give profits while I take only certain percentage of any charge"
	/*message6[2]="I can not forget our dailyless topics..."
	message6[3]="I can not forget the way how each time..."*/
	// Set font-family of the text
var fnt="Arial"

// Set font-size of the text (CSS-values)
var fntsize=12

// Set font-color of the text
var fntcolor="#EA77F9"

// Set font-color of the last letter of the ticker
var fntcolorlastletter="#710B7F"

// Set font-weight. Set a value between 1 to 9 to adjust the boldness
var fntweight=4

// Set standstill between the messages (seconds)
var standstill=100

// Set speed (higher=slower)
var speed=200

// the top-position of the ticker (distance to the border on top, pixels)
var topposition=30

// the left-position of the ticker (distance to the border on the left, pixels)
var leftposition=70



// Do not edit the variables below
var tickerwidth
var tickerheight
var i_substring=0
var i_presubstring=0
var i_message=0
var messagecontent=""
var messagebackground=""
var messagepresubstring=""
var messageaftersubstring=""
fntweight=fntweight*100
standstill=1000

var browserinfos=navigator.userAgent 
var ie4=document.all&&!document.getElementById&&!browserinfos.match(/Opera/)
var ie5=document.all&&document.getElementById&&!browserinfos.match(/Opera/)
var ns4=document.layers
var ns6=document.getElementById&&!document.all&&!browserinfos.match(/Opera/)
var opera=browserinfos.match(/Opera/)  
var browserok=ie4||ie5||ns4||ns6||opera

for (i=0;i<=message.length-1;i++) {
	message[i]=message[i]+" "
}

for (i=0;i<=message1.length-1;i++) {
	message1[i]=message1[i]+" "
}

for (i=0;i<=message2.length-1;i++) {
	message2[i]=message2[i]+" "
}

	for (i=0;i<=message3.length-1;i++) {
		message3[i]=message3[i]+" "
	}
	
	for (i=0;i<=message4.length-1;i++) {
		message4[i]=message4[i]+" "
	}
	
	for (i=0;i<=message5.length-1;i++) {
		message5[i]=message5[i]+" "
	}
	
	for (i=0;i<=message6.length-1;i++) {
		message6[i]=message6[i]+" "
	}
	
	function initiateticker() {
	tickerheight=document.body.clientHeight-5
    tickerwidth=document.body.clientWidth-5
	document.getElementById('ticker').style.left=leftposition
	document.getElementById('ticker').style.top=topposition
	showticker()
}

function initiateticker1() {
	tickerheight=document.body.clientHeight-5
    tickerwidth=document.body.clientWidth-5
	document.getElementById('ticker1').style.left=leftposition
	document.getElementById('ticker1').style.top=topposition
	showticker1()
}

function initiateticker2() {
	tickerheight=document.body.clientHeight-5
    tickerwidth=document.body.clientWidth-5
	document.getElementById('ticker2').style.left=leftposition
	document.getElementById('ticker2').style.top=topposition
	showticker2()
}

	function initiateticker3() {
		tickerheight=document.body.clientHeight
		tickerwidth=document.body.clientWidth
		document.getElementById('ticker3').style.left=leftposition
		document.getElementById('ticker3').style.top=topposition
		showticker3()
	}
	function initiateticker4() {
		tickerheight=document.body.clientHeight
		tickerwidth=document.body.clientWidth
		document.getElementById('ticker4').style.left=leftposition
		document.getElementById('ticker4').style.top=topposition
		showticker4()
	}
	function initiateticker5() {
		tickerheight=document.body.clientHeight
		tickerwidth=document.body.clientWidth
		document.getElementById('ticker5').style.left=leftposition
		document.getElementById('ticker5').style.top=topposition
		showticker5()
	}
	function initiateticker6() {
		tickerheight=document.body.clientHeight
		tickerwidth=document.body.clientWidth
		document.getElementById('ticker6').style.left=leftposition
		document.getElementById('ticker6').style.top=topposition
		showticker6()
	}

	function getmessagecontent() {
	messagepresubstring="Trainer:"+message[i_message].substring(0,i_presubstring)
	messageaftersubstring=message[i_message].substring(i_presubstring,i_substring)
	messagecontent="<table border=0 width=100 height=100><tr><td valign=top>"
	messagecontent+="<span style='position:relative; font-family:"+fnt+";color:"+fntcolor+";font-size:"+fntsize+"pt;font-weight:"+fntweight+"'>"	
	messagecontent+="<font color='"+fntcolor+"'>"
	messagecontent+=messagepresubstring
	messagecontent+="</font>"
	messagecontent+="</span>"
	messagecontent+="<span style='position:relative; font-family:"+fnt+";color:"+fntcolor+";font-size:"+fntsize+"pt;font-weight:900'>"	
	messagecontent+="<font color='"+fntcolorlastletter+"'>"
	messagecontent+=messageaftersubstring
	messagecontent+="</font>"
	messagecontent+="</span>"
	messagecontent+="</td></tr></table>"
}



function getmessagecontent1() {
	messagepresubstring="Client:"+message1[i_message].substring(0,i_presubstring)
	messageaftersubstring=message1[i_message].substring(i_presubstring,i_substring)
	messagecontent="<table border=0 width=100 height=100><tr><td valign=top>"
	messagecontent+="<span style='padding:13px border:5px solid #ccc; position:relative; font-family:"+fnt+";color:"+fntcolor+";font-size:"+fntsize+"pt;font-weight:"+fntweight+"'>"	
	messagecontent+="<font color='"+fntcolor+"'>"
	messagecontent+=messagepresubstring
	messagecontent+="</font>"
	messagecontent+="</span>"
	messagecontent+="<span style='padding:13px border:5px solid #ccc; position:relative; font-family:"+fnt+";color:"+fntcolor+";font-size:"+fntsize+"pt;font-weight:900'>"	
	messagecontent+="<font color='"+fntcolorlastletter+"'>"
	messagecontent+=messageaftersubstring
	messagecontent+="</font>"
	messagecontent+="</span>"
	messagecontent+="</td></tr></table>"
}

function getmessagecontent2() {
	messagepresubstring="client 2:"+message2[i_message].substring(0,i_presubstring)
	messageaftersubstring=message2[i_message].substring(i_presubstring,i_substring)
	messagecontent="<table border=0 width=100 height=100><tr><td valign=top>"
	messagecontent+="<span style='position:relative; font-family:"+fnt+";color:"+fntcolor+";font-size:"+fntsize+"pt;font-weight:"+fntweight+"'>"	
	messagecontent+="<font color='"+fntcolor+"'>"
	messagecontent+=messagepresubstring
	messagecontent+="</font>"
	messagecontent+="</span>"
	messagecontent+="<span style='position:relative; font-family:"+fnt+";color:"+fntcolor+";font-size:"+fntsize+"pt;font-weight:900'>"	
	messagecontent+="<font color='"+fntcolorlastletter+"'>"
	messagecontent+=messageaftersubstring
	messagecontent+="</font>"
	messagecontent+="</span>"
	messagecontent+="</td></tr></table>"
}

	function getmessagecontent3() {
		messagepresubstring="client 3:"+message3[i_message].substring(0,i_presubstring)
		messageaftersubstring=message3[i_message].substring(i_presubstring,i_substring)
		messagecontent="<table border=0 width=100 height=100><tr><td valign=top>"
		messagecontent+="<span style='position:relative; font-family:"+fnt+";color:"+fntcolor+";font-size:"+fntsize+"pt;font-weight:"+fntweight+"'>"	
		messagecontent+="<font color='"+fntcolor+"'>"
		messagecontent+=messagepresubstring
		messagecontent+="</font>"
		messagecontent+="</span>"
		messagecontent+="<span style='position:relative; font-family:"+fnt+";color:"+fntcolor+";font-size:"+fntsize+"pt;font-weight:900'>"	
		messagecontent+="<font color='"+fntcolorlastletter+"'>"
		messagecontent+=messageaftersubstring
		messagecontent+="</font>"
		messagecontent+="</span>"
		messagecontent+="</td></tr></table>"
	}
	
	function getmessagecontent4() {
		messagepresubstring="client 4:"+message4[i_message].substring(0,i_presubstring)
		messageaftersubstring=message4[i_message].substring(i_presubstring,i_substring)
		messagecontent="<table border=0 width=100 height=100><tr><td valign=top>"
		messagecontent+="<span style='position:relative; font-family:"+fnt+";color:"+fntcolor+";font-size:"+fntsize+"pt;font-weight:"+fntweight+"'>"	
		messagecontent+="<font color='"+fntcolor+"'>"
		messagecontent+=messagepresubstring
		messagecontent+="</font>"
		messagecontent+="</span>"
		messagecontent+="<span style='position:relative; font-family:"+fnt+";color:"+fntcolor+";font-size:"+fntsize+"pt;font-weight:900'>"	
		messagecontent+="<font color='"+fntcolorlastletter+"'>"
		messagecontent+=messageaftersubstring
		messagecontent+="</font>"
		messagecontent+="</span>"
		messagecontent+="</td></tr></table>"
	}
	
	function getmessagecontent5() {
		messagepresubstring="client 5:"+message5[i_message].substring(0,i_presubstring)
		messageaftersubstring=message5[i_message].substring(i_presubstring,i_substring)
		messagecontent="<table border=0 width=100 height=100><tr><td valign=top>"
		messagecontent+="<span style='position:relative; font-family:"+fnt+";color:"+fntcolor+";font-size:"+fntsize+"pt;font-weight:"+fntweight+"'>"	
		messagecontent+="<font color='"+fntcolor+"'>"
		messagecontent+=messagepresubstring
		messagecontent+="</font>"
		messagecontent+="</span>"
		messagecontent+="<span style='position:relative; font-family:"+fnt+";color:"+fntcolor+";font-size:"+fntsize+"pt;font-weight:900'>"	
		messagecontent+="<font color='"+fntcolorlastletter+"'>"
		messagecontent+=messageaftersubstring
		messagecontent+="</font>"
		messagecontent+="</span>"
		messagecontent+="</td></tr></table>"
	}
	
	function getmessagecontent6() {
		messagepresubstring="Manager:"+message6[i_message].substring(0,i_presubstring)
		messageaftersubstring=message6[i_message].substring(i_presubstring,i_substring)
		messagecontent="<table border=0 width=100 height=100><tr><td valign=top>"
		messagecontent+="<span style='position:relative; font-family:"+fnt+";color:"+fntcolor+";font-size:"+fntsize+"pt;font-weight:"+fntweight+"'>"	
		messagecontent+="<font color='"+fntcolor+"'>"
		messagecontent+=messagepresubstring
		messagecontent+="</font>"
		messagecontent+="</span>"
		messagecontent+="<span style='position:relative; font-family:"+fnt+";color:"+fntcolor+";font-size:"+fntsize+"pt;font-weight:900'>"	
		messagecontent+="<font color='"+fntcolorlastletter+"'>"
		messagecontent+=messageaftersubstring
		messagecontent+="</font>"
		messagecontent+="</span>"
		messagecontent+="</td></tr></table>"
	}
	
	function showticker() {
	if (i_substring<=message[i_message].length-1) {
		i_substring++
		i_presubstring=i_substring-1
		if (i_presubstring<0) {i_presubstring00}
		getmessagecontent()
		document.getElementById('ticker').innerHTML=messagecontent
		var timer=setTimeout("showticker()", speed)
	}
	else {
		clearTimeout(timer)
		var timer=setTimeout("changemessage1()", standstill)
	}
}

function showticker1() {
	if (i_substring<=message1[i_message].length-1) {
		i_substring++
		i_presubstring=i_substring-1
		if (i_presubstring<0) {i_presubstring00}
		getmessagecontent1()
		document.getElementById('ticker1').innerHTML=messagecontent
		var timer=setTimeout("showticker1()", speed)
	}
	else {
		clearTimeout(timer)
		var timer=setTimeout("changemessage1()", standstill)
	}
}

function showticker2() {
	if (i_substring<=message2[i_message].length-1) {
		i_substring++
		i_presubstring=i_substring-1
		if (i_presubstring<0) {i_presubstring00}
		getmessagecontent2()
		document.getElementById('ticker2').innerHTML=messagecontent
		var timer=setTimeout("showticker2()", speed)
	}
	else {
		clearTimeout(timer)
		var timer=setTimeout("changemessage2()", standstill)
	}
}

	function showticker3() {
		if (i_substring<=message3[i_message].length-1) {
			i_substring++
			i_presubstring=i_substring-1
			if (i_presubstring<0) {i_presubstring00}
			getmessagecontent3()
			document.getElementById('ticker3').innerHTML=messagecontent
			var timer=setTimeout("showticker3()", speed)
		}
		else {
			clearTimeout(timer)
			var timer=setTimeout("changemessage3()", standstill)
		}
	}
	function showticker4() {
		if (i_substring<=message4[i_message].length-1) {
			i_substring++
			i_presubstring=i_substring-1
			if (i_presubstring<0) {i_presubstring00}
			getmessagecontent4()
			document.getElementById('ticker4').innerHTML=messagecontent
			var timer=setTimeout("showticker4()", speed)
		}
		else {
			clearTimeout(timer)
			var timer=setTimeout("changemessage4()", standstill)
		}
	}
	function showticker5() {
		if (i_substring<=message5[i_message].length-1) {
			i_substring++
			i_presubstring=i_substring-1
			if (i_presubstring<0) {i_presubstring00}
			getmessagecontent5()
			document.getElementById('ticker5').innerHTML=messagecontent
			var timer=setTimeout("showticker5()", speed)
		}
		else {
			clearTimeout(timer)
			var timer=setTimeout("changemessage5()", standstill)
		}
	}
	function showticker6() {
		if (i_substring<=message6[i_message].length-1) {
			i_substring++
			i_presubstring=i_substring-1
			if (i_presubstring<0) {i_presubstring00}
			getmessagecontent6()
			document.getElementById('ticker6').innerHTML=messagecontent
			var timer=setTimeout("showticker6()", speed)
		}
		else {
			clearTimeout(timer)
			var timer=setTimeout("changemessage6()", standstill)
		}
	}
	function changemessage() {
	i_substring=0
	i_presubstring=0
	i_message++
	if (i_message>message.length-1) {
		i_message=0
	}
	showticker()
}

function changemessage1() {
	i_substring=0
	i_presubstring=0
	i_message++
	if (i_message>message1.length-1) {
		i_message=0
	}
	showticker1()
}

function changemessage2() {
	i_substring=0
	i_presubstring=0
	i_message++
	if (i_message>message2.length-1) {
		i_message=0
	}
	showticker2()
}

	function changemessage3() {
		i_substring=0
		i_presubstring=0
		i_message++
		if (i_message>message3.length-1) {
			i_message=0
		}
		showticker3()
		}
		
	function changemessage4() {
		i_substring=0
		i_presubstring=0
		i_message++
		if (i_message>message4.length-1) {
			i_message=0
		}
		showticker4()
	}
	function changemessage5() {
		i_substring=0
		i_presubstring=0
		i_message++
		if (i_message>message5.length-1) {
			i_message=0
		}
		showticker5()
	}
	function changemessage6() {
		i_substring=0
		i_presubstring=0
		i_message++
		if (i_message>message6.length-1) {
			i_message=0
		}
		showticker6()
	}	
		
	if (browserok) {window.onload=initiateticker();
	window.onload=initiateticker1();
	window.onload=initiateticker2();
	window.onload=initiateticker3();
	window.onload=initiateticker4();
	window.onload=initiateticker5();
	window.onload=initiateticker6();

}
</script>

</body>
</html>

<?php 
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
		echo '<script>window.location="login.php";</script>';
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


<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<title>Gamified Training</title>
		<link rel="shortcut icon" href="../favicon.ico"> 
		<link rel="stylesheet" type="text/css" href="css/component.css" />
        <script src="js/modernizr.custom.63321.js"></script>
		<script src="js/modernizr.custom.js"></script>
        <link rel="stylesheet" type="text/css" href="css/style1.css" />
	</head>
	<body>
		<div class="container">	
			<div id="bl-main" class="bl-main">
				<section>
					<div class="bl-box">
						<h2 class="bl-icon bl-icon-about">Training</h2>
					</div>
					<div class="bl-content">
						<!--h2>About training</h2-->
<?
if($_SERVER['HTTP_REFERER']=='http://localhost/gamify/login.php'&&!empty($_SESSION["name"]))
	{ 		
					echo '<script>window.location="login.php";</script>';
	}else{
?>													
							        <div class="container">										
										<section class="main">
											<form class="form-2" action="" method="post">
												<h1><span class="log-in">Log in</span> or <span class="sign-up">sign up</span></h1>
												<p class="float">
													<label for="login"><i class="icon-user"></i>Username</label>
													<input type="text" name="name" placeholder="Username or email">
												</p>
												<p class="float">
													<label for="password"><i class="icon-lock"></i>Password</label>
													<input type="password" name="pass" placeholder="Password" class="showpassword">
												</p>
												<p class="clearfix"> 
													<a href="#" class="log-twitter">Sign Up</a>    
													<input type="submit" name="login" value="Log in">
												</p>
											</form>​​
										</section>
							        </div>

							    <h2 align="center">You must be logged in to start training.</h2>
<?	}
 
?>
					</div>
					<span class="bl-icon bl-icon-close"></span>
				</section>
				<section id="bl-work-section">
					<div class="bl-box">
						<h2 class="bl-icon bl-icon-works">Assessment</h2>
					</div>

					<div class="bl-content">

<?
if(empty($_SESSION["name"]))
	{ ?>
									<div class="container">										
										<section class="main">
											<form class="form-2" action="" method="post">
												<h1><span class="log-in">Log in</span> or <span class="sign-up">sign up</span></h1>
												<p class="float">
													<label for="login"><i class="icon-user"></i>Username</label>
													<input type="text" name="name" placeholder="Username or email">
												</p>
												<p class="float">
													<label for="password"><i class="icon-lock"></i>Password</label>
													<input type="password" name="pass" placeholder="Password" class="showpassword">
												</p>
												<p class="clearfix"> 
													<a href="#" class="log-twitter">Sign Up</a>    
													<input type="submit" name="login" value="Log in">
												</p>
											</form>​​
										</section>
							        </div>
							      <h2 align="center">You must be logged in to start assessment.</h2>

<?	}
else{ ?>

										<h2>My Assessment</h2>
										<p>Know your level through series of Assessments and have fun.</p>
										<ul id="bl-work-items">
											<li data-panel="panel-1"><a href="#"><img src="images/l1.png" /></a></li>
											<li data-panel="panel-2"><a href="#"><img src="images/l2.png" /></a></li>
											<li data-panel="panel-3"><a href="#"><img src="images/l3.png" /></a></li>
											<li data-panel="panel-4"><a href="#"><img src="images/l4.png" /></a></li>
										</ul>
<?	} ?>
					</div>
					<span class="bl-icon bl-icon-close"></span>
				</section>
				<section>
					<div class="bl-box">
						<h2 class="bl-icon bl-icon-blog">Reward</h2>
					</div>
					<div class="bl-content">
						<h2>Rewards Gained</h2>
<?
if(empty($_SESSION["name"]))
	{ ?>		
										<div class="container">										
										<section class="main">
											<form class="form-2" action="" method="post">
												<h1><span class="log-in">Log in</span> or <span class="sign-up">sign up</span></h1>
												<p class="float">
													<label for="login"><i class="icon-user"></i>Username</label>
													<input type="text" name="name" placeholder="Username or email">
												</p>
												<p class="float">
													<label for="password"><i class="icon-lock"></i>Password</label>
													<input type="password" name="pass" placeholder="Password" class="showpassword">
												</p>
												<p class="clearfix"> 
													<a href="#" class="log-twitter">Sign Up</a>    
													<input type="submit" name="login" value="Log in">
												</p>
											</form>​​
										</section>
							        </div>
							      <h2 align="center">You must be logged in to have a look at it.</h2>

<?	}
else{ ?>
						<article>
							<h3>Coins Collected</h3>
							<p>You have collected <b><?=$_SESSION['coins'];?> </b> number of coins.</p>
						</article>
						<article>
							<h3>Life Reamining</h3>
							<p>You have <b><?=$_SESSION['lifes'];?></b> lifes remaining.</p>
						</article>
						<article>
							<h3>Buy new life</h3>
							<p>You are now at achievement level : <b><?=$_SESSION['ach'];?></b>. You may buy new lifes online.</p>
						</article>
						<article>
							<h3>About the characters</h3>
							<p>There are 5 characters which represent your 5 lifes initially given at the game.<br>They are accountant, security officer, cashier, manager and a client. In case you lose any one of them, you may buy it online to continue.</p>
						</article>
<?	} ?>
					</div>
					<span class="bl-icon bl-icon-close"></span>
				</section>
				<section>
					<div class="bl-box">
						<h2 class="bl-icon bl-icon-contact">Trending</h2>
					</div>
					<div class="bl-content">
						<h2>Most Trending Training Sessions</h2>
						<p>
							<font size="5">
							<li>Mutual Funding</li>
							<li>Stocks</li>
						</font>
						</p>
					</div>
					<span class="bl-icon bl-icon-close"></span>
				</section>
				<!-- Panel items for the works -->
				<div class="bl-panel-items" id="bl-panel-work-items">
					<div data-panel="panel-1">
						<div>
							<img src="images/l1.png" />
							<h3><?=$_SESSION['qstn1'];?></h3>
							<p><form action="" method="post">
								<textarea name="l1" placeholder="Describe with keywords"></textarea><br>
								<input type="submit" class="buttom" value="Submit">
								</form>
		<img src="images/c2.png" height="110px"> This question is for <?=$_SESSION['diflev1']*100;?> coins.

							</p>
						</div>
					</div>
					<div data-panel="panel-2">
						<div>
							<img src="images/l2.png" />
							<h3><?=$_SESSION['qstn2'];?></h3>
							<p><form action="" method="post">
								<textarea name="l1" placeholder="Describe with keywords"></textarea><br>
								<input type="submit" class="buttom" value="Submit">
								</form>
								<img src="images/c2.png" height="110px"> This question is for <?=$_SESSION['diflev2']*100;?> coins.
							</p>						</div>
					</div>
					<div data-panel="panel-3">
						<div>
							<img src="images/l3.png" />
							<h3><?=$_SESSION['qstn3'];?></h3>
							<p><form action="" method="post">
								<textarea name="l1" placeholder="Describe with keywords"></textarea><br>
								<input type="submit" class="buttom" value="Submit">
								</form>
				<img src="images/c2.png" height="110px"> This question is for <?=$_SESSION['diflev3']*100;?> coins.

							</p>						</div>
					</div>
					<div data-panel="panel-4">
						<div>
							<img src="images/l4.png" />
							<h3><?=$_SESSION['qstn4'];?></h3>
							<p><form action="" method="post">
								<textarea name="l1" placeholder="Describe with keywords"></textarea><br>
								<input type="submit" class="buttom" value="Submit">
								</form>
						<img src="images/c2.png" height="110px"> This question is for <?=$_SESSION['diflev4']*100;?> coins.

							</p>						</div>
					</div>
					<nav>
						<span class="bl-next-work">&gt; Next &raquo;</span>
						<span class="bl-icon bl-icon-close"></span>
					</nav>
				</div>
			</div>
		</div><!-- /container -->


		<script src="js/jquery.min.js"></script>
		<script src="js/boxlayout.js"></script>
		<script>
			$(function() {
				Boxlayout.init();
			});
		</script>


        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
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
	</body>
</html>

<?php 
header('Content-Type:text/css');
//$bgcolor=$_SESSION['css']['bgcolor_of_user'];
if(empty($_GET['bgcolor']))
	$bgcolor="purple";
else
	//$bgcolor="";
	$bgcolor=$_GET['bgcolor'];
?>

/* CSS Document */

body
{
	/*background:#3b5997;*/
	background:<?php echo $bgcolor; ?>;
	font-family:Verdana, Geneva, sans-serif;
	font-size:12px;
}
#container
{
	width:250px;
	height:auto;
	margin:0 auto 0 auto; 	
}
#fbpost
{
	width:230px;
	height:20px;
	border:1px solid #ccc;
    background:transparent; 
	border:0;
	font-size:12px;
	font-family:Verdana, Geneva, sans-serif;
}

/* ============================================================================================================================
== TWITTER
** ============================================================================================================================ */

.example-twitter {
	position:relative;
	padding:10px;
	margin:0px 0 0.1em;
	color:#333;
	background:#eee;
	/* css3 */
	-webkit-border-radius:10px;
	-moz-border-radius:10px;
	border-radius:10px;
}

.example-twitter p {font-size:28px; line-height:1.25em;}

/* this isn't necessary, just saves me having to edit the HTML of the demo */
.example-twitter:before {
	
	position:absolute;
	top:-20px;
	left:0;
	width:75px;
	height:36px;
    /* reduce the damage in FF3.0 */
    display:block; 
}

/* creates the triangle */
.example-twitter:after {
	content:"";
	position:absolute;
	top:-20px;
	left:40px;
	border:10px solid transparent;
	border-bottom-color:#eee;
    /* reduce the damage in FF3.0 */
    display:block; 
    width:0;
}

/* display of quote author (alternatively use a class on the element following the blockquote) */
.example-twitter + p {padding-left:15px; font:14px Arial, sans-serif;}

#fbpost:focus
{
	background:transparent; 
	border:0;
}

.postfb
{
	margin-left:197px;
}
.button
{
color: #fff;
font-size: 11px;
padding: 2px;
padding-left:4px;padding-right:4px;
text-decoration:none;
background: rgb(0, 87, 163);
background: -moz-linear-gradient(90deg, rgb(0, 87, 163) 30%, rgb(0, 92, 161) 73%);
background: -webkit-linear-gradient(90deg, rgb(0, 87, 163) 30%, rgb(0, 92, 161) 73%);
background: -o-linear-gradient(90deg, rgb(0, 87, 163) 30%, rgb(0, 92, 161) 73%);
background: -ms-linear-gradient(90deg, rgb(0, 87, 163) 30%, rgb(0, 92, 161) 73%);
background: linear-gradient(0deg, rgb(0, 87, 163) 30%, rgb(0, 92, 161) 73%);
font-family:Verdana, Geneva, sans-serif;
-webkit-box-shadow: 0px 3px 7px rgba(50, 50, 50, 0);
-moz-box-shadow:    0px 3px 7px rgba(50, 50, 50, 0);
box-shadow:         0px 3px 7px rgba(50, 50, 50, 0);
}


/* ============================================================================================================================
== BUBBLE WITH A BORDER AND TRIANGLE
** ============================================================================================================================ */

/* THE SPEECH BUBBLE
------------------------------------------------------------------------------------------------------------------------------- */

.triangle-border {
	position:relative;
	padding:13px;
	margin:1em 1em 1em;
	border:5px solid #ccc;
	color:#333;
	background:#fff;
	/* css3 */
	-webkit-border-radius:10px;
	-moz-border-radius:10px;
	border-radius:10px;
}

/* Variant : for left positioned triangle
------------------------------------------ */

.triangle-border.left {
	margin-left:60px;
}

/* Variant : for right positioned triangle
------------------------------------------ */

.triangle-border.right {
	margin-right:30px;
}

/* THE TRIANGLE
------------------------------------------------------------------------------------------------------------------------------- */

.triangle-border:before {
	content:"";
	position:absolute;
	bottom:-20px; /* value = - border-top-width - border-bottom-width */
	left:40px; /* controls horizontal position */
    border-width:20px 20px 0;
	border-style:solid;
    border-color:#5a8f00 transparent;
    /* reduce the damage in FF3.0 */
    display:block; 
    width:0;
}

/* creates the smaller  triangle */
.triangle-border:after {
	content:"";
	position:absolute;
	bottom:-13px; /* value = - border-top-width - border-bottom-width */
	left:47px; /* value = (:before left) + (:before border-left) - (:after border-left) */
	border-width:13px 13px 0;
	border-style:solid;
	border-color:#fff transparent;
    /* reduce the damage in FF3.0 */
    display:block; 
    width:0;
}

/* Variant : top
------------------------------------------ */

/* creates the larger triangle */
.triangle-border.top:before {
	top:-20px; /* value = - border-top-width - border-bottom-width */
	bottom:auto;
	left:auto;
	right:40px; /* controls horizontal position */
    border-width:0 20px 20px;
}

/* creates the smaller  triangle */
.triangle-border.top:after {
	top:-13px; /* value = - border-top-width - border-bottom-width */
	bottom:auto;
	left:auto;
	right:47px; /* value = (:before right) + (:before border-right) - (:after border-right) */
    border-width:0 13px 13px;
}

/* Variant : left
------------------------------------------ */

/* creates the larger triangle */
.triangle-border.left:before {
	top:10px; /* controls vertical position */
	bottom:auto;
	left:-30px; /* value = - border-left-width - border-right-width */
	border-width:15px 30px 15px 0;
	border-color:transparent #ccc;
}

/* creates the smaller  triangle */
.triangle-border.left:after {
	top:16px; /* value = (:before top) + (:before border-top) - (:after border-top) */
	bottom:auto;
	left:-21px; /* value = - border-left-width - border-right-width */
	border-width:9px 21px 9px 0;
	border-color:transparent #fff;
}

/* Variant : right
------------------------------------------ */

/* creates the larger triangle */
.triangle-border.right:before {
	top:10px; /* controls vertical position */
	bottom:auto;
    left:auto;
	right:-30px; /* value = - border-left-width - border-right-width */
	border-width:15px 0 15px 30px;
	border-color:transparent #ccc;
}

/* creates the smaller  triangle */
.triangle-border.right:after {
	top:16px; /* value = (:before top) + (:before border-top) - (:after border-top) */
	bottom:auto;
    left:auto;
	right:-21px; /* value = - border-left-width - border-right-width */
	border-width:9px 0 9px 21px;
	border-color:transparent #fff;
}

#display
{
	width:auto;
	height:auto;
}
#leftdisplay
{
	width:35px;
	height:35px;
	float:left;
	padding:4px;
	background:#bbb;
	border-radius:8px;
}
#rightdisplay
{
	width:280px;
	height:auto;
	float:left;
}
.blu
{ color:#999;}
#viewpost
{
	background:#fff;
	padding:10px;
}
/*.headname{color:#3b5997; font-weight:bold;}*/
.headname{color:#bdbcdb; font-weight:bold;}
.time{font-size:9px; color:#999;}
.cursor{cursor: pointer; color:yellow;}
.cursor:hover{ text-decoration:underline;}
.rt{ padding-left:200px;}
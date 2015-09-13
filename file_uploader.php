<html>
    <head>
        <title>File Uploaded</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    </head>
    
    <body>
        
        <div>
            &nbsp;&nbsp; Welcome ADMIN!
        </div>
        
        
<div>
<table align=center>
<td>
<div align="left">


<?php
//$link = mysql_connect('fdb3.freehostingeu.com','1529183_nfdata','9342434037sns'); 
$fname=str_replace(' ','',$_FILES['file']['name']);
if( $fname != "" )
{
   copy( $_FILES['file']['tmp_name'], "$fname" ) or 
           die( "Could not copy file!");	
}
else
{
    die("No file specified!");
}
?>

<h2>Uploaded File Info:</h2>
<ul>
<li>Sent file: <?php echo $_FILES['file']['name'];  ?>
<li>File size: <?php echo round($_FILES['file']['size']/1024);  ?> KB
<li>File type: <?php echo $_FILES['file']['type'];  ?>
</ul>
<br>
<a href="upload.php">Upload another file</a>
</div>
</td>
</table>			
</div>
       
            <div>
                <p>&copy; 2014 SNS Production<br>All Rights Reserved.<br><a href="http://www.netfreaks.me.pn"></a></p> 
            </div>
    </body>
</html>

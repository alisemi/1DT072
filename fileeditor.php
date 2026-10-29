<?php

# Run this script on your own computer with the follwing instructions (assuming
# you have php installed) or follow the lab instructions.
# $ php -S localhost:3000
# Reach it in a browser at http://localhost:3000/fileeditor.php


#require('auth.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Edit any file</title>
	<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1" />
	<style>
* {padding: 0;margin: 0;}
body {
	font: normal 95%/1.7 "Lucida Grande", "Lucida Sans Unicode", tahoma, verdana, arial, sans-serif;
	color: #333;
	padding: 1%;
}
label,textarea {display: block;}
textarea {
	width: 99%;
	height: 95%;
	background: #efefef;
	border: 1px solid #ccc;
}
.green label {color: green;}
.red label {color: red;}
</style>
</head>
<body>
<?php
$t=true;
# Check if a file name within /tmp/ directory is given otherwise show a form
# where a file name can be entered
$file = $_REQUEST['file'];
if(substr($file,0,5) != "/tmp/")
{
	echo '<form action="?" method="get"><p><label for="file">File</label> <input type="text" name="file" id="file" /></p><input type="submit" value="send" /></form></body></html>'; exit;
}
# From now on $_REQUEST['file'] is not empty i.e. a file name is given.
# Write to file if the field 'text' was submited
if(!empty($_REQUEST['text'])){
	function file_write_contents( $filename , $contents, $mode='w+' )
	{
#		if(is_writable($filename))
#			{
				if (!$handle = fopen($filename, $mode)) {return false;}
				if (!fwrite($handle, $contents)) {return false;}
				fclose($handle);
				return true;
#			}
#			else {
#				return false;
#			}
	}
	$t=(file_write_contents($file,stripslashes($_REQUEST['text'])));
}
echo '<form method="post" action="?file='.$file.'">
	<p class="'.($t?'green':'red').'"><label for="text">';
echo ' '.$file.'</label>
	<textarea name="text" rows="30" cols="60">'.str_replace(
array('&','<','>'),array('&amp;','&lt;','&gt;'),
@file_get_contents($file)).'</textarea></p>
	<input type="submit" value="send" />
</form>';
?></body></html>


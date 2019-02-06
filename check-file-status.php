<?php
//simple script to check the status of a file in a directory. Trigger it with a cron job or by vising this file in a web browser.
$filename = 'file.xml';
$filemtime = filemtime($filename);
$time = 129600; //36 hours in seconds

//if the file is missing
if( ! file_exists($filename) ) {
	echo "the file is missing";
    $msg = "The file is missing. please check for a problem.";
mail("your@email.com","ALERT: FILE IS MISSING",$msg);	
}
//if the file is not missing
else{
//if the file is older than 36 hours
if( time() - $filemtime >= $time ) {
	echo "the file is stale";
    $modified = date ("F d Y H:i:s.", $filemtime);
    $msg = "The file is stale. please check for a problem. It was last updated: {$modified}";
mail("your@email.com","ALERT: FILE IS STALE",$msg);	
	}
else {
//if the file is less than 36 hours old
	echo "the file is ok";
    $modified = date ("F d Y H:i:s.", $filemtime);
    $msg = "The file last updated: {$modified}";
mail("your@email.com","File Status",$msg);
}
}
?> 

<?php

require_once('ini.php');

connect_db();	

// TAG INFORMATION
	$name        = trim($_REQUEST['name']);
	$time        = trim($_REQUEST['time']);
	$clicks        = trim($_REQUEST['clicks']);

    $addScore  = "INSERT INTO `leaderboard` (`name`, `time`, `clicks`) VALUES ('$name','$time','$clicks')";

    mysql_query($addScore) or die(mysql_error());

  mysql_close();
  
function connect_db() {
	global $hostName;
	global $userName;
	global $pw;
			
	if(!($link=mysql_pconnect($hostName, $userName, $pw))) 
	{
		echo "before error<br />";
		echo "error connecting to host";
		exit;
	}
	else
	
	mysql_select_db("map-match");
	
}

?>
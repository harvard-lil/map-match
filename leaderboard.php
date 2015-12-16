<?php

require_once('ini.php');

connect_db();	

// TAG INFORMATION
	$name        = trim($_REQUEST['name']);
	$time        = trim($_REQUEST['time']);
	$clicks        = trim($_REQUEST['clicks']);

    $addScore  = "INSERT INTO `leaderboard` (`name`, `time`, `clicks`) VALUES ('$name','$time','$clicks')";

    mysql_query($addScore) or die(mysql_error());
    
    $retrieve = mysql_query("SELECT * FROM `leaderboard` ORDER BY `time` ASC limit 5") or die(mysql_error());
    $item_details = array();
    while($row = mysql_fetch_assoc($retrieve)) {
        $item_details[] = $row;
    }
    
    mysql_close($con);
	header('Content-Type: application/json');
    echo json_encode(array('items' => $item_details));

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
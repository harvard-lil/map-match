<?php

require_once('ini.php');

	connect_db();	

	// insert new score if we get a post
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$name        = trim($_REQUEST['name']);
		$time        = trim($_REQUEST['time']);
		$clicks        = 5;

	    $addScore  = "INSERT INTO `leaderboard` (`name`, `time`, `clicks`) VALUES ('$name','$time','$clicks')";

	    mysql_query($addScore) or die(mysql_error());
	}
    
    // retrieve the top ten
    $retrieve = mysql_query("SELECT * FROM `leaderboard` ORDER BY `time` ASC limit 10") or die(mysql_error());
    $item_details = array();
    while($row = mysql_fetch_assoc($retrieve)) {
        $item_details[] = $row;
    }
    
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
	
	mysql_select_db("map_match");
	
}

?>
<?php
	$connection = mysql_connect('localhost', 'anokhagame', 'cyber#hunt@2015');
	if (!$connection)
	{
	    die("Database Connection Failed" . mysql_error());
	}	
	$select_db = mysql_select_db('treasurehunt');
	if (!$select_db)
	{
		die("Database Selection Failed" . mysql_error());
	}
?>
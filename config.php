<?php

	// This is set if we were to host the website locally

	$host = "localhost";
	$username = "root";
	$password = "root";
	$dbname = "game_catalogue";
	$dsn = "mysql:host=$host;dbname=$dbname";
	$options = array (
		PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
	)

?>


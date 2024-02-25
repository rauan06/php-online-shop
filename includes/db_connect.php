<?php

	$server = 'localhost';
	$login = 'root';
	$pass = '';
	$db = 'shop';
	
	$link = mysqli_connect($server,$login,$pass);

	$select_db = mysqli_select_db($link, $db);
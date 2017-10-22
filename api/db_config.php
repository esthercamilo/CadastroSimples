<?php
	define (DB_USER, "root");
	define (DB_PASSWORD, "root");
	define (DB_DATABASE, "CROSSKNOWLEDGE");
	define (DB_HOST, "127.0.0.1:3306");
	$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
?>

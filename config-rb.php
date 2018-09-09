<?php

require 'plugins/rb.php';
R::setup('mysql:host=localhost;dbname=lms', 'root', '');

$dbhost = 'localhost';
$dbname = 'lms';
$dbuser = 'root';
$dbpass = '';


try {
	
	$pdo = new PDO("mysql:host={$dbhost};dbname={$dbname}",$dbuser,$dbpass);
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}

catch(PDOException $e){
	echo "Connection error".$e->getMessage();
}


?>
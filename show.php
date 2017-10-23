<?php
date_default_timezone_set('Europe/Vilnius');
define('SERVER', "localhost");
define('USER', "root");
define('PASS', "");
define('DATABASE', "students");
try {

	$conn = new PDO("mysql:host=" . SERVER .";dbname=" . DATABASE . ";charset=utf8", USER, PASS);
    // set the PDO error mode to exception
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$q = $conn->prepare("SELECT * FROM users"); 
	$q->execute();

	$users = $q->fetchAll(PDO::FETCH_ASSOC);
	$conn = null;
} catch(PDOException $e) {
	echo "Connection failed: " . $e->getMessage();
}
echo json_encode($users);
?>
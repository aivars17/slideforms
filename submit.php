<?php
date_default_timezone_set('Europe/Vilnius');
	define('SERVER', "localhost");
	define('USER', "root");
	define('PASS', "");
	define('DATABASE', "students");

if (isset($_POST['name']) && $_POST['name'] != null) {
	
try {
	$conn = new PDO("mysql:host=localhost;dbname=students;", "root", "");
    // set the PDO error mode to exception
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	/*$conn->query("INSERT INTO users (name) VALUES ('as')");
	$conn->execute();*/
	$statement = $conn->prepare("INSERT INTO users (name, surname, email, phone) VALUES (:name, :surname, :email, :phone)");
	$statement->bindParam(':name', $_POST['name']);
	$statement->bindParam(':surname', $_POST['surname']);
	$statement->bindParam(':email', $_POST['email']);
	$statement->bindParam(':phone', $_POST['phone']);
	//$statement->execute($_POST);
	$statement->execute();
	$conn = null;
	echo '<div class="alert alert-success" role="alert">User was added</div>';
} catch(PDOException $e) {
	echo "Connection failed: " . $e->getMessage();
}
} else {
	echo '<div class="alert alert-danger" role="alert">No data</div>';
}






?>
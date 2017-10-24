<?php

header("Content-type:application/json");


if(isset($_POST['name']) && $_POST['name'] != "") {
	try {
	    $conn = new PDO("mysql:host=localhost;dbname=students;charset=utf8", "root", "");
	    // set the PDO error mode to exception
	    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	    $statement = $conn->prepare("INSERT INTO users (name, surname, email, phone)
	    	VALUES (:name, :surname, :email, :phone)");
	   	

	   	// variantas 1
	   $statement->bindParam(':name', $_POST['name']);
	   $statement->bindParam(':surname', $_POST['surname']);
	   $statement->bindParam(':email', $_POST['email']);
	   $statement->bindParam(':phone', $_POST['phone']);
	   $statement->execute();

	   // variantas 2
	   // $statement->execute($_POST);


	    $conn = null;
	  	$response['message'] = ['type' => 'success','body' => 'User was added'];

	} catch(PDOException $e) {
	    $response['message'] = ['type' => 'danger','body' => $e->getMessage()];
	}
} else {
	$response['message'] = ['type' => 'warning','body' => 'No user data to submit'];
}

try {

    $conn = new PDO("mysql:host=localhost;dbname=students;charset=utf8", "root", "");
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    if (isset($_GET['filter'])) {
    	$statement = $conn->prepare("SELECT * FROM users WHERE id >= :id");
    	$statement->bindParam(':id', $_GET['filter']);
    	$statement->execute();
    	$response['users'] = $statement->fetchAll(PDO::FETCH_ASSOC);
    } else {
    	$statement = $conn->query("SELECT * FROM users");
    	$response['users'] = $statement->fetchAll(PDO::FETCH_ASSOC);
    }
    

    $conn = null;
  
} catch(PDOException $e) {
    $response['message'] = ['type' => 'danger','body' =>  $e->getMessage()];
}

echo json_encode($response);
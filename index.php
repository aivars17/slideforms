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
?>


<!DOCTYPE html>
<html>
<head>
	<title>Formos</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
	<meta charset="utf-8">
	<script src="https://code.jquery.com/jquery-3.2.1.js" integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE=" crossorigin="anonymous"></script>

</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col">
				<div class="row">
					<div class="col">
						<h1>Users</h1>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<h2>List</h2>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<table class="table">
							<thead>
								<tr>
									
									<th>First Name</th>
									<th>Last Name</th>
									<th>Email</th>
									<th>Phone number</th>
								</tr>
							</thead>
							<tbody id="user_table_body">
								<?php
								foreach ($users as $user) {
									echo "<tr>

									<td>".$user['name']."</td>
									<td>".$user['surname']."</td>
									<td>".$user['email']."</td>
									<td>".$user['phone']."</td>
									</tr>";

								}

								?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<div class="col">
				<h2>Register</h2>
				<div id="alert"></div>
				<form method="POST" action="submit.php">
					<div class="input-group">
						<input class="form-control" type="text" name="name" placeholder="Name" id="form_name">
					</div><br/>
					<div class="input-group">
						<input class="form-control" type="text" name="surname"	placeholder="Surname" id="form_surname">
					</div><br/>
					<div class="input-group">
						<input class="form-control" type="text" name="email" placeholder="Email" id="form_email">
					</div><br/>
					<div class="input-group">
						<input class="form-control" type="text" name="phone" placeholder="Phone" id="form_phone">
					</div><br/>
					<div class="input-group">
						<input class="btn btn-dark" type="submit" name="Irasyti" value="submit">
						<input onclick="add()" class="btn btn-success" type="button" value="Add">
						<input id="ajax_post" class="btn btn-warning" type="button" value="Add">
					</div>
					
				</form>	
			</div>
		</div>
	</div>
	<script src="js/script.js"></script>
</body>
</html>
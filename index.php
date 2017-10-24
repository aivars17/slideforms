<!doctype html>
<html lang="en">
<head>
	<title>Formos</title>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
	<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
	  <style>
	  	
	  	h2 {
	  		padding: 15px;
	  	}
	  </style>
</head>
<body>
	<div class="container">
		
	</div>
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<h2>List</h2>
				<input class="form-control" type="number" id="filter" name="">
				<table class="table table-sm">
					<thead>
						<th>#</th>
						<th>Name</th>
						<th>Surname</th>
						<th>Email</th>
						<th>Phone</th>
					</thead>
					<tbody id="user_table_body">
					</tbody>
				</table>
			</div>
			<div class="col-md-4">
				<h2>Register</h2>
				<div id="alert"></div>
				<div class="input-group">
					<input id="form_name" class="form-control" type="text" name="name" placeholder="Name">
				</div><br/>
				<div class="input-group">
					<input id="form_surname" class="form-control" type="text" name="surname" placeholder="Surname">
				</div><br/>
				<div class="input-group">
					<input id="form_email" class="form-control" type="email" name="email" placeholder="Email">
				</div><br/>
				<div class="input-group">
					<input  id="form_phone" class="form-control" type="text" name="phone" placeholder="Phone Number">
				</div><br/>
				<div class="input-group">
					<input id="ajax_post" class="btn btn-danger" type="button" value="Add user">
				</div>
			</div>
		</div>
	</div>
<script src="js/script.js"></script>
</body>
</html>
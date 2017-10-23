function add() {
			name = document.getElementById('form_name').value;
			surname = document.getElementById('form_surname').value;
			email = document.getElementById('form_email').value;
			phone = document.getElementById('form_phone').value;
			
			user_table_body = document.getElementById("user_table_body");
			user_table_body.innerHTML += "<tr><td>" + name + "</td><td>" + surname + "</td><td>" + email + "</td><td>" + phone + "</td></tr>";
		}

		$("#ajax_post").click(function(){
			$.post("submit.php",
			{
				name: $("#form_name").val(),
				surname: $("#form_surname").val(),
				email: $("#form_email").val(),
				phone: $("#form_phone").val()
			},
			function(data, status){
				$("#alert").html(data);
				$.getJSON("show.php", function(result){
					$("#user_table_body").html('');
				$.each(result, function(i,field){
					$("#user_table_body").append("<tr><td>" + field.name + "</td><td>" + field.surname + "</td><td>" + field.email + "</td><td>" + field.phone + "</td></tr><br/>");
				});
			});

			});

		});
$("#ajax_post").click(function(){

	$.post("users.php",
	{
		name: $("#form_name").val(),
		surname: $("#form_surname").val(),
		email: $("#form_email").val(),
		phone: $("#form_phone").val()
	},
	function(data, status){

		$("#alert").html("<div class='alert alert-"+data.message.type+"'>" + data.message.body + "</div>");
	   	$.getJSON("users.php", function(result){

			$("#user_table_body").html('');
			$.each(result['users'], function(i, field){
				$("#user_table_body").append("<tr><td>" + field.name + "</td><td>" + field.surname + "</td><td>" + field.email + "</td><td>" + field.phone + "</td></tr>");
			});
		});
	});

});

$.getJSON("users.php", function(result){
	$("#user_table_body").html('');
	$.each(result['users'], function(i, field){
		$("#user_table_body").append("<tr><td>" + field.id + "</td><td>" + field.name + "</td><td>" + field.surname + "</td><td>" + field.email + "</td><td>" + field.phone + "</td></tr>");
	});
});



$("#filter").keyup(function(){
	console.log($("#filter").val());
	$.getJSON("users.php",
	{
		filter: $("#filter").val(),
	},
	 function(result){

			$("#user_table_body").html('');
			$.each(result['users'], function(i, field){
				$("#user_table_body").append("<tr><td>" + field.id + "</td><td>" + field.name + "</td><td>" + field.surname + "</td><td>" + field.email + "</td><td>" + field.phone + "</td></tr>");
	});

});
});

$.getJSON("users.php", function(result){
	$("#user_table_body").html('');
	$.each(result['users'], function(i, field){
		$("#user_table_body").append("<tr><td>" + field.id + "</td><td>" + field.name + "</td><td>" + field.surname + "</td><td>" + field.email + "</td><td>" + field.phone + "</td></tr>");
	});
});
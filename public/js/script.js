$(function(){
	
	$("#addEmployeeForm").on("submit", function(e){
		e.preventDefault();

		var form = $(this);
		var url = form.attr("action");
		var type = form.attr("method");
		var data = form.serialize();

		$("#nameError").addClass('d-none');
		$("#emailError").addClass('d-none');

		$.ajax({

			url: url,
			data: data,
			dataType: "JSON",
			beforeSend: function(){
				$(".load").fadeIn();
			},
			success: function(data){
				if(data == "success"){
					$("#addEmpModal").modal('hide');
					swal("Great", "Successfully Employee added", "success");
					form[0].reset();
					location.reload();
				}
			},
			complete: function(){
				$(".load").fadeOut();
			},
			error: function(data){
				var errors = data.responseJSON;
				if($.isEmptyObject(errors) == false){
					$.each(errors.errors, function(key, value){
						var ErrorID = '#' + key + 'Error';
						$(ErrorID).removeClass('d-none');
						$(ErrorID).text(value)
					})
				}
			}
		});
	});

	$(document).on("click", "#viewEmp", function(e){
		e.preventDefault();

		var id = $(this).data("id");
		var url = $(this).attr("href");


		$.ajax({

			url: url,
			data: {id:id},
			type: "GET",
			dataType: "JSON",
			success: function(response){
				if($.isEmptyObject(response) != null){
					$("#viewEmpModal").modal("show");
					$("#employeeTitle").text(response.name + "'s Information");
					$(".ename").text("Name :" +response.name);
					$(".eage").text("Age :" +response.age);
					$(".eemail").text("Email :" +response.email);
					$(".ejoin_date").text("Joining Date :" +response.join_date);
				}
			}
		});
	});

	$(document).on("click", "#editEmp", function(e){
		e.preventDefault();
		var id = $(this).data("id");
		var url = $(this).attr("href");

		$.ajax({
			url: url,
			data: {id:id},
			type: "GET",
			dataType: "JSON",
			success(response){
				$("#editEmpModal").modal("show");
				$("#editEmployeetitle").text(response.name + "'s Information");
				$("#ename").val(response.name);
				$("#eage").val(response.age);
				$("#eemail").val(response.email);
				$("#ejoin_date").val(response.join_date);
				$("#employeeid").val(response.id);
			}
		});
	});

	$(document).on("click", "#deleteEmp", function(e){
		e.preventDefault();
		var id = $(this).data("id");
		var url = $(this).attr("href");

		$.ajax({
			url: url,
			data: {id:id},
			type: "GET",
			dataType: "JSON",
			success(response){
				if(response == "success"){
					swal("Deleted", "Successfully Employee Delete", "success");
					location.reload();
				}
			}
		});
	});

	$("#updateEmployeeForm").on("submit", function(e){
		e.preventDefault();

		var form = $(this);
		var url = form.attr("action");
		var type = form.attr("method");
		var data = form.serialize();

		$.ajax({

			url: url,
			data: data,
			dataType: "JSON",
			beforeSend: function(){
				$(".load").fadeIn();
			},
			success: function(data){
				if(data == "success"){
					$("#editEmpModal").modal('hide');
					swal("Great", "Successfully Employee Updated", "success");
					location.reload();
				}
			},
			complete: function(){
				$(".load").fadeOut();
			}
		});
	});	
});
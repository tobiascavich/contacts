$(document).ready(function() {
	$('.resultmsg').hide();
	$.ajax({
		method:'POST',
		url:'/contacts/controller/contact_controller.php',
		data:{'module':'getContacts'},
		success: function(result) 
		{
			var obj = $.parseJSON(result);

			for(var i = 0; i < obj.length; i++)
			{
				$(".contactTable > tbody").append(
					'<tr><td>'+obj[i].name+'</td>'+
					'<td>'+obj[i].phone+'</td>'+
					'<td>'+obj[i].email+'</td>'+
					'<td>'+
					'<button type="button" class="em btn btn-primary" data-id="'+obj[i].conid+'" data-toggle="modal" data-target="#editModal">Edit</button>'+
					'<button type="button" class="btn btn-danger" onClick="deleteContact('+obj[i].conid+')">Delete</button>'+
					'</td></tr>'
				);
			}
		}
	});

	$("#addContact").submit(function(event)
	{
		var phoneRGEX = /^[(]{0,1}[0-9]{2}[)]{0,1}[-\s\.]{0,1}[0-9]{5}[-\s\.]{0,1}[0-9]{4}$/;
		var emailRGEX = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
		var testPhone = phoneRGEX.test($("#contactPhone").val());
		var testEmail = emailRGEX.test($("#contactEmail").val());

		if(!testPhone)
		{
			alert("Please correctly add the Contact Phone ex. (XX)XXXXX-XXXX");
			return false;
		}
		if(!testEmail)
		{
			alert("Please correctly add the Contact Email ex. xxxx@xxxx.xxx.xx");
			return false;
		}
		if($("#contactName").val() == '')
		{
			alert("Please correctly add the Contact Name");
			return false;
		}
		$.ajax({
			url:'/contacts/controller/contact_controller.php',
			data: {'module':'add', 
			'name' : $("#contactName").val(),
			'phone' : $("#contactPhone").val(),
			'email' : $("#contactEmail").val()
			},
			success: function(result) 
			{
				if(result)
				{
					$("#addContact")[0].reset();
					window.location.reload(true);
				}
				else
				{
					alert("Ops! Something went wrong!");
					return false;
				}
			}
		});
		event.preventDefault();
	});

	$("#editModal").on('shown.bs.modal', function(e)
	{
		var id = $(e.relatedTarget).data('id');
		$("#idHidden").val(id);

		$.ajax({
			url: '/contacts/controller/contact_controller.php',
			data: {'module':'edit','id': id},
			success: function(result) 
			{
				var obj = $.parseJSON(result);
				$('#editName').val(obj[0].name);
				$('#editPhone').val(obj[0].phone);
				$('#editEmail').val(obj[0].email);

			}
		});
	});

	$("#editContact").submit(function(event)
	{
		var phoneRGEX = /^[(]{0,1}[0-9]{2}[)]{0,1}[-\s\.]{0,1}[0-9]{5}[-\s\.]{0,1}[0-9]{4}$/;
		var emailRGEX = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
		var testPhone = phoneRGEX.test($("#editPhone").val());
		var testEmail = emailRGEX.test($("#editEmail").val());

		if(!testPhone)
		{
			alert("Please correctly add the Contact Phone ex. (XX)XXXXX-XXXX");
			return false;
		}
		if(!testEmail)
		{
			alert("Please correctly add the Contact Email ex. xxxx@xxxx.xxx.xx");
			return false;
		}
		if($("#editName").val() == '')
		{
			alert("Please correctly add the Contact Name");
			return false;
		}

		$.ajax({
			url:'/contacts/controller/contact_controller.php',
			data: {'module':'update', 
			'name' : $("#editName").val(),
			'phone' : $("#editPhone").val(),
			'email' : $("#editEmail").val(),
			'id' : $("#idHidden").val() 
			},
			success: function(result) 
			{
				if(result)
				{
					$("#editContact")[0].reset();
					window.location.reload(true);
				}
				else
				{
					alert("Ops! Something went wrong!");
					return false;
				}
			}
		});
		event.preventDefault();
	});
});

function deleteContact(id)
{
	if(confirm("Are you sure you want to delete this?"))
	{
		$.ajax({
			url:'/contacts/controller/contact_controller.php',
			data: {'module':'delete', 'id': id},
			success: function(result) {

				$('.resultmsg').show();
				$('.resultmsg').append('<span class="alert alert-warning">'+result+'</span>');
				$('.resultmsg').delay(5000).fadeOut();
				$('.alert').remove();
				
				setTimeout(window.location.reload(true), 5000);
			}
		});
	}
}

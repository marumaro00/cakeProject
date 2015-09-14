$(document).ready(function()
{
    $("#form-login").submit(function (e)
	{
		//get form data
	    var form_data = $("#form-login").serialize();
			//start ajax
			$.ajax({
				type : "POST",
				url : 'login',
				data : form_data,
				dataType: "json",
				cache :false,
				success: function(result)
				{
					if(typeof result.url != 'undefined')
					{
						window.location.replace(result.url);
					}
				    $('.sent-state').html("<span class='text-danger'>"+result.message+"</span>");
				},
				error : function(jqXHR, error, thrown) 
        		{
        			console.log(error);
        		},
			});
			e.preventDefault();
	});
});
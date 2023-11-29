$(document).ready(function(){
	$("#login").on("click",function(e){
		e.preventDefault();
		 userpassword = $("#userpassword").val();
		if(userpassword!='')
		{
			var pass = SHA1(userpassword);
			$("#userpassword").val(pass);
		}
		formdata = $("#loginform").serializeArray();
		formdata.push({name:'isAjax',value:1});
		//console.log(formdata);
		$.ajax({
			url:base_url+'admin',
			type:'POST',
			data:formdata,
			dataType:"JSON",
			beforeSend:function(){
				ajaxindicatorstart("Please wait.",base_url);
			},
			success:function(response)
			{
				ajaxindicatorstop();
				if(response == 1)
				{
					window.location.href= base_url+"admin/dashboard";
				}
				else if(response == 2)
				{
					$("#loginform")[0].reset();
					$("#errormessage").html("Enter valid login credential.");
				}
				else
				{
					console.log(response);
					appendLogin("#loginform",response);
				}
			},
			error:function(){
				ajaxindicatorstop();
			}
		});
	});
	
});
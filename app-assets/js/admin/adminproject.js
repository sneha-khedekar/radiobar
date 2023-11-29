$(document).ready(function(){
	/*change password*/
		$("#changepassword").on("click",function(e){

			e.preventDefault();
			formdata = $("#passwordform").serializeArray();
			formdata.push({name:'isAjax',value:1});
			$.ajax({
				url:$('#passwordform').attr('action'),
				type:'POST',
				data:formdata,
				dataType:"JSON",
				beforeSend:function(){
					ajaxindicatorstart("Please wait.",base_url);
				},
				success:function(response)
				{
					ajaxindicatorstop();
					if(response.result == 'success')
					{
						alert("password change");
						window.location.href = base_url+'admin/dashboard';

					}
					else if(response.result =='fail')
					{
						alert("old password does not match")
						$("#passwordform")[0].reset();
					}
					else if(response == 3)
					{
						window.location.href = base_url+'admin/dashboard';
					}
					else
					{
						appendMsgs("#passwordform",response);
					}
				},
				error:function(){
					ajaxindicatorstop();
				}
			});
		});
	/*change password*/
	/* home slider*/
	 $("#btn_homesliderimg").on("click",function(e){
	    e.preventDefault();
	    formdata = $('#homesliderimg_form')[0];
	    var data = new FormData(formdata);
	   
	    $.ajax({
	      url:$("#homesliderimg_form").attr('action'),
	      type:'POST',
	      data:data,
	      dataType:"JSON",
	      contentType:false,
	      processData:false,
	      success:function(response)
					{
						ajaxindicatorstop();
						if(response.result == 'success')
						{
							window.location.href = base_url+'homeslider';

						}
						else if(response.result =='fail')
						{
							alert("old password does not match")
							$("#passwordform")[0].reset();
						}
						else if(response == 1)
						{
							window.location.href = base_url+'homeslider';
						}
						else
						{
							appendMsgs("#passwordform",response);
						}
					},
					error:function(){
						ajaxindicatorstop();
					}
	      
	    });

	});
/* home slider end*/


/* specialguest */

	$("#btn_specialguest").on("click",function(e){
	    e.preventDefault();
	    formdata = $('#specialguest_form')[0];
	    var data = new FormData(formdata);
	   
	    $.ajax({
	      url:$("#specialguest_form").attr('action'),
	      type:'POST',
	      data:data,
	      dataType:"JSON",
	      contentType:false,
	      processData:false,
	      success:function(response)
					{
						ajaxindicatorstop();
						if(response.result == 'success')
						{
							window.location.href = base_url+'specialguest';

						}
						else if(response.result =='fail')
						{
							alert("old password does not match")
							$("#passwordform")[0].reset();
						}
						else if(response == 1)
						{
							window.location.href = base_url+'specialguest';
						}
						else
						{
							appendMsgs("#passwordform",response);
						}
					},
					error:function(){
						ajaxindicatorstop();
					}
	      
	    });

	});

/* specialguest end */
/* management*/
	$("#btn_management").on("click",function(e){
	    e.preventDefault();
	    formdata = $('#management_form')[0];
	    var data = new FormData(formdata);
	    $.ajax({
	      url:$("#management_form").attr('action'),
	      type:'POST',
	      data:data,
	      dataType:"JSON",
	      contentType:false,
	      processData:false,
	      success:function(response)
	      {
	          if(response.result == 'success')
	          {
	            window.location.href = base_url+'aboutus/management';

	          }
	          else{
	            console.log(response);
	          }

	      }
	    });
	});
/* management end */

/* testimonials*/
	$("#btn_testimonial").on("click",function(e){
	    e.preventDefault();
	    formdata = $('#testimonial_form')[0];
	    var data = new FormData(formdata);
	    $.ajax({
	      url:$("#testimonial_form").attr('action'),
	      type:'POST',
	      data:data,
	      dataType:"JSON",
	      contentType:false,
	      processData:false,
	      success:function(response)
	      {
	          if(response.result == 'success')
	          {
	            window.location.href = base_url+'testimonial/testimonial';

	          }
	          else{
	            console.log(response);
	          }

	      }
	    });
	});
/* testimonials end */

/* client*/
	$("#btn_client").on("click",function(e){
	    e.preventDefault();
	    formdata = $('#client_form')[0];
	    var data = new FormData(formdata);
	    $.ajax({
	      url:$("#client_form").attr('action'),
	      type:'POST',
	      data:data,
	      dataType:"JSON",
	      contentType:false,
	      processData:false,
	      success:function(response)
	      {
	          if(response.result == 'success')
	          {
	            window.location.href = base_url+'client/client';

	          }
	          else{
	            console.log(response);
	          }

	      }
	    });
	});
/* client end */

/* gallery*/
$("#btn_gallery").on("click",function(e){
	e.preventDefault();
	formdata = $('#gallery_form')[0];
	var data = new FormData(formdata);
	$.ajax({
	  url:$("#gallery_form").attr('action'),
	  type:'POST',
	  data:data,
	  dataType:"JSON",
	  contentType:false,
	  processData:false,
	  success:function(response)
	  {
		  if(response.result == 'success')
		  {
			window.location.href = base_url+'gallery/gallery';

		  }
		  else{
			console.log(response);
		  }

	  }
	});
});
/* gallery end */

/* Blogs */
	$("#btn_blogs").on("click",function(e){
	    e.preventDefault();
	    formdata = $("#blogs_form").serializeArray();
	    formdata.push({name:'isAjax',value:1});

		var Content = CKEDITOR.instances['editor1'].getData();
		var Content1 = CKEDITOR.instances['editor2'].getData();


		formdata.push({name:'Description1',value:Content});
		formdata.push({name:'Description2',value:Content1});
        // formdata.push({name:'description',value:Content});
        $.ajax({
                url:$('#blogs_form').attr('action'),
                type:'POST',
                data:formdata,
                dataType:"JSON",
                beforeSend:function(){
                        ajaxindicatorstart("Please wait.",base_url);
                },
                success:function(response)
                {
                        ajaxindicatorstop();
                        if(response.result == 'success')
                        {
                                window.location.href = base_url+'blogs';

                        }
                        else if(response.result =='fail')
                        {
                                $("#blogs_form")[0].reset();
                        }
                        else if(response == 3)
                        {
                                window.location.href = base_url+'blogs';
                        }
                        else
                        {
                                appendMsgs("#blogs_form",response);
                        }
                },
                error:function(){
                        ajaxindicatorstop();
                }
        });
    });

	$("#btn_blogsimg").on("click",function(e){
	    e.preventDefault();
	    formdata = $('#img_blogsimgform')[0];
	    var data = new FormData(formdata);
	    $.ajax({
	      url:$("#img_blogsimgform").attr('action'),
	      type:'POST',
	      data:data,
	      dataType:"JSON",
	      contentType:false,
	      processData:false,
	      success:function(response)
	        {
	                ajaxindicatorstop();
	                if(response == '1')
	                {
	                    window.location.href = base_url+'blogs';

	                }
	        },
	        error:function(){
	                ajaxindicatorstop();
	        }
	      
	    });
    });

/* Blogs end*/

/*Franchise Start */
$("#btn_franchise").on("click",function(e){
	e.preventDefault();
 //    formdata = $("#road_show_form").serializeArray();
	// formdata.push({name:'isAjax',value:1});
	formdata = $("#franchise_form").serializeArray();
	// var Content = CKEDITOR.instances['editor1'].getData();
	formdata.push({name:'isAjax',value:1});
	// formdata.push({name:'description',value:Content});

	$.ajax({
		url:$('#franchise_form').attr('action'),
		type:'POST',
		data:formdata,
		dataType:"JSON",
		beforeSend:function(){
			ajaxindicatorstart("Please wait.",base_url);
		},
		success:function(response)
		{
			ajaxindicatorstop();
			if(response.result == 'success')
			{
				window.location.href = base_url+'franchise';

			}
			else if(response.result =='fail')
			{
				$("#franchise_form")[0].reset();
			}
			else if(response == 3)
			{
				window.location.href = base_url+'franchise';
			}
			else
			{
				appendMsgs("#franchise_form",response);
			}
		},
		error:function(){
			ajaxindicatorstop();
		}
	});
});



$("#btn_franchiseimg").on("click",function(e){
	e.preventDefault();
	formdata = $('#img_franchiseimgform')[0];
	var data = new FormData(formdata);
	$.ajax({
	  url:$("#img_franchiseimgform").attr('action'),
	  type:'POST',
	  data:data,
	  dataType:"JSON",
	  contentType:false,
	  processData:false,
	  success:function(response)
		{
				ajaxindicatorstop();
				if(response == '1')
				{
					window.location.href = base_url+'franchise';

				}
		},
		error:function(){
				ajaxindicatorstop();
		}
	  
	});
});
/*Franchise End */
/* Events*/
	$("#btn_events").on("click",function(e){
	    e.preventDefault();
	 //    formdata = $("#road_show_form").serializeArray();
		// formdata.push({name:'isAjax',value:1});
		formdata = $("#events_form").serializeArray();
	    // var Content = CKEDITOR.instances['editor1'].getData();
		formdata.push({name:'isAjax',value:1});
		// formdata.push({name:'description',value:Content});

		$.ajax({
			url:$('#events_form').attr('action'),
			type:'POST',
			data:formdata,
			dataType:"JSON",
			beforeSend:function(){
				ajaxindicatorstart("Please wait.",base_url);
			},
			success:function(response)
			{
				ajaxindicatorstop();
				if(response.result == 'success')
				{
					window.location.href = base_url+'events';

				}
				else if(response.result =='fail')
				{
					$("#events_form")[0].reset();
				}
				else if(response == 3)
				{
					window.location.href = base_url+'events';
				}
				else
				{
					appendMsgs("#events_form",response);
				}
			},
			error:function(){
				ajaxindicatorstop();
			}
		});
	});

	$("#btn_eventimg").on("click",function(e){
	    e.preventDefault();
	    formdata = $('#img_eventimgform')[0];
	    var data = new FormData(formdata);
	    $.ajax({
	      url:$("#img_newsimgform").attr('action'),
	      type:'POST',
	      data:data,
	      dataType:"JSON",
	      contentType:false,
	      processData:false,
	      success:function(response)
					{
						ajaxindicatorstop();
						if(response == '1')
						{
							window.location.href = base_url+'events';

						}
					},
					error:function(){
						ajaxindicatorstop();
					}
	      
	    });
	});

/* Events end*/

/* menu start*/
$("#btn_menu").on("click",function(e){
	e.preventDefault();
 //    formdata = $("#road_show_form").serializeArray();
	// formdata.push({name:'isAjax',value:1});
	formdata = $("#menu_form").serializeArray();
	// var Content = CKEDITOR.instances['editor1'].getData();
	formdata.push({name:'isAjax',value:1});
	// formdata.push({name:'description',value:Content});

	$.ajax({
		url:$('#menu_form').attr('action'),
		type:'POST',
		data:formdata,
		dataType:"JSON",
		beforeSend:function(){
			ajaxindicatorstart("Please wait.",base_url);
		},
		success:function(response)
		{
			ajaxindicatorstop();
			if(response.result == 'success')
			{
				window.location.href = base_url+'menu';

			}
			else if(response.result =='fail')
			{
				$("#menu_form")[0].reset();
			}
			else if(response == 3)
			{
				window.location.href = base_url+'menu';
			}
			else
			{
				appendMsgs("#menu_form",response);
			}
		},
		error:function(){
			ajaxindicatorstop();
		}
	});
});

$("#btn_menuimg").on("click",function(e){
	e.preventDefault();
	formdata = $('#img_menuimgform')[0];
	var data = new FormData(formdata);
	$.ajax({
	  url:$("#img_menuform").attr('action'),
	  type:'POST',
	  data:data,
	  dataType:"JSON",
	  contentType:false,
	  processData:false,
	  success:function(response)
				{
					ajaxindicatorstop();
					if(response == '1')
					{
						window.location.href = base_url+'menu';

					}
				},
				error:function(){
					ajaxindicatorstop();
				}
	  
	});
});

/* menu end*/


/* News*/

	$("#btn_newsimg").on("click",function(e){
	    e.preventDefault();
	    formdata = $('#img_newsimgform')[0];
	    var data = new FormData(formdata);
	    $.ajax({
	      url:$("#img_newsimgform").attr('action'),
	      type:'POST',
	      data:data,
	      dataType:"JSON",
	      contentType:false,
	      processData:false,
	      success:function(response)
					{
						ajaxindicatorstop();
						if(response == '1')
						{
							window.location.href = base_url+'news';

						}
					},
					error:function(){
						ajaxindicatorstop();
					}
	      
	    });
	});

	$("#btn_news").on("click",function(e){
	    e.preventDefault();
	    formdata = $("#news_form").serializeArray();
		var Content = CKEDITOR.instances['editor1'].getData();
		var Content1 = CKEDITOR.instances['editor2'].getData();
		
		formdata.push({name:'description',value:Content});
		formdata.push({name:'shortdescription',value:Content1});
		formdata.push({name:'isAjax',value:1});
		// formdata.push({name:'description',value:Content});
		$.ajax({
				url:$('#news_form').attr('action'),
				type:'POST',
				data:formdata,
				dataType:"JSON",
				beforeSend:function(){
					ajaxindicatorstart("Please wait.",base_url);
				},
				success:function(response)
				{
					ajaxindicatorstop();
					if(response.result == 'success')
					{
						window.location.href = base_url+'news';

					}
					else if(response.result =='fail')
					{
						$("#news_form")[0].reset();
					}
					else if(response == 3)
					{
						window.location.href = base_url+'news';
					}
					else
					{
						appendMsgs("#news_form",response);
					}
				},
				error:function(){
					ajaxindicatorstop();
				}
			});
	});

/* News end*/

/*Application  */
	$("#btn_application").on("click",function(e){
				e.preventDefault();
				formdata = $("#application_form").serializeArray();
				console.log($('#application_form').attr('action'));
				var Content = CKEDITOR.instances['editor1'].getData();
				var Content2 = CKEDITOR.instances['editor3'].getData();
				formdata.push({name:'isAjax',value:1});
				formdata.push({name:'Description1',value:Content});
				formdata.push({name:'Description3',value:Content2});
				$.ajax({
					url:$('#application_form').attr('action'),
					type:'POST',
					data:formdata,
					dataType:"JSON",
					beforeSend:function(){
						ajaxindicatorstart("Please wait.",base_url);
					},
					success:function(response)
					{
						ajaxindicatorstop();
						if(response.result == 'success')
						{
							window.location.href = base_url+'product_application';

						}
						else if(response.result =='fail')
						{
							alert("old password does not match")
							$("#application_form")[0].reset();
						}
						else if(response == 3)
						{
							window.location.href = base_url+'product_application';
						}
						else
						{
							appendMsgs("#application_form",response);
						}
					},
					error:function(){
						ajaxindicatorstop();
					}
				});
	});

	$("#btn_applicationimg").on("click",function(e){
	    e.preventDefault();
	    formdata = $('#img_applicationform')[0];
	    var data = new FormData(formdata);
	    $.ajax({
	      url:$("#img_applicationform").attr('action'),
	      type:'POST',
	      data:data,
	      dataType:"JSON",
	      contentType:false,
	      processData:false,
	      success:function(response)
					{
						ajaxindicatorstop();
						if(response == '1')
						{
							window.location.href = base_url+'product_application';

						}
					},
					error:function(){
						ajaxindicatorstop();
					}
	      
	    });
	});
/*Application  end*/

/* category*/

	$("#btn_product_category").on("click",function(e){
			e.preventDefault();
			// alert("1251");
			formdata = $("#product_category_form").serializeArray();
			console.log($('#product_category_form').attr('action'));
			// var field = $( '#editor1' ).val();
			var Content = CKEDITOR.instances['editor1'].getData();
			var Content1 = CKEDITOR.instances['editor2'].getData();
			var Content2 = CKEDITOR.instances['editor3'].getData();
			// var Content3 = CKEDITOR.instances['editor4'].getData();
			 // console.log(Content,Content1,Content2);
			formdata.push({name:'isAjax',value:1});
			formdata.push({name:'Description1',value:Content});
			formdata.push({name:'Description2',value:Content1});			
			formdata.push({name:'Description3',value:Content2});
			// formdata.push({name:'quality',value:Content3});
			// alert(JSON.stringify(formdata));	
			$.ajax({
				url:$('#product_category_form').attr('action'),
				type:'POST',
				data:formdata,
				dataType:"JSON",
				beforeSend:function(){
					ajaxindicatorstart("Please wait.",base_url);
				},
				success:function(response)
				{
					ajaxindicatorstop();
					if(response.result == 'success')
					{
						window.location.href = base_url+'productcategory';

					}
					else if(response.result =='fail')
					{
						alert("old password does not match")
						$("#passwordform")[0].reset();
					}
					else if(response == 3)
					{
						window.location.href = base_url+'productcategory';
					}
					else
					{
						appendMsgs("#passwordform",response);
					}
				},
				error:function(){
					ajaxindicatorstop();
				}
			});
	});
	
	$("#btn_categoryimg").on("click",function(e){
	    e.preventDefault();
	    formdata = $('#img_categoryform')[0];
	    var data = new FormData(formdata);
	    $.ajax({
	      url:$("#img_categoryform").attr('action'),
	      type:'POST',
	      data:data,
	      dataType:"JSON",
	      contentType:false,
	      processData:false,
	      success:function(response)
					{
						ajaxindicatorstop();
						if(response == '1')
						{
							window.location.href = base_url+'productcategory';

						}
					},
					error:function(){
						ajaxindicatorstop();
					}
	      
	    });

	  });
	  
	  $("#btn_technology").on("click",function(e){
	    e.preventDefault();
	    formdata = $("#technology_form").serializeArray();
	    var Content = CKEDITOR.instances['editor1'].getData();
	    var Content = CKEDITOR.instances['editor2'].getData();
		formdata.push({name:'isAjax',value:1});
		formdata.push({name:'description',value:Content});
		formdata.push({name:'description1',value:Content});
		$.ajax({
				url:$('#technology_form').attr('action'),
				type:'POST',
				data:formdata,
				dataType:"JSON",
				beforeSend:function(){
					ajaxindicatorstart("Please wait.",base_url);
				},
				success:function(response)
				{
					ajaxindicatorstop();
					if(response.result == 'success')
					{
						window.location.href = base_url+'technologys';

					}
					else if(response.result =='fail')
					{
						$("#technology_form")[0].reset();
					}
					else if(response == 3)
					{
						window.location.href = base_url+'technologys';
					}
					else
					{
						appendMsgs("#technology_form",response);
					}
				},
				error:function(){
					ajaxindicatorstop();
				}
			});
	});
/*category end*/

/*sub category */
	$("#btn_sub_category").on("click",function(e){
				e.preventDefault();
				// alert("1251");
				formdata = $("#sub_category_form").serializeArray();
				console.log($('#sub_category_form').attr('action'));
				// var field = $( '#editor1' ).val();
				var Content = CKEDITOR.instances['editor1'].getData();
				var Content1 = CKEDITOR.instances['editor2'].getData();
				var Content2 = CKEDITOR.instances['editor3'].getData();
				// var Content3 = CKEDITOR.instances['editor4'].getData();
				 // console.log(Content,Content1,Content2);
				formdata.push({name:'isAjax',value:1});
				formdata.push({name:'Description1',value:Content});
				formdata.push({name:'Description2',value:Content1});			
				formdata.push({name:'Description3',value:Content2});
				// formdata.push({name:'quality',value:Content3});
				// alert(JSON.stringify(formdata));	
				$.ajax({
					url:$('#sub_category_form').attr('action'),
					type:'POST',
					data:formdata,
					dataType:"JSON",
					beforeSend:function(){
						ajaxindicatorstart("Please wait.",base_url);
					},
					success:function(response)
					{
						ajaxindicatorstop();
						if(response.result == 'success')
						{
							window.location.href = base_url+'sub_category';

						}
						else if(response.result =='fail')
						{
							alert("old password does not match")
							$("#passwordform")[0].reset();
						}
						else if(response == 3)
						{
							window.location.href = base_url+'sub_category';
						}
						else
						{
							appendMsgs("#passwordform",response);
						}
					},
					error:function(){
						ajaxindicatorstop();
					}
				});
	});

	$("#btn_subcategoryimg").on("click",function(e){
	    e.preventDefault();
	    formdata = $('#img_subcategoryform')[0];
	    var data = new FormData(formdata);
	    $.ajax({
	      url:$("#img_subcategoryform").attr('action'),
	      type:'POST',
	      data:data,
	      dataType:"JSON",
	      contentType:false,
	      processData:false,
	      success:function(response)
					{
						ajaxindicatorstop();
						if(response == '1')
						{
							window.location.href = base_url+'sub_category';

						}
					},
					error:function(){
						ajaxindicatorstop();
					}
	      
	    });
	});
/*sub category end*/

/*product*/
$("#btn_product").on("click",function(e){
	e.preventDefault();
	formdata = $("#updateproduct_form").serializeArray();
	var shortdesc = CKEDITOR.instances['editor1'].getData();
	var desc = CKEDITOR.instances['editor2'].getData();
	formdata.push({name:'isAjax',value:1});
	formdata.push({name:'shortdesc',value:shortdesc});
	formdata.push({name:'desc',value:desc});			
	$.ajax({
		url:$('#updateproduct_form').attr('action'),
		type:'POST',
		data:formdata,
		dataType:"JSON",
		beforeSend:function(){
			ajaxindicatorstart("Please wait.",base_url);
		},
		success:function(response)
		{
			ajaxindicatorstop();
			if(response.result == 'success')
			{
				window.location.href = base_url+'manageproducts';

			}
			else if(response.result =='fail')
			{
				alert("old password does not match")
				$("#passwordform")[0].reset();
			}
			else if(response == 3)
			{
				window.location.href = base_url+'manageproducts';
			}
			else
			{
				appendMsgs("#passwordform",response);
			}
		},
		error:function(){
			ajaxindicatorstop();
		}
	});
});
/*product end*/


/*product series*/

	$("#btn_product_series").on("click",function(e){
				e.preventDefault();
				formdata = $("#product_series_form").serializeArray();
				console.log($('#product_series_form').attr('action'));
				// var field = $( '#editor1' ).val();
				var Content = CKEDITOR.instances['editor1'].getData();
				var Content1 = CKEDITOR.instances['editor2'].getData();
				var Content2 = CKEDITOR.instances['editor3'].getData();
				// var Content3 = CKEDITOR.instances['editor4'].getData();
				 // console.log(Content,Content1,Content2);
				formdata.push({name:'isAjax',value:1});
				formdata.push({name:'Description1',value:Content});
				formdata.push({name:'Description2',value:Content1});			
				formdata.push({name:'Description3',value:Content2});
				// formdata.push({name:'quality',value:Content3});
				// alert(JSON.stringify(formdata));	
				$.ajax({
					url:$('#product_series_form').attr('action'),
					type:'POST',
					data:formdata,
					dataType:"JSON",
					beforeSend:function(){
						ajaxindicatorstart("Please wait.",base_url);
					},
					success:function(response)
					{
						ajaxindicatorstop();
						if(response.result == 'success')
						{
							window.location.href = base_url+'product_series';

						}
						else if(response.result =='fail')
						{
							alert("");
							$("#product_series_form")[0].reset();
						}
						else if(response == 3)
						{
							window.location.href = base_url+'product_series';
						}
						else
						{
							appendMsgs("#product_series_form",response);
						}
					},
					error:function(){
						ajaxindicatorstop();
					}
				});
	});


	$("#btn_productseriesimg").on("click",function(e){
	    e.preventDefault();
	    formdata = $('#img_productseriesform')[0];
	    var data = new FormData(formdata);
	    $.ajax({
	      url:$("#img_productseriesform").attr('action'),
	      type:'POST',
	      data:data,
	      dataType:"JSON",
	      contentType:false,
	      processData:false,
	      success:function(response)
		  {
			ajaxindicatorstop();
			if(response == '1')
			{
				window.location.href = base_url+'product_series';

			}
		  },
		error:function(){
			ajaxindicatorstop();
		}
	      
	    });
	});

/*product series*/


/*Industry  */
	$("#btn_industry").on("click",function(e){
				e.preventDefault();
				formdata = $("#industry_form").serializeArray();
				console.log($('#industry_form').attr('action'));
				var Content = CKEDITOR.instances['editor1'].getData();
				var Content2 = CKEDITOR.instances['editor3'].getData();
				formdata.push({name:'isAjax',value:1});
				formdata.push({name:'Description1',value:Content});
				formdata.push({name:'Description3',value:Content2});
				$.ajax({
					url:$('#industry_form').attr('action'),
					type:'POST',
					data:formdata,
					dataType:"JSON",
					beforeSend:function(){
						ajaxindicatorstart("Please wait.",base_url);
					},
					success:function(response)
					{
						ajaxindicatorstop();
						if(response.result == 'success')
						{
							window.location.href = base_url+'product_industry';

						}
						else if(response.result =='fail')
						{
							alert("old password does not match")
							$("#industry_form")[0].reset();
						}
						else if(response == 3)
						{
							window.location.href = base_url+'product_industry';
						}
						else
						{
							appendMsgs("#industry_form",response);
						}
					},
					error:function(){
						ajaxindicatorstop();
					}
				});
	});

	$("#btn_industryimg").on("click",function(e){
	    e.preventDefault();
	    formdata = $('#img_industryform')[0];
	    var data = new FormData(formdata);
	    $.ajax({
	      url:$("#img_industryform").attr('action'),
	      type:'POST',
	      data:data,
	      dataType:"JSON",
	      contentType:false,
	      processData:false,
	      success:function(response)
					{
						ajaxindicatorstop();
						if(response == '1')
						{
							window.location.href = base_url+'product_industry';

						}
					},
					error:function(){
						ajaxindicatorstop();
					}
	      
	    });
	});
/*Industry  end*/


});
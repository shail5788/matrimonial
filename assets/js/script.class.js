$(document).ready(function(){
	 $(".country").click(function(){
	 	   var key=$(this).attr('Ide');
	 	   var value=$("#"+key+"c").text();
	 	   var action="GetSelectedcountryStates";
	 	   $("#getCountry").val(value);
	 	   $("#getCountry").attr("ide",key);
           var html='';
	       $.post("ajax.php",{key:key,action:action},function(data){
	            for(var i=0;i<data.length;i++)
	            {
	               html+='<li class="state" id="'+data[i].id+'s" ide="'+data[i].id+'">'+data[i]['name']+'</li>';   
	            }
	            $("#getState").html(html);
		                $(".state").click(function(){
				       	     var ids=$(this).attr('Ide');
				 	   		 var province=$("#"+ids+"s").text();
			                 $("#newState").val(province);
			                 $("#newState").attr('ide',ids);
			      		});
		  },'json');
	});
	$(".religion").click(function(){
		   var key=$(this).attr('ide');
	 	   var value=$("#r"+key).text();
	 	   $("#getReligion").text(value);
	 	   $("#getReligion").attr('ide',key);
	}); 
	$(".mstatus").click(function(){
 		 var key=$(this).attr('ide');
	 	 var value=$("#"+key+"m").text();
	 	 $("#marital_status").text(value);
         $("#marital_status").attr('ide',key);
	});
	$(".age").click(function(){
 		 var key=$(this).attr('ide');
	 	 var value=$("#"+key).text();
	 	  $("#sAge").text(key);
          $("#sAge").attr('ide',key);
	});
	$(".enage").click(function(){
		 var key=$(this).attr('ide');
	 	 var value=$("#"+key).text();
	 	  $("#eAge").text(key);
          $("#eAge").attr('ide',key);
	});
	$("#get_Searching").click(function(){
	      var marital_status = $("#marital_status").text();
	   
	      if(marital_status=="Man"){marital_status="male";}else{marital_status="female";}
	      var startage = $("#sAge").text();
	      var endage = $("#eAge").text();
	      var country = $("#getCountry").attr('ide');
	      var province = $("#newState").attr('ide');
	      var religion = $("#getReligion").attr('ide');
	      var action = "searchFilter";
	      $.post("ajax.php",{marital_status:marital_status,
	      	                 startage:startage,
	      	                 endage:endage,
	      	                 country:country,
	      	                 province:province,
	      	                 religion:religion,
	       	                action:action},function(data){
                console.log(data);
               //$("#data").val(data);
             window.location.href="search-list.php";
		  });
	      //window.location.href="search-list.php"; 


	});


$(document).ready(function(){
	$("#getCountry").keyup(function(){
		$.ajax({
		type: "POST",
		url: "ajax.php",
		data:'keyword='+$(this).val(),
		success: function(data){
			 var obj = jQuery.parseJSON(data);
			 var html='';
			   for(var i=0;i<obj.length;i++){
			   	   //console.log(obj[i].name);
			     html+='<li class="country" id="'+obj[i].id+'c" Ide="'+obj[i].id+'">'+obj[i].name+'</li>';
			   }
			  $("#countryData").html(html);

                      // click code

		           $(".country").click(function(){
			 	   var key=$(this).attr('Ide');
			 	   var value=$("#"+key+"c").text();
			 	   var action="GetSelectedcountryStates";
			 	   $("#getCountry").val(value);
			 	   $("#getCountry").attr("ide",key);
		           var html='';
			       $.post("ajax.php",{key:key,action:action},function(data){
			            for(var i=0;i<data.length;i++)
			            {
			               html+='<li class="state" id="'+data[i].id+'s" ide="'+data[i].id+'">'+data[i]['name']+'</li>';   
			            }
			            $("#getState").html(html);
				                $(".state").click(function(){
						       	     var ids=$(this).attr('Ide');
						 	   		 var province=$("#"+ids+"s").text();
					                 $("#newState").val(province);
					                 $("#newState").attr('ide',ids);
					      		});
				  },'json');
			    });

		   } 
                
		});


	});
});

});

  //code for states autoselection 
    $(document).ready(function(){
	$("#newState").keyup(function(){
		var countryId = $("#getCountry").attr('ide');
		var key=$(this).val();
		

		$.ajax({
		type: "POST",
		url: "ajax.php",
		data:"countryId="+countryId+"&key="+key,
		success: function(data){
			console.log(data);
			 var obj1 = jQuery.parseJSON(data);
			 var html='';
			   for(var i=0;i<obj1.length;i++){
			   	   console.log(obj1[i].name);
			     html+='<li class="state" id="'+obj1[i].id+'s" ide="'+obj1[i].id+'">'+obj1[i]['name']+'</li>';
			   }
			  $("#getState").html(html);

                      // click code
                        $(".state").click(function(){
				       	     var ids=$(this).attr('Ide');
				 	   		 var province=$("#"+ids+"s").text();
			                 $("#newState").val(province);
			                 $("#newState").attr('ide',ids);
			      		});
		   } 
                
		});


	});
 // New calender code

    $(".datep").click(function(){

    	   var ids=$(this).attr('id');
    	   var date=$("#"+ids).text();
    	   $("#date-show").text(date);
    	   $("#bdate").val(date);
    });
     $(".month").click(function(){

    	   var ids=$(this).attr('id');
    	   var month=$("#"+ids).text();
    	   $("#month-show").text(month);
    	   $("#bmonth").val(month);
    });

     $(".years").click(function(){
          
    	   var ids=$(this).attr('id');
    	   var year=$("#"+ids).text();
    	   $("#show-year").text(year);
    	   $("#byear").val(year);
    });
 // code for creat-profile education section 

     $("#eduCate").change(function(){

     	  var id=$(this).val();
     	  var action="getEducationList";
     	  var html="";
     	  $.ajax({
     	  	type:"POST",
     	  	url:"ajax.php",
     	  	data:{id:id,action:action},

     	  	success:function(data){
            	
            	var d=JSON.parse(data);
            	for(var i=0;i<d.length;i++){

            		 html+="<option value='"+d[i]['id']+"'>"+d[i]['education']+"</option>";
            	}
            	$("#education").html(html);
               
     	  	},
     	  	
     	  	error:function(){
                 console.log("some problem occured ");
     	  	}

     	  });
     });
 
   // desired-partner get state 

   $("#get_countries").change(function(){

   	     var key=$(this).val();
   	     var action="GetSelectedcountryStates";
   	     var html=''; 
   	     $.ajax({
   	        
   	        type:"POST",
   	        url:"ajax.php",
   	        data:{key:key,action:action},
   	        dataType:"json",
   	        success:function(data){console.log(data);
   	        	
   	        	html+='<option value="">Choose State</option>';
   	        	
   	        	for(var i=0;i<data.length;i++){

   	        	   html+='<option value="'+data[i].id+'">'+data[i].name+'</option>';
   	        	}
                $("#get_states").html(html);
            },
   	        error:function(){console.log("sorry");}   	  
   	     
   	     });

   });

   $("#save_basic").click(function(){
      
       var height=$("#height").val(); 
       var age=$("#age").val();
   	   var country=$("#get_countries").val();
   	   var religion=$("#religion").val();
   	   var state=$("#get_states").val();
   	   var city=$("#city").val();
   	   var marital_status=$("#marital_status").val();
   	   var action="save_partner_basic_info";

   	   if(height!='' && city!="" && age!=""){

	   	   	$.ajax({
	   	   	  
	   	   	  type:"POST",
	          url:"ajax.php",
	          data:{height:height,country:country,state:state,religion:religion,city:city,age:age,marital_status:marital_status,action:action},
	          dataType:"json",
	          beforeSend:function(){},
	          success:function(data){console.log(data);
                 
                 $("#bage").text(age);
                 $("#bheight").text(height);
                 $("#bms").text(marital_status);
                 $("#bc").text(country);
                 $("#bs").text(state);
                 $("#bcity").text(city);
	          },
	          error:function(){}

	   	   });
   	   }else{
   	   	 alert("fill the info ");
   	   }
   	   

   });  

   $("#save_education").click(function(){

   	   var hqualification=$("#hqualification").val();
   	   var profession=$("#dprofession").val();
   	   var income=$("#income").val();
   	   var action="save_desired_partner_education";
   	   if(income!=""){
	       	
	       	$.ajax({
		   	   	  
		   	   	  type:"POST",
		          url:"ajax.php",
		          data:{hqualification:hqualification,profession:profession,income:income,action:action},
		          dataType:"json",
		          beforeSend:function(){},
		          success:function(data){console.log(data);
                      
                      $("#hq").text(hqualification);
                      $("#occ").text(profession);
                      $("#bicm").text(income);
		          },
		          error:function(){}

		   	   });

   	   }else{
          alert("all field are required ");
   	   }

   }); 

   $("#save_about").click(function(){

   	   var about=$("#about").val();
   	   var action="save_about_partner";
   	   if(about!=""){
	       	
	       	$.ajax({
		   	   	  
		   	   	  type:"POST",
		          url:"ajax.php",
		          data:{about:about,action:action},
		          dataType:"json",
		          beforeSend:function(){},
		          success:function(data){console.log(data);},
		          error:function(){}

		   	   });

   	   }else{
          alert("all field are required ");
   	   }

   });   

}); 
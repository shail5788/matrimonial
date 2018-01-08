
$(document).ready(function(){

	var urlRequest="http://wehyphens.com/matrimonial/admin/ajax_function.php";
	
	$('body').on('click', '[id^=block-]', function (e) {	
		var requestID  = $(this).attr('id');
		var requestArr = requestID.split('-');
			  $.ajax({
			   type: "POST",
			   url: urlRequest, 
			   data: "actionData=userBlock&id="+requestArr[1]+"&block=block",
			   success: function(result) {
				if(result == 1){
					alert('User blocked successfully');
					$("#"+requestID).attr('id','unblock-'+requestArr[1]);
					//alert($("#"+requestID).text());	
					$("#text-"+requestArr[1]).html('UnBlock');
					
				}	
					
			   },
			   error: function(data) {
				console.log(data);
			   }  
				
			  }); 
		});
	



	
  
		$('body').on('click', '[id^=unblock-]', function (e) {	
		var requestID  = $(this).attr('id');
		var requestArr = requestID.split('-');
          
			  $.ajax({
			   type: "POST",
			   url: urlRequest, 
			   data: "actionData=userBlock&id="+requestArr[1]+"&block=unblock",
			   success: function(result) {
				if(result == 1){
					alert('User unblocked successfully');

					$("#"+requestID).attr('id','block-'+requestArr[1]);
					$("#text-"+requestArr[1]).html('Block');
				}	
					
			   },
			   error: function(data) {
				console.log(data);
			   }  
				
			  }); 
			

	});
	/*	var i = 1;
	$("#addMorePrice").click(function(){
	var html = '<div id="removePlan-'+i+'"> <div class="row clearfix"><div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label"><label for="password_2">Time</label></div><div class="col-lg-10 col-md-10 col-sm-8 col-xs-7"><div class="form-group"><div class="form-line"><select name="time[]" class="form-control"><option value="1 month">1 month</option><option value="3 month">3 month</option><option value="6 month">6 month</option><option value="12 month">12 month</option></select></div></div></div></div><div class="row clearfix"><div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label"><label for="password_2">Price</label></div><div class="col-lg-10 col-md-10 col-sm-8 col-xs-7"><div class="form-group"><div class="form-line"><input type="text" class="form-control" name="price[]"></div></div></div></div><p id="rem-'+i+'" class="btn btn-primary">Remove</p>';
	$("#addPlanMore").append(html);
	i = i +1;
});
	$('body').on('click', '[id^=rem-]', function (e) {	
		var requestID  = $(this).attr('id');
		var requestArr = requestID.split('-');
			$("#removePlan-"+requestArr[1]).remove();
	});*/
	});
	
	

	
	
	


	   
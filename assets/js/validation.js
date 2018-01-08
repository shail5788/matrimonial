$(document).ready(function(){
     $("#cProfile").click(function(){

     	  var nationality=$("#nationality").val();
	      var dob=$("#dob").val();
	      var height=$("#height").val();
	      var Weight=$("#Weight").val();
	      var mstatus=$("#mstatus").val();
	      var education=$("#education").val();
	      var professional=$("#professional").val();
	      var address=$("#address").val();
	      var country=$("#getCountry").val();
	      var state=$("#getState").val();
	      var city=$("#city").val();
	      var about=$("#about").val();

	      if(nationality==""){
	          
	          $("#nationality").css('border','1px solid red');
	          $("#nationality").focus();
	      
	      }else{
	      	  
	      	  $("#creatingProfilefrm").submit();
	      }
     });
      

 $("#logo").change(function() {
      var file = this.files[0];
      var imagefile = file.type;
      
      var match= ["image/gif","image/jpg","image/png","image/jpeg"];
      if(!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2]) || (imagefile==match[3]))){
        $(".logo-error").html("Please select a valid image file.");
        $('#logo-name').html('');
        var img=$("#previewing").val();
        if(img == ''){
          $("#previewing").attr("src"," ");
        }
        $('#default-image').show();
        $('.img-circle').show();
        return false;
      }  
      else{
        $('.img-circle').show();
          $('#default-image').hide();
        var src = $(this).val();
        $(".logo-error").html('');
        $('#logo-name').html(src);
        var reader = new FileReader();
        reader.onload = imageIsLoaded;
        reader.readAsDataURL(this.files[0]);
      }
    });

 function imageIsLoaded(e) {
    $("#logo").css("color","green");
    $('.form-group').css("display", "block");
    $('#previewing').attr('src', e.target.result);
    $('#previewing').attr('width', '100');
    $('#previewing').attr('height', '100');
  }



   $("#signUpp").on("submit",function(e){

      e.preventDefault();
     $(function(){
         
         $("#signUpp").validate({
              
         rules:{
               name:{
                    
                    required:true
                    // nameValidation:true
                },

                email:{
                    
                    required:true,
                    email: true
                },
                phone:{
                    required:true,
                    number: true,
                    minlength:10,
                    maxlength:15
                },
                gender:{
                 required:true
                },
                password:{
                   
                    required:true,
                    strongPassword:true,
                    minlength:8
                },
                repassword:{
                  
                  required: true,
                  equalTo: "#Password"
            }

             },
           messages: {
              name: "<span class='redalert'>Please enter your name</span>",
              email:"<span class='redalert'>Please enter a valid email address</span>",
              phone:{
                required:"<span class='redalert'>Please enter your phone number</span>",
                number:"<span class='redalert'>Please enter only numeric value</span>",
                minlength:"<span class='redalert'>Please enter Minimum 10 Digit</span>",
                maxlength:"<span class='redalert'>Please enter Maximum 15 Digit</span>"
              },
              gender:{
              	required:"<span class='redalert'>Please select gender </span>"	
              },
              password:{
              	 required:"<span class='redalert'>Please enter password</span>",
                 strongPassword:"<span class='redalert'>Password must contains aleast one number,one capital letter, one char </span>" ,
                 minlength:"<span class='redalert'>Password must be minimum 8 digits long</span>"
              },
              repassword:{
              	 required:"<span class='redalert'>Confirm password must required</span>",
                 equalTo: "<span class='redalert'>Passwords don't match </span>"
              }
           } 
         });

         $.validator.addMethod('strongPassword', function(value, element) {
          return this.optional(element) 
            || /\d/.test(value)
            && /[a-z]/i.test(value)&& /[A-Z]+/.test(value);
        }, 'Password must contain at least one number and one char\'.');

     });

 });

   // $("#userRegister").click(function(){

//         var name=$("#name").val();
//         var email=$("#email").val();
//         var mobile=$("#phone").val();
//         var password=$("#Password").val();
//         var repassword=$("#repassword").val();

   
      
//         if(name==""){
           
//            $(".name").show();
//            $("#name").removeClass('changeclass'); 
//            $("#name").addClass('validclass'); 
//            $("#name").focus();
//         }
//         else if(mobile==""){
           
//            $(".mobile").show();
//            $("#mobile").removeClass('changeclass'); 
//            $("#mobile").addClass('validclass'); 
//            $("#mobile").focus();

//         }else if(mobile.length<10 || mobile.length >15){
           
//            $(".mobile").show();
//            $("#mobile").removeClass('changeclass'); 
//            $("#mobile").addClass('validclass');  
//            $("#mobile").focus();  
//            $("#regshowMsg").show();
//            $("#regshowMsg").html("<span>Mobile not less than 10 or not greater than 15</span>");
//            setTimeout(function(){
//                       $("#regshowMsg").hide();
//                     },3000);

//         }else if(email==""){
           
//            $(".email").show();
//            $("#email").removeClass('changeclass'); 
//            $("#email").addClass('validclass'); 
//            $("#email").focus();

//         }else if(password==""){
           
//            $(".Password").show();
//            $("#Password").removeClass('changeclass'); 
//            $("#Password").addClass('validclass'); 
//            $("#Password").focus();

//         }else if(password.length<8){
        
//            $(".Password").show();
//            $("#Password").removeClass('changeclass'); 
//            $("#Password").addClass('validclass'); 
//            $("#Password").focus();
          
           
      
//         }

//   else if(repassword==""){
//            $(".Repassword").show();
//            $("#Repassword").removeClass('changeclass'); 
//            $("#Repassword").addClass('validclass'); 
//            $("#Repassword").focus();

//         }else if(password!=repassword){
//             $(".Repassword").show();
//             $("#Repassword").removeClass('changeclass'); 
//             $("#repassword").addClass('validclass');  
//             $("#repassword").focus();

//         }else{

           
//             var action="registerUser";  
//             data={name:name,email:email,mobile:mobile,password:password,action:action};
            
//             $.post('ajax.php',data,function(data){
//                 console.log(data);
//                 if(data.response){
//                    setTimeout(function(){
//                      $("#otp_code").val(data.otp);
//                      popupOpen("mobileVerification");
//                    },1000);
                  
//                  }else{
                   
//                     $("#regshowMsg").show();
//                     $("#regshowMsg").html("<span>"+data.message+"</span>");
                    
//                     setTimeout(function(){
//                       $("#regshowMsg").hide();
//                     },3000);

//                  }
//             },'json');
//             // alert("form submit");
//         }
// });


$("#getLogin").click(function(){

        
        var username=$("#username").val();
        var password=$("#password").val();

        if(username==""){
         
           $(".username").show();
           $("#username").removeClass('changeclass'); 
           $("#username").addClass('validclass');
           $("#username").focus();
        }else if(!isValidEmailAddress(username)){

           $(".username").show();
           $("#username").removeClass('changeclass'); 
           $("#username").addClass('validclass');
           $("#username").focus();

        }else if(password==""){
           
           $(".password").show();
           $("#password").removeClass('changeclass');  
           $("#password").addClass('validclass');
           $("#password").focus();

        }else{
           
              var action="userlogin";
              var msg="";  
              data={username:username,password:password,action:action};
            
              $.post('ajax.php',data,function(data){
                console.log(data);

                if(data.response){
                  window.location.href="dashboard.php";
                }else if(data.statuscode=="500"){
                   msg="Invalid Password !";
                     $("#showMsg").show();
                     $("#showMsg").html(msg);
                   setTimeout(function(){
                       $("#showMsg").hide();
                   },3000);

                }else if(data.statuscode=="501"){
                  msg="Invalid User !";
                    $("#showMsg").show();
                    $("#showMsg").html(msg);
                  setTimeout(function(){
                     $("#showMsg").hide(); 
                   },3000);

                }
            },'json');
        }
});

function hiddFun(id){
    $("#"+id).css("border","1px solid #ccc");
}

isValidEmailAddress=function(emailAddress){
    var pattern = /^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i;
    return pattern.test(emailAddress);    
  }


  // forget password 
$("#changePassword").click(function(){
   
      var email=$("#emailAddress").val();
      var action="forgetPassword";

      if(email==""){
           
           $(".emailAddress").show();
           $("#emailAddress").removeClass('changeclass'); 
           $("#emailAddress").addClass('validclass');
           $("#emailAddress").focus();

      }else if(!isValidEmailAddress(email)){

           $(".emailAddress").show();
           $("#emailAddress").removeClass('changeclass'); 
           $("#emailAddress").addClass('validclass');
           $("#emailAddress").focus();

      }else{
         
           $.post("ajax.php",{email:email,action:action},function(data){

                console.log(data);
                 if(data.response){

                    $(".showfeedBack").show();
                    $(".showfeedBack").html("<span class='alert alert-success'>Success!Please check your Register email</span>");
                    setTimeout(function(){
                      $(".showfeedBack").hide();
                    },3000);
                 }else{

                    $(".showfeedBack").show();
                    $(".showfeedBack").html("<span class='alert alert-danger'>Wrong!This is not registerd email </span>");
                     setTimeout(function(){
                      $(".showfeedBack").hide();
                    },3000);

                 }
           },'json'); 
      }


});

// reset password 

 $("#reset_password").click(function(){
      
      var password=$("#newPass").val();
      var resPass=$("#newCpass").val();
   
      if(password==""){
           
           // $("#newPass").removeClass('changeclass'); 
           // $("#newPass").addClass('validclass');
            $("#newPass").css("border",'1px solid red');
            $("#newPass").focus();

      }else if(password.length<8){
           
            $("#newPass").css("border",'1px solid red');
            $("#newPass").focus();

            $(".nmessage").show();
            $(".nmessage").html("<span class='alert alert-danger'>Password must be atleast 8 digits </span>");
            
            setTimeout(function(){
              $(".nmessage").hide();
            },3000);


      }else if(resPass==""){

          $("#newCpass").css("border",'1px solid red');
          $("#newCpass").focus();

          

      }else if(password!=resPass){
           
           $("#newCpass").css("border",'1px solid red');
           $("#newCpass").focus();
           $(".nmessage").show();
           $(".nmessage").html("<span class='alert alert-danger'>Repassword did not match </span>");
            
            setTimeout(function(){
              $(".nmessage").hide();
            },3000);

      
      }else{
            
            var action="resettingPassword";
            var user_id=$("#user_id").val();
            $.post("ajax.php",{action:action,password:password,user_id:user_id},function(data){

                 console.log(data);
            });
      }


 });

// getCountry

$("#getCountry").change(function(){

       var key=$(this).val();
       var action="GetSelectedcountryStates";
       var html='';
       
       $.post("ajax.php",{key:key,action:action},function(data){

            for(var i=0;i<data.length;i++)
            {
               html+='<option value="'+data[i].id+'">'+data[i]['name']+'</option>';   
            }

            $("#getState").html(html);

       },'json');
});


$("#about").keyup(function(){
    
     var data=$(this).val();
     var total = 600-data.length;
     $("#max_size").text(total);
    

     if(total==0){

      

      return false;
     }
   
   
}); 

$("#saveFeedback").click(function(){
  
        var name=$("#fname").val();
        var email=$("#femail").val();
        var message=$("#message").val();
        var action="feedbackSave";
        alert(name+" "+email+" "+message);
        if(name==""){
            
           $(".name").show();
           $("#name").removeClass('changeclass'); 
           $("#name").addClass('validclass'); 
           $("#name").focus();

        }else if(email==""){
           
           $(".email").show();
           $("#email").removeClass('changeclass'); 
           $("#email").addClass('validclass'); 
           $("#email").focus();

        }else if(!isValidEmailAddress(email)){
           
           $(".email").show();
           $("#email").removeClass('changeclass'); 
           $("#email").addClass('validclass'); 
           $("#email").focus();

        }else if(message==""){
          
        }else{

            $.post("ajax.php",{name:name,email:email,message:message,action:action},function(data){

                  console.log(data);
                  
                  if(data.response){
                      
                       $("#feedshowMsg").show();
                       $("#feedshowMsg").html("<span class='alert alert-success'>Thank you We contact you soon !</span>")   ; 
                       setTimeout(function(){
                         $("#feedshowMsg").hide();
                         $("#feedbackpop").hide();    
                      },3000);
                  }else{
                       
                        $("#feedshowMsg").show();
                        $("#feedshowMsg").html("<span class='alert alert-danger'>Sorry! Internal server error </span>") ;   
                        setTimeout(function(){
                         $("#feedshowMsg").hide();
                         $("#feedbackpop").hide();    
                      },3000);
                  }

            },'json');
        }


});

 $("#verify_otp").click(function(){

     var otp=$("#otp_code").val();
     var action ="mobileVerificationCode";
     if(otp==""){

           $(".otp_code").show();
           $("#otp_code").removeClass('changeclass'); 
           $("#otp_code").addClass('validclass'); 
           $("#otp_code").focus();

     }else{

         $.post("ajax.php",{otp:otp,action:action},function(data){

              console.log(data);
              
              if(data.response){
                
                window.location.href="create-profile.php";

              }else{
                $("#Verified").show();
                $("#Verified").html("<span class='alert alert-danger'>Otp either used or worng </span>");   
                
                  setTimeout(function(){
                       $("#Verified").hide();
                       // $("#mobileVerification").hide();
                  },3000);  
              }
         },'json');
     }
 });

// serching code start 
$("#getSearching").click(function(){

      window.location.href="search-list.php"; 
});


});

function ValidateAlpha(evt) 
     {  
     var keyCode = (evt.which) ? evt.which : evt.keyCode 
     if ((keyCode < 65 || keyCode > 90) && (keyCode < 97 || keyCode > 123) && keyCode != 32)                 return false;            return true;    }    

     function ValidateNum(evt) 
     {  
     var keyCode = (evt.which) ? evt.which : evt.keyCode 
     if ((keyCode <48 || keyCode >57))
     return false;
     else 
     return true; 
        } 

$(document).ready(function(){
  $('body').on('click', '[id^=planID-]', function (e){
     var requestID  = $(this).attr('id');
     var requestArr = requestID.split('-');
      $.ajax({
        type: "POST",
        url: 'ajax.php',
        data: "action=planShow&planID="+requestArr[1],
        success: function(result) {
          var obj = jQuery.parseJSON(result);
          var name = obj.name+' starts @ ₹ '+obj.price;
          $("#planName").text(name);
          $("#planN").text(name);
          var i = 1;
           $("[id^='benfitID-']").each(function() {
              var benfitID = $(this).attr('id');
              var benID = [];
              benID = benfitID.split('-');
              if(jQuery.inArray(benID[1], obj.benfit) !== -1){
                 $(this).attr("class",'fa fa-check');
              }else{
                 $(this).attr("class",'fa fa-times');
              }
            });
        },
        error: function(data) {
          console.log(data);
        }     
     
      });
  });


$('body').on('change', '#profession', function (e){
    var value = $(this).val();alert(value);

    $.ajax({
        type: "POST",
        url: 'ajax.php',
        data: "action=profession&pID="+value,
        success: function(result) {
          console.log(result);
           var obj = $.parseJSON(result);
           var html ='<option value="">Select Professional</option>';
           $(obj).each(function(){
              html +='<option value='+this['id']+'>'+this['professional']+'</option>';
            });
           $("#professional").html(html);
           
        },
        error: function(data) {
          console.log(data);
        }     
     
      });
 });
  //Profile Section Start
  $('body').on('click', '#criticalBtn', function (e){
      var dob = $("#dob").val();
      var marital = $("#marital").val();alert(marital);
      var gender = $("#gender").val();alert(gender);



  });
});






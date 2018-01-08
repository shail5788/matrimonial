<?php
  include_once('myconfig.php');
  include_once('queryBuilder.php');
  include_once('PHPMailer/PHPMailerAutoload.php');
  
  session_start();
  
  class ApiClass{

  	  protected $db;
  	  protected $message=[];

  	  public function __construct(database $db){

  	  	    $this->db=$db;
  	  }
      public function register_users($data){
           
           if($this->isExist($data['email'])){

                   $this->message['status_code']=505;
                   $this->message['message']=" Email Id already exists ";
                   $this->message['response']=false;
 
           }else{

               $response=$this->db->insert('tbl_user',$data);
             
               if($response){
                      
                     $_SESSION['user']=$data;  
                     $otp=$this->generate_otp();
                     $res=$this->db->insert('mobile_otp',['mobile'=>$data['mobile'],'otp_code'=>$otp]);
                     
                     if($res){
                         $this->message['otp']=$otp;
                        $this->message['status_code']=200;
                        $this->message['message']="User register";
                        $this->message['response']=true;
                     }
                    
               }
           }
      	  
      	   return $this->message;
      }

      public function get_planData($id){
          $data=$this->db->create_query("SELECT * FROM tbl_plan as p join tbl_plan_name as n on n.id= p.plan_id join tbl_plan_price as pr on pr.plan_id = n.id where p.plan_id='".$id."'");
          return $data;

      }

      

      public function allHomeSlider(){
        $allData = $this->db->fetch_all('tbl_banner');
        return $allData;
      }

      public function user_authentication($username,$password){

	       $response=$this->db->select('tbl_user',['email'=>$username,'status'=>'0']);
	         
          if(!empty($response)){

	        	 if($response[0]['password']==md5($password)){

	        	 	  $this->message['statuscode']="200";
	        	 	  $this->message['response']=true;
	        	 	  $_SESSION['user']=$response[0];

	        	 }else{
	        	 	  
                $this->message['statuscode']="500";
	        	 	  $this->message['response']=false;
	        	 }

	        }else{
              
                $this->message['statuscode']="501";
	        	    $this->message['response']=false;
	        } 
	        return  $this->message; 

        }
      public function logout(){

      	   $response=session_destroy();
      	   return $response; 
      }

      public function forget_password($username,$mail_body){

            if($this->isExist($username)){
                
                 $response=$this->send_mail($username,$mail_body);
                 if($response){

                   $this->message['status_code']=200;
                   $this->message['message']="Please check your mail ";
                   $this->message['response']=true;

                 }

            }else{

                   $this->message['status_code']=505;
                   $this->message['message']="Sorry this is not registerd mail";
                   $this->message['response']=false;
            }
            return $this->message;

      }

      public function change_password_process($username,$newpassword){

              $response=$this->db->row_update('tbl_user',
                                  ['password'=>md5($newpassword)],['email'=>$username]);

              if($response){

                $this->message['status_code']=200;
                $this->message['message']="Success! Your Password has been changed!";
                $this->message['response']=true;
              
              }else{

                $this->message['status_code']=500;
                $this->message['message']="Sorry! Internal server error !";
                $this->message['response']=false;

              }

         return $this->message;

      }

      public function creating_profile($data,$id,$file){

         
           $res=$this->upload_dp($file);
          
           if($res['status']){

                  $data['picture']=$res['file'];
            }else{
                  
                  $data['picture']="default-thumb.png"; 
             }     
            
             $response=$this->db->row_update("tbl_user",$data,['id'=>$id]);
           
               if($response){
                         
                   $this->message['status_code']=200;
                   $this->message['message']="Congratulations! Your profile has been created ";
                   $this->message['response']=true; 

               }else{
                   
                   $this->message['status_code']=500;
                   $this->message['message']="Sorry! Internal server Error ";
                   $this->message['response']=false;

               }

         
          
         return $this->message;
      }

      public function upload_dp($file){
          
           $ext=['jpg','jpeg','png'];
           $path=$wwwroot."user-profiles";
           
           $file_ext=strtolower(end(explode('.',$file['pic']['name'])));

             if(in_array($file_ext, $ext)){

                $filename=$file['pic']['name'];
                $file_tmp=$file['pic']['tmp_name'];  

                 if(move_uploaded_file($file_tmp, $path."/".$filename)){
                     
                     $response=[    'status'=>true,
                                    'file'=>$filename,
                                    'message'=>"File Uploaded"
                               ];   

                 }else{
                       
                    $response=[      'status'=>false,
                                     'file'=>$filename,
                                     'message'=>"File not Uploaded"]; 
                  }
             }
             return $response;
      }


      public function getPlan_benfit($plan_id){
        $benfit = $this->db->select('tbl_benifit_id',['plan_id'=>$plan_id]);
        return $benfit;
      }

      public function get_sign_user($email){

           $data=$this->db->select("tbl_user",['email'=>$email]);
           return $data;
      }


      public function isExist($username){

           $data=$this->db->select('tbl_user',['email'=>$username]);
           
           if(!empty($data)){
              
              return true;
           }else{

             return false;
           }

      }

      public function feedback($data,$mail_body,$clint){

            
            $response=$this->db->insert('tbl_feedback',$data);
            $status=$this->send_mail($data['email'],$clint);
            $res=$this->send_mail_to_admin("yogesh21jora@gmail.com",$mail_body);
            
            if(($response) && ($status) && ($res)){

             $this->message['status_code']=200;
             $this->message['message']="Congratulations!Your feedback submitted ";
             $this->message['response']=true; 

            }else{
             
             $this->message['status_code']=500;
             $this->message['message']="Sorry! Internal server Error ";
             $this->message['response']=false;

             }
         return $this->message;
      }
      public function generate_otp(){

           $otp=rand(111111,999999);
           return $otp;
      }

      public function verify_otp($otp){

            $response=$this->db->select('mobile_otp',['otp_code'=>$otp,'status'=>'0']);
            if(!empty($response)){
                 
                $res=$this->db->row_update("mobile_otp",['status'=>'1'],['otp_code'=>$otp]);

                if($res){
                  
                   $this->message['status_code']=200;
                   $this->message['message']="Mobile verification done";
                   $this->message['response']=true;
                
                } 
                
            }else{

                   $this->message['status_code']=500;
                   $this->message['message']="Wrong otp";
                   $this->message['response']=false;
            }
            return $this->message;
      }
      public function get_otp(){

          $mobile=$_SESSION['user']['mobile'];

          $response=$this->db->select('mobile_otp',['mobile'=>$mobile,'status'=>'0']);

          return $response[0]['otp_code'];
      }

     public function get_footer_link(){

          $data=$this->db->fetch_all('tbl_static');
          return $data;
     }

     public function get_social_medialink(){
        
        $data=$this->db->fetch_all('tbl_socialLink');
        return $data;
     }


      public function get_benfit(){
        
        $data=$this->db->fetch_all('tbl_plan_benfit');
        return $data;
     }
     public function get_country(){
            
          $data=$this->db->get_data('countries','',"ORDER BY priority DESC");
          return $data;  
     }
     public function get_country_code(){

          $data=$this->db->get_data('countries','',"ORDER BY priority DESC");
          return $data;
     }
     public function get_edu_category(){

          $data=$this->db->fetch_all("category");
          return $data;

     }
     public function get_education_list($id){
       
        $data=$this->db->select('tbl_education',['category_id'=>$id]);
        return $data;
     }
     public function get_states($keyCountry){

          $states=$this->db->select("states",['country_id'=>$keyCountry]);
          return $states;
     }
     public function get_religion(){

         $data=$this->db->fetch_all('Religion');
         return $data;
     }

     public function get_plan(){
          
           $data=$this->db->create_query("select tblp.*, tblpp.price from tbl_plan_name as tblp JOIN tbl_plan_price as tblpp ON tblp.id=tblpp.plan_id  ORDER BY ID DESC");

           return $data;

     }
      public function send_mail($username,$mail_body){
          
          $to=$username;
          $subject="Forget Password";
          $mail = new PHPMailer;
          $mail->isSendmail();
          $mail->SMTPDebug = 2;
          //Ask for HTML-friendly debug output          
          $mail->Debugoutput = 'html';          
          //Set the hostname of the mail server          
          $mail->Host = "mail.404coders.com";          
          //Set the SMTP port number - likely to be 25, 465 or 587          
          $mail->Port = 587;          
          //Whether to use SMTP authentication          
          $mail->SMTPAuth = true;          
          //Username to use for SMTP authentication          
          $mail->Username = "smtp@404coders.com";          
          //Password to use for SMTP authentication          
          $mail->Password = "smtp@test";          
          $mail->setFrom('smtp@404coders.com', 'Sonic-services');          
          $mail->addReplyTo('smtp@404coders.com', 'Sonic-services');          
          $mail->addAddress($to);          
          $mail->AddCC('shail5788@gmail.com', 'Sonic-services');          
          $mail->Subject = $subject;          
          $mail->msgHTML($mail_body);          
          $status=$mail->send();
          return $status;

      }
      public function send_mail_to_admin($username,$mail_body){

          $response=$this->send_mail($username,$mail_body);
          return $response;
      }

      public function get_row_data($table,$id){

              $data=$this->db->select($table,["id"=>$id]);
              return $data;
      }


  }
  
  $db=new database($mysqli);
  $obj=new ApiClass($db);

 ?>
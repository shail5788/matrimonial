<?php 
   
   include_once("resource/apiClass.php");
   
  $data= [

  		  "looking_for"=>$_POST['looking_for'],
   		  "start_age"=>$_POST['sage'],
   		  "end_age"=>$_POST['eage'],
          "country"=>$_POST['country'],
          "state"=>$_POST['state'],
          "religion"=>$_POST['religion']

         ];

   $response=$obj->searching_user_list($data);
   if($response){
      
      $message['status_code']=200;
      $message['response']=true;
      $message['data']=$response;

   }else{
      
      $message['status_code']=503;
      $message['response']=false;
      $message['data']=null;
   }
   

   echo json_encode($message);   


?>
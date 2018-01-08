<?php
  include_once("resource/apiClass.php");
   
   $country_id=$_POST['country_id'];
   
   $states=$obj->get_states($country_id);
    if($states){

   	 $message['status_code']=200;
   	 $message['response']=true;
   	 $message['data']=$states;
   	 
   }else{

   	 $message['status_code']=503;
   	 $message['response']=false;
   	 $message['data']=null;
   }
   echo json_encode($message);
  

 ?>
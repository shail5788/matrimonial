<?php
  include_once("resource/apiClass.php");
  
   $country=$obj->get_country();
   if($country){

   	 $message['status_code']=200;
   	 $message['response']=true;
   	 $message['data']=$country;
   }else{

   	 $message['status_code']=503;
   	 $message['response']=false;
   	 $message['data']=null;
   }
   echo json_encode($message);

 ?>
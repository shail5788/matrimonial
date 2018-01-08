<?php
  include_once("resource/apiClass.php");
  
   $religion=$obj->get_religion();
   if($religion){

   	 $message['status_code']=200;
   	 $message['response']=true;
   	 $message['data']=$religion;
   }else{

   	 $message['status_code']=503;
   	 $message['response']=false;
   	 $message['data']=null;
   }
   echo json_encode($message);

 ?>
<?php
   include_once("resource/apiClass.php");
   include_once("resource/myconfig.php");
   
   if($_POST['action']=="registerUser"){

   	     $data=array("name"=>$_POST['name'],"email"=>$_POST['email'],
   	     			 "password"=>md5($_POST['password']),
   	     			 "mobile"=>$_POST['mobile']);
   	    
   	      $response=$obj->register_users($data);
   	      echo json_encode($response);

	}
	if($_POST['action']=="userlogin"){

   	       $username=$_POST['username'];
           $password=$_POST['password'];
   	     			
   	     $response=$obj->user_authentication($username,$password);
   	     echo json_encode($response);
	}

  if($_POST['action']=="profession"){
      $pID=$_POST['pID'];
      $response=$obj->get_allProfessional($pID);
      echo json_encode($response);
  }

  if($_POST['action']=="forgetPassword"){

       $email=$_POST['email'];
       $html="";
       $html.="<p><a href='".$wwwroot."forget-password.php?user_id=".$email."'>".$wwwroot."forget-password.php</a>";

       $response=$obj->forget_password($email,$html);
       echo json_encode($response);

  }

    if($_POST['action']=="planShow"){
      $plan = $obj->get_planData($_POST['planID']);
      $planData['name'] = $plan[0]['plan_name'];
      $planData['price'] = $plan[0]['price'];
      $planData['time'] = $plan[0]['time'];
      $benfit = $obj->getPlan_benfit($_POST['planID']);
      $benfitData = array();
       foreach($benfit as $ben){
          $benfitData[] = $ben['benifit_id'];

       }
          $planData['benfit'] = $benfitData;
          print_r(json_encode($planData));exit;
    }



  if($_POST['action']=="resettingPassword"){

       $password=$_POST['password'];
       $username=$_POST['user_id'];
       $response=$obj->change_password_process($username,$password);
       echo json_encode($response);
  }

   if($_POST['action']=="GetSelectedcountryStates"){
           
           

           $keyCountry=$_POST['key'];
           $states=$obj->get_states($keyCountry);
           echo json_encode($states);
   }

   if($_POST['action']=="feedbackSave"){

      $data=array("name"=>$_POST['name'],"email"=>$_POST["email"],"message"=>$_POST['message']);
       $html="";
       
       $html.="<table class='table table-bordered'>";
       $html.="<tr><th>Name</th><td>".$_POST['name']."</td></tr>";  
       $html.="<tr><th>Email ID</th><td>".$_POST['email']."</td></tr>";  
       $html.="<tr><th>message</th><td>".$_POST['message']."</td></tr>";  
       $html.="</table>";  
       
       $clint="";
       $clint.="<h2> Thank you our team contact you as soon as possible <br> Have a great day </h2>";

      $response=$obj->feedback($data,$html,$clint);
      echo json_encode($response);


   }
    if($_POST['action']=="mobileVerificationCode"){

        $otp=$_POST['otp'];
        $response=$obj->verify_otp($otp);
        echo json_encode($response);
    }


    if($_POST['action']=="searchFilter"){

        $marital_status=$_POST['marital_status'];
        $startage=$_POST['startage'];
        $endage=$_POST['endage'];
        $country=$_POST['country'];
        $province=$_POST['province'];
        $religion=$_POST['religion'];
       
        if($marital_status=="Looking For")
        {
          $marital_status="";
        }
        if($marital_status=="Bride")
        {
          $marital_status="female";
        }
        if($marital_status=="Groom")
        {
          $marital_status="male";
        }

        if($country=="Select Country")
        {
          $country="";
        }
        if($province=="Provence")
        {
          $province="";
        }
        if($Religion=="Religion")
        {
          $Religion="";
        }
        
      $where = " where 1 ";
      if($marital_status!="")
      {
        $where .= " and gender='".$marital_status."' ";
      }
     /* if($startage!='' && $endage !='')
      { 
          $where .=" and age >= '".$startage."' and age <= '".$endage."' ";
      }*/
      if($country !='')
      {
         $where .=" and country= '".$country."' ";
      }
      if($province !='')
      {
         $where .=" and province= '".$province."' ";
      }
      if($religion !='')
      {
         $where .=" and religion= '".$religion."' ";
      }
      
        //echo "select * from tbl_user ".$where;
       
      $selectData = $mysqli->query("select * from tbl_user ".$where);
         $data=[];
          $countData=$selectData->num_rows;
          if($countData>0)
            {
                while($getData= $selectData->fetch_assoc())
                {
                   $data[]=$getData;
                }
            }
          else
             {
                 $data=[];
             }
           $_SESSION["searchdata"]=$data;
    }


if(!empty($_POST["keyword"]))
{
    $selectCountryData = $mysqli->query("SELECT * FROM countries WHERE name like '" . $_POST["keyword"] . "%' ORDER BY name ");
    $resultData=$selectCountryData->num_rows;

    if($resultData>0)
    {
      $resultData=array();
       
       while($CountryData = mysqli_fetch_array($selectCountryData))
         { 
             $arr["id"]=$CountryData["id"];
             $arr["name"]=$CountryData["name"];
             $resultData[] = $arr;
         }
        
        echo json_encode($resultData);

     }
}

if(!empty($_POST["key"]))
{ 

     $country_id=$_POST['countryId'];
    
    
    $selectStateData = $mysqli->query("SELECT * FROM states WHERE country_id='$country_id' AND name like '" . $_POST["key"] . "%' ORDER BY name ");
    $resultData=$selectStateData->num_rows;

    if($resultData>0)
    {
      $resultData=array();
       
       while($StateData =$selectStateData->fetch_assoc())
         { 
             $arr["id"]=$StateData["id"];
             $arr["name"]=$StateData["name"];
             $resultData[] = $arr;
         }
        
        echo json_encode($resultData);

     }
}

if($_POST['action']=="getEducationList"){

     $id=$_POST['id'];
     $edu_list=$obj->get_education_list($id);
   echo json_encode($edu_list);
}
if($_POST['action']=="save_partner_basic_info"){
   
   $user_id=$_SESSION['user']['id'];

   $data=[
           'user_id'=>$user_id,"height"=>$_POST['height'],
           "religion"=>$_POST['religion'],"state"=>$_POST['state'],
           "country"=>$_POST['country'],"city"=>$_POST['city'],
           "age"=>$_POST['age'],"marital_status"=>$_POST['marital_status']
         ];

   $response=$obj->save_match_partner_basic($data);
   echo json_encode($response);      
   

}

if($_POST['action']=="save_desired_partner_education"){

      $user_id=$_SESSION['user']['id'];
      $data=[

             'user_id'=>$user_id,
             'highest_qualification'=>$_POST['hqualification'],
             'occupation'=>$_POST['profession'],
             'income'=>$_POST['income']
             
             ];
     $response=$obj->save_desire_p_education($data);  
     echo json_encode($response);         
}
if($_POST['action']=="save_about_partner"){

       $user_id=$_SESSION['user']['id'];
       $data=['about_partner'=>$_POST['about'],'user_id'=>$user_id];
       $response=$obj->save_about_partner($data);
       echo json_encode($response);
}

 ?>
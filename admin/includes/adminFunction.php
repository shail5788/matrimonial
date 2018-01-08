<?php
error_reporting(E_ALL);
include('config.php');
class AdminFunction{

        private $con;
        public function __construct($con){
          
          $this->con=$con;

        }

    /*    function headerRedirect($con)
    {
      header(HEAD_LTN.$con);
    }*/

public function professionalList(){
        $i = 1;
        $data =  $this->con->query('select t1.*,t2.profession from tbl_professional t1 LEFT JOIN tbl_profession t2 ON t1.prof_id=t2.id');
        while($detail =$data->fetch_assoc()){
            $html.='<tr><td>'.$i.'</td>
            <td>'.$detail['profession'].'</td>
            <td>'.$detail['professional'].'</td>
            <td><p id="'.$detail['id'].'" class="btn btn-danger" onclick="return delIt('.$detail['id'].');" title="Delete">Delete</p><a href="editProfessional.php?id='.$detail['id'].'" class="btn btn-primary">Edit</a></td>';
            $i = $i+1;
                  
        }  
        return $html; 

    }

    public function professiona(){
        $data =  $this->con->query('SELECT * FROM `tbl_profession`');
        while($detail =$data->fetch_array()){
                //$plan =  $this->con->query('SELECT * FROM tbl_plan where plan_id = "'.$detail['id'].'"');
                //$row = $plan->num_rows;
                //if($row == 0){
                  $html .='<option value="'.$detail['id'].'">'.$detail['profession'].'</option>';
            //}

        }
        return $html; 

         
    }

    public function addProfessional($args){
    $addCity =  $this->con->query('insert into tbl_professional(prof_id,professional)values("'.$args['category_id'].'","'.$args['Professional'].'")');

     return 1;
    }

    public function professionalDetail($id){
         $queryData =  $this->con->query('select t1.*,t2.profession from tbl_professional t1 LEFT JOIN tbl_profession t2 ON t1.prof_id=t2.id where t1.id = "'.$id.'"');
        $detail =mysqli_fetch_array($queryData);
        return $detail;
       }

       public function professionalRemain($categoryId)
   {
        $data =  $this->con->query('SELECT * FROM tbl_profession');
        while($detail =$data->fetch_array()){
               
              if($detail["id"]==$categoryId)
                {
                  $html .='<option value="'.$detail['id'].'" selected>'.$detail['profession'].'</option>';
                }
                else
                {
                  $html .='<option value="'.$detail['id'].'">'.$detail['profession'].'</option>';
                }

        }
        return $html;

         
    }

  public function editProfessional($args,$id){
        
         $updateData =  $this->con->query('update tbl_professional set  prof_id ="'.$args["category_id"].'",professional= "'.$args['professional'].'" where id = "'.$id.'"');
        return 1;


    }

public function socialLinkDetail(){
      $queryData =  $this->con->query('SELECT * FROM `tbl_socialLink`');
       $detail =mysqli_fetch_array($queryData);
       return $detail;
       }

       public function socialLink($args){
       $queryData =  $this->con->query('SELECT * FROM `tbl_socialLink`');
       $row = $queryData->num_rows;
                if($row == 1)
                {
   $updateData =  $this->con->query('update tbl_socialLink set appStore= "'.$args['appStore'].'",googleLink= "'.$args['googleLink'].'",facebookLink= "'.$args['facebookLink'].'",twitterLink= "'.$args['twitterLink'].'",googlePlus= "'.$args['googlePlus'].'" where 1');
       }
       else
       {
        $insertData =  $this->con->query('insert into tbl_socialLink(appStore,googleLink,facebookLink,twitterLink,googlePlus)values("'.$args['appStore'].'","'.$args['googleLink'].'","'.$args['facebookLink'].'","'.$args['twitterLink'].'","'.$args['googlePlus'].'")');
       }
   return 1;
}


    function addStaticContent($args,$id){
        $data =  mysqli_num_rows($this->con->query('SELECT * FROM tbl_static_data where category_id = "'.$id.'"'));
        if($data == 0){
            $addData = $this->con->query('insert into tbl_static_data (category_id,content,french_content)values("'.$id.'","'.$args['ckeditor'].'","'.$args['french_content'].'")');
            return 1;

        }else{
            $addData = $this->con->query('update tbl_static_data set content="'.$args['ckeditor'].'",french_content = "'.$args['french_content'].'" where category_id ="'.$id.'"');
            return 1;

        }
    }   

    public function staticList(){
        $i = 1;
        $data =  $this->con->query('SELECT * FROM `tbl_static`');
        while($detail =$data->fetch_assoc()){
            $html.='<tr><td>'.$i.'</td><td>'.$detail['name'].'</td><td><a href="staticContent.php?id='.$detail['id'].'"  class="btn btn-primary">Edit</a></td>';
            $i = $i+1;
                  
        }  
        return $html; 

    }

    public function staticDetail($id){
        $data =  $this->con->query('SELECT * FROM tbl_static_data as d join tbl_static as s on s.id=d.category_id where d.category_id = "'.$id.'"');
       $det = $data->fetch_assoc();
        return $det; 

    }




 


    public function userList(){
        $i = 1;
        $data =  $this->con->query('SELECT * FROM `tbl_user` where role!=1');
        while($detail =$data->fetch_assoc()){
            if($detail['status'] == 0){
                $status = "block-".$detail['id']."";
                $name= 'Block';
            }else{
                $status = "unblock-".$detail['id']."";
                $name= 'UnBlock';
            }

            $html.='<tr><td>'.$i.'</td>
            <td>'.$detail['name'].'</td>
            <td>'.$detail['email'].'</td>
            <td>'.$detail['mobile'].'</td>
            <td><p id="'.$status.'" class="btn btn-primary"><span id="text-'.$detail['id'].'">'.$name.'</span></p></td>';
            $i = $i+1;
                  
        }  
        return $html; 

    }


    public function planRemain(){
        $data =  $this->con->query('SELECT * FROM tbl_plan_name');
        while($detail =$data->fetch_assoc()){
                $plan =  $this->con->query('SELECT * FROM tbl_plan where plan_id = "'.$detail['id'].'"');
                $row = $plan->num_rows;
                if($row == 0){
                  $html .='<option value="'.$detail['id'].'">'.$detail['plan_name'].'</option>';
            }

        }
        return $html; 

         
    }
      
    public function planBenfit($ids=null){
       // echo 'vj'; print_r($ids);exit;
         $html ='';
         $data =  $this->con->query('SELECT * FROM tbl_plan_benfit');
         $i =1;
         while($detail =$data->fetch_assoc()){
            $selected = '';
            if($ids!=''){
                if (in_array($detail['id'], $ids)){
                  
                     $selected = 'checked';
                }
           }
            $html .='<p><span class="input-group-addon"><input type="checkbox" '.$selected.' value="'.$detail['id'].'" class="filled-in" id="ig_checkbox'.$i.'" name="benfit[]"><label for="ig_checkbox'.$i.'"></label>'.$detail['benfit'].'</span></p>';
            $i = $i +1;
         }
         //print_r($html);exit;
          return $html; 
 } 

public function addPlan($args){
    $benfit = implode(',',$args['benfit']);
    
    $addPlan =  $this->con->query('insert into tbl_plan(plan_id,description)values("'.$args['planName'].'","'.$args['des'].'")');
    foreach($args['benfit'] as $ben){

    $addPlan1 =  $this->con->query('insert into tbl_benifit_id(benifit_id,plan_id)values("'.$ben.'","'.$args['planName'].'")');
  }
    $id =$this->con->insert_id;
    $p =0;
   foreach($args['time'] as $time){
       $this->con->query('insert into tbl_plan_price(plan_id,price,time)values("'.$args['planName'].'","'.$args['price'][$p].'","'.$args['time'][$p].'")');
        $p = $p +1;
    }
    return "1";
 }


  public function planList(){
        $i = 1;
        $data =  $this->con->query('SELECT *,n.id as ID FROM `tbl_plan` as p join tbl_plan_name as n on n.id=p.plan_id');
        while($detail =$data->fetch_assoc()){
            $html.='<tr><td>'.$i.'</td>
            <td>'.$detail['plan_name'].'</td>
            <td>'.$detail['description'].'</td>
            <td><p id="'.$detail['ID'].'" class="btn btn-danger" onclick="return delIt('.$detail['ID'].');" title="Delete">Delete</p><a href="editPlan.php?id='.$detail['ID'].'" class="btn btn-primary">Edit</a><a href="viewPlan.php?id='.$detail['ID'].'" class="btn btn-primary">View Detail</a></td>';
            $i = $i+1;
                  
        }  
        return $html; 

    }

    public function planDetail($id){
         $benfit = array();
         $row = array();
        $allBenfit = array();
       $queryData =  $this->con->query('SELECT * FROM `tbl_plan` as p join tbl_plan_name as n on n.id= p.plan_id join tbl_plan_price as price on price.plan_id= p.plan_id where p.plan_id = "'.$id.'"');
       $detail =$queryData->fetch_assoc();
       
       $benfitQuery =  $this->con->query('SELECT * FROM `tbl_benifit_id` where plan_id ='.$id.'');
        while($benfitDetail = $benfitQuery->fetch_assoc()){
           $row['benfit'][] = $benfitDetail['benifit_id'];
        }
        
        $row['description'] = $detail['description'];
        $row['name'] = $detail['plan_name'];
        $row['time'] = $detail['time'];
        $row['price'] = $detail['price'];
        return $row;
    }

    public function editPlan($args,$id){
     //  print_r($args);exit;
         $benfit = implode(',',$args['benfit']);

        $updateData =  $this->con->query('update tbl_plan set description= "'.$args['des'].'" where plan_id = "'.$id.'"');

        $delData =  $this->con->query('Delete from tbl_benifit_id  where plan_id = "'.$id.'"');

      foreach($args['benfit'] as $ben1)
      {

          $addPlan1 =  $this->con->query('insert into tbl_benifit_id(benifit_id,plan_id)values("'.$ben1.'","'.$id.'")');
      }
  
       $updatePrice  = $this->con->query('update tbl_plan_price set price="'.$args['price'].'",time="'.$args['time'][0].'" where plan_id = "'.$id.'"');
       return 1;


    }

/*`tbl_benifit_id` t1 join `tbl_plan_name` t2 on t1.plan_id=t2.id*/
     public function viewPlanList($id){
         $benfit = array();
         $row = array();
        $allBenfit = array();
       $queryData =  $this->con->query('SELECT * FROM `tbl_plan` as p join tbl_plan_name as n on n.id= p.plan_id join tbl_plan_price as price on price.plan_id= p.plan_id where p.plan_id = "'.$id.'"');
       $detail =$queryData->fetch_assoc();
       
       $benfitQuery =  $this->con->query('SELECT q.benfit FROM `tbl_benifit_id` as p join tbl_plan_benfit as q on p.benifit_id=q.id where p.plan_id ="'.$id.'"');
           while($detail2 =$benfitQuery->fetch_assoc())
           {

        $row['benfit'][] = $detail2['benfit'];
      }
        $row['description'] = $detail['description'];
        $row['plan_name'] = $detail['plan_name'];
        $row['time'] = $detail['time'];
        $row['price'] = $detail['price'];
        return $row;
        
    }


     public function addCity($args){
     $addCity =  $this->con->query('insert into tbl_city(city)values("'.$args['city_name'].'")');
     return 1;
    }

    public function cityDetail($id){
      //  ECHO 'SELECT city FROM `tbl_city` where id = "'.$id.'"';EXIT;
      $queryData =  $this->con->query('SELECT city FROM `tbl_city` where id = "'.$id.'"');
       $detail =$queryData->fetch_assoc();
       return $detail;
       }

    

    public function cityList(){
       $i = 1;
        $data =  $this->con->query('SELECT * FROM `tbl_city`');
        while($detail =$data->fetch_assoc()){
            $html.='<tr><td>'.$i.'</td>
            <td>'.$detail['city'].'</td>
            <td><p id="'.$detail['id'].'" class="btn btn-danger" onclick="return delIt('.$detail['id'].');" title="Delete">Delete</p> <a href="editCity.php?id='.$detail['id'].'" class="btn btn-primary">Edit</a></td>';
            $i = $i+1;
                  
           }  
        return $html; 
       }

       public function editCity($args,$id){
       
   $updateData =  $this->con->query('update tbl_city set city= "'.$args['city_name'].'" where id = "'.$id.'"');
   return 1;
         }


        public function addReligion($args){
     $addReligion =  $this->con->query('insert into Religion(religion_name)values("'.$args['religion_name'].'")');
     return 1;
    }

    public function religionDetail($id){
      $queryData =  $this->con->query('SELECT * FROM `Religion` where id = "'.$id.'"');
       $detail =mysqli_fetch_array($queryData);
       return $detail;
       }

 public function editReligion($args,$id){
       
   $updateData =  $this->con->query('update Religion set religion_name= "'.$args['religion_name'].'" where id = "'.$id.'"');
   return 1;
         }



  public function religionList(){
       $i = 1;
        $data =  $this->con->query('SELECT * FROM `Religion`');
        while($detail =$data->fetch_assoc()){
            $html.='<tr><td>'.$i.'</td>
            <td>'.$detail['religion_name'].'</td>
            <td><p id="'.$detail['id'].'" class="btn btn-danger" onclick="return delIt('.$detail['id'].');" title="Delete">Delete</p> <a href="editReligion.php?id='.$detail['id'].'" class="btn btn-primary">Edit</a></td>';
            $i = $i+1;
                  
           }  
        return $html; 
       }



    // shailendra verma code 

     public function addBanner($args){
                $img="imag";
               if( $_FILES[$img]["size"] >1 && $_FILES[$img]["name"]!="")
              { 
                if(($_FILES[$img]['type']=="image/gif") || ($_FILES[$img]['type']=="image/pjpeg") || ($_FILES[$img]['type']=="image/jpeg") || ($_FILES[$img]['type']=="image/png"))
                { 
                    if(is_uploaded_file($_FILES[$img]['tmp_name'])) 
                    {
                         $sourcePath = $_FILES[$img]['tmp_name'];
                         $targetPath = "../assets/images/".$_FILES[$img]['name'];
                         $uploaddir = $_FILES[$img]['name'];
                         move_uploaded_file($sourcePath,$targetPath);
                    }
                }
                else
                {
                   $uploaddir = "";  
                }
              }
              else
              {
                $uploaddir = "";
              }
              $Insdata = $this->con->query('insert into tbl_banner(caption,image)values("'.$args['capt'].'","'.$uploaddir.'")');
                  return 1;
       }


       public function bannerList(){
        global $baseurl;
        $i = 1;
        $data =  $this->con->query('SELECT * FROM `tbl_banner`');
        while($detail =$data->fetch_assoc()){

            $html.='<tr><td>'.$i.'</td>
            <td>'.$detail['caption'].'</td>
           <td><img src="'.$baseurl.'assets/images/'.$detail['image'].'" width="50" height="50"></td>
            <td><p id="'.$detail['id'].'" class="btn btn-danger" onclick="return delIt('.$detail['id'].');" title="Delete">Delete</p> <a href="editBanner.php?id='.$detail['id'].'" class="btn btn-primary">Edit</a></td>';
            $i = $i+1;
                  
           }  
        return $html; 
       }

       public function bannerDetail($id){
      //  ECHO 'SELECT city FROM `tbl_city` where id = "'.$id.'"';EXIT;
      $queryData =  $this->con->query('SELECT * FROM `tbl_banner` where id = "'.$id.'"');
       $detail =$queryData->fetch_assoc();
       return $detail;
       }


    public function editBanner($args,$id){
      global $baseurl;
      $img="imag";
      $old_img=isset($_POST['old_img'])?$_POST['old_img']:"";
  if( $_FILES[$img]["size"] >1 && $_FILES[$img]["name"]!="")
    { 
      if (($_FILES[$img]['type']=="image/gif") || ($_FILES[$img]['type']=="image/pjpeg") || ($_FILES[$img]['type']=="image/jpeg") || ($_FILES[$img]['type']=="image/png"))
      { 
        if(is_array($_FILES)) 
        {
          if(is_uploaded_file($_FILES[$img]['tmp_name'])) 
            {
               $oldfile = $baseurl.'assets/images/'.$old_img;
                if (file_exists($oldfile))
                {
                  unlink($oldfile);
                }
               $sourcePath = $_FILES[$img]['tmp_name'];
                         $targetPath = "../assets/images/".$_FILES[$img]['name'];
                         $uploaddir = $_FILES[$img]['name'];
               move_uploaded_file($sourcePath,$targetPath);
            }
        }
      }
      
      else
      {
        $uploaddir =$old_img;  
      }
    }
    else
    {
      $uploaddir =$old_img;
    }
        
      $updateData =  $this->con->query('update tbl_banner set caption= "'.$args['capt'].'",image= "'.$uploaddir.'" where id = "'.$id.'"');
        return 1;
         }





    /*Shabi Code*/

    public function addState($args){
    
     $addCity =  $this->con->query('insert into states(country_id,name)values("'.$args['country_id'].'","'.$args['name'].'")');

     return 1;
    }

    public function countrynameList(){
        $data =  $this->con->query('SELECT * FROM `countries`');
        while($detail =$data->fetch_array()){
                //$plan =  $this->con->query('SELECT * FROM tbl_plan where plan_id = "'.$detail['id'].'"');
                //$row = $plan->num_rows;
                //if($row == 0){
                  $html .='<option value="'.$detail['id'].'">'.$detail['name'].'</option>';
            //}

        }
        return $html; 

         
    }



     public function stateList(){
        $i = 1;
        $data =  $this->con->query('select t1.*,t2.name as cname from states t1 LEFT JOIN countries t2 ON t1.country_id=t2.id');
        while($detail =$data->fetch_assoc()){
            $html.='<tr><td>'.$i.'</td>
            <td>'.$detail['cname'].'</td>
            <td>'.$detail['name'].'</td>
            <td><p id="'.$detail['id'].'" class="btn btn-danger" onclick="return delIt('.$detail['id'].');" title="Delete">Delete</p><a href="editState.php?id='.$detail['id'].'" class="btn btn-primary">Edit</a></td>';
            $i = $i+1;
                  
        }  
        return $html; 

    }


     public function stateDetail($id){
        
       $queryData =  $this->con->query('select t1.*,t2.name as cname from states t1 LEFT JOIN countries t2 ON t1.country_id=t2.id where t1.id = "'.$id.'"');
        $detail =mysqli_fetch_array($queryData);
        return $detail;
       }

    public function editState($args,$id){
        
         $updateData =  $this->con->query('update states set  country_id ="'.$args["country_id"].'",name= "'.$args['name'].'" where id = "'.$id.'"');
        return 1;


    }




   public function stateRemain($countryId)
   {
        $data =  $this->con->query('SELECT * FROM countries');
        while($detail =$data->fetch_array()){
               
              if($detail["id"]==$countryId)
                {
                  $html .='<option value="'.$detail['id'].'" selected>'.$detail['name'].'</option>';
                }
                else
                {
                  $html .='<option value="'.$detail['id'].'">'.$detail['name'].'</option>';
                }

        }
        return $html;

         
    }

   function addCategory($args){
        
            $addData = $this->con->query('insert into category (category)values("'.$args['category'].'")');
            return 1;

        
    }  


     public function categoryList(){
        $i = 1;
        $data =  $this->con->query('SELECT * FROM `category` ORDER BY id DESC');
        while($detail =$data->fetch_assoc()){
            $html.='<tr><td>'.$i.'</td><td>'.$detail['category'].'</td>
           <td>
            <p id="'.$detail['id'].'" class="btn btn-danger" onclick="return delIt('.$detail['id'].');" title="Delete">Delete</p>
            <a href="editCategory.php?id='.$detail['id'].'"  class="btn btn-primary">Edit</a></td>';
            $i = $i+1;
                  
        }  
        return $html; 

    } 

     public function categoryDetail($id){
        $data =  $this->con->query('SELECT * FROM category  where id = "'.$id.'"');
       $det = $data->fetch_assoc();
        return $det; 

    }

 public function editCategory($args,$id){
   
       $updateData =  $this->con->query('update category set category= "'.$args['category'].'" where id = "'.$id.'"');
   return 1;

    }

   

public function addEducation($args){
    $addCity =  $this->con->query('insert into tbl_education(category_id,education)values("'.$args['category_id'].'","'.$args['education'].'")');

     return 1;
    }

    public function categorynameList(){
        $data =  $this->con->query('SELECT * FROM `category`');
        while($detail =$data->fetch_array()){
                //$plan =  $this->con->query('SELECT * FROM tbl_plan where plan_id = "'.$detail['id'].'"');
                //$row = $plan->num_rows;
                //if($row == 0){
                  $html .='<option value="'.$detail['id'].'">'.$detail['category'].'</option>';
            //}

        }
        return $html; 

         
    }


      public function educationList(){
        $i = 1;
        $data =  $this->con->query('select t1.*,t2.category from tbl_education t1 LEFT JOIN category t2 ON t1.category_id=t2.id');
        while($detail =$data->fetch_assoc()){
            $html.='<tr><td>'.$i.'</td>
            <td>'.$detail['category'].'</td>
            <td>'.$detail['education'].'</td>
            <td><p id="'.$detail['id'].'" class="btn btn-danger" onclick="return delIt('.$detail['id'].');" title="Delete">Delete</p><a href="editEducation.php?id='.$detail['id'].'" class="btn btn-primary">Edit</a></td>';
            $i = $i+1;
                  
        }  
        return $html; 

    }

     public function educationDetail($id){
         $queryData =  $this->con->query('select t1.*,t2.category from tbl_education t1 LEFT JOIN category t2 ON t1.category_id=t2.id where t1.id = "'.$id.'"');
        $detail =mysqli_fetch_array($queryData);
        return $detail;
       }

    public function editEducation($args,$id){
        
         $updateData =  $this->con->query('update tbl_education set  category_id ="'.$args["category_id"].'",education= "'.$args['education'].'" where id = "'.$id.'"');
        return 1;


    }


   public function educationRemain($categoryId)
   {
        $data =  $this->con->query('SELECT * FROM category');
        while($detail =$data->fetch_array()){
               
              if($detail["id"]==$categoryId)
                {
                  $html .='<option value="'.$detail['id'].'" selected>'.$detail['category'].'</option>';
                }
                else
                {
                  $html .='<option value="'.$detail['id'].'">'.$detail['category'].'</option>';
                }

        }
        return $html;

         
    }



 function addPlanName($args){
        
            $addData = $this->con->query('insert into tbl_plan_name (plan_name)values("'.$args['plan_name'].'")');
            return 1;

        
    }   


    public function planNameList(){
        $i = 1;
        $data =  $this->con->query('SELECT * FROM `tbl_plan_name`');
        while($detail =$data->fetch_assoc()){
            $html.='<tr><td>'.$i.'</td>
            <td>'.$detail['plan_name'].'</td>
            
            <td><p id="'.$detail['id'].'" class="btn btn-danger" onclick="return delIt('.$detail['id'].');" title="Delete">Delete</p>
            
            <a href="editPlanName.php?id='.$detail['id'].'" class="btn btn-primary">Edit</a></td>';
            $i = $i+1;
                  
        }  
        return $html; 

    }

     public function planNameDetail($id){
        $data =  $this->con->query('SELECT * FROM tbl_plan_name  where id = "'.$id.'"');
       $det = $data->fetch_assoc();
        return $det; 

    }

public function editPlanName($args,$id){
   // echo 'update tbl_plan_benfit set benfit= "'.$args['benfit'].'" where id = "'.$id.'"';exit;
       $updateData =  $this->con->query('update tbl_plan_name set plan_name= "'.$args['plan_name'].'" where id = "'.$id.'"');
   return 1;

    }
 

function addBenifit($args){
        
            $addData = $this->con->query('insert into tbl_plan_benfit (benfit)values("'.$args['benfit'].'")');
            return 1;

        
    }  


     public function benifitList(){
        $i = 1;
        $data =  $this->con->query('SELECT * FROM `tbl_plan_benfit`');
        while($detail =$data->fetch_assoc()){
            $html.='<tr><td>'.$i.'</td><td>'.$detail['benfit'].'</td><td><p id="'.$detail['id'].'" class="btn btn-danger" onclick="return delIt('.$detail['id'].');" title="Delete">Delete</p>
            <a href="editBenifit.php?id='.$detail['id'].'"  class="btn btn-primary">Edit</a></td>';
            $i = $i+1;
                  
        }  
        return $html; 

    } 

     public function benifitDetail($id){
        $data =  $this->con->query('SELECT * FROM tbl_plan_benfit  where id = "'.$id.'"');
       $det = $data->fetch_assoc();
        return $det; 

    }

 public function editBenifit($args,$id){
   // echo 'update tbl_plan_benfit set benfit= "'.$args['benfit'].'" where id = "'.$id.'"';exit;
       $updateData =  $this->con->query('update tbl_plan_benfit set benfit= "'.$args['benfit'].'" where id = "'.$id.'"');
   return 1;

    }


    function addProfession($args){
        
            $addData = $this->con->query('insert into tbl_profession (profession)values("'.$args['profession'].'")');
            return 1;

        
    }  


     public function professionList(){
        $i = 1;
        $data =  $this->con->query('SELECT * FROM `tbl_profession` ORDER BY id DESC');
        while($detail =$data->fetch_assoc()){
            $html.='<tr><td>'.$i.'</td>
            <td>'.$detail['profession'].'</td>
             <td>
            <p id="'.$detail['id'].'" class="btn btn-danger" onclick="return delIt('.$detail['id'].');" title="Delete">Delete</p>
            <a href="editProfession.php?id='.$detail['id'].'"  class="btn btn-primary">Edit</a></td>';
            $i = $i+1;
                  
        }  
        return $html; 

    } 

     public function professionDetail($id){
        $data =  $this->con->query('SELECT * FROM tbl_profession  where id = "'.$id.'"');
       $det = $data->fetch_assoc();
        return $det; 

    }

 public function editProfession($args,$id){
   
       $updateData =  $this->con->query('update tbl_profession set profession= "'.$args['profession'].'" where id = "'.$id.'"');
   return 1;

    }

public function addCountry($args){
  $addCity =  $this->con->query('insert into countries(sortname,name,phonecode)values("'.$args['sortname'].'","'.$args['name'].'","'.$args['phonecode'].'")');
     return 1;
    }

    public function countryDetail($id){
        $data =  $this->con->query('SELECT * FROM countries  where id = "'.$id.'"');
       $det = $data->fetch_assoc();
        return $det; 

    }

    

    public function countryList(){
       $i = 1;
        $data =  $this->con->query('SELECT * FROM `countries`');
        while($detail =$data->fetch_assoc()){
            $html.='<tr><td>'.$i.'</td>
            <td>'.$detail['name'].'</td>
            <td>'.$detail['sortname'].'</td>
            <td>'.$detail['phonecode'].'</td>
            <td><p id="'.$detail['id'].'" class="btn btn-danger" onclick="return delIt('.$detail['id'].');" title="Delete">Delete</p> <a href="editCountry.php?id='.$detail['id'].'" class="btn btn-primary">Edit</a></td>';
            $i = $i+1;
                  
           }  
        return $html; 
       }

   public function editCountry($args,$id){
       
   $updateData =  $this->con->query('update countries set sortname= "'.$args['sortname'].'",name= "'.$args['name'].'",phonecode= "'.$args['phonecode'].'" where id = "'.$id.'"');
   return 1;
         }





/*Shabi Code end*/




}


$obj1 = new AdminFunction($con);



?>
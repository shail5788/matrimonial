<?php 
	  $user_id=$_SESSION['user']['id'];

	  $countries=$obj->get_country();
      $religions=$obj->get_religion();
      $educations=$obj->get_education();
      $occupation=$obj->get_occupation();
      $data=$obj->get_desired_partner_info($user_id);

 ?>


<!-- desired-partner popups -->

<!--editbox basic-info start-->
<div class="overlay">&nbsp;</div>
<div class="profile-edit-pop" id="partner-pop">
 <div class="view-title">Basic Detail <div class="cut" onclick="fade('partner-pop')">X</div></div>
     <div class="fieldrow">
       <ul>
          <li><label>Age</label>
              <div class="textbox">
	         	<input type="text" class="text" name="age" id="age" value="<?php echo $data[0]['age']; ?>">
	         </div>
         </li>
         <li><label>Height</label><div class="textbox"><input type="text" class="text" name="height" id="height" value="<?php echo $data[0]['height']; ?>" /></div></li>
         <li><label>Religion</label>
              <div class="textbox">
	         	<select class="text" id="get_religions">
	         	   <?php foreach ($religions as $religion): ?>
	         	   
		         	   <option value="<?php echo $religion['id'] ?>">
		         	   <?php echo $religion['religion_name'] ?>
		         	   </option>

	         	  <?php endforeach ?>
	         	</select>
	         </div>
         </li>
         <li><label>Country</label>
	         <div class="textbox">
	         	<select class="text" id="get_countries">
	         	  <?php $select=""; foreach ($countries as $country):
                        
                        if($data[0]['country'][0]['id']==$country['id']){
                            
                            $select="selected";
                        }else{
                        	 $select="";
                        } 

	         	   ?>
	         	        
		         	   <option value="<?php echo $country['id'] ?>" <?php echo $select; ?> >
		         	      <?php echo $country['name'] ?>
		         	   </option>

	         	  <?php endforeach ?>
	         	</select>
	         </div>
	      </li>
     	 <li><label>State</label>
     	 <div class="textbox">
	         	<select class="text" id="get_states">
	         	  <?php if(empty($data[0]['state'][0]['name'])){ ?>
	         	  <option value="">Choose state</option>
	         	  <?php }else{ ?>
	         	   <option value="<?php echo $data[0]['state'][0]['id'] ?>"><?php echo trim( $data[0]['state'][0]['name'] )?></option>
	         	   <?php } ?>
	         	</select>
	         </div>
     	 </li>
        <li><label>City</label>
          <div class="textbox">
          	<input type="text" class="text" name="city" id="city" placeholder="City" value="<?php echo $data[0]['city'] ?>" />
          </div>
        </li>
        <li><label>Marital Status</label>
     	 <div class="textbox">
	         	<select class="text" id="marital_status">
	         	  <option value="">Choose marital status</option>
	         	  <option value="single" <?php if($data[0]['marital_status']=="single") echo "selected";  ?> >Single</option>
	         	  <option value="divorced"  <?php if($data[0]['marital_status']=="divorced") echo "selected";  ?>>Divorced</option>
	         	  <option value="widowed" <?php if($data[0]['marital_status']=="widowed") echo "selected";  ?>>Widowed</option>
	         	  <option value="seperated" <?php if($data[0]['marital_status']=="seperated") echo "selected";  ?>>Seperated</option>
	         	</select>
	         </div>
     	 </li>
         <li><label>&nbsp;</label><div class="textbox"><input name="" type="button" class="btn red" value="Submit" id="save_basic" /><input name="" type="button" class="btn" value="Cancel" /></div></li>
         
       </ul>
     </div>
</div>
<!--editbox close-->

<!-- editbox for educational-info  start-->
<div class="overlay">&nbsp;</div>
  <div class="profile-edit-pop" id="education-partner-pop">
  <div class="view-title">Education & Work <div class="cut" onclick="fade('education-partner-pop')">X</div></div>
     <div class="fieldrow">
       <ul>
       
         <li><label>Highest Qualification</label><div class="textbox">
	         	<select class="text" id="hqualification">
	         	  <?php foreach ($educations as $edu): 
                        
                        if($data[0]['highest_qualification'][0]['id']==$edu['id']){
                            
                            $select="selected";
                        }else{
                        	 $select="";
                        }
	         	  ?>
	         	   
		         	   <option value="<?php echo $edu['id'] ?>" <?php echo $select ;?>>
		         	      <?php echo $edu['education'] ?>
		         	   </option>

	         	  <?php endforeach ?>
	         	</select>
	         </div></li>
         <li><label>Occupation</label><div class="textbox">
	         	<select class="text" id="dprofession">
	         	  <?php foreach ($occupation as $occu): 
                       
                       if($data[0]['occupation'][0]['id']==$occu['id']){
                            
                            $select="selected";
                        }else{
                        	 $select="";
                        }
	         	  ?>
	         	   
		         	   <option value="<?php echo $occu['id'] ?>" <?php echo $select ;?>>
		         	      <?php echo $occu['professional'] ?>
		         	   </option>

	         	  <?php endforeach ?>
	         	</select>
	         </div></li>
         <li><label>Income</label><div class="textbox"><input type="text" class="text" name="income" id="income" value="<?php echo $data[0]['income'] ?>" /></div></li>
        
         <li><label>&nbsp;</label><div class="textbox"><input name="" type="button" class="btn red" value="Submit"  id="save_education"/><input name="" type="button" class="btn" value="Cancel" /></div></li>
         
       </ul>
     </div>
</div>  
<!-- close editbox for educational-info  start-->

<!-- start popup of about desired partner -->

<div class="overlay">&nbsp;</div>
  <div class="profile-edit-pop" id="about-partner-pop">
  <div class="view-title">About Desired Partner <div class="cut" onclick="fade('about-partner-pop')">X</div></div>
     <div class="fieldrow">
       <ul>
       
         <li>
            <div class="textbox">
	          <textarea class="text" rows="5" cols="15" name="about" id="about" placeholder="About desired partner"><?php echo $data[0]['about_partner'] ?></textarea>   	
	         </div>
	     </li>
         
        
         <li><label>&nbsp;</label><div class="textbox"><input name="" type="button" class="btn red" value="Submit"  id="save_about"/><input name="" type="button" class="btn" value="Cancel" /></div></li>
         
       </ul>
     </div>
</div>  

<!-- close popup of about desired partner -->

<!--close desired-partner popups -->
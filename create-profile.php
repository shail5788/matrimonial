<?php 
   session_start();
   
	if(!isset($_SESSION['user']) || $_SESSION['user']==""){
          header('Location:index.php');
    }


	include_once("includes/common-header.php"); 
  
      
    
    $email=$_SESSION['user']['email'];
    $data=$obj->get_sign_user($email);
    $getDate=explode('-', $data[0]['dob']);
   


    $edus=$obj->get_edu_category();
    $professional = $obj->get_professional();
 
    $countrys=$obj->get_country();
    $professionName = $obj->get_profession($data[0]['profession']);
    $professionalName = $obj->get_professionalName($data[0]['professional']);
   
    $month=['jan'=>"01","Fab"=>"02","Mar"=>"03","Apr"=>"04","May"=>"05","Jun"=>"06",
    		"Jul"=>"07","Aug"=>"08","Sep"=>"09","Oct"=>"10","Nov"=>"11","Dec"=>"12"];
   
 if(isset($_POST['san']) && $_POST['san']=="yes")
 {
            
            $date=$_POST['bdate'];
            $index=$_POST['bmonth'];
            $bmonth=$month[$index];
            $byear=$_POST['byear'];
            $dob=$byear."-".$bmonth."-".$date;
            
          $dataset=array("gender"=>$_POST['gender'],
	          "dob"=>$dob,
	          "wieght"=>$_POST['weight'],
	          "height"=>$_POST['height'],
	          "marital_status"=>$_POST['mstatus'],
	          "nationality"=>$_POST['nationality'],
	          "education_type"=>$_POST['eduCate'],
	          "education"=>$_POST['education'],
	          "professional"=>$_POST['professional'],
	          "address"=>$_POST['address'],
	          "country"=>$_POST['country'],
	          "province"=>$_POST['state'],
	          "city"=>$_POST['city'],
            'profession'=>$_POST['profession'],
	          "about"=>$_POST['about']
          );
    

    $response=$obj->creating_profile($dataset,$data[0]['id'],$_FILES);

 } 

?>

<div class="create-wrapper">
<!--banner start-->
<div class="create-banner"></div>
<!--banner close-->

<!--menu start-->

  <div class="title-box">
    <div class="row middle">
      <div class="col-sm-12">
        <h1>Create Profile</h1>
      </div>
    </div>
  </div>
  
</div>
<!--menu close-->
</div>
<!--member start-->
<div class="container">
  <div class="createprofile module">    
    <div class="row flex1">
      <div class="col-sm-9">
       <div class="whitebox">
        <form method="POST" action="#" id="creatingProfilefrm" name=id="creatingProfilefrm" enctype="multipart/form-data">
         <input type="hidden" name="san" value="yes">
        <div class="profile">
          <div class="thumb-info">
            <div class="imgbox" id="imagePreview"><img id="previewing" src="<?php echo $wwwroot."user-profiles/".$data[0]['picture'] ?>" />

            </div>
            
            <div class="userbox">
              <ul>
              <li><label for="Name">Name<span>*</span></label>
                	<input type="text" class="text" name="name" placeholder="Name" value="<?php echo $data[0]['name']?>" />
               </li>
               <li>
                  <label for="gender">Gender<span>*</span></label> 
                  <div>Male <input type="radio" name="gender" value="male" <?php if($data[0]['gender']=='male'){echo "checked";} ?>/></div>
                  <div>Female <input type="radio" name="gender" value="female" <?php if($data[0]['gender']=='female'){echo "checked";} ?>/></div>
              </li>
              <li>
                <input id="logo" class="choose_file"  name="pic" style="opacity:0; height:48px; position:absolute;" type="file">
                <label for="upload-pic">Upload Image <i class="fa fa-pencil"></i>
                 <span class="logo-error error" style="color:red;dispaly:none"></span>
                 </label>
                 <span class="logo-error error" style="color:red;dispaly:none"></span>
              </li>
            </ul>
            </div>
          </div>
          
        
          <!-- Personal Information Start -->
          <div class="title">Personal Information</div>
          
          <div class="createForm">          
           
            <div class="field">
              <label for="your-email">Your Email<span>*</span></label>
              <input type="text" class="text" name="emailAddress" id="emailAddress"  value="<?php echo $data[0]['email'] ?>" readonly/>
            </div>

            <div class="field">
              <label for="contact">Contact Number<span>*</span></label>
                <div class="row">
                  <div class="col-sm-2"><input type="text" class="text" name="contact" id="contact" placeholder="+91"/></div>
                  <div class="col-sm-10"><input type="text" class="text" name="contact" id="contact"  value="<?php echo $data[0]['mobile'] ?>" /></div>
                </div>
            </div>
            <div class="field">
              <label for="nationality">Nationality<span>*</span></label>
            <select class="text" name="nationality" id="nationality"><option>Nationality</option>
             <?php foreach ($countrys as $value) { ?>
              <option value="<?php echo $value['id'] ?>" <?php if($data[0]['nationality']==$value['id']){echo "selected";} ?>><?php echo $value['name'] ?></option>
             <?php } ?>
            </select>
            </div>

            <div class="field">
              <label for="date-birth">Date Of Birth<span>*</span></label>
              <!--<input type="date" class="text" id="dob" name="dob" <?php echo $data[0]['dob']?>/>-->
              <div class="divText">
                <ul class="dob">
                <li><span id="date-show"><?php if($getDate[2]!="")echo $getDate[2];else echo "Date"; ?></span></i>
                  <input type="hidden" name="bdate" id="bdate" value="" />
                  <div class="dobdropbox" style="display:none;">
                 
                  <span class="dobpop"><i class="fa fa-angle-up "></i></span>
                  <ul id="datesub">
                    <li class="datep" id="datep1">1</li>
                    <li class="datep" id="datep2">2</li>
                    <li class="datep" id="datep3">3</li>
                    <li class="datep" id="datep4">4</li>
                    <li class="datep" id="datep5">5</li>
                    <li class="datep" id="datep6">6</li>
                    <li class="datep" id="datep7">7</li>
                    <li class="datep" id="datep8">8</li>
                    <li class="datep" id="datep9">9</li>
                    <li class="datep" id="datep10">10</li>
                    <li class="datep" id="datep11">11</li>
                    <li class="datep" id="datep12">12</li>
                    <li class="datep" id="datep13">13</li>
                    <li class="datep" id="datep14">14</li>
                    <li class="datep" id="datep15">15</li>
                    <li class="datep" id="datep16">16</li>
                    <li class="datep" id="datep17">17</li>
                    <li class="datep" id="datep18">18</li>
                    <li class="datep" id="datep19">19</li>
                    <li class="datep" id="datep20">20</li>
                    <li class="datep" id="datep21">21</li>
                    <li class="datep" id="datep22">22</li>
                    <li class="datep" id="datep23">23</li>
                    <li class="datep" id="datep24">24</li>
                    <li class="datep" id="datep25">25</li>
                    <li class="datep" id="datep26">26</li>
                    <li class="datep" id="datep27">27</li>
                    <li class="datep" id="datep28">28</li>
                    <li class="datep" id="datep29">29</li>
                    <li class="datep" id="datep30">30</li>
                    <li class="datep" id="datep31">31</li>
                  </ul>
                  </div> 
                </li>
                <li><span id="month-show"><?php if($getDate[1]!="")echo  array_search($getDate[2], $month) ;else echo "Date"; ?></span></i>
                  <input type="hidden" name="bmonth" id="bmonth" value="" />
                  <div class="dobdropbox" style="display:none;">
                 
                  <span class="dobpop"><i class="fa fa-angle-up "></i></span>
                  <ul id="monthsub">
                    <li class="month" id="month1">Jan</li>
                    <li  class="month" id="month2">Feb</li>
                    <li  class="month" id="month3">Mar</li>
                    <li  class="month" id="month4">Apr</li>
                    <li  class="month" id="month5">May</li>                    
                    <li  class="month" id="month6">Jun</li>
                    <li class="month" id="month7">Jul</li>
                    <li class="month" id="month8">Aug</li>
                    <li class="month" id="month9">Sep</li>
                    <li class="month" id="month10">Oct</li>
                    <li class="month" id="month11">Nov</li>
                    <li class="month" id="month12">Dec</li>
                  </ul>
                  </div> 
                </li>
                <li><span id="show-year"><?php if($getDate[1]!="")echo $getDate[0];else echo "Year"; ?></span>
                <input type="hidden" name="byear" id="byear" value="" />
                <div class="dobdropbox" style="display:none;">

                  <span class="dobpop"><i class="fa fa-angle-up "></i></span>
                  <ul id="year">
                    <li class="years activeopt" id="yearli1999" >1999</li>
                    <li class="years" id="yearli1998">1998</li>
                    <li class="years" id="yearli1997">1997</li>
                    <li class="years" id="yearli1996">1996</li>
                    <li class="years" id="yearli1995">1995</li>
                    <li class="years" id="yearli1994">1994</li>
                    <li class="years" id="yearli1993">1993</li>
                    <li class="years" id="yearli1992">1992</li>
                    <li class="years" id="yearli1991">1991</li>
                    <li class="years" id="yearli1990">1990</li>
                    <li class="years" id="yearli1989">1989</li>
                    <li class="years" id="yearli1988">1988</li>
                    <li class="years" id="yearli1987">1987</li>
                    <li class="years" id="yearli1986">1986</li>
                    <li class="years" id="yearli1985">1985</li>
                    <li class="years" id="yearli1984">1984</li>
                    <li class="years" id="yearli1983">1983</li>
                    <li class="years" id="yearli1982">1982</li>
                    <li class="years" id="yearli1981">1981</li>
                    <li class="years" id="yearli1980">1980</li>
                    <li class="years" id="yearli1979">1979</li>
                    <li class="years" id="yearli1978">1978</li>
                    <li class="years" id="yearli1977">1977</li>
                    <li class="years" id="yearli1976">1976</li>
                    <li class="years" id="yearli1975">1975</li>
                    <li class="years" id="yearli1974">1974</li>
                    <li class="years" id="yearli1973">1973</li>
                    <li class="years" id="yearli1972">1972</li>
                    <li class="years" id="yearli1971">1971</li>
                    <li class="years" id="yearli1970">1970</li>
                    <li class="years" id="yearli1969">1969</li>
                    <li class="years" id="yearli1968">1968</li>
                    <li class="years" id="yearli1967">1967</li>
                    <li class="years" id="yearli1966">1966</li>
                    <li class="years" id="yearli1965">1965</li>
                    <li class="years" id="yearli1964">1964</li>
                    <li class="years" id="yearli1963">1963</li>
                    <li class="years" id="yearli1962">1962</li>
                    <li class="years" id="yearli1961">1961</li>
                    <li class="years" id="yearli1960">1960</li>
                    <li class="years" id="yearli1959">1959</li>
                    <li class="years" id="yearli1958">1958</li>
                    <li class="years"  id="yearli1957">1957</li>
                    <li class="years" id="yearli1956">1956</li>
                    <li class="years" id="yearli1955">1955</li>
                    <li class="years" id="yearli1954">1954</li>
                    <li class="years" id="yearli1953">1953</li>
                    <li class="years" id="yearli1952">1952</li>
                    <li class="years" id="yearli1951">1951</li>
                    <li class="years" id="yearli1950">1950</li>
                    <li class="years" id="yearli1949">1949</li>
                    <li class="years" id="yearli1948">1948</li>
                    <li class="years" id="yearli1947">1947</li>
            </ul>
                  </div>
                </li>
                </ul>
                
              </div>
            </div>

            <div class="field">
              <label for="height">Height<span>*</span></label>
              <div class="row">
             <div class="col-sm-2"><select class="text"><option>Inch</option><option>Feet</option><option>Cms</option></select></div>
             <div class="col-sm-10">
               <select class="text" name="height" id="height">
	          <option>Height</option>
	          <option  value="4.0" <?php if($data[0]['height']=='4.0'){echo "selected";} ?>>4' 0" (1.22 mts)</option>
	          <option  value="5.0" <?php if($data[0]['height']=='5.0'){echo "selected";} ?>>5' 0" (1.52 mts)</option>
	          <option  value="6.0" <?php if($data[0]['height']=='6.0'){echo "selected";} ?>>6' 0" (1.83 mts)</option>
	          <option  value="4.1" <?php if($data[0]['height']=='4.1'){echo "selected";} ?>>4' 1" (1.24 mts)</option>
	          <option  value="5.1" <?php if($data[0]['height']=='5.1'){echo "selected";} ?>>5' 1" (1.55 mts)</option>
	          <option  value="6.1" <?php if($data[0]['height']=='6.1'){echo "selected";} ?>>6' 1" (1.85 mts)</option>
	          <option  value="4.2" <?php if($data[0]['height']=='4.2'){echo "selected";} ?>>4' 2" (1.28 mts)</option>
	          <option  value="5.2" <?php if($data[0]['height']=='5.2'){echo "selected";} ?>>5' 2" (1.58 mts)</option>
	          <option  value="6.2" <?php if($data[0]['height']=='6.2'){echo "selected";} ?>>6' 2" (1.88 mts)</option>
	          <option  value="4.3" <?php if($data[0]['height']=='4.3'){echo "selected";} ?>>4' 3" (1.31 mts)</option>
	          <option  value="5.3" <?php if($data[0]['height']=='5.3'){echo "selected";} ?>>5' 3" (1.60 mts)</option>
	          <option  value="6.3" <?php if($data[0]['height']=='6.3'){echo "selected";} ?>>6' 3" (1.91 mts)</option>
	          <option  value="4.4" <?php if($data[0]['height']=='4.4'){echo "selected";} ?>>4' 4" (1.34 mts)</option>
	          <option  value="5.4" <?php if($data[0]['height']=='5.4'){echo "selected";} ?>>5' 4" (1.63 mts)</option>
	          <option  value="6.4" <?php if($data[0]['height']=='6.4'){echo "selected";} ?>>6' 4" (1.93 mts)</option>
	          <option  value="4.5" <?php if($data[0]['height']=='4.5'){echo "selected";} ?>>4' 5" (1.35 mts)</option>
	          <option  value="5.5" <?php if($data[0]['height']=='5.5'){echo "selected";} ?>>5' 5" (1.65 mts)</option>
	          <option  value="6.5" <?php if($data[0]['height']=='6.5'){echo "selected";} ?>>6' 5" (1.96 mts)</option>
	          <option  value="4.6" <?php if($data[0]['height']=='4.6'){echo "selected";} ?>>4' 6" (1.37 mts)</option>
	          <option  value="5.6" <?php if($data[0]['height']=='5.6'){echo "selected";} ?>>5' 6" (1.68 mts)</option>
	          <option  value="6.6" <?php if($data[0]['height']=='6.6'){echo "selected";} ?>>6' 6" (1.98 mts)</option>
	          <option  value="4.7" <?php if($data[0]['height']=='4.7'){echo "selected";} ?>>4' 7" (1.40 mts)</option>
	          <option  value="5.7" <?php if($data[0]['height']=='5.7'){echo "selected";} ?>>5' 7" (1.70 mts)</option>
	          <option  value="6.7" <?php if($data[0]['height']=='6.7'){echo "selected";} ?>>6' 7" (2.01 mts)</option>
	          <option  value="4.8" <?php if($data[0]['height']=='4.8'){echo "selected";} ?>>4' 8" (1.42 mts)</option>
	          <option  value="5.8" <?php if($data[0]['height']=='5.8'){echo "selected";} ?>>5' 8" (1.73 mts)</option>
	          <option  value="6.8" <?php if($data[0]['height']=='6.8'){echo "selected";} ?>>6' 8" (2.03 mts)</option>
	          <option  value="4.9" <?php if($data[0]['height']=='4.9'){echo "selected";} ?>>4' 9" (1.45 mts)</option>
	          <option  value="5.9" <?php if($data[0]['height']=='5.9'){echo "selected";} ?>>5' 9" (1.75 mts)</option>
	          <option  value="6.9" <?php if($data[0]['height']=='6.9'){echo "selected";} ?>>6' 9" (2.06 mts)</option>
	          <option  value="4.10" <?php if($data[0]['height']=='4.10'){echo "selected";} ?>>4' 10" (1.47 mts)</option>
	          <option  value="5.10" <?php if($data[0]['height']=='5.10'){echo "selected";} ?>>5' 10" (1.78 mts)</option>
	          <option  value="6.10" <?php if($data[0]['height']=='6.10'){echo "selected";} ?>>6' 10" (2.08 mts)</option>
	          <option  value="4.11" <?php if($data[0]['height']=='4.11'){echo "selected";} ?>>4' 11" (1.50 mts)</option>
	          <option  value="5.11" <?php if($data[0]['height']=='5.11'){echo "selected";} ?>>5' 11" (1.80 mts)</option>
	          <option  value="6.11" <?php if($data[0]['height']=='6.11'){echo "selected";} ?>>6' 11" (2.11 mts)</option>
	          <option  value="7.0" <?php if($data[0]['height']=='7.0'){echo "selected";} ?>>7' (2.13 mts) plus</option>
           </select>  
             </div>
           </div>
            </div>

            <div class="field">
              <label for="height">Weight<span>*</span></label>
              	           <select class="text" name="weight" id="weight">
		          <option value="">Weight</option>
		          <?php 
              for($w=40;$w<=100;$w++)
              { 
                  
                ?>
                <option value="<?php echo $w;?>" <?php if($data[0]['wieght']==$w){echo "selected";} ?>><?php echo $w;?> Kg</option>
              <?php } ?>
	          </select>

            </div>

            <div class="field">
              <label for="marital-status">Marital Status<span>*</span></label>
              
              <div class="divText">
                <div class="divValue">Single</div>
                <ul class="marital" style="display:block;">
                <li>Single <input class="check" type="radio" name="mstatus"  value="single" <?php if($data[0]['marital_status']=='single'){echo "checked";} ?>/></li>
                <li>Divorced <input class="check"  type="radio" name="mstatus" value="divorced" <?php if($data[0]['marital_status']=='divorced'){echo "checked";} ?>/></li>
                <li>Widowed <input class="check"  type="radio" name="mstatus" value="widowed" <?php if($data[0]['marital_status']=='widowed'){echo "checked";} ?>/></li>
                <li>Seperated <input class="check"  type="radio" name="mstatus" value="seperated" <?php if($data[0]['marital_status']=='seperated'){echo "checked";} ?>/></li>
                </ul> 
              </div>

            </div>



          
          <!-- Education Career Start -->
          <div class="title">Education &amp; Career</div>
          
          <div class="field">
          <label for="education">Education<span>*</span></label>
            <div class="row">
              <div class="col-sm-3">
                <select class="text" id="eduCate" name="eduCate">
                  <option>Select</option>
                  <?php foreach ($edus as $value) : ?>
                   <option value="<?php echo $value['id'] ?>" <?php if($data[0]['education_type']==$value['id']) echo "selected"; ?> > <?php echo $value['category'] ?></option>
                  <?php endforeach ?> 
              </select>
            </div>
              <div class="col-sm-9">
                <select class="text" name="education" id="education">
                   <option value="">Education</option>
           
                </select>
              </div>
            </div>
           </div>
           
          <div class="field">
          <label for="professional">Professional<span>*</span></label>
          <div class="row">
            <div class="col-sm-3">
              <select class="text" name="profession" id="profession">
              <option value="">Select Profession</option>
               <?php foreach ($professional as $pr){ 
                       $selected = '';
                      if($professionName[0]['id'] ==$pr['id'] ){
                          $selected = 'selected';
                      }
                ?>
                   <option value="<?php echo $pr['id'] ?>" <?php echo $selected;?>> <?php echo $pr['profession'] ?></option>
                  <?php } ?> 
               
              </select>
            </div>
            <div class="col-sm-9">
           <select class="text" name="professional" id="professional">
            
            <?php if($professionalName[0]['id']){ ?>
                    <option value="<?php echo $professionalName[0]['id'];?>" <?php echo $selected;?>><?php echo $professionalName[0]['professional'];?></option>
              }else{?>
              <option value="">Select Professional</option>
              <?php } ?>
            
          </select></div>
          </div>
          </div>
          <!-- Education Career Close -->
          
          <!-- Present Start -->
          <div class="title">Present Location</div>
          <div class="field">          
          <label for="address">Address<span>*</span></label>
           <input type="text" class="text" placeholder="Address" name="address" id="address" value="<?php echo $data[0]['address']; ?>" />
           </div>
          <div class="field">
          <label for="country">Country<span>*</span></label> 
           	<select class="text" id="getCountry" name="country">
            	<option>Country</option>    
                <?php foreach ($countrys as $value) { ?>
              	<option value="<?php echo $value['id'] ?>" <?php if($data[0]['country']==$value['id'])echo "selected"; ?>><?php echo $value['name'] ?></option>
             <?php } ?>      	
            
          	</select>
          </div>
          <div class="field">
          	<label for="state-province">State / Province<span>*</span></label>
            <select class="text" id="getState" name="state">
          	<option>State</option>          	
            
          </select>
          </div>
          <div class="field">
          <label for="city">City<span>*</span></label> <select class="text">
          	<option>City</option>          	
            
          </select>
          </div>           
          <!-- Present Close -->
          
          <!-- Present Start -->
          <div class="title">About</div>
          <div class="field">
          <textarea class="text" rows="8" maxlength="600" name="about" id="about" placeholder="Write some thing about you"></textarea>
           <span id="max_size">600</span></div>
          
          <div class="field">
          <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo</p>
          </div>
          <div class="field">
          <input type="checkbox" /> I Agree with all terms & conditions
          </div>
          <div class="field">
          <input type="button" class="submit" value="SUBMIT"  id="cProfile" />
          </div>
          <!-- Present Close -->
          
        </div>
        </form>
        </div>
      </div>
      </div>
      
      <div class="col-sm-3">
        <!-- about-profile Start -->
        <div class="whitebox"> 
        <div class="about-profile">
          <div class="title">Why Create Profile?</div>
          <div class="content-box">
            <div class="imgbox"><img src="<?php echo $wwwroot ?>assets/images/thumb-pic-1.jpg" /></div>
            <p>Thousand of Instant Matches</p>
          </div>
          
          <div class="content-box">
            <div class="imgbox"><img src="<?php echo $wwwroot ?>assets/images/thumb-pic-2.jpg" /></div>
            <p>Thousand &amp; Family Friend</p>
          </div>
          
          <div class="content-box">
            <div class="imgbox"><img src="<?php echo $wwwroot ?>assets/images/thumb-pic-3.jpg" /></div>
            <p>Strict &amp; Privacy Control</p>
          </div>
        </div>
        <!-- about-profile Close -->
        
        <!-- about-profile2 Start -->
        <div class="about-profile2">
          <div class="title">Why Create Profile?</div>
          <div class="content-box">
            <div class="imgbox"><img src="<?php echo $wwwroot ?>assets/images/thumb-pic-4.jpg" /></div>
            <p>Simanth Jones <strong>31 Yrs (Manager)</strong></p>
          </div>
          
          <div class="content-box">
            <div class="imgbox"><img src="<?php echo $wwwroot ?>assets/images/thumb-pic-5.jpg" /></div>
            <p>Simanth Jones <strong>31 Yrs (Manager)</strong></p>
          </div>
          
          <div class="content-box">
            <div class="imgbox"><img src="<?php echo $wwwroot ?>assets/images/thumb-pic-6.jpg" /></div>
            <p>Simanth Jones <strong>31 Yrs (Manager)</strong></p>
          </div>
        </div>
        <!-- about-profile2 Close -->
        </div>
      </div>
    </div>    
  </div>
</div>
<!--member close-->
<?php include_once("includes/footer.php") ?>
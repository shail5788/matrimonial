<?php include_once("includes/common-header.php");
$matchedCount = count($_SESSION["searchdata"]);
if($matchedCount>0){
   $msg="none";
}else{
  $msg="block";
}
//echo "<pre>";
//print_r($_SESSION["searchdata"]);
?>
<div class="search-wrapper">
  <!--banner start-->
  <div class="search-banner"></div>
  <!--banner close-->
  <!--menu start-->
  <div class="container">
    <div class="header">
      <div class="row middle">
        <div class="col-sm-3">
          <div class="logo"><a href="index.php"><img src="<?php echo $wwwroot;?>assets/images/logo.png" /></a></div>
        </div>
        <div class="col-sm-9">
          <div class="links">
            <ul>
               <li><a href="<?php echo $wwwroot ?>create-profile.php"><?php if($_SESSION['user']) echo $_SESSION['user']['name'];?></a></li>
              <li>
                 <?php if(isset($_SESSION['user'])){?>
                  <a href="<?php echo $wwwroot ?>index.php?logout=logout"  class="drop logout">
                    <img src="<?php echo $wwwroot?>assets/images/header-icon1.png" />
                    Logout
                  </a>
                 <?php }else{ ?> 
                  <a href="javascript:void(0);" onclick="popupOpen('loginpop')" class="drop">
                    <img src="<?php echo $wwwroot?>assets/images/header-icon1.png" />
                    Login
                  </a>
                 <?php } ?> 
              </li> 
              <!-- <li>
                <a href="#">
               Help
                </a>
              </li> -->
              <li>
                <select class="language">
                    <option>French</option>
                    <option>English</option>
                 </select>
             </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <!--serach sartt-->
    <div class="search-row inner">
      <div class="search-tab">
        <div class="search">Search for Man/Woman</div>
        <div class="srcbtn">Search</div>
      </div>
      <div class="drop">
        <div class="drop-row">
          <div class="drop-box">
            <div class="box"><div class="short" id="marital_status">Looking For</div><span class="fa fa-angle-down">&nbsp;</span>
            <ul>
              <li class="mstatus" id="1m" ide="1">Man</li>
              <li class="mstatus" id="2m" ide="2">Woman</li>
            </ul>
          </div>
        </div>
        <div class="drop-box age">
          <div class="box"><div class="short"  id="sAge">18 </div>yrs<span class="fa fa-angle-down">&nbsp;</span>
          <ul>
            <?php 
            for($i = 18; $i<=100;$i++){
              echo '<li class="age" id='.$i.' Ide='.$i.' >'.$i.'</li>';
            }
            ?>
          </ul>
        </div>
        <div class="box text-center">To</div>
        <div class="box"><div class="short"  id="eAge">32 </div>yrs<span class="fa fa-angle-down">&nbsp;</span>
        <ul>
          <?php 
          for($i = 18; $i<=100;$i++){
            echo '<li class="enage" id='.$i.' Ide='.$i.'>'.$i.'</li>';
          }
          ?>
        </ul>
      </div>
    </div>
    <div class="drop-box" >
      <div class="box"><input type="text" class="short"  id="getCountry" placeholder="Congo"/><span class="fa fa-angle-down">&nbsp;</span>
        <ul id="countryData">
          <?php foreach ($obj->get_country() as $value) { 
         $selected = '';
                $style='';
                  if($value['name'] == 'Congo'){
                      $selected = 'selected';
                      $style= "style='display:none'";
                  }
                ?>
                <li class='country' id="<?php echo $value['id']."c" ?>" <?php echo $selected.' '.$style; ?> Ide="<?php echo $value['id'] ?>"><?php echo $value['name']; ?></li>
          <?php } ?>  
        </ul>
      </div>
    </div>
  </div>
  <div class="drop-row">
    <div class="drop-box">
      <div class="box"><input type="text" class="short"  id="newState" placeholder="Province"/><span class="fa fa-angle-down">&nbsp;</span>
        <ul id="getState">
        </ul>
      </div>
    </div>
    <div class="drop-box">
      <div class="box"><div class="short"  id="getReligion">Religion</div><span class="fa fa-angle-down">&nbsp;</span>
      <ul>
        <?php foreach ($religions as $value) { ?>
        <li class="religion" id="r<?php echo $value['id'] ; ?>"  Ide="<?php echo $value['id'] ; ?>"><?php echo $value['religion_name'] ; ?> </li>
        <?php } ?>
      </ul>
    </div>
  </div>
  <div class="drop-box">
    <div class="srcbtn full" id="get_Searching">Search</div>
  </div>
</div>
</div>
</div>  
<!--serach close-->
</div>
<!--menu close-->
</div>
<div class="searchlist module2">
  <div class="container">
    <div class="title"><?php echo number_format($matchedCount);?> Matches</div>
    <div class="row">
      <div class="col-md-3">
        <?php include_once("includes/side-filter-menu.php");?>
      </div>
      <div class="col-sm-9">
        <!-- List 1 Start -->
        <div style="display:<?php echo $msg; ?>;text-align: center;color: red;"><h3> Sorry ! No record found </h3></div>
        <?php $popup="";$link="javascript:void(0)"; if(isset($_SESSION['user'])){
          $link="user-profile.php";
        }else{
          $popup= "onclick="."popupOpen('loginpop')";
        } ?>
        

        <?php 
          foreach($_SESSION["searchdata"] as $sanData)
          { 
              $CountryData  =  $obj->get_row_data("countries",$sanData['country']);
              $stateData    =  $obj->get_row_data("states",$sanData['province']);
              $religionData =  $obj->get_row_data("Religion",$sanData['religion']);
              
            if($sanData['picture']!='')
              {
                  $imagePath = $wwwroot."user-profiles/".$sanData['picture'];
              }
            else
              {
                 $imagePath=$wwwroot."assets/images/dummy_pic.jpg";
              } 

               $height = explode(".",$sanData['height']);
               $heightFit = $height[0];
               $heightInch = $height[1];
            ?>
         <div class="outerbox">
          <div class="box">
           <!--  <a href="<?php echo $link ;?>" <?php echo $popup; ?>> -->
              <div class="user"> 
                <?php if(isset($_SESSION['user']))
                     { ?> 
                        <img src="<?php echo $imagePath ?>" />
                <?php }
                    else
                     { ?>
                       <img src="<?php echo $imagePath ?>" />
              <?php  } ?>
              </div>
              <div class="user-detail">
                <h4><?php echo ucfirst($sanData['name']) ?></h4>
                <ul>
                  <li><?php echo $sanData['age'] ?> Year, <?php echo $heightFit."'"; ?><?php echo $heightInch.'"'; ?> </li>
                  <li><?php echo $stateData[0]['name'] ?>, <?php echo $CountryData[0]['name']; ?> </li>
                  <li>Sikh, Khatri</li>
                  <li><?php echo $religionData[0]['religion_name'] ?></li>
                </ul>
                <ul>
                  <li><?php echo $sanData['education'] ?></li>
                  <li>Looking for a <?php if($sanData['gender']=="male") echo "Girl"; else echo "Man"; ?></li>
                  <li>No income</li>
                  <li><?php echo $sanData['marital_status'] ?></li>
                </ul>
                <ul>
                  <li class="advantage">eAdvantage</li>
                </ul>
                <div class="user-connect">
                  <ul>
                    <li><img src="<?php echo $wwwroot ?>assets/images/icon-email.png" /></li>
                    <li><img src="<?php echo $wwwroot ?>assets/images/icon-phone.png" /></li>
                    <li><img src="<?php echo $wwwroot ?>assets/images/icon-chat.png" /></li>
                    <li><img src="<?php echo $wwwroot ?>assets/images/icon-star.png" /></li>
                  </ul>
                </div>
              </div>
             </div> 
            <div class="feature">
              <!-- <a href="#">Featured Profile (4more)</a> -->
            </div>    
          </div>
            
    <?php } ?>
        
      
          <!-- List 3 Close -->
        </div>
      </div>
    </div>
  </div>    
  <?php include_once("includes/footer.php") ?>
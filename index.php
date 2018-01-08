<?php $wwwroot ='';
include("includes/header.php");
include("resource/myconfig.php");
?>
<!--serach sartt-->

  <div class="search-row">
    <div class="search-tab">
      <div class="search">Search for Man/Woman</div>
      <div class="srcbtn">Search</div>
    </div>
    <div class="drop">
      <div class="drop-row">
        <div class="drop-box">
          <div class="box"><div id="marital_status" class="short">Looking For</div><span class="fa fa-angle-down">&nbsp;</span>
            <ul>
              <li class="mstatus" id="1m" ide="1">Man</li>
              <li class="mstatus" id="2m" ide="2">Woman</li>
            </ul>
          </div>
        </div>
        <div class="drop-box age">
          <div class="box"><div class="short" id="sAge">18</div> yrs<span class="fa fa-angle-down">&nbsp;</span>
            <ul>
                 <?php 
                  for($i = 18; $i<=100;$i++){
                    echo '<li class="age" id='.$i.' Ide='.$i.' >'.$i.'</li>';
                  }
                 ?>
            </ul>
          </div>
          <div class="box text-center">To</div>
          <div class="box"><div class="short" id="eAge">32 </div> yrs<span class="fa fa-angle-down">&nbsp;</span>
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
          <div class="box"><input type="text"  class="short" id="getCountry"   placeholder="Congo"><span class="fa fa-angle-down">&nbsp;</span>
            <ul>
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
            </ul id="countryData">
          </div>
        </div>
      </div>
      <div class="drop-row">
        <div class="drop-box">
          <div class="box"><input type="text" class="short" id="newState" placeholder="Province" /><span class="fa fa-angle-down">&nbsp;</span>
            <ul id="getState">
            </ul>
          </div>
        </div>
        <div class="drop-box">
          <div class="box"><div class="short" id="getReligion">Religion</div><span class="fa fa-angle-down">&nbsp;</span>
            <ul>
            <?php foreach ($religions as $value) { ?>
              <li class="religion" id="r<?php echo $value['id'] ; ?>"  Ide="<?php echo $value['id'] ; ?>"><?php echo $value['religion_name'] ; ?></li>
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
</div>  
<!--member start-->
<div class="membership module">
  <div class="container">
    <div class="title">Upgrade your Membership to contact people you like</div>
    <div class="row">
      <div class="col-sm-6">
        <div class="box">
          <div class="icon"><img src="<?php echo $wwwroot?>assets/images/member-icon1.png" /></div>
          <h4>View Contacts</h4>
          <p>See Mobile & Landline numbers. Call directly. Send Text messages.</p>
        </div>
      </div>
      <div class="col-sm-6">
        <div class="box">
          <div class="icon"><img src="<?php echo $wwwroot?>assets/images/member-icon2.png" /></div>
          <h4>Send Messages</h4>
          <p>Send Personalized Messages while expressing Interest.</p>
        </div>
      </div>
      <div class="col-sm-6">
        <div class="box">
          <div class="icon"><img src="<?php echo $wwwroot?>assets/images/member-icon3.png" /></div>
          <h4>See E-mail</h4>
          <p>Talk via emails. Share more pictures, biodata, kundli etc.</p>
        </div>
      </div>
      <div class="col-sm-6">
        <div class="box">
          <div class="icon"><img src="<?php echo $wwwroot?>assets/images/member-icon4.png" /></div>
          <h4>Chat</h4>
          <p>Chat instantly with other members who are online.</p>
        </div>
      </div>
    </div>
    <div class="btns">
      <p><a href="membership-plan.php">Browse Membership Plans</a></p>
     <!-- <p><span>To know more, call us @ 1-800-419-6299</span></p>-->
    </div>
  </div>
</div>
<!--member close-->
<!--appbox start-->
<div class="appbox module">
  <div class="container">
    <div class="row">
      <div class="col-sm-5">
        <div class="image"><img src="<?php echo $wwwroot?>assets/images/app-image.png" /></div>
      </div>
      <div class="col-sm-7">
       <div class="area">
        <div class="title">Meilleure Couple</div>
        <div class="text">
         <p>Access quick & simple search, instant updates and a great user experience on your phone. Download our apps which are the best rated in online matrimony segment.</p>
        </div>
        <ul>
         <li><a href="<?php echo $links[0]['appStore'] ?>"><img src="<?php echo $wwwroot?>assets/images/app-icon1.png" /></a></li>
         <li><a href="<?php echo $links[0]['googleLink'] ?>"><img src="<?php echo $wwwroot?>assets/images/app-icon2.png" /></a></li>
        </ul>
        <div class="text">
          <p><a href="#">Click here</a> to know more about apps.</p>
        </div>
       </div> 
      </div>
    </div>    
  </div>
</div>
<!--appbox close-->
<!--about start-->
<div class="module about">
 <div class="container">
   <div class="row">
     <div class="col-sm-2"><div class="img"><img src="<?php echo $wwwroot?>assets/images/logo.png" /></div></div>
     <div class="col-sm-10">
       <p>
       <strong>Meilleure Couple</strong>  accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autemuptates  udiandae sint et Nam libero tempore, cum soluta nobis est eligendi optio cumque molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat."
       </p>
     </div>
   </div>
 </div>
</div>
<!--about close-->
<?php include("includes/footer.php"); ?>
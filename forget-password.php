<?php include_once("includes/common-header.php");
  
     $email=$_GET['user_id'];

 ?>

<div class="create-wrapper">
<!--banner start-->
<div class="create-banner"></div>
<!--banner close-->

<!--menu start-->
<div class="container">
  <div class="header">
    <div class="row middle">
      <div class="col-sm-3">
        <div class="logo"><a href="index.html"><img src="<?php echo $wwwroot?>assets/images/logo.png" /></a></div>
      </div>
      <div class="col-sm-9">
        <div class="links">
          <ul>                              
            <li><a href="index.html">Home</a></li>
          <!--   <li><a href="#">Request Callback</a></li>
            <li><a href="#">Live Chat</a></li> -->
            <li><a href="#">Contact Us</a></li>
            <li><a href="#">1-800-52316-19</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  
  <div class="title-box">
    <div class="row middle">
      <div class="col-sm-12">
        <h1>Reset Password</h1>
      </div>
    </div>
  </div>
  
</div>
<!--menu close-->
</div>

<!--changes start-->
<div class="changes module">
  <div class="container">    
    <div class="row">

      <div class="col-sm-12">

        <form action="#" method="Post" id="resetPassword">
        <div class="changesbox">          
           <div class="nmessage" style="display: none;"></div><br><br>
          <!-- Password Start -->          
          <ul>          
          <li>
            <input type="hidden" name="user_id" id="user_id" value="<?php echo $email; ?>">
          	<label for="your-email">Password<span>*</span></label>
          	<input type="password" class="text" id="newPass" placeholder="Password" onkeypress="hiddFun('newPass')" />
          </li>
          <li><label for="contact">Confirm Password<span>*</span></label>
           <input type="password" class="text" id="newCpass" placeholder="Confirm Password" onkeypress="hiddFun('newCpass')" /></li>    
          </ul>
          <!-- Password Close -->
          
          
          
          <input type="button" class="submit" id="reset_password" value="RESET PASSWORD"  />
        </div>
        </form>
      </div>
      
    </div>    
  </div>
</div>
<!--changes close-->



<!--footer start-->
<?php include("includes/footer.php"); ?>
<!--footer close-->


</body>
</html>

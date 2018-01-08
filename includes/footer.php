<!--footer start-->
<div class="footer module">
  <div class="container">
  
   <?php $data=$obj->get_footer_link(); 

   ?>
    <div class="row">
      <div class="col-sm-3">
        <div class="f-title">Explore</div>
        <div class="link">
        <ul>
         </li>
         <li><a href="#">Home</a></li>
         <li><a href="#">Advanced search</a></li>
         <li><a href="#">Success stories</a></li>
         <li><a href="#">Sitemap</a></li>
        </ul>
        </div>
      </div>

      <div class="col-sm-3">
        <div class="f-title">Services</div>
        <div class="link">
        <ul>
         </li>
         <li><a href="#">Membership Options</a></li>
         <li><a href="#">Meillure Couple Careers</a></li>
        </ul>
        </div>
      </div>

      <div class="col-sm-3">
        <div class="f-title">Help</div>
        <div class="link">
        <ul>
         </li>
         <li><a href="#">Contact us</a></li>
         <li><a href="javascript:void(0)" onclick="popupOpen('feedbackpop')">Feedback/Queries</a></li>
         <li><a href="#">Meillure Couple centers (32)</a></li>
        </ul>
        </div>
      </div>

      <div class="col-sm-3">
        <div class="f-title">Legal</div>
        <div class="link">
        <ul>
          <?php foreach ($data as $value) { ?>
          <li><a href="<?php echo $value['id'] ?>"><?php echo $value['name'] ?></a></li>
          <?php } ?>
     
        </ul>
       </div> 
      </div>
    </div>
    <div class="row">
      <div class="container">
        <div class="row">
          <div class="col-sm-4">
            <div class="f-title">App available on</div>
            <div class="link1">
              <ul>
                <li>
                  <a href="<?php echo $links[0]['appStore'] ?>">
                    <img src="<?php echo $wwwroot?>assets/images/app-icon1.png" class="f-img" />
                 </a>
                </li>
                <li>
                    <a href="<?php echo $links[0]['googleLink'] ?>">
                      <img src="<?php echo $wwwroot?>assets/images/app-icon2.png" class="f-img" />
                    </a>
                </li>
              </ul>
            </div>
          </div>
          
          <div class="col-sm-4">
            <div class="f-title">Follow Us</div>
            <div class="link1">
              <ul>
                <li><a href="<?php echo $links[0]['facebookLink'] ?>"><img src="<?php echo $wwwroot?>assets/images/social-icon1.png" /></a></li>
                <li><a href="<?php echo $links[0]['googlePlus'] ?>"><img src="<?php echo $wwwroot?>assets/images/social-icon2.png" /></a></li>
                <li><a href="<?php echo $links[0]['twitterLink'] ?>"><img src="<?php echo $wwwroot?>assets/images/social-icon3.png" /></a></li>
              </ul>
            </div>
          </div>
          
          <div class="col-sm-4">
           <!--  <div class="f-title">Customer Service (Toll free)</div>
            <div class="callus"><p>1-800-419-6299</p></div> -->
          </div>
          
        </div>
      </div>
    </div>
    
    
  </div>
</div>
<div class="footer1">
  <p>All rights reserved © 2017 Meillure Couple Services.</p>
</div>
<script type="text/javascript" src="<?php echo $wwwroot ?>assets/js/jquery-1.10.1.min.js"></script>
<script type="text/javascript" src="<?php echo $wwwroot ?>assets/js/global.js"></script>
 <script type="text/javascript" src="<?php echo $wwwroot ?>assets/js/validation.js"></script> 
  <script type="text/javascript" src="<?php echo $wwwroot ?>assets/js/script.class.js"></script> 
 <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>
<script type="text/javascript" src="<?php echo $wwwroot ?>assets/js/jquery.bxslider.js"></script>
<!--</div><script type="text/javascript">function googleTranslateElementInit() {  new google.translate.TranslateElement({pageLanguage: 'hi', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');}</script><script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>-->
</body></html>
<!--footer close-->

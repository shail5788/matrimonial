﻿<?php 
include('includes/globalFunction.php');
include('includes/adminFunction.php');
echo $obj->headerSection();
echo $obj->leftSideBar();
echo $obj->footer();

if(isset($_REQUEST['submit'])){
    $add = $obj1->addPlan($_POST);
    if($add == 1){?>
<script> window.location.href = "allPlanList.php";</script>
<?php  }
}
?>

<section class="content">
        <div class="container-fluid">
            
                 <!-- Horizontal Layout -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                               Add Plan
                            </h2>
                            
                        </div>
                        <div class="body">
                            <form class="form-horizontal" method="post" action="" enctype=multipart/form-data>
                                
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="password_2">Plan name</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <select class="form-control" name="planName">
                                                <?php echo $obj1->planRemain();?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                 <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="password_2">Time</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                              <select name="time[]" class="form-control">
                                                <option value="1 month">1 month</option>
                                                <option value="3 month">3 month</option>
                                                <option value="6 month">6 month</option>
                                                <option value="12 month">12 month</option>
                                              </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                 

                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="password_2">Price</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                               <input type="text" required class="form-control" name="price[]">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--<div id="addPlanMore"></div>
                                    <p id="addMorePrice">Add More</p>-->
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="password_2">Benfit</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                            <?php echo $obj1->planBenfit();?>    
                                       
                                            </div>
                                        </div>
                                    </div>
                                </div>





                               <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="password_2">Description</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <textarea id="MyTextarea3" name="des" ></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                               
                                
                                <div class="row clearfix">
                                    <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                                        <input type="submit" class="btn btn-primary m-t-15 waves-effect" value="Save" name="submit" id="submit"/>
                                        
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Horizontal Layout -->
        
            </div>


<?php echo $obj->scriptSection();?>  
<script src="js/pages/forms/editors.js"></script>    
<script type="text/javascript">
CKEDITOR.replace( 'MyTextarea3');
        $("form").submit( function(e) {
            var messageLength = CKEDITOR.instances['MyTextarea3'].getData().replace(/<[^>]*>/gi, '').length;
            if( !messageLength ) {
                alert( 'Please fill description' );
                e.preventDefault();
            }
        });</script>
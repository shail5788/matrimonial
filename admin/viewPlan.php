<?php 
include('includes/globalFunction.php');
include('includes/adminFunction.php');
echo $obj->headerSection();
echo $obj->leftSideBar();
echo $obj->footer();
$detail =  $obj1->viewPlanList($_GET['id']);
?>
<section class="content">
        <div class="container-fluid">
            
                 <!-- Horizontal Layout -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                   <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                               Plan Detail List
                            </h2>
                           <a href="allPlanList.php" class="btn btn-primary pull-right">Cancel</a>
                        </div>
                       
                        <div class="body">
                        <div id="msgact"></div>
                        <div class="row clearfix">
                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label"><label for="name">Plan Name</label>
                        </div>
                                    <div class="col-lg-6 col-md-6 col-sm-3 col-xs-5">
                                        <div class="form-group">
                                            <div class="form-line">
                                              <?php echo $detail['plan_name']?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
            
                        <div class="row clearfix">
                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label"><label for="price">Price</label>
                        </div>
                                    <div class="col-lg-6 col-md-6 col-sm-3 col-xs-5">
                                        <div class="form-group">
                                            <div class="form-line">
                                                 <?php echo $detail['price'];?>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                        <div class="row clearfix">
                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label"><label for="description">Description</label>
                        </div>
                                    <div class="col-lg-6 col-md-6 col-sm-3 col-xs-5">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <?php echo $detail['description']?>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                        <div class="row clearfix">
                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label"><label for="time">Time</label>
                        </div>
                                    <div class="col-lg-6 col-md-6 col-sm-3 col-xs-5">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <?php echo $detail['time']?> 
                                            </div>
                                        </div>
                                    </div>
                                </div>


                        <div class="row clearfix">
                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label"><label for="benefit">Benefit</label>
                        </div>
                                    <div class="col-lg-6 col-md-6 col-sm-3 col-xs-5">
                                        <div class="form-group">
                                            <div class="form-line">
                                            <?php
                                            $withComma = implode(",", $detail['benfit']);
                                            echo $withComma;
                                            ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
            
            
        



            
            
            
            
                                    
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Basic Examples -->
                    </div>
                </div>
<?php echo $obj->scriptSection();?>
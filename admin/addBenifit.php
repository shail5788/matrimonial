<?php 
include('includes/globalFunction.php');
include('includes/adminFunction.php');
echo $obj->headerSection();
echo $obj->leftSideBar();
echo $obj->footer();

if(isset($_REQUEST['submit'])){
    $add = $obj1->addBenifit($_POST);
    if($add == 1){?>
<script> window.location.href = "benifitList.php";</script>
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
                              Add Benifit
                            </h2>
                          
                        </div>
                        <div class="body">
                            <form class="form-horizontal" method="post" action="" id="benifitname">
                           
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="benfit">Benifit Name</label>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-3 col-xs-5">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="benfit" name="benfit" class="form-control" placeholder="Enter Benifit">
                                            </div>
                                            <span id="benifname1"></span>
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
    
   $('#benifitname').on("submit",function(e){
    $('#benifname1').html();
    var benfit = $('#benfit').val();
    if(benfit=="")
    {
            $('#benfit').css('border-bottom', '3px solid red');
            $("#benifname1").html("Please enter Benifit Name.");
            $("#benifname1").css('color', 'red');
    }
    else{
        $("#benifitname").submit(); 
    }
    e.preventDefault();

   });
</script>
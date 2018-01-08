<?php 
include('includes/globalFunction.php');
include('includes/adminFunction.php');
echo $obj->headerSection();
echo $obj->leftSideBar();
echo $obj->footer();
$detail =  $obj1->planNameDetail($_GET['id']);

if(isset($_REQUEST['submit']))
{
    //print_r($_POST);exit();
    $add = $obj1->editPlanName($_POST,$_GET['id']);
        if($add == 1)
        { ?>
            <script> window.location.href = "planNameList.php";</script>
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
                               Edit Plan Name
                            </h2>
                            
                        </div>
                        <div class="body">
                            <form class="form-horizontal" method="post" id="addplanname">
                             <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="plan_name">Plan name</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                               <input type="text" id="plan_name" name="plan_name" value="<?php echo $detail['plan_name'];?>" class="form-control">
                                               
                                            </div>
                                            <span id="pname"></span>
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
    
   $('#addplanname').on("submit",function(e){
    $('#pname').html();
    var plan_name = $('#plan_name').val();
   if(plan_name=="")
    {
        $('#plan_name').css('border-bottom', '3px solid red');
        $("#pname").html("Please enter Plan Name.");
        $("#pname").css('color', 'red');
        
    }
    else{
        $("#addplanname").submit(); 
    }
    e.preventDefault();

   });
</script>
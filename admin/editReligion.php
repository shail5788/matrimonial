<?php 
include('includes/globalFunction.php');
include('includes/adminFunction.php');
echo $obj->headerSection();
echo $obj->leftSideBar();
echo $obj->footer();
$detail =  $obj1->religionDetail($_GET['id']);
if(isset($_REQUEST['submit'])){
    $add = $obj1->editReligion($_POST,$_GET['id']);
    if($add == 1){?>
<script> window.location.href = "allReligionList.php";</script>
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
                               Edit Religion
                            </h2>
                            
                        </div>
                        <div class="body">
                            <form class="form-horizontal" method="post" action="" enctype=multipart/form-data id="religionForm">
                                
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="password_2">Edit Religion</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                             <input type="text" class="form-control" name="religion_name" value="<?php echo $detail['religion_name']?>" id="religion_name">  
                                            </div>
                                            <span id="reliMsg"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                                        <input type="submit" class="btn btn-primary m-t-15 waves-effect" value="update" name="submit" id="submit"/>
                                        
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

<script type="text/javascript">
    
   $('#religionForm').on("submit",function(e){
    
    $('#reliMsg').html();
    var religion_name = $('#religion_name').val();
    
    if(religion_name=="")
    {
        $('#religion_name').css('border-bottom', '3px solid red');
        $("#reliMsg").html("Please enter Religion.");
        $("#reliMsg").css('color', 'red');
    } 
   else
    {
        $("#religionForm").submit(); 
    }
    e.preventDefault();

   });
</script> 
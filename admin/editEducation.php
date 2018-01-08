<?php 
include('includes/globalFunction.php');
include('includes/adminFunction.php');
echo $obj->headerSection();
echo $obj->leftSideBar();
echo $obj->footer();
$detail =  $obj1->educationDetail($_GET['id']);
if(isset($_REQUEST['submit'])){
    $add = $obj1->editEducation($_POST,$_GET['id']);
    if($add == 1){?>
<script> window.location.href = "educationList.php";</script>
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
                               Edit Education
                            </h2>
                            
                        </div>
                        <div class="body">
                            <form class="form-horizontal" method="post" action="" id="eduForm">
                                
                                 <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="category_id">Category name</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <select class="form-control" name="category_id">

                                                <?php echo $obj1->educationRemain($detail["category_id"]);?>
                                              
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                 <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="education">Education Name</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                             <input type="text" class="form-control" name="education" id="education" value="<?php echo $detail["education"];?>">  
                                            </div>
                                            <span id="eduMsgedit"></span>
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
    
   $('#eduForm').on("submit",function(e){
    
    $('#eduMsgedit').html();
    var education = $('#education').val();
    
    if(education=="")
    {
        $('#education').css('border-bottom', '3px solid red');
        $("#eduMsgedit").html("Please enter Education.");
        $("#eduMsgedit").css('color', 'red');
    } 
   else
    {
        $("#eduForm").submit(); 
    }
    e.preventDefault();

   });
</script>
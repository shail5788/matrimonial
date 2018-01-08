<?php 
include('includes/globalFunction.php');
include('includes/adminFunction.php');
echo $obj->headerSection();
echo $obj->leftSideBar();
echo $obj->footer();
$detail =  $obj1->professionDetail($_GET['id']);
if(isset($_REQUEST['submit'])){
    $add = $obj1->editProfession($_POST,$_GET['id']);
    if($add == 1){?>
<script> window.location.href = "professionList.php";</script>
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
                               Edit Profession
                            </h2>
                            
                        </div>
                        <div class="body">
                            <form class="form-horizontal" method="post" action="" id="professionForm">
                                
                                 <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="profession">Add Profession</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                             <input type="text" class="form-control" name="profession" id="profession" value="<?php echo $detail["profession"];?>">  
                                            </div>
                                            <span id="proMsgedit"></span>
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
    
   $('#professionForm').on("submit",function(e){
    $('#proMsgedit').html();
    var profession = $('#profession').val();
    if(profession=="")
    {
            $('#profession').css('border-bottom', '3px solid red');
            $("#proMsgedit").html("Please enter Profession.");
            $("#proMsgedit").css('color', 'red');
    }
    else{
        $("#professionForm").submit(); 
    }
    e.preventDefault();

   });
</script>


<?php 
include('includes/globalFunction.php');
include('includes/adminFunction.php');
echo $obj->headerSection();
echo $obj->leftSideBar();
echo $obj->footer();
if(isset($_REQUEST['submit'])){
    $add = $obj1->addState($_POST);
    if($add == 1){?>
<script> window.location.href = "stateList.php";</script>
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
                               Add State
                            </h2>
                            
                        </div>
                        <div class="body">
                            <form class="form-horizontal" method="post" action="" id="stateForm">
                                
                                 <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="country_id">Country name</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <select class="form-control" name="country_id" id="country_id">
                                                    <?php echo $obj1->countrynameList();?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                 <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="name">State Name</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                             <input type="text" class="form-control" name="name" id="name">  
                                            </div>
                                            <span id="stateMsg"></span>
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

<!-- <script src="js/pages/forms/editors.js"></script>    
<script type="text/javascript">CKEDITOR.replace( 'MyTextarea3');</script -->>


<script type="text/javascript">
    
   $('#stateForm').on("submit",function(e){
    //$('#sortMsg').html();
    $('#stateMsg').html();
    
    //var name = $('#name').val();
    var name = $('#name').val();
    
    if(name=="")
    {
        $('#name').css('border-bottom', '3px solid red');
        $("#stateMsg").html("Please enter State Name.");
        $("#stateMsg").css('color', 'red');
    } 
   /* else if(sortname=="")
    {
        $('#sortname').css('border-bottom', '3px solid red');
        $("#stateMsg").html("Please enter Country Short Name.");
        $("#stateMsg").css('color', 'red');

    }*/
   
    else
    {
        $("#stateForm").submit(); 
    }
    e.preventDefault();

   });
</script>

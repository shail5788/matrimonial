<?php 
include('includes/globalFunction.php');
include('includes/adminFunction.php');
echo $obj->headerSection();
echo $obj->leftSideBar();
echo $obj->footer();
if(isset($_REQUEST['submit'])){
    $add = $obj1->addCountry($_POST);
    if($add == 1){?>
<script> window.location.href = "countryList.php";</script>
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
                               Add Country
                            </h2>
                            
                        </div>
                        <div class="body">
                            <form class="form-horizontal" method="post" action="" id="countryForm">
                                
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="name">Add Country</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                             <input type="text" class="form-control" name="name" id="name">  
                                            </div>
                                            <span id="countryMsg"></span>
                                        </div>
                                    </div>
                                </div>
                                 <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="sortname">Short Name</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                             <input type="text" class="form-control" name="sortname" id="sortname">  
                                            </div>
                                            <span id="sortMsg"></span>
                                        </div>
                                    </div>
                                </div>
                                 <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="phonecode">Phone Code</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                             <input type="text" class="form-control" name="phonecode" id="phonecode" onkeypress="return isNumber(event);"/>  
                                            </div>
                                            <span id="codeMsg"></span>
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
<script type="text/javascript">
function isNumber(evt) {
        evt = (evt) ? evt : window.event;
        var charCode = (evt.which) ? evt.which : evt.keyCode;
         if (charCode > 31 && (charCode < 46 || charCode > 57 || charCode==47)) {
            return false;
           }
        return true;
      }
</script>
<!-- <script src="js/pages/forms/editors.js"></script>    
<script type="text/javascript">CKEDITOR.replace( 'MyTextarea3');</script -->>


<script type="text/javascript">
    
   $('#countryForm').on("submit",function(e){
    $('#countryMsg').html();
    $('#sortMsg').html();
    $('#codeMsg').html();
    var name = $('#name').val();
    var sortname = $('#sortname').val();
    var phonecode = $('#phonecode').val();
    if(name=="")
    {
        $('#name').css('border-bottom', '3px solid red');
        $("#countryMsg").html("Please enter Country Name.");
        $("#countryMsg").css('color', 'red');
    } 
    else if(sortname=="")
    {
        $('#sortname').css('border-bottom', '3px solid red');
        $("#sortMsg").html("Please enter Country Short Name.");
        $("#sortMsg").css('color', 'red');

    }
    else if(phonecode=="")
    {
        $('#phonecode').css('border-bottom', '3px solid red');
        $("#codeMsg").html("Please enter Country Phone Code.");
        $("#codeMsg").css('color', 'red');

    }
    else{
        $("#countryForm").submit(); 
    }
    e.preventDefault();

   });
</script>

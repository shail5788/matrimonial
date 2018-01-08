<?php 
include('includes/globalFunction.php');
include('includes/adminFunction.php');
echo $obj->headerSection();
echo $obj->leftSideBar();
echo $obj->footer();
$detail =  $obj1->cityDetail($_GET['id']);
if(isset($_REQUEST['submit'])){
    $add = $obj1->editCity($_POST,$_GET['id']);
    if($add == 1){?>
<script> window.location.href = "allCityList.php";</script>
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
                               Edit City
                            </h2>
                            
                        </div>
                        <div class="body">
                            <form class="form-horizontal" method="post" action="" id="cityForm">
                                
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="password_2">Add City</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                             <input type="text" class="form-control" name="city_name" value="<?php echo $detail['city']?>" id="city_name">  
                                            </div>
                                            <span id="cityMsgedit"></span>
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
    
   $('#cityForm').on("submit",function(e){
    $('#cityMsgedit').html();
    var city_name = $('#city_name').val();
    if(city_name=="")
    {
            $('#city_name').css('border-bottom', '3px solid red');
            $("#cityMsgedit").html("Please enter City Name.");
            $("#cityMsgedit").css('color', 'red');
    }
    else{
        $("#cityForm").submit(); 
    }
    e.preventDefault();

   });
</script>
